@php
  $i =1;
@endphp
<div class="row">
  @foreach ($orders as $o)
    <div class="col-lg-6 col-sm-12">
      <div class="card card-primary" id="itemContainer_">
        <div class="card-header">
          <h3 class="card-title">Form Barang {{$i}}</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <div class="card-body">
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="itemModel_">Model</label>
                <input type="text" readonly class="form-control-plaintext" value="{{$o->model}}">
              </div>
              <div class="form-group">
                <label for="itemCol_">Warna</label>
                <input type="text" readonly class="form-control-plaintext" value="{{$o->color}}">
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="itemMat_">Bahan</label>
                <input type="text" readonly class="form-control-plaintext" value="{{$o->material}}">
              </div>

            </div>
          </div>
        </div>
        {{-- @if (count($orders) == $i)
          <div class="card-footer" id="footer_">
            <button type="button" class="btn btn-danger" id="removeItem"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-info" id="addNewItem"><i class="fa fa-plus"></i></button>
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        @endif --}}
      </div>
    </div>
    @php
    $i++;
    @endphp
  @endforeach
  <div class="col-12 bg-white" style="padding:10px; border-radius:5px">
    <button type="submit" class="btn btn-success" id="submitProductionOrder" >Submit</button>
  </div>
</div>
