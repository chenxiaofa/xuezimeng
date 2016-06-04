<div class="page-header">
	<h1>
		图片素材管理
		<small>
			<a href="javascript:void(0);">添加新图片</a>
		</small>
	</h1>
</div><!-- /.page-header -->
<div class="row">

	<div class="col-xs-12" id="resource-list">
	</div>
</div>
<script>
	(
		function($)
		{
			function init()
			{
				new Util.imageGallery(
					{
						'container':'#resource-list',
						'page_size':20
					}
				);
			}
			$(init);
		}
	)(window.jQuery);
</script>