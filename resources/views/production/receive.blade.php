@extends('layout.wrapper')
@section('title','Terima Produksi Masuk')
@section('content')
  <section class="content">
    <div id="sectionLoader" class="pageLoader">
      <i class="fa fa-spinner fa-spin text-white"> </i>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-12">
          <div class="card card-primary">
            <form class="form" action="{{action('MainController@acceptProduction')}}" method="post" id="receiveProductionForm">
              <div class="card-header">
                Produksi Masuk
              </div>
              <div class="card-body">
                @csrf
                <div class="form-group">
                  <label for="">Nomor Produksi</label>
                  <select class="form-control select2" name="id" id="selectPO">
                    <option selected disabled value="0">Pilih Produksi ....</option>
                    @foreach ($productions as $p)
                      <option value="{{$p->id}}">{{$p->code}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Penanggung Jawab Produksi</label>
                  <input type="hidden" name="handler" value="{{Auth::user()->id}}">
                  <input type="text" class="form-control" disabled value="{{Auth::user()->name}}">
                </div>
                <div class="form-group">
                  <label>Pembuat Surat Produksi</label>
                  {{-- <input type="hidden" name="handler" value="" id="picColReal"> --}}
                  <input type="text" class="form-control" disabled value="" id="picCol">
                </div>
                <div class="form-group">
                  <label>Jenis Produksi</label>
                  {{-- <input type="hidden" name="handler" value="" id="kindColReal"> --}}
                  <input type="text" class="form-control" disabled value="" id="kindCol">
                </div>
                {{-- <div class="form-group">
                  <label for="">Pelaksana Produksi</label>
                  <select class="form-control select2" name="tailor" id="tailorSelect">
                    <option selected disabled value="0">Pilih Penjahit ....</option>
                    @foreach ($tailors as $t)
                      <option value="{{$t->id}}">{{$t->name}}</option>
                    @endforeach
                  </select>
                </div> --}}
              </div>
              <div class="card-footer">
                <button type="submit" class="btn btn-success" id="receiveSubmit">Terima Produksi</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-12">
          <div id="containerLoader" class="pageLoader">
            <i class="fa fa-spinner fa-spin text-white"> </i>
          </div>
          <div class="card card-primary">
            <div class="card-header">
              Detil Surat Produksi
            </div>
            <div class="card-body" id="containerPO">

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
