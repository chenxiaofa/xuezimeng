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
	<div class="col-xs-12" style="display: none;">
		<!-- PAGE CONTENT BEGINS -->

		<div class="row-fluid">
			<ul class="ace-thumbnails">
				<li>
					<a href="assets/images/gallery/image-3.jpg" data-rel="colorbox" class="cboxElement">
						<img alt="150x150" src="assets/images/gallery/thumb-3.jpg">
						<div class="text">
							<div class="inner">Sample Caption on Hover</div>
						</div>
					</a>
					<div class="tools tools-bottom">
						<a href="#"><i class="icon-remove red"></i></a>
					</div>
				</li>

			</ul>
		</div><!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
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