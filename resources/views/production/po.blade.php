@extends('layout.wrapper')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="callout callout-info">
            <h5><i class="fas fa-info"></i> Note:</h5>
            This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
          </div>
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
                    <td>Nomor Pemesanan</td><td>:</td><td>-</td>
                  </tr>
                  <tr>
                    <td>Pembuat Surat</td><td>:</td><td>-</td>
                  </tr>
                  <tr>
                    <td>PJ Produksi</td><td>:</td><td>-</td>
                  </tr>
                  <tr>
                    <td>Pelaku Produksi</td><td>:</td>
                    <td>{{$data->tailor}}</td>
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
                            <span class="badge badge-danger text-white">Belum Diproduksi</span>
                            @break
                        @case(1)
                            <span class="badge badge-info text-white">Telah Diterima (waiting list)</span>
                            @break
                        @case(2)
                            <span class="badge badge-warning text-white">Dalam Proses</span>
                            @break
                        @case(3)
                            <span class="badge badge-success text-white">Selesai</span>
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
                <div class="col-12">
                  <button type="button" class="btn btn-success" id="printPO"><i class="fas fa-print"></i> Cetak Surat</button>
                  {{-- <a href="invoice-print.html" target="_blank" class="btn btn-success"><i class="fas fa-print"></i> Cetak Surat</a> --}}
                  <a href="#" class="btn btn-warning"><i class="fas fa-download"></i> Generate PDF</a>
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
                  Surat Produksi
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
                    <tr>
                      <td>Nama Konsumen</td>
                      <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                      <td>
                        @if($type == 0)
                          <i class="text-gray">-</i>
                        @else
                          {{$data->client_name}}
                        @endif
                      </td>
                    </tr>
                    <tr>
                      <td>Tanggal Pesan</td>
                      <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                      <td>
                        @if($type == 0)
                          <i class="text-gray">-</i>
                        @else

                        @endif
                      </td>
                    </tr>
                      <tr>
                        <td>Tanggal Masuk Produksi</td>
                        <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                        <td>{{$data->date_in}}</td>
                      </tr>
                        <tr>
                          <td>Tanggal Selesai Produksi</td>
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
                @foreach($details as $d)
                  @if ($d->kind == "clothes")
                    <table class="table table-sm table-bordered">
                      <thead>
                        <tr>
                          <th colspan='3' class="text-center text-white" style="background-color:black;">Baju</th>
                        </tr>
                        <tr>
                          <th class="text-center" style="width:33%; line-height:7px">Model</th>
                          <th class="text-center" style="width:33%; line-height:7px">Bahan</th>
                          <th class="text-center" style="width:33%; line-height:7px">Warna</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->model}}</b></td>
                          <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->material}}</b></td>
                          <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->color}}</b></td>
                        </tr>
                      </table>
                  @elseif ($d->kind == "hijab")
                    <table class="table table-sm table-bordered">
                      <thead>
                        <tr>
                          <th colspan='3' class="text-center text-white" style="background-color:black;">Kerudung</th>
                        </tr>
                        <tr>
                          <th class="text-center" style="width:33%; line-height:7px">Model</th>
                          <th class="text-center" style="width:33%; line-height:7px">Bahan</th>
                          <th class="text-center" style="width:33%; line-height:7px">Warna</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->model}}</b></td>
                          <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->material}}</b></td>
                          <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->color}}</b></td>
                        </tr>
                      </table>
                  @endif
                @endforeach
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
                    <tr>
                      <th class="text-center text-white" style="background-color:black; line-height:7px">Cadar / Non Cadar</th>
                    </tr>
                    <tr>
                        <td class="text-center" style="line-height:7px">
                        @if ($d->niqab == 1)CADAR @else NON CADAR @endif
                      </td>
                    </tr>
                </table>
              </div>
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
            </div>
            <div class="row">
              <!-- accepted payments column -->
              <div class="col-lg-5 col-md-6 col-sm-6">
                <table class="table table-bordered">
                  <tr>
                    <td class="text-center" style="line-height:1px; width:70%">Panjang Baju</td>
                    <td class="text-center" style="line-height:1px; width:30%">{{$d->dress_length}} @if($d->size == 'custom') cm @endif</td>
                  </tr>
                  <tr>
                    <td class="text-center" style="line-height:1px; width:70%">Panjang Kerudung</td>
                    <td class="text-center" style="line-height:1px; width:30%">{{$d->hijab_length}} @if($d->size == 'custom') cm @endif</td>
                  </tr>
                  <tr>
                    <td class="text-center" style="line-height:1px; width:70%">Lingkar Muka</td>
                    <td class="text-center" style="line-height:1px; width:30%">{{$d->face_width}} @if($d->size == 'custom') cm @endif</td>
                  </tr>
                  <tr>
                    <td class="text-center" style="line-height:1px; width:70%">Lingkar Leher</td>
                    <td class="text-center" style="line-height:1px; width:30%">{{$d->neck_width}} @if($d->size == 'custom') cm @endif</td>
                  </tr>
                  <tr>
                    <td class="text-center" style="line-height:1px; width:70%">Lingkar Badan</td>
                    <td class="text-center" style="line-height:1px; width:30%">{{$d->waist_width}} @if($d->size == 'custom') cm @endif</td>
                  </tr>
                  <tr>
                    <td class="text-center" style="line-height:1px; width:70%">Lingkar Dada</td>
                    <td class="text-center" style="line-height:1px; width:30%">{{$d->breast_width}} @if($d->size == 'custom') cm @endif</td>
                  </tr>
                  <tr>
                    <td class="text-center" style="line-height:1px; width:70%">Lingkar Panggul</td>
                    <td class="text-center" style="line-height:1px; width:30%">{{$d->hip_width}} @if($d->size == 'custom') cm @endif</td>
                  </tr>
                  <tr>
                    <td class="text-center" style="line-height:1px; width:70%">Lingkar Pinggang</td>
                    <td class="text-center" style="line-height:1px; width:30%">{{$d->brisket_width}} @if($d->size == 'custom') cm @endif</td>
                  </tr>
                </table>
              </div>
              <div class="col-lg-5 col-md-6 col-sm-6">
                <table class="table table-bordered tabel-bawah">
                  <tr>
                    <td class="text-center" style="line-height:1px; width:70%">Lebar Punggung</td>
                    <td class="text-center" style="line-height:1px; width:30%">{{$d->brisket_length}} @if($d->size == 'custom') cm @endif</td>
                  </tr>
                  <tr>
                    <td class="text-center" style="line-height:1px; width:70%">Panjang Punggung</td>
                    <td class="text-center" style="line-height:1px; width:30%">{{$d->shoulder_width}} @if($d->size == 'custom') cm @endif</td>
                  </tr>
                  <tr>
                    <td class="text-center" style="line-height:1px; width:70%">Lebar Pundak</td>
                    <td class="text-center" style="line-height:1px; width:30%">{{$d->shoulder_width}} @if($d->size == 'custom') cm @endif</td>
                  </tr>
                  <tr>
                    <td class="text-center" style="line-height:1px; width:70%">Lingkar Ketiak</td>
                    <td class="text-center" style="line-height:1px; width:30%">{{$d->armpit_width}} @if($d->size == 'custom') cm @endif</td>
                  </tr>
                  <tr>
                    <td class="text-center" style="line-height:1px; width:70%">Panjang Lengan</td>
                    <td class="text-center" style="line-height:1px; width:30%">{{$d->arm_length}} @if($d->size == 'custom') cm @endif</td>
                  </tr>
                  <tr>
                    <td class="text-center" style="line-height:1px; width:70%">Lingkar Lengan</td>
                    <td class="text-center" style="line-height:1px; width:30%">{{$d->arm_width}} @if($d->size == 'custom') cm @endif</td>
                  </tr>
                  <tr>
                    <td class="text-center" style="line-height:1px; width:70%">Lingkar Siku</td>
                    <td class="text-center" style="line-height:1px; width:30%">{{$d->elbow_width}} @if($d->size == 'custom') cm @endif</td>
                  </tr>
                  <tr>
                    <td class="text-center" style="line-height:1px; width:70%">Lingkar Pergelangan</td>
                    <td class="text-center" style="line-height:1px; width:30%">{{$d->wrist_width}} @if($d->size == 'custom') cm @endif</td>
                  </tr>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
              <div class="col-12">
                <table class="table table-bordered">
                  <tr>
                    <th class="text-center text-white" style="background-color:black; line-height:7px">Deskripsi</th>
                  </tr>
                  <tr style="height:100px">
                    <td class="text-center">
                      {{$d->description}}
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
  </section>
@endsection
