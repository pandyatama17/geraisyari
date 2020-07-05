<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use App\MaterialColor;
use App\Production;
use App\Order;
use App\OrderDetails;
use App\StoreInventory;
use App\Model;
use App\Sizing;

class MainController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function storeInventory()
  {
    $query = \DB::table('store_inventory as si')
        ->leftJoin('productions as p', 'si.production_id', '=', 'p.id')
        ->leftJoin('models as mod', 'si.model_id', '=', 'mod.id')
        ->leftJoin('materials as mat', 'si.material_id', '=', 'mat.id')
        ->leftJoin('material_colors as mc', 'si.color', '=', 'mc.id')
        ->select('si.*','mod.name as model','mat.name as material','mc.color as color','p.code as production_code')
        ->get();
    // $query = StoreInventory::all();
    // return $query;
    return view('store.inventory')->with('store_inventory',$query);
  }
  public function storeSizing($id)
  {
      $query = Sizing::where('parent_id',$id)->first();

      // return $query;
      return view('store.sizing',['data'=>$query]);
  }
  public function showProductionOrder($id)
  {
      $prod = Production::find($id);
      if($prod->order_id !=0)
      {
        $parentQuery = \DB::table('productions as p')
            ->leftJoin('orders as o', 'p.order_id', '=', 'o.id')
            ->leftJoin('resellers as r', 'o.reseller_id', '=', 'r.id')
            ->leftJoin('tailors as t', 'p.tailor', '=', 't.id')
            ->leftJoin('deliveries as d', 'p.delivery_out_id', '=', 'd.id')
            ->select('order.*','order.id as order_id','p.*','r.name as reseller_name','t.name as tailor','d.date_start as delivery_out')
            ->get(1);

        $childQuery = \DB::table('order_details as od')
            ->where('od.parent_id', $parentQuery->order_id)
            ->leftJoin('models as mod', 'od.model_id', '=', 'mod.id')
            ->leftJoin('materials as mat', 'od.material_id', '=', 'mat.id')
            ->leftJoin('material_colors as mc', 'od.color', '=', 'mc.id')
            ->select('od.*','mod.name as model','mat.name as material','mc.color as color')
            ->get();

            $type = 1;
      }
      else
      {
        $parentQuery = \DB::table('productions as p')
            ->leftJoin('tailors as t', 'p.tailor', '=', 't.id')
            ->leftJoin('deliveries as d', 'p.delivery_out_id', '=', 'd.id')
            ->select('p.*','t.name as tailor','d.date_start as delivery_out', 'p.status as status')
            ->first();

        $childQuery = \DB::table('store_inventory as si')
            ->where('si.production_id', $id)
            ->leftJoin('models as mod', 'si.model_id', '=', 'mod.id')
            ->leftJoin('materials as mat', 'si.material_id', '=', 'mat.id')
            ->leftJoin('material_colors as mc', 'si.color', '=', 'mc.id')
            ->leftJoin('sizings as s', 'si.production_id', '=', 's.parent_id')
            ->select('si.*','mod.name as model','mod.kind as kind','mat.name as material','mc.color as color','s.*')
            ->get();

            $type = $prod->order_id;
      }
      // return $parentQuery."<br><br>".
      // return dd($childQuery);
      return view('production.po',['data'=>$parentQuery,'details'=>$childQuery,'type'=>$type]);
  }
  public function productionInventory()
  {
      $query = \DB::table('materials')
        ->join('material_colors', function ($join) {
            $join->on('materials.id', '=', 'material_colors.parent_id');
        })
        ->get();

      // return $query;
      return view('production.inventory')->with('materials',$query);
  }
}
