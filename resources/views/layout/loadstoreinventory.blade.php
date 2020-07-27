<div class="card card-info">
  <div class="card-header">
    <h3 class="card-title">Form barang</h3>
  </div>
  <div class="card-body">
    <table class="table table-bordered dtt">
      <thead>
      <tr>
        <th>Item</th>
        <th class="none">Kode Produksi</th>
        <th class="none">Bahan</th>
        <th>Warna</th>
        <th>Ukuran</th>
        <th class="none">Qty</th>
        <th data-priority="2">Tindakan</th>
      </tr>
      </thead>
      <tbody>
        @php
          $index = 1;
        @endphp
        @foreach($store_inventory as $si)
        <tr id="row_{{ $index }}">
            <td>
              {{$si->model}}
              {{-- @if($si->niqab == 1)
                <span class='badge badge-success'>Niqab</span>
              @endif --}}
              @if($si->pet == 1)
                <span class='badge badge-primary'>Pet</span>
              @endif
            </td>
            <td>{{$si->production_code}}</td>
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
            <td id="qtyOf_{{ $index}}">{{$si->quantity}}</td>
            <td>
              &nbsp;
              <a href="#" class="btn btn-primary addItem" id="addBtn_{{ $index }}"
                data-id="{{$si->id}}"
                data-model="{{$si->model}}"
                data-code="{{ $si->production_code }}"
                data-maximum="{{ $si->quantity }}"
                data-oringinal="{{ $si->quantity }}"
                data-qtyof="qtyOf_{{ $index }}"
                data-row="{{ $index }}"
                data-material="{{$si->material}}"
                data-color="{{$si->color}}"
                data-size="{{$si->size}}">
                <i class="fa fa-cart-plus" data-toggle="tooltip" title="Tambah Barang" ></i>
                Tambahkan
              </a>

            </td>
          </tr>
          <div id="hiddenrows">

            {{-- <input type="hidden" name="color_{{ $index }}" value="">   --}}
          </div>
          @php
            $index++;
          @endphp
        @endforeach
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
  $('.dtt').DataTable({
      "paging": true,
      "ordering": true,
      "info": true,
      "responsive": true,
  });
  $(".addItem").on('click',function()
  {
      var _this = $(this);
      // alert(_this.data('maximum'));
      var qtycol = $("#qtyOf_"+_this.data('row'));
      var qtyField = $("#qty_"+_this.data('row'));
      var itemField = $("#item_"+_this.data('row'));
      var row = $("#row_"+_this.data('row'));
      var rows = parseInt($("#countItems").val());
      var cart = $("#cart");
      (async () => {
        const { value: qty } = await Swal.fire({
          title :"Tambahkan "+_this.data('model')+" "+_this.data('code'),
          input : 'number',
          inputAttributes: {
            min: 0,
            max: _this.data('maximum')
          },
          inputValidator: (value) =>
          {
              if (value > _this.data('maximum'))
              {
                return 'Data pesanan tidak bisa melebihi stok yang tersedia! <small>stok :'+_this.data('maximum')+'</small>'
              }
          }
        })
        if (qty)
        {
            var newqty = parseInt(qtycol.html()) - qty;
            var $QTY = 0;
            // if(qtyField.val() == "")
            // {
            //     qtyField.val(qty);
            //     $QTY = qty;
            // }
            // else {
            //   qtyField.val(parseInt(qtyField.val())+parseInt(qty));
            //   $QTY = parseInt(qtyField.val())+parseInt(qty);
            // }
            _this.data('maximum',newqty);
            if(newqty == 0)
            {
              row.hide();
            }
            else {
              qtycol.html(newqty);
            }
            if (!$("#cartRow_"+_this.data('row')).length)
            {
              cart.append('<tr id=cartRow_'+_this.data('row')+'><td>'+_this.data('model')+'</td><td>'+_this.data('color')+'</td><td>'+_this.data('size')+'</td><td id="cartQtyRow_'+_this.data('row')+'">'+qty+'</td><td><div class="input-group"><div class="input-group-prepend"><span class="input-group-text">Rp.</span></div><input type="number" class="form-control phone price" min="0" id="price_'+_this.data('row')+'" data-row="'+_this.data('row')+'" value="0"><div class="input-group-append"><span class="input-group-text">,-</span></div></div></td><td><button class="btn btn-danger removeItem" data-row="'+_this.data('row')+'" data-qty="'+qty+'"><i class="fa fa-trash"></i> Hapus Barang</button><input style="display:none" type="text" name="item_'+(parseInt(rows)+1)+'" value="'+_this.data('id')+'" id="item_'+(parseInt(rows)+1)+'"><input style="display:none" type="number" name="subtotal_'+(parseInt(rows)+1)+'" id="subtotal_'+(parseInt(rows)+1)+'" data-row="{{$index}}" placeholder="subtotal {'+(parseInt(rows)+1)+'}" value="0"><input style="display:none" type="number" value="'+qty+'" id="qty_'+(rows+1)+'" name="qty_'+(rows+1)+'" data-row="'+(rows+1)+'" placeholder="qty '+(rows+1)+'"></tr>');
              $("#countItems").val(rows+1);
            }
            else
            {
                qtyField.val(parseInt(qtyField.val())+parseInt(qty));
              $("#cartQtyRow_"+_this.data('row')).html(qtyField.val());
            }
            Swal.fire('berhasil',`${qty} buah `+_this.data('model')+` produksi `+_this.data('code')+` ditambahkan ke keranjang`,'info');
            if (rows == 0)
            {
              $("#itemCartContainer").slideDown();
            }
            itemField.val(_this.data('id'));
        }
      })()
  });
  $("#cart").on("click", "button.removeItem",function()
  {
    var _this = $(this);
    var rows = parseInt($("#countItems").val());
    var qty = parseInt($("#qty_"+_this.data('row')));
    var storeRow = $("#row_"+_this.data('row'));
    var cartRow = $("#cartRow_"+_this.data('row'));
    var qtycol = $("#qtyOf_"+_this.data('row'));
    var newqty = parseInt(qtycol.html()) + qty;
    var sub = parseInt($("#subtotal_"+_this.data('row')).val());
    var total = parseInt($("#base_price").val());
    var qtyField = $("#qty_"+_this.data('row'));
    var sum = total - sub;

    $("#addBtn_"+_this.data('row')).data('maximum',$("#addBtn_"+_this.data('row')).data('oringinal'));
    // alert($("#addBtn_"+_this.data('row')).data('oringinal'));
    $("#base_price").val(sum);
    $("#cartQtyRow_"+_this.data('row')).remove();
    qtycol.html(newqty);
    qtyField.val("");
    storeRow.show();
    cartRow.remove();
    $("#countItems").val(rows-1);
    // console.log($("#countItems").val());
  });
  $("#cart").on('keyup change', '.price', function ()
  {
    var _this = $(this);
    var row = _this.data('row');
    var rows = $("#countItems").val();
    var total = parseInt($("#base_price").val());
    var old_subtotal = parseInt($("#subtotal_"+row).val());
    var qty = parseInt($("#qty_"+row).val());
    var price = $(this).val();
    if (price == null)
    {
        price =0;
    }
    else {
      parseInt(price);
    }
    var sum = price * qty;
    var grandTotal = parseInt(total) - old_subtotal + parseInt(sum);
    $("#subtotalCol_"+row).text("Rp. "+sum+",-");
    $("#subtotal_"+row).val(sum);

    $("#base_price").val(grandTotal);
  });
</script>
