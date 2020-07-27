@extends('layout.wrapper')
@section('title','Data Produksi')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Produksi</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="productionsTable" class="table table-bordered table-striped dataTable">
                <thead>
                <tr>
                  <th>No. Produksi</th>
                  <th>No. Pemesanan</th>
                  {{-- <th>PJ</th> --}}
                  <th>Jenis Produksi</th>
                  <th>Status</th>
                  <th>Tgl. Masuk</th>
                  <th>Tgl. Selesai</th>
                  <th>Pelaksana</th>
                  <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $d)
                  <tr>
                      <td>{{$d->code}}</td>
                        @if ($d->order_id == 0)
                          <td><span class="badge bg-purple">Pesanan Gudang</span></td>
                        @else
                          <td>{{$d->order_code}}</td>
                        @endif
                      {{-- <td>{{$d->handler_name}}</td> --}}
                      @switch($d->kind)
                        @case('PR')
                        <td><span class="badge badge-primary">Jahit Baru</span></td>
                        @break
                        @case('VR')
                        <td><span class="badge badge-info">Vermak</span></td>
                        @break
                        @case('SM')
                        <td><span class="badge bg-orange">Sample</span></td>
                        @break
                      @endswitch
                      @switch($d->status)
                        @case(0)
                            <td><span class="badge badge-danger text-white">Belum Diproduksi</span></td>
                            @break
                        @case(1)
                            <td><span class="badge badge-info text-white">Telah Diterima (waiting list)</span></td>
                            @break
                        @case(2)
                            <td><span class="badge badge-warning text-white">Dalam Proses</span></td>
                            @break
                        @case(3)
                            <td><span class="badge badge-success text-white">Selesai</span></td>
                            @break
                        @default
                            -
                      @endswitch
                      <td>{{$d->date_in}}</td>
                      <td>{{$d->date_out}}</td>
                      <td>{{$d->tailor}}</td>
                      <td>
                        <a href="#"  class="text-warning">
                          <i class="fa fa-search" data-toggle="tooltip" title="Lihat Detail Pemesanan"></i>
                          | Detail Pemesanan
                        </a>
                        <br>
                        <a href="/production/order/{{$d->id}}"class="text-info">
                          <i class="fa fa-receipt" data-toggle="tooltip" title="Lihat Surat Produksi" ></i>
                          | Surat Produksi
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No. Produksi</th>
                  <th>No. Pemesanan</th>
                  {{-- <th>PJ</th> --}}
                  <th>Jenis Produksi</th>
                  <th>Status</th>
                  <th>Tgl. Masuk</th>
                  <th>Tgl. Selesai</th>
                  <th>Pelaksana</th>
                  <th>Tindakan</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection
