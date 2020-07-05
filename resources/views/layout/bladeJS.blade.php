<script type="text/javascript">
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
</script>
<script>
  $(function ()
  {
      $('[data-toggle="tooltip"]').tooltip();
      $('#stokBarang, #stokGudangToko').DataTable({
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
						debug: true,               // show the iframe for debugging
				    importCSS: true,            // import parent page css
				    importStyle: true
					});
			});
  });
</script>
