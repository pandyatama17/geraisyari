@extends('layout.wrapper')
@section('title','Produksi '.$data->code)
@section('content')
  <style media="print">
  @media print {
    body {-webkit-print-color-adjust: exact;}
    }
  tr:first-child th {
    background-color: black!important;
    color: #fff!important;
  }
  </style>
  <section class="content">
    <div id="sectionLoader" class="pageLoader">
      <i class="fa fa-spinner fa-spin text-white"> </i>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
        @if($data->status == "0")
          <div class="callout callout-danger">
            <h5><i class="fa fa-exclamation-triangle"></i> Note:</h5>
            produksi belum diterima. silahkan terima produksi terlebih dahulu.
          </div>
        @elseif($data->status == "1")
          <div class="callout callout-warning">
            <h5><i class="fa fa-exclamation"></i> Note:</h5>
            produksi belum dimulai. silahkan mulai produksi terlebih dahulu untuk dapat mencetak surat produksi.
          </div>
        @elseif($data->status == "2")
          <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note:</h5>
            silahkan klik tombol print dibawah detail produksi untuk mencetak surat produksi ini.
          </div>
        @endif
        </div>
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-primary">
            <div class="card-header">
              Produksi no. {{$data->code}}
            </div>
            <div class="card-body">
              <!-- this row will not appear when printing -->
              <div class="row">
                <table>
                  <tr>
                    <td>Nomor Pemesanan</td><td>:</td>
                    @if ($type != 0)
                        <td>{{$data->order_code}}</td>
                    @else
                        <td>-</td>
                    @endif
                  </tr>
                  <tr>
                    <td>Pembuat Surat</td><td>:</td>
                    <td>{{$data->production_pic}}</td>
                  </tr>
                  <tr>
                    <td>PJ Produksi</td><td>:</td>
                    {{-- @if ($type != 0) --}}
                      @if ($data->production_handler != null)
                        <td>{{$data->production_handler}}</td>
                      @else
                        <td>-</td>
                      @endif
                    {{-- @endif --}}
                  </tr>
                  <tr>
                    <td>Penjahit</td><td>:</td>
                    @if($data->tailor == null)
                      <td>-</td>
                    @else
                      <td>{{$data->tailor}}</td>
                    @endif
                  </tr>
                  <tr>
                    <td>Jenis Produksi</td><td>:</td>
                    <td>
                      @switch($data->kind)
                        @case('new')
                            Produksi Baru
                            @break
                        @case('resew')
                            Vermak
                            @break
                      @endswitch
                    </td>
                  </tr>
                  <tr>
                    <td>Status Produksi</td><td>:</td>
                    <td>
                      @switch($data->status)
                        @case(0)
                            <span id="prodStatus" class="badge badge-danger text-white">Belum Diproduksi</span>
                            @break
                        @case(1)
                            <span  id="prodStatus"class="badge badge-info text-white">Telah Diterima (waiting list)</span>
                            @break
                        @case(2)
                            <span id="prodStatus" class="badge badge-warning text-white">Dalam Proses</span>
                            @break
                        @case(3)
                            <span  id="prodStatus"class="badge badge-success text-white">Selesai</span>
                            @break
                        @default
                            -
                      @endswitch
                    </td>
                  </tr>
                </table>
              </div>
              <hr>
              <div class="row">
                <div class="col-12" id="infoFooter">
                  @if ($data->status == "1")
                    <button type="button" id="startProduction" class="btn btn-primary" data-code="{{$data->code}}" data-target="{{route('start_production',$data->id)}}">
                      <i class="fa fa-cog fa-spin"></i> Mulai Produksi
                    </button>
                  @elseif($data->status == "2")
                    <button type="button" id="finishProduction" class="btn btn-primary" data-code="{{$data->code}}" data-target="{{route('inventory_out',$data->id)}}">
                      <i class="fa fa-flag-checkered"></i> Selesaikan Produksi
                    </button>
                  @endif
                  @if ($data->status > "1")
                    <button type="button" class="btn btn-success importStyle" id="printPO"><i class="fas fa-print"></i> Cetak Surat</button>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <!-- Main content -->
          <div class="invoice p-3 mb-3" id="productionOrder">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h2 class="text-center">
                  @switch($data->kind)
                    @case('new')
                      Surat Produksi
                      @break
                    @case('resew')
                      Surat Vermak
                      @break
                  @endswitch
                  <small class="float-right" style="font-size:10pt">No. : {{$data->code}}</small>
                </h2>
                <hr>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-6 invoice-col">
                <table>
                  @if($type != 0)
                    <tr>
                          @if ($data->reseller == 1)
                            <td>Agen</td>
                            <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                            <td>
                              <span style="font-size:10pt">
                                {{$data->reseller_name}}
                              </span>
                            </td>
                          @else
                            <td>Nama Konsumen</td>
                            <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                            <td>
                              {{$data->client_name}}
                            </td>
                          @endif
                    </tr>
                    <tr>
                      <td>Tgl. Pemesanan</td>
                      <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                      <td>
                        @if($type == 0)
                          <i class="text-gray">-</i>
                        @else
                          {{$data->order_date}}
                        @endif
                      </td>
                    </tr>
                  @endif
                      <tr>
                        <td>Tgl. Masuk Produksi</td>
                        <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                        <td>{{$data->date_in}}</td>
                      </tr>
                        <tr>
                          <td>Tgl. Selesai Produksi</td>
                          <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                          <td>{{$data->date_out}}</td>
                        </tr>
                </table>
              </div>
              <!-- /.col -->
              <div class="col-sm-6 invoice-col">
                <table>
                  <tr>
                    <td>No. Resi Pengiriman</td>
                    <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                    <td>{{$data->delivery_out}}</td>
                  </tr>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <br>
            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-sm">
                    <table class="table table-sm table-bordered">
                      <thead>
                        @foreach($details as $d)
                        @endforeach
                        <tr>
                          @if ($d->quantity == '1')
                            <th colspan='3' class="text-center text-white" style="background-color:black;">Baju</th>
                          @else
                            <th colspan='5' class="text-center text-white" style="background-color:black;">Baju</th>
                          @endif
                        </tr>
                        <tr>
                          @if ($d->quantity == '1')
                            <th class="text-center" style="width:33%; line-height:7px">Model</th>
                            <th class="text-center" style="width:33%; line-height:7px">Bahan</th>
                            <th class="text-center" style="width:33%; line-height:7px">Warna</th>
                          @else
                            <th class="text-center" style="width:30%; line-height:7px">Model</th>
                            <th class="text-center" style="width:30%; line-height:7px">Bahan</th>
                            <th class="text-center" style="width:30%; line-height:7px">Warna</th>
                            <th class="text-center" style="width:15%; line-height:7px">Ukuran</th>
                            <th class="text-center" style="width:15%; line-height:7px">Banyak</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($details as $d)
                          @if ($d->kind == 'clothes')
                            <tr>
                              @if ($d->quantity == 1)
                                <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->model}}</b></td>
                                <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->material}}</b></td>
                                <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->color}}</b></td>
                              @else
                                <td class="text-center" style="width:30%; font-size:15pt; font-weight:1;"><b>{{$d->model}}</b></td>
                                <td class="text-center" style="width:30%; font-size:15pt; font-weight:1;"><b>{{$d->material}}</b></td>
                                <td class="text-center" style="width:30%; font-size:15pt; font-weight:1;"><b>{{$d->color}}</b></td>
                                <td class="text-center" style="width:15%; font-size:15pt; font-weight:1;"><b>{{$d->size}}</b></td>
                                <td class="text-center" style="width:15%; font-size:15pt; font-weight:1;"><b>{{$d->quantity}}</b></td>
                              @endif
                            </tr>
                          @endif
                        @endforeach
                      </tbody>
                    </table>
                    <table class="table table-sm table-bordered">
                      <thead>
                        @foreach($details as $d)
                        @endforeach
                        <tr>
                          @if ($d->quantity == '1')
                            <th colspan='3' class="text-center text-white" style="background-color:black;">Kerudung</th>
                          @else
                            <th colspan='5' class="text-center text-white" style="background-color:black;">Kerudung</th>
                          @endif
                        </tr>
                        <tr>
                          @if ($d->quantity == '1')
                            <th class="text-center" style="width:33%; line-height:7px">Model</th>
                            <th class="text-center" style="width:33%; line-height:7px">Bahan</th>
                            <th class="text-center" style="width:33%; line-height:7px">Warna</th>
                          @else
                            <th class="text-center" style="width:30%; line-height:7px">Model</th>
                            <th class="text-center" style="width:30%; line-height:7px">Bahan</th>
                            <th class="text-center" style="width:30%; line-height:7px">Warna</th>
                            <th class="text-center" style="width:15%; line-height:7px">Ukuran</th>
                            <th class="text-center" style="width:15%; line-height:7px">Banyak</th>
                          @endif
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($details as $d)
                          @if ($d->kind == 'hijab')
                            <tr>
                              @if ($d->quantity == 1)
                                <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->model}}</b></td>
                                <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->material}}</b></td>
                                <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->color}}</b></td>
                              @else
                                <td class="text-center" style="width:30%; font-size:15pt; font-weight:1;"><b>{{$d->model}}</b></td>
                                <td class="text-center" style="width:30%; font-size:15pt; font-weight:1;"><b>{{$d->material}}</b></td>
                                <td class="text-center" style="width:30%; font-size:15pt; font-weight:1;"><b>{{$d->color}}</b></td>
                                <td class="text-center" style="width:15%; font-size:15pt; font-weight:1;"><b>{{$d->size}}</b></td>
                                <td class="text-center" style="width:15%; font-size:15pt; font-weight:1;"><b>{{$d->quantity}}</b></td>
                              @endif
                            </tr>
                          @endif
                        @endforeach
                      </tbody>
                    </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-6">
                <table class="table table-bordered">
                  <tr>
                    <th class="text-center text-white" style="background-color:black; line-height:7px">Kerudung Pet / Non Pet</th>
                  </tr>
                  <tr>
                    <td class="text-center" style="line-height:7px">
                      @if ($d->pet == 1)PET @else NON PET @endif
                    </td>
                  </tr>
                    {{-- <tr>
                      <th class="text-center text-white" style="background-color:black; line-height:7px">Cadar / Non Cadar</th>
                    </tr>
                    <tr>
                        <td class="text-center" style="line-height:7px">
                        @if ($d->niqab == 1)CADAR @else NON CADAR @endif
                      </td>
                    </tr> --}}
                </table>
              </div>
              @if ($d->quantity == '1')
                <div class="col-4 offset-2">
                  <table class="table table-bordered">
                    <tr>
                      <th class="text-center text-white" style="background-color:black; line-height:7px">Ukuran</th>
                    </tr>
                    <tr>
                      <td class="text-center" style="line-height:7px">
                        {{$d->size}}
                      </td>
                    </tr>
                  </table>
                </div>
              @endif
            </div>
            @if ($d->quantity == 1)
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-5">
                  <table class="table table-bordered">
                    <tr>
                      <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Panjang Baju</td>
                      <td class="text-center" style="line-height:1px; width:30%">{{$d->dress_length}} @if($d->size == 'custom') cm @endif</td>
                    </tr>
                    <tr>
                      <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Panjang Kerudung</td>
                      <td class="text-center" style="line-height:1px; width:30%">{{$d->hijab_length}} @if($d->size == 'custom') cm @endif</td>
                    </tr>
                    <tr>
                      <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Muka</td>
                      <td class="text-center" style="line-height:1px; width:30%">{{$d->face_width}} @if($d->size == 'custom') cm @endif</td>
                    </tr>
                    <tr>
                      <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Leher</td>
                      <td class="text-center" style="line-height:1px; width:30%">{{$d->neck_width}} @if($d->size == 'custom') cm @endif</td>
                    </tr>
                    <tr>
                      <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Badan</td>
                      <td class="text-center" style="line-height:1px; width:30%">{{$d->waist_width}} @if($d->size == 'custom') cm @endif</td>
                    </tr>
                    <tr>
                      <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Dada</td>
                      <td class="text-center" style="line-height:1px; width:30%">{{$d->breast_width}} @if($d->size == 'custom') cm @endif</td>
                    </tr>
                    <tr>
                      <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Panggul</td>
                      <td class="text-center" style="line-height:1px; width:30%">{{$d->hip_width}} @if($d->size == 'custom') cm @endif</td>
                    </tr>
                    <tr>
                      <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Pinggang</td>
                      <td class="text-center" style="line-height:1px; width:30%;">{{$d->brisket_width}} @if($d->size == 'custom') cm @endif</td>
                    </tr>
                  </table>
                </div>
                <div class="col-5">
                  <table class="table table-bordered tabel-bawah">
                    <tr>
                      <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lebar Punggung</td>
                      <td class="text-center" style="line-height:1px; width:30%">{{$d->brisket_length}} @if($d->size == 'custom') cm @endif</td>
                    </tr>
                    <tr>
                      <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Panjang Punggung</td>
                      <td class="text-center" style="line-height:1px; width:30%">{{$d->shoulder_width}} @if($d->size == 'custom') cm @endif</td>
                    </tr>
                    <tr>
                      <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lebar Pundak</td>
                      <td class="text-center" style="line-height:1px; width:30%">{{$d->shoulder_width}} @if($d->size == 'custom') cm @endif</td>
                    </tr>
                    <tr>
                      <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Ketiak</td>
                      <td class="text-center" style="line-height:1px; width:30%">{{$d->armpit_width}} @if($d->size == 'custom') cm @endif</td>
                    </tr>
                    <tr>
                      <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Panjang Lengan</td>
                      <td class="text-center" style="line-height:1px; width:30%">{{$d->arm_length}} @if($d->size == 'custom') cm @endif</td>
                    </tr>
                    <tr>
                      <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Lengan</td>
                      <td class="text-center" style="line-height:1px; width:30%">{{$d->arm_width}} @if($d->size == 'custom') cm @endif</td>
                    </tr>
                    <tr>
                      <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Siku</td>
                      <td class="text-center" style="line-height:1px; width:30%">{{$d->elbow_width}} @if($d->size == 'custom') cm @endif</td>
                    </tr>
                    <tr>
                      <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Pergelangan</td>
                      <td class="text-center" style="line-height:1px; width:30%">{{$d->wrist_width}} @if($d->size == 'custom') cm @endif</td>
                    </tr>
                  </table>
                </div>
                <!-- /.col -->
              </div>
            @endif
            <!-- /.row -->
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered">
                  <tr>
                    <th class="text-center text-white" style="background-color:black; line-height:7px">Keterangan</th>
                  </tr>
                  <tr style="height:100px">
                    <td class="text-center">
                      {{-- @if ($d->notes != "") --}}
                      {{-- {{$d->notes}} --}}
                      {{-- @endif --}}
                    </td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
    <div class="modal fade" tabindex="-1" role="dialog" id="stockOutModal">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <form class="form" action="{{action('MainController@finishProduction')}}" id="stockOutForm" method="post">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Form Barang Keluar</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" id="stockOutContainer">

            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="submitFinishProduction">Selesai Produksi</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </section>
@endsection
