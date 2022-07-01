</div>
</div>
</div>


<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script>
	$(document).ready(function() {
		$('#table-data-admin').DataTable();
	} );
</script>

<script src="assets/ckeditor/ckeditor.js"></script>

<script>
	$(window).bind("load resize", function()
	{
		if($(this).width() < 768)
		{
			$('div.sidebar-collapse').addClass('collapse')
		}
		else
		{
			$('div.sidebar-collapse').removeClass('collapse')
		}
	});


	CKEDITOR.replace( 'editor', {
		height: 400
	} );
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("input[name=tgl_lahir]").on("change", function(){
			var tanggal_lahir = $("input[name=tgl_lahir]").val();
			if (tanggal_lahir > "2000-01-01") {
				$("input[name=tgl_lahir]").val(0);
				alert("Tanggal Lahir Tidak Valid");
			}
		})
	})
</script>
</body>
</html>

