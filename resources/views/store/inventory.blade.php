@extends('layout.wrapper')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Stok barang</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="stokGudangToko" class="table table-bordered table-striped dataTable">
                <thead>
                <tr>
                  <th>Kode Produksi</th>
                  <th>Item</th>
                  <th>Bahan</th>
                  <th>Warna</th>
                  <th>Ukuran</th>
                  {{-- <th>Banyaknya Barang</th> --}}
                  <th>Catatan</th>
                  <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($store_inventory as $si)

                  <tr>
                      <td>{{$si->production_code}}</td>
                      <td>
                        {{$si->model}}
                        @if($si->niqab == 1)
                          <span class='badge badge-success'>Niqab</span>
                        @endif
                        @if($si->pet == 1)
                          <span class='badge badge-primary'>Pet</span>
                        @endif
                      </td>
                      <td>{{$si->material}}</td>
                      <td>{{$si->color}}</td>
                      <td>
                        @if($si->size == 'custom')
                          Custom
                          <button class="btn btn-link size-details" data-toggle="modal" data-url="{{ route('size_details',['id'=>$si->production_id])}}">
                            <i class="fa fa-eye"></i>
                          </button>
                        @else
                          {{$si->size}}
                        @endif
                      </td>
                      {{-- <td>{{$si->quantity}}</td> --}}
                      <td>
                        @if($si->description != null)
                          {{$si->description}}
                        @else
                          <small><i class="text-gray disabled">Tidak ada catatan</i></small>
                        @endif
                      </td>
                      <td>
                        &nbsp; 
                        <a href="/production/order/{{$si->production_id}}"class="text-info">
                          <i class="fa fa-receipt" data-toggle="tooltip" title="Lihat Surat Produksi" ></i>
                          | Surat Produksi
                        </a>
                        <br>
                        <a href="#"  class="text-red">
                          <i class="fa fa-tshirt" data-toggle="tooltip" title="Lihat Model Barang"></i>
                          | Model
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Kode Produksi</th>
                  <th>Item</th>
                  <th>Bahan</th>
                  <th>Warna</th>
                  <th>Ukuran</th>
                  {{-- <th>Banyaknya Barang</th> --}}
                  <th>Catatan</th>
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
              <h5 id="modal-title" class="modal-title">Ukuruan Barang</h5>
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
