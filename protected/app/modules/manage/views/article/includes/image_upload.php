<div class="col-sm-12">
	<link rel="stylesheet" href="/static/css/dropzone.css" />
	<div class="widget-box collapsed" style="width:1240px;">
		<div class="widget-header">
			<h4>标题配图</h4>
			<span class="widget-toolbar"><a href="#" data-action="collapse"><i class="icon-chevron-up"></i></a>	</span>
		</div>
		<div class="widget-body">
			<div class="widget-main" >
				<div class="tabbable">
					<ul class="nav nav-tabs" id="myTab">
						<li class="active">
							<a data-toggle="tab" href="#used_exists">
								<i class="green icon-cloud-download bigger-110"></i>
								使用已上传素材
							</a>
						</li>
						<li class="">
							<a data-toggle="tab" href="#upload_new_image">
								<i class="green icon-cloud-upload bigger-110"></i>
								上传新图片
							</a>
						</li>



					</ul>

					<div class="tab-content">
						<div id="used_exists" class="tab-pane active">
							<div class="col-xs-12" id="resource-list">
							</div>
						</div>
						<div id="upload_new_image" class="tab-pane ">
							<div>*只能上传一个图片</div>
							<div id="dropzone">
								<form action="/api/resources/upload" class="dropzone">
									<div class="fallback">
										<input name="file" type="file" multiple="" />
									</div>
								</form>
							</div><!-- PAGE CONTENT ENDS -->
						</div>



					</div>
				</div>



			</div>
		</div>
	</div>
</div>

<script src="/static/js/dropzone.min.js"></script>
<script>
	(
			function($)
			{
				window.image_url = '';
				function init()
				{
					new Util.imageGallery(
							{
								'container':'#resource-list',
								'page_size':10,
								rowMaker:rowMaker
							}
					);
					function rowMaker(data)
					{
						var ele = $(
								'<li>' +
								'<a href="javascript:void(0);" data-rel="colorbox" class="cboxElement">'+
								'<img style="max-width:150px;max-height:150px;" alt="150x150" src="'+data.url+'">'+
								'<div class="text">'+
								'<div class="inner">'+data.name+'</div>'+
								'</div>'+
								'<div class="text selected-mask" id="selected-mask" style="opacity: 1;display: none;" >'+
								'<div class="inner"><i class="icon-ok bigger-230" ></i></div>'+
								'</div>'+
								'</a>'+
								'</li>'
						);
						var selected = false;
						var mask = ele.find('#selected-mask');
						ele.on('click',
								function()
								{
									if (!mask.is(':visible'))
									{
										$('#resource-list').find('.selected-mask').hide();
										mask.show();
										window.image_url = data.url;
									}
									else
									{
										$('#resource-list').find('.selected-mask').hide();
										window.image_url = '';
									}

								}
						);
						return ele;
					};
					try {
						$(".dropzone").dropzone({
							paramName: "file", // The name that will be used to transfer the file
							maxFilesize: 10, // MB
							maxFiles:1,
							acceptedFiles:'image/*',
							addRemoveLinks : true,
							dictDefaultMessage :'<span class="bigger-150 bolder"><i class="icon-caret-right red"></i> 拖拽图片</span> \
									<span class="smaller-80 grey">(或点击选择)</span> <br /> \
									<i class="upload-icon icon-cloud-upload blue icon-3x"></i>',
							dictResponseError: 'Error while uploading file!',

							//change the previewTemplate to use Bootstrap progress bars
							previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"progress progress-small progress-striped active\"><div class=\"progress-bar progress-bar-success\" data-dz-uploadprogress></div></div>\n  <div class=\"dz-success-mark\"><span></span></div>\n  <div class=\"dz-error-mark\"><span></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>"
						}).on('success',
							function(file,response)
							{
								console.log(response)
								window.image_url = response['url'];
							}
						);
					} catch(e) {
					}
				}

				$(init);
			}
	)(window.jQuery);
</script>