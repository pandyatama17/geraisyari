<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Material;
use App\MaterialColor;
use App\Production;
use App\Order;
use App\OrderDetail;
use App\StoreInventory;
use App\Models;
use App\Sizing;
use App\AvailableColors;
use App\Tailor;
use App\User;
use App\Reseller;
use App\Pricing;
use App\PricingDetail;

use Auth;

use Session;
use Carbon\Carbon;

class MainController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function showOrders()
  {
    $query = \DB::table('orders as o')
        ->where('o.id', '>', 0)
        ->leftJoin('productions as p', 'p.order_id', '=', 'o.id')
        ->leftJoin('resellers as rs', 'o.reseller_id', '=', 'rs.id')
        ->select('o.*','p.code as production_code','p.id as production_id','rs.name as reseller_name', 'rs.phone as reseller_phone')
        ->get();
    // return $query;
    return view('store.orders')->with('data',$query);
  }
  public function showFinishedOrders()
  {
    $query = \DB::table('orders as o')
        ->where('o.id', '>', 0)
        ->where('o.production_status', '3')
        ->leftJoin('productions as p', 'p.order_id', '=', 'o.id')
        ->leftJoin('resellers as rs', 'o.reseller_id', '=', 'rs.id')
        ->select('o.*','p.code as production_code','p.id as production_id','rs.name as reseller_name', 'rs.phone as reseller_phone')
        ->get();
    // return $query;
    return view('store.orders')->with('data',$query);
  }
  public function showStoreInventory()
  {
    $query = \DB::table('store_inventory as si')
        ->leftJoin('productions as p', 'si.production_id', '=', 'p.id')
        ->where('p.status',"=", '3')
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
  public function orderClient($order_id)
  {
      $query = Order::find($order_id);
      if ($query->reseller == 1) {
        // code...
        $query = \DB::table('orders as o')
        // ->leftJoin('resellers as rs', 'reseller_id', '=', 'rs.id')
        ->join('resellers as rs', function ($join) {
          $join->on('rs.id', '=', 'o.reseller_id');
        })
        ->select('o.*','rs.name as reseller_name', 'rs.phone as reseller_phone')
        ->first();
      }

      // return $query;
      return view('store.client',['data'=>$query]);
  }
  public function showProductions()
  {
        $query = \DB::table('productions as p')
            ->where('p.status','>', '0')
            ->leftJoin('orders as o', 'p.order_id', '=', 'o.id')
            ->leftJoin('resellers as r', 'o.reseller_id', '=', 'r.id')
            ->leftJoin('tailors as t', 'p.tailor', '=', 't.id')
            ->leftJoin('deliveries as d', 'p.delivery_out_id', '=', 'd.id')
            ->leftJoin('users as upic','p.pic','=','upic.id')
            ->leftJoin('users as uhan','p.handler','=','uhan.id')
            ->select('o.code as order_code','p.order_id as order_id','p.*','r.name as reseller_name','t.name as tailor','d.date_start as delivery_out','uhan.name as handler_name','upic.name as pic_name')
            ->get();
      return view('production.list')->with('data',$query);
  }
  public function showProductionOrder($id)
  {
      $prod = Production::find($id);
      if($prod->order_id !=0)
      {
        $parentQuery = \DB::table('productions as p')
            ->where('p.id', $id)
            ->leftJoin('tailors as t', 'p.tailor', '=', 't.id')
            ->leftJoin('orders as o', 'p.order_id', '=', 'o.id')
            ->leftJoin('deliveries as d', 'p.delivery_out_id', '=', 'd.id')
            ->leftJoin('users as upic','p.pic','=','upic.id')
            ->leftJoin('users as uhan','p.handler','=','uhan.id')
            ->leftJoin('resellers as rs','o.reseller_id','=','rs.id')
            ->select('o.*','p.*','t.name as tailor','rs.name as reseller_name','d.date_start as delivery_out', 'p.status as status','o.pic as order_pic','uhan.name as production_handler','upic.name as production_pic','o.code as order_code','p.code as code')
            ->first();
            $order = Order::find($prod->order_id);
            $childQuery = \DB::table('order_details as od')
                ->where('od.parent_id', $order->id)
                ->leftJoin('models as mod', 'od.model_id', '=', 'mod.id')
                ->leftJoin('materials as mat', 'od.material_id', '=', 'mat.id')
                ->leftJoin('material_colors as mc', 'od.color', '=', 'mc.id')
                ->leftJoin('productions as p', 'od.parent_id', '=', 'p.order_id')
                ->leftJoin('sizings as s', 'od.id','=','s.parent_id')
                ->select('od.*','mod.name as model','mod.kind as kind','mat.name as material','mc.color as color','s.*','od.id as id','od.parent_id as parent_id')
                ->get();

            $type = 1;
      }
      else
      {
        $parentQuery = \DB::table('productions as p')
            ->where('p.id', $id)
            ->leftJoin('tailors as t', 'p.tailor', '=', 't.id')
            ->leftJoin('deliveries as d', 'p.delivery_out_id', '=', 'd.id')
            ->leftJoin('users as upic','p.pic','=','upic.id')
            ->leftJoin('users as uhan','p.handler','=','uhan.id')
            ->select('p.*','t.name as tailor','d.date_start as delivery_out', 'p.status as status','uhan.name as production_handler','upic.name as production_pic')
            ->first();

        $childQuery = \DB::table('store_inventory as si')
            ->where('si.production_id', $id)
            ->leftJoin('models as mod', 'si.model_id', '=', 'mod.id')
            ->leftJoin('materials as mat', 'si.material_id', '=', 'mat.id')
            ->leftJoin('material_colors as mc', 'si.color', '=', 'mc.id')
            ->leftJoin('sizings as s', 'si.id', '=', 's.parent_id')
            ->select('s.*','si.*','si.production_id as parent_id','mod.name as model','mod.kind as kind','mat.name as material','mc.color as color')
            ->get();

            $type = $prod->order_id;
      }
      // return dd($parentQuery);
      // return dd($childQuery);
      return view('production.details',['data'=>$parentQuery,'details'=>$childQuery,'type'=>$type]);
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
  public function newProduction()
  {
    $form_method = "Tambah";
    $orders = Order::where('id', '>', 0)->where('production_status', '0')->get();
    $models = Models::all();
    $materials = Material::all();
    $colors = AvailableColors::all();
    // $materials = \DB::table('materials as m')
      // ->leftJoin('material_colors as mc','m.id','=','mc.parent_id')
      // ->get();
      // return dd($materials);
    return view('production.form')
    ->with('orders', $orders)
    ->with('models', $models)
    ->with('colors', $colors)
    ->with('materials', $materials)
    ->with('form_method',$form_method);
    // code...
  }
  public function itemForm($row)
  {
    $orders = Order::where('id', '>', 0)->get();
    $models = Models::all();
    $materials = Material::all();
    $colors = AvailableColors::all();
    Session::flash('method','production');

    return view('layout.itemform')
    ->with('orders', $orders)
    ->with('models', $models)
    ->with('colors', $colors)
    ->with('materials', $materials)
    ->with('row', $row);
  }
  public function storeItemForm($row)
  {
    $orders = Order::where('id', '>', 0)->get();
    $models = Models::all();
    $materials = Material::all();
    $colors = AvailableColors::all();
    Session::flash('method','order');
    return view('layout.itemform')
    ->with('orders', $orders)
    ->with('models', $models)
    ->with('colors', $colors)
    ->with('materials', $materials)
    ->with('row', $row);
  }
  public function loadOrderNotes($id)
  {
    $data = Order::find($id);
    $arr = array('notes' => $data->notes,'kind'=>$data->kind);
    echo json_encode($arr);
  }
  public function loadOrder($id)
  {
    $data = Order::find($id);
    $orders = \DB::table('order_details as od')
        ->where('od.parent_id','=',$data->id)
        ->leftJoin('models as mod', 'mod.id','=','od.model_id')
        ->leftJoin('models as m', 'm.id','=','od.model_id')
        ->leftJoin('materials as mat', 'od.material_id', '=', 'mat.id')
        ->leftJoin('material_colors as mc', 'od.color', '=', 'mc.id')
        // ->leftJoin('sizings as s', 'p.id','=','s.parent_id')
        ->select('od.*','mod.name as model','mat.name as material','mc.color as color')
        ->get();

    return view('production.loadorder')->with('orders',$orders);

  }
  public function saveProduction(Request $r)
  {
    // dd($r->all());
    $action = $r->prod_type;
    // $latest = Production::orderBy('id', 'DESC')->first();
    // switch ($r->prod_kind)
    // {
    //   case 'PR':
    //     $kind = 'PR';
    //     break;
    //   case 'VR':
    //     $kind = 'VR';
    //     break;
    // }
    $kind = $r->prod_kind;
    $count = Order::where('kind', $kind)->count() + 1;
    // $generated = $kind.sprintf("%04d", ($latest->id+1));
    $generated = $kind.sprintf("%04d", ($count + 1));
    switch ($action)
    {
      case 1:
        $o = Order::find($r->order);

        $p = New Production;
        $p->code = $generated;
        $p->order_id = $o->id;
        $p->kind = $kind;
        $p->status = '0';
        $p->pic = $o->pic;
        $p->notes = $r->notes;
        $o->production_status = '1';

        try
        {
          $p->save();
          $o->save();
          $arr = ["error"=>false, "message"=>"produksi ".$generated." Berhasil Dibuat!", "redirect"=>route("show_po",$p->id)];
        }
        catch (\Exception $e)
        {
          $arr = ["error"=>true, "message"=>$e->getMessage()];
        }
        echo json_encode($arr);
        // return $o;
        break;

      case 2:
        $p = New Production;
        $p->code = $generated;
        $p->order_id = 0;
        $p->kind = $kind;
        $p->status = '0';
        $p->pic = 1;
        $p->notes = $r->notes;

        $messages = array();
        $errMessage = array();
        try
        {
          $p->save();
          $messages['prod']='saved';
        }
        catch (\Exception $e)
        {
          $messages['prod']="failed".$e->getMessage();
        }

        for ($i=0; $i < $r->rows; $i++)
        {
            $currentRow = $i+1;
            $model = Models::find($r->input('model_'.$currentRow));
            $si = new StoreInventory;
            $si->production_id = $p->id;
            $si->model_id = $model->id;
            $si->material_id = $r->input("material_".$currentRow);
            $si->color = $r->input("color_".$currentRow);
            $si->quantity = $r->input("qty_".$currentRow);
            $si->size = $r->size;
            if ($r->pet == "on") {
              $si->pet = 1;
            }
            if ($r->custom_sizing == 1)
            {
              $si->has_custom_sizing = $r->custom_sizing;
            }
            else {
              $si->has_custom_sizing = 0;
            }
            $si->notes = $r->notes;
            try
            {
              $si->save();
              if ($r->custom_sizing == 1)
              {
                  $cs = new Sizing;
                  $cs->parent_id = $si->id;
                  $cs->dress_length = $r->dress_length;
                  $cs->hijab_length = $r->hijab_length;
                  $cs->face_width = $r->face_width;
                  $cs->neck_width = $r->neck_width;
                  $cs->waist_width = $r->waist_width;
                  $cs->breast_width = $r->breast_width;
                  $cs->hip_width = $r->hip_width;
                  $cs->brisket_width = $r->brisket_width;
                  $cs->brisket_length = $r->brisket_length;
                  $cs->shoulder_width = $r->shoulder_width;
                  $cs->armpit_width = $r->armpit_width;
                  $cs->arm_length = $r->arm_length;
                  $cs->arm_width = $r->arm_width;
                  $cs->elbow_width = $r->elbow_width;
                  $cs->wrist_width = $r->wrist_width;

                  try
                  {
                    $cs->save();
                    $messages['custom sizing']= "saved";
                  }
                  catch (\Exception $e)
                  {
                    $errMessage['sizing_error'] = $e;
                    $messages['custom sizing']= "failed";
                  }
              }
              $messages['item-'.$currentRow]="saved";
            }
            catch (\Exception $e)
            {
              StoreInventory::where('production_id',$p->id)->delete();
              $errMessage['item-'.$currentRow] = $e;
              $messages['item-'.$currentRow]="failed ".$e->getMessage();
            }
        }
        if ($messages['prod'] == 'saved')
        {
          $arr = ["error"=>false, "message"=>"produksi ".$generated." Berhasil Dibuat!", "redirect"=>route("show_po",$p->id)];
        }
        else
        {
          StoreInventory::where('production_id',$p->id)->delete();
          $p->delete();
          $arr = ["error"=>true, "message"=>json_encode($errMessage), "redirect"=>route("new_production")];
        }
        echo json_encode($arr);
        break;
    }
  }
  public function receiveProductionForm()
  {
    $p = Production::where('status','0')->get();
    $t = Tailor::all();
    return view('production.receive')
      ->with('productions', $p)
      ->with('tailors', $t);
  }
  public function getPO($id)
  {
    $prod = Production::find($id);
    if($prod->order_id !=0)
    {
      $parentQuery = \DB::table('productions as p')
          ->where('p.id', $id)
          ->leftJoin('tailors as t', 'p.tailor', '=', 't.id')
          ->leftJoin('orders as o', 'p.order_id', '=', 'o.id')
          ->leftJoin('deliveries as d', 'p.delivery_out_id', '=', 'd.id')
          ->leftJoin('users as upic','p.pic','=','upic.id')
          ->leftJoin('users as uhan','p.handler','=','uhan.id')
          ->leftJoin('resellers as rs','o.reseller_id','=','rs.id')
          ->select('o.*','p.*','t.name as tailor','rs.name as reseller_name','d.date_start as delivery_out', 'p.status as status','o.pic as order_pic','uhan.name as production_handler','upic.name as production_pic','o.code as order_code','p.code as code')
          ->first();
          $order = Order::find($prod->order_id);
          $childQuery = \DB::table('order_details as od')
              ->where('od.parent_id', $order->id)
              ->leftJoin('models as mod', 'od.model_id', '=', 'mod.id')
              ->leftJoin('materials as mat', 'od.material_id', '=', 'mat.id')
              ->leftJoin('material_colors as mc', 'od.color', '=', 'mc.id')
              ->leftJoin('productions as p', 'od.parent_id', '=', 'p.order_id')
              ->leftJoin('sizings as s', 'od.id','=','s.parent_id')
              ->select('od.*','mod.name as model','mod.kind as kind','mat.name as material','mc.color as color','s.*','od.id as id','od.parent_id as parent_id')
              ->get();

          $type = 1;
    }
    else
    {
      $parentQuery = \DB::table('productions as p')
          ->where('p.id', $id)
          ->leftJoin('tailors as t', 'p.tailor', '=', 't.id')
          ->leftJoin('deliveries as d', 'p.delivery_out_id', '=', 'd.id')
          ->leftJoin('users as upic','p.pic','=','upic.id')
          ->leftJoin('users as uhan','p.handler','=','uhan.id')
          ->select('p.*','t.name as tailor','d.date_start as delivery_out', 'p.status as status','uhan.name as production_handler','upic.name as production_pic')
          ->first();

      $childQuery = \DB::table('store_inventory as si')
          ->where('si.production_id', $id)
          ->leftJoin('models as mod', 'si.model_id', '=', 'mod.id')
          ->leftJoin('materials as mat', 'si.material_id', '=', 'mat.id')
          ->leftJoin('material_colors as mc', 'si.color', '=', 'mc.id')
          ->leftJoin('sizings as s', 'si.id', '=', 's.parent_id')
          ->select('si.*','mod.name as model','mod.kind as kind','mat.name as material','mc.color as color','s.*')
          ->get();

          $type = $prod->order_id;
    }
    return view('production.po',['data'=>$parentQuery,'details'=>$childQuery,'type'=>$type]);
  }
  public function loadPODetails($id)
  {
    $data = Production::find($id);
    $pic_name = User::where('id',$data->pic)->select('name')->get(1)[0]->name;
    switch ($data->kind) {
      case 'new':
        $kind_name = "Jahit Baru";
        break;

      case 'resew':
        $kind_name = "Vermak";
        break;
    }
    $arr = array('pic' => $data->pic,'pic_name'=>$pic_name,'kind'=>$data->kind,'kind_name'=>$kind_name);
    echo json_encode($arr);
  }
  public function acceptProduction(Request $r)
  {
      $p = Production::find($r->id);
      $date = Carbon::now();
      $p->handler = $r->handler;
      // $p->tailor = $r->tailor;
      $p->status = '1';
      $p->date_in = $date->format('Y-m-d');

      try {
          $p->save();
          $arr = ["error"=>false, "message"=>"success", "redirect"=>route("show_po",$r->id)];
      }
      catch (\Exception $e) {
        $arr = ["error"=>true, "message"=>$e.getMessage(), "redirect"=>route("show_po",$r->id)];
      }
      echo json_encode($arr);

  }
  public function startProduction($id)
  {
    $p = Production::find($id);
    $p->status = '2';

    try {
        $p->save();
        $arr = ["error"=>false, "message"=>"success", "redirect"=>route("show_po",$id)];
    }
    catch (\Exception $e) {
      $arr = ["error"=>true, "message"=>$e.getMessage(), "redirect"=>route("show_po",$id)];
    }
    echo json_encode($arr);
  }
  public function inventoryOut($id)
  {
     $p = Production::find($id);
     $colors = array();

     if($p->order_id == 0)
     {
        $items = StoreInventory::where('production_id',$p->id)->get();
        foreach ($items as $si)
        {
          $colors[] = \DB::table('materials as m')
                       ->leftJoin('material_colors as mc', 'm.id','=','mc.parent_id')
                       ->where('mc.id',$si->color)
                       ->select('mc.*','m.name as material')
                       ->get();
        }
     }
     else {
       $items = OrderDetail::where('parent_id',$p->order_id)->get();
       foreach ($items as $od)
       {
         // $colors[] = MaterialColor::find($od->color);
         $colors[] = \DB::table('materials as m')
                      ->leftJoin('material_colors as mc', 'm.id','=','mc.parent_id')
                      ->where('mc.id',$od->color)
                      ->select('mc.*','m.name as material')
                      ->get();
       }
     }
     return view('layout.stockoutform')
          ->with('data', $p)
          ->with('items', $items)
          ->with('colors', $colors);
  }
  public function finishProduction(Request $r)
  {
      $p = Production::find($r->id);
      $p->status = "3";
      $p->date_out = Carbon::now();

      try {
          $p->save();
          $err = false;
      }
      catch (\Exception $e) {
        $p->status = "3";
        $p->date_out = Carbon::now();
        $p->save();
        $err = $e->getMessage();
      }
      for ($i=1; $i < $r->rows; $i++)
      {
          $item = MaterialColor::find($r->input('item_'.$i));
          $oldstock = $item->stock;

          $item->stock = ($oldstock - $r->input('stock_'.$i));
          try {
            $item->save();
            $err = false;
          }
          catch (\Exception $e) {
            $item->stock = $oldstock;
            $item->save();
            $err = $e->getMessage();
          }
      }
      if($err == false)
      {
        $arr = ["error"=>false, "message"=>"success", "redirect"=>route("show_po",$r->id)];
      }
      else {
        $arr = ["error"=>true, "message"=>$err, "redirect"=>route("show_po",$r->id)];
      }
      echo json_encode($arr);
      // return $r;
  }
  public function createOrder()
  {
    $rs = Reseller::all();
    Session::flash('method','order');
    return view('store.form')
    ->with('resellers', $rs);
  }
  public function orderFromStock()
  {
    $query = \DB::table('store_inventory as si')
        ->leftJoin('productions as p', 'si.production_id', '=', 'p.id')
        ->where('p.status',"=", '3')
        ->leftJoin('models as mod', 'si.model_id', '=', 'mod.id')
        ->leftJoin('materials as mat', 'si.material_id', '=', 'mat.id')
        ->leftJoin('material_colors as mc', 'si.color', '=', 'mc.id')
        ->select('si.*','mod.name as model','mat.name as material','mc.color as color','p.code as production_code')
        ->get();

    return view('layout.loadstoreinventory')
    ->with('store_inventory', $query);
  }

  public function storeOrder(Request $r)
  {
    // dd($r->all());
    $latest = Order::orderBy('id', 'DESC')->first();

    $o = new Order;
    $oldstock = 0;
    switch ($r->order_kind) {
      case '0':
        // from store (OR)
        $kind = "OR";
        break;
      case '1':
        // new order (PO)
        $kind = "PO";
        break;
      case '2':
        // Vermack (OV)
        $kind = "OV";
        break;
    }
    $count = Order::where('kind', $kind)->count() + 1;

    $o->code = $kind.sprintf("%04d", ($count));
    $o->pic = Auth::user()->id;
    $o->notes = $r->notes;
    $o->kind = $kind;
    $o->order_date = Carbon::now();
    $p = new Pricing;
    $p->base_price = $r->base_price;
    if($r->down_payment!="")
    {
      $p->payment_status = '1';
      $p->down_payment = $r->down_payment;
      $p->paid = $r->down_payment;
    }
    else {
      $p->payment_status = '0';
    }

    switch ($r->order_type) {
      case '0':
        $o->client_name = $r->client_name;
        $o->client_phone = $r->client_phone;
        break;
      case '1':
        $o->reseller = 1;
        $o->reseller_id = $r->reseller_id;
        break;
    }
    if ($r->order_kind == 0)
    {
      $o->production_status = '3';
      // dd($r->all());
      for ($i=1; $i < $r->rows+1; $i++)
      {
        $si = StoreInventory::find($r->input('item_'.$i));
        $oldstock = $si->quantity;
        $newstock = ($oldstock - $r->input('qty_'.$i));
      }
      try {
        $o->save();
        $p->order_id = $o->id;
        $p->save();
        if ($newstock == 0)
        {
          $si->delete();
        }
        else
        {
          $si->quantity = $newstock;
          $si->save();
        }
        $messages['order']="saved";
      }
      catch (\Exception $e) {
        return 'error '.$e->getMessage();
      }
      // return"belom jadi";
    }
    else
    {
      $o->production_status = '0';
      if ($r->custom_sizing == 1)
      {
        $o->has_custom_sizing = $r->custom_sizing;
      }
      else {
        $o->has_custom_sizing = 0;
      }
      try
      {
          $o->save();
          $p->order_id = $o->id;
          $p->save();
          if ($r->custom_sizing == 1)
          {
              $cs = new Sizing;
              $cs->parent_type = 'O';
              $cs->parent_id = $o->id;
              $cs->dress_length = $r->dress_length;
              $cs->hijab_length = $r->hijab_length;
              $cs->face_width = $r->face_width;
              $cs->neck_width = $r->neck_width;
              $cs->waist_width = $r->waist_width;
              $cs->breast_width = $r->breast_width;
              $cs->hip_width = $r->hip_width;
              $cs->brisket_width = $r->brisket_width;
              $cs->brisket_length = $r->brisket_length;
              $cs->shoulder_width = $r->shoulder_width;
              $cs->armpit_width = $r->armpit_width;
              $cs->arm_length = $r->arm_length;
              $cs->arm_width = $r->arm_width;
              $cs->elbow_width = $r->elbow_width;
              $cs->wrist_width = $r->wrist_width;
              try
              {
                $cs->save();
                $messages['custom sizing']= "saved";
              }
              catch (\Exception $e)
              {
                $o->delete();
                $errMessage['sizing_error'] = $e;
                $messages['custom sizing']= "failed";
              }
          }
          $messages['order']="saved";
      }
      catch (\Exception $e) {
          return 'error '.$e->getMessage();
      }
    }
    for ($i=1; $i < $r->rows+1; $i++)
    {
      // $model = Models::find($r->input('model_'.$i));
      $od = new OrderDetail;
      $pd = new PricingDetail;

      $od->parent_id = $o->id;
      $od->model_id = $r->input("model_".$i);
      $od->material_id = $r->input("material_".$i);
      $od->color = $r->input("color_".$i);
      $od->size = $r->input("size_".$i);
      if ($r->input('pet_'.$i) == "on") {
        $od->pet = 1;
      }

      $pd->parent_id = $p->id;
      $pd->base_price = $r->input("subtotal_".$i);
      try
      {
        $od->save();
        $pd->order_details_id = $od->id;
        $pd->save();
      }
      catch(\Exception $e)
      {
        OrderDetail::where('parent_id',$o->id)->delete();
        PricingDetail::where('parent_id',$p->id)->delete();
        $errMessage['item-'] = $e;
        $messages['item-']="failed ".$e->getMessage();
      }
    }
    if ($messages['order'] == 'saved')
    {
      $arr = ["error"=>false, "message"=>"pemesanan ".$o->code." Berhasil Dibuat!", "redirect"=>route("show_po",$o->id)];
    }
    else
    {
      OrderDetail::where('parent_id',$o->id)->delete();
      PricingDetail::where('parent_id',$p->id)->delete();
      $o->delete();
      $p->delete();
      $arr = ["error"=>true, "message"=>json_encode($errMessage), "redirect"=>route("new_order")];
    }
    echo json_encode($arr);
  }
}
