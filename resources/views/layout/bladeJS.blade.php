<script type="text/javascript">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
</script>
<script>
$(document).on("wheel", "input[type=number]", function (e) {
    $(this).blur();
});
  $(function ()
  {
      $('[data-toggle="tooltip"]').tooltip();
      $('.dataTable').DataTable({
          "paging": true,
          "ordering": true,
          "info": true,
          "responsive": true,
      });
      $(document).on('click', '.size-details', function(e){
        e.preventDefault();
        var url = $(this).data('url');
        $('#dynamic-content').html(''); // leave it blank before ajax call
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'html',
            success: function(data)
            {
                $("#view-modal").modal('show');
                 // $(".modal-backdrop.in").hide();
                $('#dynamic-content').html('');
                $('#dynamic-content').html(data); // load response
                // $('#modal-loader').hide();        // hide ajax loader
            }
          });
    	});
			$('#printPO').click(function(){
					$('#productionOrder').printThis({
				    importCSS: true, // import parent page css
						loadCSS: "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css",
				    importStyle: true,
						copyTagClasses:true,
						// base:false,
					});
			});
			$(".select2").select2();
			// $('.icheck').iCheck();
			$('.icheck').iCheck({
			  checkboxClass: 'icheckbox_square-blue',
			  radioClass: 'iradio_square-blue',
			  increaseArea: '20%' // optional
			});
			$('input[name=custom_sizing]').on('ifChanged', function(event)
			{
					var _this = jQuery(this);
				 	if(_this.is(':checked'))
				 	{
							$('.custom-chk').addClass('active');
							$("#customSizeCard").slideDown();
							$("#order-form").slideUp();
				 	}
				 	else
				 	{
							$('.custom-chk').removeClass('active');
							$("#customSizeCard :input").val("");
							$("#customSizeCard").slideUp();
							$("#order-form").slideDown();
				 	}
			});

			// var itemContainer = $("<div id='itemFormContainer'></div>");
			function newItem(e)
			{
				var count = parseInt($("#countItems").val());
				var next = count + 1;
				if (top.location.pathname === '/store/order/new')
				{
					var url = "/store/new_item/" + next;
				}
				else {
					var url = "/production/new_item/" + next;
				}

				$("#footer_"+count).remove();
				$("#countItems").val(next);
				$.ajax({
						url: url,
						type: 'GET',
						dataType: 'html',
						beforeSend: function()
						{
								$("#containerLoader").show(250);
						},
						success: function(data)
						{
								$('#itemFormContainer').append(data); // load response
								$("#containerLoader").hide(250);
						}
					});
				}
			$(document).on('click',"#addNewItem",newItem);
			$(document).on('click',"#removeItem",function()
			{
				var count = parseInt($("#countItems").val());
				var next = count - 1;
				// alert('current : ' + count + "prev : " +next );
				$("#countItems").val(next);
				$("#itemContainer_"+count).remove();
				if (next == 1)
				{
						$("#itemContainer_"+next).append('<div class="card-footer" id="footer_'+next+'"><button type="button" class="btn btn-info" id="addNewItem"><i class="fa fa-plus"></i></button>&nbsp;<button type="button" class="btn btn-success" id="submitProductionOrder">Submit</button></div>');
				}
				else
				{
						$("#itemContainer_"+next).append('<div class="card-footer" id="footer_'+next+'"><button type="button" class="btn btn-danger" id="removeItem"><i class="fa fa-minus"></i> Hapus Barang</button>&nbsp;<button type="button" class="btn btn-info" id="addNewItem"><i class="fa fa-plus"></i></button>&nbsp;<button type="button" id="submitProductionOrder" class="btn btn-success"><i class="fa fa-check"></i> SelesaiSubmit</button></div>');
				}
			});
			$("#containerLoader").hide();
			$("#sectionLoader").hide(2500);
			$("#kindSelect").on('change',function(e)
			{
					$("#prodKind").val($(this).val());
			});
			$("#typeSelect").on('change',function(e)
			{
					var action = parseInt($(this).val());
					switch (action)
					{
						case 1:
								$('#prodByOrder').slideDown();
								$("#orderSelect").val("0").change();
								$('#sizeContainer').slideUp();
								$("#customSizeCard").slideUp();
								$('#kindSelect option:contains("pilih jenis produksi...")').text('pilih pesanan untuk produksi...');
								// $("#kindSelect").val("0").text("pilih pesanan untuk produksi...");
								$("#kindSelect").prop('disabled',true);
								$("#radioPrimary1").iCheck('toggle');
								$('#itemFormContainer').html(''); // load response
								$("#storeSelectContainer").slideUp();
								$("#storeRadio_1").iCheck('uncheck');
								$("#storeRadio_2").iCheck('uncheck');
							break;
						case 2:
								$("#countItems").val('0');
								$('#prodByOrder').slideUp();
								$('#sizeContainer').slideDown();
								$("#notes").val('');
								// $("#kindSelect").val("0").text("pilih jenis produksi...");
								$('#kindSelect option:contains("pilih pesanan untuk produksi...")').text('pilih jenis produksi...');
								$("#kindSelect").val("0").change();
								$("#kindSelect").prop('disabled',false);
								$('#itemFormContainer').html(''); // load response
								$("#storeSelectContainer").slideDown();
								newItem();
								break;
					}
			});
			$("#orderSelect").on('change',function(e)
			{
					var order_id = $(this).val();
					var order = "/production/load_order/" + order_id;
					var notes = "/production/load_order_notes/" + order_id;
					var kind;
					// alert(order_id);
					if (order_id != null)
					{
						$.ajax({
							url: notes,
							type: 'GET',
							dataType: 'json',
							beforeSend: function()
							{
								// $("#containerLoader").show(250);
							},
							success: function(data)
							{
								switch (data.kind) {
									case 'PO':
										kind = 'PR';
										break;
									case 'OV':
										kind = 'VR';
										break;
								}
								$("#notes").val(data.notes);
								$("#kindSelect").val(kind).change();
								$("#prodKind").val(kind);
							}
						});
						$.ajax({
							url: order,
							type: 'GET',
							dataType: 'html',
							beforeSend: function()
							{
								$("#containerLoader").show(250);
							},
							success: function(data)
							{
								$('#itemFormContainer').html(''); // load response
								$('#itemFormContainer').append(data); // load response
								// $('#itemFormContainer').append('<div class="col-12 bg-white" style="padding:10px; border-radius:5px"><button type="button" class="btn btn-success" id="submitProductionOrder" >Submit</button></div>'); // load response
								$("#containerLoader").hide(250);
							}
						});
					}
					else {
						$('#itemFormContainer').html('');
					}
			});
			$("body").on('submit', '#productionForm', function(event)
			{
					event.preventDefault();
					var form = $(this);
					var action  = form.attr('action');
					var data = form.formSerialize();
					var type = parseInt($("#typeSelect").val());
					switch (type) {
						case 1:
							var order = $( "#orderSelect option:selected" ).text();
							var message = 'Produksi untuk pemesanan '+order+' akan dibuat. Lanjutkan?';
							var buttonText = "Ya";
							break;
						case 2:
							var message = 'Produksi baru untuk gudang toko akan dibuat berdasarkan data berikut. Apakah data yang diinput sudah benar?';
							var buttonText = "Ya, Lanjutkan";
							break
					}
					console.log(action);
					Swal.fire({
							title: 'Form Surat Produksi',
							text: message,
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: buttonText,
							cancelButtonAriaLabel: 'Batal'
					}).then((result) =>
					{
							if (result.value)
							{
								form.ajaxSubmit({
									url:action,
									type: 'POST',
									data : data,
									beforeSend: function()
									{
		              		$("#sectionLoader").show(250);
		           		},
									success : function(response)
									{
										$("#sectionLoader").hide(250);
										var obj = $.parseJSON(response);
										if(obj.error == true)
										{
												Swal.fire(
													'Produksi Gagal Dibuat!',
													obj.message,
													'error'
												);
										}
										else {
											Swal.fire(
												'Sukses',
												obj.message,
												'success'
											).then(function (prompt)
											{
											  if (prompt.value) {
											    window.location = obj.redirect;
											  }
											});
										}
									},error: function(e){
										Swal.fire(
											'Produksi Gagal Dibuat!',
											'periksa kembali inputan anda!',
											'error'
										);
										$("#sectionLoader").hide(250);
									}

								});
							}
					})
			});
			$("#selectPO").on('change',function()
			{
				po_url = "/production/po/"+$(this).val();
				details_url = "/production/load_po_details/"+$(this).val();
				$.ajax({
						url: po_url,
						type: 'GET',
						dataType: 'html',
						beforeSend: function()
						{
								$("#containerLoader").show(250);
						},
						success: function(data)
						{
								$('#containerPO').html(data); // load response
								$("#containerLoader").hide(250);
						}
					});
					$.ajax({
							url: details_url,
							type: 'GET',
							dataType: 'json',
							// beforeSend: function()
							// {
							// 		$("#containerLoader").show(250);
							// },
							success: function(data)
							{
									// $('#picColReal').val(data.pic);
									$('#picCol').val(data.pic_name);
									// $('#kindColReal').val(data.kind);
									$('#kindCol').val(data.kind_name);
							}
						});
						// alert($("#tailorSelect").val());
						if ($("#tailorSelect").val() != null)
						{
							$("#receiveSubmit").prop('disabled',false);
						}
			});
			$("#tailorSelect").on("change",function()
			{
				if ($("#selectPO").val() != null)
				{
					$("#receiveSubmit").prop('disabled',false);
				}
			});
			$("body").on('submit', '#receiveProductionForm', function(event)
			{
					event.preventDefault();
					var form = $(this);
					var action  = form.attr('action');
					var data = form.formSerialize();
					var code = $( "#selectPO option:selected" ).text();
					var tailor = $( "#tailorSelect option:selected" ).text();
					Swal.fire({
							title: 'Terima Produksi Masuk',
							html: 'Produksi &quot;'+code+'&quot; akan diterima dan dilaksanan oleh '+tailor,
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Lanjutkan',
							cancelButtonAriaLabel: 'Batal'
					}).then((result) =>
					{
							if (result.value)
							{
									form.ajaxSubmit(
									{
										url:action,
										type: 'POST',
										data : data,
										beforeSend: function()
										{
			              		$("#sectionLoader").show(250);
			           		},
										success : function(response)
										{
											var obj = $.parseJSON(response);
											$("#sectionLoader").hide(250);
											if(obj.error == true)
											{
													Swal.fire(
														'Produksi Gagal Diterima!',
														obj.message,
														'error'
													);
											}
											else {
												Swal.fire(
													'Sukses',
													'Produksi Berhasil Ditreima!',
													'success'
												).then(function (prompt)
												{
												  if (prompt.value) {
												    window.location = obj.redirect;
												  }
												});
											}
										},
										error: function(xhr, status, error){
											Swal.fire(
												'Produksi Gagal Dibuat!',
												'terjadi kesalahan pada server',
												'error'
											);
											$("#sectionLoader").hide(250);
										}
								});
							}
					})
			});
			$("#startProduction").click('click',function()
			{
					var target = $(this).data('target');
					var code = $(this).data('code');
					console.log(target);
					Swal.fire({
							title: 'Terima Produksi Masuk',
							html: 'Produksi &quot;'+code+'&quot; akan dimulai. lanjutkan?',
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Lanjutkan',
							cancelButtonAriaLabel: 'Batal'
					}).then((result) =>
					{
							if (result.value)
							{
								$.ajax({
										url: target,
										type: 'GET',
										dataType: 'json',
										beforeSend: function()
										{
												$("#sectionLoader").show(250);
										},
										success: function(obj)
										{
												$("#sectionLoader").hide(250);
												if(obj.error == true)
												{
														Swal.fire(
															'Produksi Gagal Dimulai!',
															obj.message,
															'error'
														);
												}
												else {
													Swal.fire(
														'Sukses',
														'Produksi Berhasil Dimulai!',
														'success'
													).then(function (prompt)
													{
														if (prompt.value) {
															$("#prodStatus").removeClass('badge-info');
															$("#prodStatus").addClass('badge-warning text-white');
															$("#prodStatus").html('Dalam Proses');
															$("#startProduction").remove();
															$("#infoFooter").append('<button type="button" class="btn btn-success importStyle" id="printPO"><i class="fas fa-print"></i> Cetak Surat</button>');
															$('#productionOrder').printThis({
														    importCSS: true, // import parent page css
																importStyle: true,
																loadCSS: "https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css",
																copyTagClasses:true,
																// base:false,
															});
															$("#sectionLoader").hide();
															// window.location = obj.redirect;
														}
													});
												}
										}
									});
							}
					});
			});
			$("#finishProduction").on('click',function()
			{
					var url = $(this).data('target');
					$.ajax({
						url : url,
						type : 'GET',
						dataType : 'html',
						beforeSend: function()
						{
								$("#containerLoader").show(250);
						},
						success: function(data)
						{
								$("#stockOutModal").modal('show');
								$('#stockOutContainer').html(data); // load response
								$("#containerLoader").hide(250);
						}
					})
			});
			$("#stockOutForm").on('submit',function(e) {
				e.preventDefault();
				var form =$(this);
				var data = form.formSerialize();
				var action = form.attr('action');
				var rows = $("#countRows").val();
				var empty
				var arrNumber = new Array();;
				$.each($("input[type=number]"),function()
				{
					if ($(this).val() < 1)
					{
							empty = true;
					}
					else {
						empty = false;
					}
				});
				if (empty == true)
				{
						Swal.fire('Gagal','data tidak boleh kosong!','error');
				}
				else {
					Swal.fire({
						title: 'Terima Produksi Masuk',
						html: 'Produksi &quot; &quot; akan dimulai. lanjutkan?',
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Lanjutkan',
						cancelButtonAriaLabel: 'Batal'
					}).then(function(prompt)
					{
						if (prompt.value)
						{
							form.ajaxSubmit(
							{
								url:action,
								type: 'POST',
								data : data,
								beforeSend: function()
								{
										$("#sectionLoader").show(250);
								},
								success : function(response)
								{
									var obj = $.parseJSON(response);
									$("#sectionLoader").hide(250);
									if(obj.error == true)
									{
											Swal.fire(
												'Produksi Gagal Diselesaikan!',
												obj.message,
												'error'
											);
									}
									else {
										Swal.fire(
											'Sukses',
											'Produksi Berhasil Diselesaikan!',
											'success'
										).then(function (prompt)
										{
											if (prompt.value) {
												window.location = obj.redirect;
											}
										});
									}
								},
								error: function(xhr, status, error){
									Swal.fire(
										'Produksi Gagal Diselesaikan!',
										'terjadi kesalahan pada server',
										'error'
									);
									$("#sectionLoader").hide(250);
								}
							});
						}
					});
				}
			});
			$('input[name=order_type]').on('ifChanged', function(event)
			{
				 var type = $(this).val();
				 switch (type) {
				 	case '0':
						$("#resellerOrder").slideUp();
						$("#individualOrder").slideDown();
						$("#resellerSelect").val('0').change();
				 		break;
				 	case '1':
						$("#individualOrder").slideUp();
						$("#individualOrder input").val("");
						$("#resellerOrder").slideDown();
						break;
				 }
			});
			if (top.location.pathname === '/store/order/new')
			{
				$("#itemCartContainer").hide();
				newItem();
			}
			$("#orderKindSelect").on('change',function()
			{
					var action = parseInt($(this).val());
					var previousValue = $(this).data('previousValue');
					switch (action) {
						case 0:
							// alert('OR');
							$("#countItems").val('0');
							$.ajax({
									url: '/store/loadstoreinventory',
									type: 'GET',
									dataType: 'html',
									beforeSend: function()
									{
											$("#containerLoader").show(250);
											$('input[name=custom_sizing]').iCheck('uncheck');
											$("#customSizeBtn").slideUp();
									},
									success: function(response)
									{
										$("#itemFormContainer").html(response);
										$("#containerLoader").hide(250);
										$("#sizeContainer").slideUp();

									}
								});
							break;
						case 1:
						case 2:
							// alert('PO');
							if (previousValue < 1 )
							{
								$("#countItems").val('0');
								$("#customSizeBtn").slideDown();
								$("#cart").html("");
								$("#itemCartContainer").slideUp();
								$("#itemFormContainer").html('');
								$("#sizeContainer").slideDown();
								newItem();
							}
							break;
						default:
					}
					$(this).data('previousValue',action);
			});
			$("#closeSizeContainer").on('click',function()
			{
				$("#customSizeCard").slideUp();
				$("#order-form").slideDown();
			});
			$(".custom-chk").on('click',function()
			{
				if ($(this).hasClass('active'))
				{
					$("#customSizeCard").slideDown();
					$("#order-form").slideUp();
				}
				else {
					$('input[name=custom_sizing]').iCheck('check');
				}
			});
			$("body").on('submit', '#orderForm', function(event)
			{
					event.preventDefault();
					var form = $(this);
					var action  = form.attr('action');
					var data = form.formSerialize();
					console.log(action);
					Swal.fire({
							title: 'Form Pemesanan',
							text: "pemesanan akan dibuat berdasarkan data ini. Lanjutkan?",
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: "Ya",
							cancelButtonAriaLabel: 'Batal'
					}).then((result) =>
					{
							if (result.value)
							{
								form.ajaxSubmit({
									url:action,
									type: 'POST',
									data : data,
									beforeSend: function()
									{
		              		$("#sectionLoader").show(250);
		           		},
									success : function(response)
									{
										$("#sectionLoader").hide(250);
										var obj = $.parseJSON(response);
										if(obj.error == true)
										{
												Swal.fire(
													'Pemesanan Gagal Dibuat!',
													obj.message,
													'error'
												);
										}
										else {
											Swal.fire(
												'Sukses',
												obj.message,
												'success'
											).then(function (prompt)
											{
											  // if (prompt.value) {
											  //   window.location = obj.redirect;
											  // }
											});
										}
									},error: function(e){
										Swal.fire(
											'Pemesanan Gagal Dibuat!',
											'terjadi kesalahan pada server!',
											'error'
										);
										$("#sectionLoader").hide(250);
									}
								});
							}
					})
			});
  });
</script>
