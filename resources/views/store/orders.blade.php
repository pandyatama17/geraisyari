@extends('layout.wrapper')
@section('title','Data Pemesanan')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Pemesanan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="stokBarang" class="table table-bordered table-striped dataTable">
                <thead>
                <tr>
                  <th>No. Pesanan</th>
                  <th>Jenis Jahit</th>
                  {{-- <th>Jenis Pesanan</th> --}}
                  <th>Status</th>
                  <th>Agen / Klien</th>
                  {{-- <th>No. Telp</th>
                  <th>Catatan</th> --}}
                  <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($data as $d)
                    @if ($d->id > 0)
                      <tr>
                        <td>{{$d->code}}</td>
                        @switch($d->kind)
                          @case('new')
                          <td><span class="badge badge-primary">Jahit Baru</span></td>
                          @break
                          @case('resew')
                          <td><span class="badge badge-info">Vermak</span></td>
                          @break
                        @endswitch
                        @switch($d->status)
                          @case(0)
                              <td><span class="badge badge-danger text-white">Belum Diproduksi</span></td>
                              @break
                          @case(1)
                              <td><span class="badge badge-warning text-white">Dalam Produksi</span></td>
                              @break
                          @case(2)
                              <td><span class="badge badge-info text-white">Selesai Produksi</span></td>
                              @break
                          @case(3)
                              <td><span class="badge badge-success text-white">Pesanan  Selesai</span></td>
                              @break
                          @default
                          <td></td>
                        @endswitch
                        <td>
                          @if ($d->reseller == 1)
                              <span class="badge badge-warning">Agen</span>
                            {{-- <td>{{$d->reseller_name}}</td>
                            <td>{{$d->reseller_phone}}</td> --}}
                          @else
                              <span class="badge badge-info">Perseorangan</span>
                            {{-- <td>{{$d->client_name}}</td>
                            <td>{{$d->client_phone}}</td> --}}
                          @endif
                          <button class="btn btn-link size-details" data-toggle="modal" data-url="{{ route('order_client_details',['id'=>$d->id])}}">
                            <i class="fa fa-eye"></i>
                          </button>
                        </td>
                        {{-- <td>{{$d->notes}}</td> --}}
                        <td>
                          <a href="#"  class="text-warning">
                            <i class="fa fa-search" data-toggle="tooltip" title="Lihat Detail Pemesanan"></i>
                            | Detail Pemesanan
                          </a>
                          <br>
                          @if ($d->production_id != null)
                            <a href="/production/order/{{$d->production_id}}"class="text-info">
                              <i class="fa fa-receipt" data-toggle="tooltip" title="Lihat Surat Produksi" ></i>
                              | Surat Produksi
                            </a>
                          @else
                            <a href="/production/new/"class="text-primary">
                              <i class="fa fa-file-medical" data-toggle="tooltip" title="Buat Surat Produksi" ></i>
                              | Buat Surat Produksi
                            </a>
                          @endif
                        </td>
                      </tr>
                    @endif
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>No. Pesanan</th>
                  <th>Jenis Jahit</th>
                  {{-- <th>Jenis Pesanan</th> --}}
                  <th>Status</th>
                  <th>Agen / Klien</th>
                  {{-- <th>Catatan</th>
                  <th>No. Telp</th> --}}
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
  <div id="view-modal" class="modal fade" tabindex="-1" role="dialog">
     <div class="modal-dialog">
       <div class="vertical-alignment-helper">
         <div class="vertical-align-center">
           <div class="modal-content">
             <div class="modal-header">
              <h5 id="modal-title" class="modal-title">Detail Klien</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
             <div class="modal-body">
                 <div id="dynamic-content"></div>
              </div>
          </div>
         </div>
       </div>
     </div>
  </div>
@endsection
