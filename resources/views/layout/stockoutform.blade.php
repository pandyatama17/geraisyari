{{-- @extends('layout.wrapper')
@section('content')
<section class="content">
  <div class="row">
    <div class="col-6 offset-3">
      <div class="card card-default">
        <div class="card-header">
          Form Barang Keluar
        </div>
        <div class="card-body">

        </div>
      </div>
    </div>
  </div>
</section>
@endsection --}}
  @csrf
  <input type="hidden" name="id" value="{{$data->id}}">
  <div class="form-group">
    <label>Kode Produksi</label>
    <input type="text" class="form-control" disabled value="{{$data->code}}">
  </div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Nama Barang</th>
        <th>Warna</th>
        <th>Banyaknya Terpakai</th>
      </tr>
    </thead>
    <tbody>
      @php $i = 1; @endphp
      @foreach ($colors as $c)
        <input type="hidden" name="item_{{$i}}" value="{{$c[0]->id}}">
        <tr>
          <td>{{$i}}</td>
          <td>{{$c[0]->material}}</td>
          <td>{{$c[0]->color}}</td>
          <td>
            <div class="col-7">
              <div class="input-group input-group-sm">
                <input type="number" class="form-control" min="0" name="stock_{{$i}}" id="input_{{$i}}">
                <div class="input-group-append">
                  <span class="input-group-text">cm</span>
                </div>
              </div>
            </div>
          </td>
        </tr>
        @php $i++; @endphp
      @endforeach
    </tbody>
    <input type="hidden" name="rows" value="{{$i}}" id="countRows">
  </table>
