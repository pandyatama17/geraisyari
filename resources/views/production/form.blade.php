@extends('layout.wrapper')
@section('title',$form_method." Produksi Masuk")
@section('content')
  <section class="content">
    <div class="pageLoader" id="sectionLoader">
      <i class="fa fa-spinner fa-spin text-white"> </i>
    </div>
    <form role="form" id="productionForm" method="post" action="{!! action('MainController@saveProduction') !!}">
      @csrf
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-4 col-sm-12">
          <div class="row">
            <div class="col-12">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Tambah Produksi</h3>
                </div>
                <div class="card-body">
                  <div class="form-group">
                    <label for="typeSelect">Tujuan Produksi</label>
                    <select class="form-control" name="prod_type" id="typeSelect">
                      <option selected disabled value="0">pilih tujuan produksi...</option>
                      <option value="1">Produksi atas Pemesanan</option>
                      <option value="2">Produksi Stok Toko</option>
                    </select>
                  </div>
                  <div id="prodByOrder" style="display:none">
                    <div class="form-group">
                      <label for="orderSelect">Pilih Pesanan</label>
                      <select class="form-control" name="order" id="orderSelect">
                        <option selected disabled value="0">pilih pesanan untuk produksi...</option>
                        @foreach ($orders as $o)
                          <option value="{{$o->id}}">{{$o->code}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  {{-- <div id="storeSelectContainer" style="display:none">
                    <div class="form-group">
                      <label for="storeSelect">Toko</label>
                      <select class="form-control" name="order" id="storeSelect">
                        <option selected disabled value="0">pilih toko...</option>
                        <option value="1">Toko Bekasi</option>
                        <option value="2">Toko BSD</option>
                      </select>
                    </div>
                  </div> --}}
                  <div class="form-group" id="storeSelectContainer" style="display:none">
                    <label>Toko</label>
                    {{-- <input type="radio" name="" value=""> --}}
                    <div class="row">
                      <div class="col-6">
                        <div class="icheck-primary d-inline">
                          <input type="radio" value="1" class="icheck" name="store_id" id="storeRadio_1">
                          <label for="storeRadio_1"><p class="lead">Toko Bekasi</p></label>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="icheck-primary d-inline">
                          <input type="radio" value="2" class="icheck" name="store_id" id="storeRadio_2">
                          <label for="storeRadio_2"><p class="lead">Toko BSD</p></label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" id="kindContainer">
                    <label for="kind">Jenis Produksi</label>
                    <select class="form-control" name="kind" id="kindSelect">
                      <option selected disabled value="0">pilih jenis produksi...</option>
                      <option value="PR">Jahit Baru (PR)</option>
                      <option value="VR">Vermak (VR)</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="pic">Penanggung Jawab</label>
                    <input type="text" class="form-control" id="pic" value="{{Auth::user()->name}}" disabled>
                  </div>
                  <div class="form-group" id="sizeContainer" style="display:none">
                    <label>Ukuran</label>
                    {{-- <input type="radio" name="" value=""> --}}
                    <div class="row">
                      <div class="col-3">
                        <div class="icheck-primary d-inline">
                          <input type="radio" value="S" class="icheck" id="radioPrimary1"name="size">
                          <label for="radioPrimary1">S
                          </label>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icheck-primary d-inline">
                          <input type="radio" value="M" class="icheck" id="radioPrimary2"name="size">
                          <label for="radioPrimary2">M
                          </label>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icheck-primary d-inline">
                          <input type="radio" value="L" class="icheck" id="radioPrimary3"name="size">
                          <label for="radioPrimary3">L
                          </label>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icheck-primary d-inline">
                          <input type="radio" value="XXL" class="icheck" id="radioPrimary4"name="size">
                          <label for="radioPrimary4">XL
                          </label>
                        </div>
                      </div>
                      <div class="col-3">
                        <div class="icheck-primary d-inline">
                          <input type="radio" value="XXL" class="icheck" id="radioPrimary5"name="size">
                          <label for="radioPrimary5">XXL
                          </label>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="icheck-primary d-inline">
                          <input type="radio" value="XXXL" class="icheck" id="radioPrimary6" name="size">
                          <label for="radioPrimary6">XXXL
                          </label>
                        </div>
                      </div>
                      <div class="col-4 col-md-offset-1 custom-chk">
                        <div class="icheck-primary d-inline">
                          <input type="checkbox" value="1" class="icheck" id="radioPrimary7" name="custom_sizing">
                          <label for="radioPrimary7">Custom
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group" id="notesContainer">
                    <label for="notes">Catatan Produksi</label>
                    <textarea name="notes" rows="4" cols="80" class="form-control" id="notes"></textarea>
                  </div>
                </div>
                {{-- <div class="card-footer">
                  <button type="button" class="btn btn-success" id="submitProductionOrder">Submit</button>
                </div> --}}
              </div>
            </div>
            <div class="col-12">
              <div class="card card-warning" id="customSizeCard" style="display:none">
                <div class="card-header">
                  <h3 class="card-title">Ukuran Custom</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="pic">Panjang Baju</label>
                        <div class="input-group mb-3">
                          <input type="number" min="0"class="form-control" name="dress_length">
                          <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="pic">Panjang Kerudung</label>
                          <div class="input-group mb-3">
                            <input type="number" min="0"class="form-control" name="hijab_length">
                            <div class="input-group-append">
                              <span class="input-group-text">cm</span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="pic">Lingkar Muka</label>
                          <div class="input-group mb-3">
                            <input type="number" min="0"class="form-control" name="face_width">
                            <div class="input-group-append">
                              <span class="input-group-text">cm</span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="pic">Lingkar Leher</label>
                          <div class="input-group mb-3">
                            <input type="number" min="0"class="form-control" name="neck_width">
                            <div class="input-group-append">
                              <span class="input-group-text">cm</span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="pic">Lingkar Badan</label>
                          <div class="input-group mb-3">
                            <input type="number" min="0"class="form-control" name="waist_width">
                            <div class="input-group-append">
                              <span class="input-group-text">cm</span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="pic">Lingkar Dada</label>
                          <div class="input-group mb-3">
                            <input type="number" min="0"class="form-control" name="breast_width">
                            <div class="input-group-append">
                              <span class="input-group-text">cm</span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="pic">Lingkar Panggul</label>
                          <div class="input-group mb-3">
                            <input type="number" min="0"class="form-control" name="hip_width">
                            <div class="input-group-append">
                              <span class="input-group-text">cm</span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="pic">Lingkar Pinggang</label>
                          <div class="input-group mb-3">
                            <input type="number" min="0"class="form-control" name="brisket_width">
                            <div class="input-group-append">
                              <span class="input-group-text">cm</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="pic">Lebar Punggung</label>
                        <div class="input-group mb-3">
                          <input type="number" min="0"class="form-control" name="brisket_length">
                          <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="pic">Panjang Punggung</label>
                          <div class="input-group mb-3">
                            <input type="number" min="0"class="form-control" name="shoulder_width">
                            <div class="input-group-append">
                              <span class="input-group-text">cm</span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="pic">Lebar Pundak</label>
                          <div class="input-group mb-3">
                            <input type="number" min="0"class="form-control" name="shoulder_width">
                            <div class="input-group-append">
                              <span class="input-group-text">cm</span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="pic">Lingkar Ketiak</label>
                          <div class="input-group mb-3">
                            <input type="number" min="0"class="form-control" name="armpit_width">
                            <div class="input-group-append">
                              <span class="input-group-text">cm</span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="pic">Panjang Lengan</label>
                          <div class="input-group mb-3">
                            <input type="number" min="0"class="form-control" name="arm_length">
                            <div class="input-group-append">
                              <span class="input-group-text">cm</span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="pic">Lingkar Lengan</label>
                          <div class="input-group mb-3">
                            <input type="number" min="0"class="form-control" name="arm_width">
                            <div class="input-group-append">
                              <span class="input-group-text">cm</span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="pic">Lingkar Siku</label>
                          <div class="input-group mb-3">
                            <input type="number" min="0"class="form-control" name="elbow_width">
                            <div class="input-group-append">
                              <span class="input-group-text">cm</span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="pic">Lingkar Pergelangan</label>
                          <div class="input-group mb-3">
                            <input type="number" min="0"class="form-control" name="wrist_width">
                            <div class="input-group-append">
                              <span class="input-group-text">cm</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-8" >
          <div id="containerLoader" class="pageLoader">
            <i class="fa fa-spinner fa-spin text-white"> </i>
          </div>
          <div id="itemFormContainer"></div>
          <input type="hidden" name="rows" id="countItems" value="1">
          <input type="hidden" name="prod_kind" id="prodKind" value="1">
        </div>
      </div>
    </div>
  </form>
  </section>
@endsection
