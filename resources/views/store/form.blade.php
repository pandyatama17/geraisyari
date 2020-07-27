@extends('layout.wrapper')
@section('title','Pemesanan Baru')
@section('content')
<form class="form" action="{{route('save_order')}}" method="post" id="orderForm">
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="card card-success" id="order-form">
            <div class="card-header">
              <h3 class="card-title">Pre Order</h3>
            </div>
            <div class="card-body">
              <div class="form-group">
                <label>Jenis Pesanan</label>
                {{-- <input type="radio" name="" value=""> --}}
                <div class="row">
                  <div class="col-7">
                    <div class="icheck-primary d-inline">
                      <input type="radio" value="0" class="icheck" name="order_type" id="indivRadio">
                      <label for="indivRadio"><p class="lead">Perseorangan</p></label>
                    </div>
                  </div>
                  <div class="col-5">
                    <div class="icheck-primary d-inline">
                      <input type="radio" value="1" class="icheck" name="order_type" id="agenRadio">
                      <label for="agenRadio"><p class="lead">Agen</p></label>
                    </div>
                  </div>
                </div>
              </div>
              <div id="individualOrder" style="display:none">
                <div class="form-group">
                  <label>Nama Pemesan</label>
                  <input type="text" name="client_name" value="" placeholder="Nama Pemesan"  class="form-control">
                </div>
                <div class="form-group">
                  <label>No. Telepon Pemesan</label>
                  <input type="number" name="client_phone" value="" placeholder="Nomor Telepon Pemesan"  class="form-control phone">
                </div>
              </div>
              <div id="resellerOrder" style="display:none">
                <div class="form-group">
                  <label>Agen</label>
                  <select class="form-control select2" style="width:100%;" id="resellerSelect" name="reseller_id">
                    <option value="0" selected disabled>Pilih agen...</option>
                    @foreach ($resellers as $rs)
                      <option value="{{$rs->id}}">{{$rs->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group" id="kindContainer">
                <label for="kind">Jenis Pesanan</label>
                <select class="form-control" name="order_kind" id="orderKindSelect" data-previousValue='1'>
                  <option disabled>pilih jenis pesanan...</option>
                  <option value="0">Pembelian Dari Toko (OR)</option>
                  <option value="1" selected>Pesanan Baru (PO)</option>
                  <option value="2">Pesanan Vermak (OV)</option>
                </select>
              </div>
              <div class="form-group">
                <label for="pic">Penanggung Jawab</label>
                <input type="text" class="form-control" id="pic" value="{{Auth::user()->name}}" disabled>
              </div>
              <hr>
              <div id="customSizeBtn">
                <div class="col-12 custom-chk">
                  <div class="icheck-primary d-inline">
                    <input type="checkbox" value="1" class="icheck" id="radioPrimary7" name="custom_sizing">
                    <label>Ukuran Custom</label>
                  </div>
                </div>
                <hr>
              </div>
              <div class="form-group" id="notesContainer">
                <label for="notes">Catatan Pemesanan</label>
                <textarea name="notes" rows="4" cols="80" class="form-control" id="notes"></textarea>
              </div>
              <hr>
              <div class="form-group" id="totalCol">
                <label>Total Tagihan</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                  </div>
                  <input type="text" name="base_price" value="0" placeholder="Harga" class="form-control" readonly id="base_price">
                  <div class="input-group-append">
                    <span class="input-group-text">,-</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>PPN</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                  </div>
                  <input type="text" name="tax" value="" placeholder="Pajak" class="form-control" disabled>
                  <div class="input-group-append">
                    <span class="input-group-text">,-</span>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label>Uang Muka <small>*kosongkan jika tidak ada DP</small></label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Rp.</span>
                  </div>
                  <input type="number phone" name="down_payment" value="" placeholder="Dp Dibayar" class="form-control">
                  <div class="input-group-append">
                    <span class="input-group-text">,-</span>
                  </div>
                </div>
              </div>
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
                      <label for="pic">Pjg. Baju</label>
                      <div class="input-group mb-3">
                        <input type="number" min="0"class="form-control" name="dress_length">
                        <div class="input-group-append">
                          <span class="input-group-text">cm</span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pic">Pjg. Kerudung</label>
                        <div class="input-group mb-3">
                          <input type="number" min="0"class="form-control" name="hijab_length">
                          <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pic">Lkr. Muka</label>
                        <div class="input-group mb-3">
                          <input type="number" min="0"class="form-control" name="face_width">
                          <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pic">Lkr. Leher</label>
                        <div class="input-group mb-3">
                          <input type="number" min="0"class="form-control" name="neck_width">
                          <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pic">Lkr. Badan</label>
                        <div class="input-group mb-3">
                          <input type="number" min="0"class="form-control" name="waist_width">
                          <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pic">Lkr. Dada</label>
                        <div class="input-group mb-3">
                          <input type="number" min="0"class="form-control" name="breast_width">
                          <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pic">Lkr. Panggul</label>
                        <div class="input-group mb-3">
                          <input type="number" min="0"class="form-control" name="hip_width">
                          <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pic">Lkr. Pinggang</label>
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
                      <label for="pic">Lbr. Punggung</label>
                      <div class="input-group mb-3">
                        <input type="number" min="0"class="form-control" name="brisket_length">
                        <div class="input-group-append">
                          <span class="input-group-text">cm</span>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pic">Pjg. Punggung</label>
                        <div class="input-group mb-3">
                          <input type="number" min="0"class="form-control" name="shoulder_width">
                          <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pic">Lbr. Pundak</label>
                        <div class="input-group mb-3">
                          <input type="number" min="0"class="form-control" name="shoulder_width">
                          <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pic">Lkr. Ketiak</label>
                        <div class="input-group mb-3">
                          <input type="number" min="0"class="form-control" name="armpit_width">
                          <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pic">Pjg. Lengan</label>
                        <div class="input-group mb-3">
                          <input type="number" min="0"class="form-control" name="arm_length">
                          <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pic">Lkr. Lengan</label>
                        <div class="input-group mb-3">
                          <input type="number" min="0"class="form-control" name="arm_width">
                          <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pic">Lkr. Siku</label>
                        <div class="input-group mb-3">
                          <input type="number" min="0"class="form-control" name="elbow_width">
                          <div class="input-group-append">
                            <span class="input-group-text">cm</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pic">Lkr. Pergelangan</label>
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
              <div class="card-footer">
                <button type="button" class="btn btn-success" id="closeSizeContainer"> <i class="fa fa-times"></i> Tutup</button>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
          <div id="containerLoader" class="pageLoader">
            <i class="fa fa-spinner fa-spin text-white"> </i>
          </div>
          <div id="itemFormContainer"></div>
          <div id="itemCartContainer" style="">
            <div class="card card-purple">
              <div class="card-header">
                <h3 class="card-title">Keranjang Barang</h3>
              </div>
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                  <tr>
                    <th>Item</th>
                    <th>Warna</th>
                    <th>Ukuran</th>
                    <th>Qty</th>
                    <th>Harga Satuan</th>
                    <th>Tindakan</th>
                  </tr>
                  </thead>
                  <tbody id="cart">
                  </tbody>
                </table>
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-success" name="button">Selesai</button>
              </div>
            </div>
          </div>
        </div>
        @csrf
        <input type="text" name="rows" id="countItems" value="0">
      </div>
    </div>
  </section>
</form>
@endsection
