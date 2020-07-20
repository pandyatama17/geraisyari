@extends('layout.wrapper')
@section('title','Pemesanan Baru')
@section('content')
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Pre Order baru</h3>
            </div>
            <div class="card-body">
              <div class="form-group" id="sizeContainer">
                <label>Jenis Pesanan</label>
                {{-- <input type="radio" name="" value=""> --}}
                <div class="row">
                  <div class="col-6">
                    <div class="icheck-primary d-inline">
                      <input type="radio" value="0" class="icheck" name="order_type">
                      <label for="radioPrimary1">Perseorangan</label>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="icheck-primary d-inline">
                      <input type="radio" value="1" class="icheck" name="order_type">
                      <label>Agen</label>
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
              <div class="form-group">
                <label>Harga Dasar</label>
                <input type="number" name="base_price" value="" placeholder="Harga" class="form-control" disabled>
              </div>
              <div class="form-group">
                <label>PPN</label>
                <input type="number" name="tax" value="" placeholder="Pajak" class="form-control" disabled>
              </div>
              <div class="form-group">
                <label>Uang Muka</label>
                <input type="number" name="down_payment" value="" placeholder="DP Dibayar" min="0" class="form-control">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" id="itemFormContainer">

        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript">
    $(document).ready(function()
    {
        newItem();
    })
  </script>
@endsection
