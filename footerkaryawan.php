</div>
	</div>
</div>

	<script src="admin/assets/js/bootstrap.min.js"></script>

	<script src="admin/assets/ckeditor/ckeditor.js"></script>

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
</body>
</html>