@extends('layout.wrapper')
@section('title','Data Stok Barang')
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
              <table id="stokBarang" class="table table-bordered table-striped dataTable">
                <thead>
                <tr>
                  <th>Bahan</th>
                  <th>Warna</th>
                  <th>Stok</th>
                  <th>Harga Dasar</th>
                  <th>Tindakan</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($materials as $m)

                  <tr>
                      <td>{{$m->name}}</td>
                      <td>{{$m->color}}</td>
                      <td>{{$m->stock}} meter</td>
                      <td>@rupiah($m->price)/m<sup>2</sup></td>
                      <td>X</td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Bahan</th>
                  <th>Warna</th>
                  <th>Stok</th>
                  <th>Harga Dasar</th>
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
