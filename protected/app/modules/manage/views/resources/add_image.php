<link rel="stylesheet" href="/static/css/dropzone.css" />
<div class="page-header">
	<h1>
		添加图片素材

	</h1>
</div><!-- /.page-header -->
<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->


		<div id="dropzone">
			<form action="/api/resources/upload" class="dropzone">
				<div class="fallback">
					<input name="file" type="file" multiple="" />
				</div>
			</form>
		</div><!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->

</div><!-- /.row -->

<script src="/static/js/dropzone.min.js"></script>

<script type="text/javascript">
	jQuery(function($){

		try {
			$(".dropzone").dropzone({
				paramName: "file", // The name that will be used to transfer the file
				maxFilesize: 10, // MB
				acceptedFiles:'image/*',
				addRemoveLinks : true,
				dictDefaultMessage :
						'<span class="bigger-150 bolder"><i class="icon-caret-right red"></i> 拖拽图片</span> \
						<span class="smaller-80 grey">(或点击选择)</span> <br /> \
						<i class="upload-icon icon-cloud-upload blue icon-3x"></i>'
				,
				dictResponseError: 'Error while uploading file!',

				//change the previewTemplate to use Bootstrap progress bars
				previewTemplate: "<div class=\"dz-preview dz-file-preview\">\n  <div class=\"dz-details\">\n    <div class=\"dz-filename\"><span data-dz-name></span></div>\n    <div class=\"dz-size\" data-dz-size></div>\n    <img data-dz-thumbnail />\n  </div>\n  <div class=\"progress progress-small progress-striped active\"><div class=\"progress-bar progress-bar-success\" data-dz-uploadprogress></div></div>\n  <div class=\"dz-success-mark\"><span></span></div>\n  <div class=\"dz-error-mark\"><span></span></div>\n  <div class=\"dz-error-message\"><span data-dz-errormessage></span></div>\n</div>"
			});
		} catch(e) {
			alert('Dropzone.js does not support older browsers!');
		}

	});
</script>
