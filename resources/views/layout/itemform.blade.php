<div class="card card-primary" id="itemContainer_{{$row}}">
  <div class="card-header">
    <h3 class="card-title">Form Barang {{$row}}</h3>
  </div>
  <!-- /.card-header -->
  <!-- form start -->
  <div class="card-body">
    <div class="row">
      <div class="col-12">
        <div class="form-group">
          <label for="itemModel_{{$row}}">Model</label>
          <select class="select2 form-control modelselect" name="model_{{$row}}" id="itemModel-{{$row}}">
            <option selected disabled>pilih jenis barang...</option>
              <optgroup id="modClothes" label="Baju">
              @foreach ($models as $mod)
                @if ($mod->kind == 'clothes')
                  <option value="{{$mod->id}}">{{$mod->name}}</option>
                @endif
              @endforeach
            </optgroup>
            <optgroup id="modHijab" label="Jilbab">
            @foreach ($models as $mod)
              @if ($mod->kind == 'hijab')
                <option value="{{$mod->id}}">{{$mod->name}}</option>
              @endif
            @endforeach
          </optgroup>
            <optgroup id="modEtc" label="Lain-Lain">
            @foreach ($models as $mod)
              @if ($mod->kind == 'etc')
                <option value="{{$mod->id}}">{{$mod->name}}</option>
              @endif
            @endforeach
          </optgroup>
          </select>
        </div>
        <div class="row">
          <div class="col-7">
            <div class="form-group">
              <label for="itemMat_{{$row}}">Bahan</label>
              <select class="select2 form-control" name="material_{{$row}}" id="itemMat_{{$row}}">
                <option selected disabled>pilih jenis bahan...</option>
                @foreach ($materials as $mat)
                  <option value="{{$mat->id}}">{{$mat->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-3">
            <div class="form-group">
              <label for="itemCol_{{$row}}">Warna</label>
              <select class="form-control" name="color_{{$row}}" id="itemCol_{{$row}}">
                <option selected disabled>pilih warna...</option>
                @foreach ($colors as $col)
                  <option class="text-{{$col->real_color}}" value="{{$col->id}}">{{$col->color}} @if($col->color == "Putih") &#x2616; @else &#x2617; @endif </option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-2">
            <div class="form-group">
              <label for="">Pet</label>
              <input type="checkbox" name="pet" class="form-control icheck">
            </div>
          </div>
        </div>
        {{-- <div class="row">
          <div class="col-8">
            <div class="form-group">
              <label for="itemPet_{{$row}}">Pet</label>
              <div class="row">
                <div class="col-6">
                  <div class="icheck-primary d-inline">
                    <input type="radio" value="1" class="icheck" id="pet1"name="pet">
                    <label style="font-weight:500;" for="pet2">Non Pet</label>
                  </div>
                </div>
                <div class="col-6">
                  <div class="icheck-primary d-inline">
                    <input type="radio" value="2" class="icheck" id="pet2"name="pet">
                    <label style="font-weight:500;" for="pet2">Dengan Pet</label>
                  </div>
                </div>
              </div>
              <select class="select2 form-control" name="material_{{$row}}" id="itemMat_{{$row}}">
                <option selected disabled>pilih jenis bahan...</option>
                @foreach ($materials as $mat)
                  <option value="{{$mat->id}}">{{$mat->name}}</option>
                @endforeach
              </select>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </div>
  <div class="card-footer" id="footer_{{$row}}">
    @if ($row > 1)
      <button type="button" class="btn btn-danger" id="removeItem"><i class="fa fa-minus"></i></button>
    @endif
    <button type="button" class="btn btn-info" id="addNewItem"><i class="fa fa-plus"></i></button>
    <button type="submit" class="btn btn-success" id="submitProductionOrder" >Submit</button>
  </div>
</div>
<script type="text/javascript">
$(".select2").select2();
// $('.icheck').iCheck({
//   checkboxClass: 'icheckbox_square-blue',
//   radioClass: 'iradio_square-blue',
//   increaseArea: '20%' // optional
// });

</script>
