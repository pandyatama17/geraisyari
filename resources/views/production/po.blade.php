<div class="invoice p-3 mb-3" id="productionOrder">
  <!-- title row -->
  <div class="row">
    <div class="col-12">
      <h2 class="text-center">
        @switch($data->kind)
          @case('new')
            Surat Produksi
            @break
          @case('resew')
            Surat Vermak
            @break
        @endswitch
        <small class="float-right" style="font-size:10pt">No. : {{$data->code}}</small>
      </h2>
      <hr>
    </div>
    <!-- /.col -->
  </div>
  <!-- info row -->
  <div class="row invoice-info">
    <div class="col-sm-6 invoice-col">
      <table>
        @if($type != 0)
          <tr>
                @if ($data->reseller == 1)
                  <td>Agen</td>
                  <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                  <td>
                    <span style="font-size:10pt">
                      {{$data->reseller_name}}
                    </span>
                  </td>
                @else
                  <td>Nama Konsumen</td>
                  <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                  <td>
                    {{$data->client_name}}
                  </td>
                @endif
          </tr>
          <tr>
            <td>Tgl. Pemesanan</td>
            <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
            <td>
              @if($type == 0)
                <i class="text-gray">-</i>
              @else
                {{$data->order_date}}
              @endif
            </td>
          </tr>
        @endif
            <tr>
              <td>Tgl. Masuk Produksi</td>
              <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
              <td>{{$data->date_in}}</td>
            </tr>
              <tr>
                <td>Tgl. Selesai Produksi</td>
                <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
                <td>{{$data->date_out}}</td>
              </tr>
      </table>
    </div>
    <!-- /.col -->
    <div class="col-sm-6 invoice-col">
      <table>
        <tr>
          <td>No. Resi Pengiriman</td>
          <td>&nbsp;&nbsp; : &nbsp;&nbsp;</td>
          <td>{{$data->delivery_out}}</td>
        </tr>
      </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <br>
  <!-- Table row -->
  <div class="row">
    <div class="col-12 table-sm">
          <table class="table table-sm table-bordered">
            <thead>
              @foreach($details as $d)
              @endforeach
              <tr>
                @if ($d->quantity == '1')
                  <th colspan='3' class="text-center text-white" style="background-color:black;">Baju</th>
                @else
                  <th colspan='5' class="text-center text-white" style="background-color:black;">Baju</th>
                @endif
              </tr>
              <tr>
                @if ($d->quantity == '1')
                  <th class="text-center" style="width:33%; line-height:7px">Model</th>
                  <th class="text-center" style="width:33%; line-height:7px">Bahan</th>
                  <th class="text-center" style="width:33%; line-height:7px">Warna</th>
                @else
                  <th class="text-center" style="width:30%; line-height:7px">Model</th>
                  <th class="text-center" style="width:30%; line-height:7px">Bahan</th>
                  <th class="text-center" style="width:30%; line-height:7px">Warna</th>
                  <th class="text-center" style="width:15%; line-height:7px">Ukuran</th>
                  <th class="text-center" style="width:15%; line-height:7px">Banyak</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($details as $d)
                @if ($d->kind == 'clothes')
                  <tr>
                    @if ($d->quantity == 1)
                      <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->model}}</b></td>
                      <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->material}}</b></td>
                      <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->color}}</b></td>
                    @else
                      <td class="text-center" style="width:30%; font-size:15pt; font-weight:1;"><b>{{$d->model}}</b></td>
                      <td class="text-center" style="width:30%; font-size:15pt; font-weight:1;"><b>{{$d->material}}</b></td>
                      <td class="text-center" style="width:30%; font-size:15pt; font-weight:1;"><b>{{$d->color}}</b></td>
                      <td class="text-center" style="width:15%; font-size:15pt; font-weight:1;"><b>{{$d->size}}</b></td>
                      <td class="text-center" style="width:15%; font-size:15pt; font-weight:1;"><b>{{$d->quantity}}</b></td>
                    @endif
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
          <table class="table table-sm table-bordered">
            <thead>
              @foreach($details as $d)
              @endforeach
              <tr>
                @if ($d->quantity == '1')
                  <th colspan='3' class="text-center text-white" style="background-color:black;">Kerudung</th>
                @else
                  <th colspan='5' class="text-center text-white" style="background-color:black;">Kerudung</th>
                @endif
              </tr>
              <tr>
                @if ($d->quantity == '1')
                  <th class="text-center" style="width:33%; line-height:7px">Model</th>
                  <th class="text-center" style="width:33%; line-height:7px">Bahan</th>
                  <th class="text-center" style="width:33%; line-height:7px">Warna</th>
                @else
                  <th class="text-center" style="width:30%; line-height:7px">Model</th>
                  <th class="text-center" style="width:30%; line-height:7px">Bahan</th>
                  <th class="text-center" style="width:30%; line-height:7px">Warna</th>
                  <th class="text-center" style="width:15%; line-height:7px">Ukuran</th>
                  <th class="text-center" style="width:15%; line-height:7px">Banyak</th>
                @endif
              </tr>
            </thead>
            <tbody>
              @foreach($details as $d)
                @if ($d->kind == 'hijab')
                  <tr>
                    @if ($d->quantity == 1)
                      <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->model}}</b></td>
                      <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->material}}</b></td>
                      <td class="text-center" style="width:33%; font-size:15pt; font-weight:1;"><b>{{$d->color}}</b></td>
                    @else
                      <td class="text-center" style="width:30%; font-size:15pt; font-weight:1;"><b>{{$d->model}}</b></td>
                      <td class="text-center" style="width:30%; font-size:15pt; font-weight:1;"><b>{{$d->material}}</b></td>
                      <td class="text-center" style="width:30%; font-size:15pt; font-weight:1;"><b>{{$d->color}}</b></td>
                      <td class="text-center" style="width:15%; font-size:15pt; font-weight:1;"><b>{{$d->size}}</b></td>
                      <td class="text-center" style="width:15%; font-size:15pt; font-weight:1;"><b>{{$d->quantity}}</b></td>
                    @endif
                  </tr>
                @endif
              @endforeach
            </tbody>
          </table>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  <div class="row">
    <div class="col-6">
      <table class="table table-bordered">
        <tr>
          <th class="text-center text-white" style="background-color:black; line-height:7px">Kerudung Pet / Non Pet</th>
        </tr>
        <tr>
          <td class="text-center" style="line-height:7px">
            @if ($d->pet == 1)PET @else NON PET @endif
          </td>
        </tr>
          {{-- <tr>
            <th class="text-center text-white" style="background-color:black; line-height:7px">Cadar / Non Cadar</th>
          </tr>
          <tr>
              <td class="text-center" style="line-height:7px">
              @if ($d->niqab == 1)CADAR @else NON CADAR @endif
            </td>
          </tr> --}}
      </table>
    </div>
    @if ($d->quantity == '1')
      <div class="col-4 offset-2">
        <table class="table table-bordered">
          <tr>
            <th class="text-center text-white" style="background-color:black; line-height:7px">Ukuran</th>
          </tr>
          <tr>
            <td class="text-center" style="line-height:7px">
              {{$d->size}}
            </td>
          </tr>
        </table>
      </div>
    @endif
  </div>
  @if ($d->quantity == 1)
    <div class="row">
      <!-- accepted payments column -->
      <div class="col-5">
        <table class="table table-bordered">
          <tr>
            <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Panjang Baju</td>
            <td class="text-center" style="line-height:1px; width:30%">{{$d->dress_length}} @if($d->size == 'custom') cm @endif</td>
          </tr>
          <tr>
            <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Panjang Kerudung</td>
            <td class="text-center" style="line-height:1px; width:30%">{{$d->hijab_length}} @if($d->size == 'custom') cm @endif</td>
          </tr>
          <tr>
            <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Muka</td>
            <td class="text-center" style="line-height:1px; width:30%">{{$d->face_width}} @if($d->size == 'custom') cm @endif</td>
          </tr>
          <tr>
            <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Leher</td>
            <td class="text-center" style="line-height:1px; width:30%">{{$d->neck_width}} @if($d->size == 'custom') cm @endif</td>
          </tr>
          <tr>
            <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Badan</td>
            <td class="text-center" style="line-height:1px; width:30%">{{$d->waist_width}} @if($d->size == 'custom') cm @endif</td>
          </tr>
          <tr>
            <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Dada</td>
            <td class="text-center" style="line-height:1px; width:30%">{{$d->breast_width}} @if($d->size == 'custom') cm @endif</td>
          </tr>
          <tr>
            <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Panggul</td>
            <td class="text-center" style="line-height:1px; width:30%">{{$d->hip_width}} @if($d->size == 'custom') cm @endif</td>
          </tr>
          <tr>
            <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Pinggang</td>
            <td class="text-center" style="line-height:1px; width:30%;">{{$d->brisket_width}} @if($d->size == 'custom') cm @endif</td>
          </tr>
        </table>
      </div>
      <div class="col-5">
        <table class="table table-bordered tabel-bawah">
          <tr>
            <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lebar Punggung</td>
            <td class="text-center" style="line-height:1px; width:30%">{{$d->brisket_length}} @if($d->size == 'custom') cm @endif</td>
          </tr>
          <tr>
            <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Panjang Punggung</td>
            <td class="text-center" style="line-height:1px; width:30%">{{$d->shoulder_width}} @if($d->size == 'custom') cm @endif</td>
          </tr>
          <tr>
            <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lebar Pundak</td>
            <td class="text-center" style="line-height:1px; width:30%">{{$d->shoulder_width}} @if($d->size == 'custom') cm @endif</td>
          </tr>
          <tr>
            <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Ketiak</td>
            <td class="text-center" style="line-height:1px; width:30%">{{$d->armpit_width}} @if($d->size == 'custom') cm @endif</td>
          </tr>
          <tr>
            <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Panjang Lengan</td>
            <td class="text-center" style="line-height:1px; width:30%">{{$d->arm_length}} @if($d->size == 'custom') cm @endif</td>
          </tr>
          <tr>
            <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Lengan</td>
            <td class="text-center" style="line-height:1px; width:30%">{{$d->arm_width}} @if($d->size == 'custom') cm @endif</td>
          </tr>
          <tr>
            <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Siku</td>
            <td class="text-center" style="line-height:1px; width:30%">{{$d->elbow_width}} @if($d->size == 'custom') cm @endif</td>
          </tr>
          <tr>
            <td class="text-center" style="line-height:1px; width:70%; font-size:1.2vh;">Lingkar Pergelangan</td>
            <td class="text-center" style="line-height:1px; width:30%">{{$d->wrist_width}} @if($d->size == 'custom') cm @endif</td>
          </tr>
        </table>
      </div>
      <!-- /.col -->
    </div>
  @endif
  <!-- /.row -->
  <div class="row">
    <div class="col-12">
      <table class="table table-bordered">
        <tr>
          <th class="text-center text-white" style="background-color:black; line-height:7px">Deskripsi</th>
        </tr>
        <tr style="height:100px">
          <td class="text-center">
            {{-- @if ($d->notes != "") --}}
            {{-- {{$d->notes}} --}}
            {{-- @endif --}}
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
