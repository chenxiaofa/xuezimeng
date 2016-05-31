<link rel="stylesheet" href="/static/summernote/summernote.css" >
<script type="application/javascript" src="/static/summernote/summernote.js"></script>
<style>
	#summernote
	{
	}
</style>
<div id="summernote"></div>
<div class="clearfix form-actions">
	<div class="col-md-12">
		<button class="btn btn-info" id="add_article" type="button">
			<i class="icon-ok bigger-110"></i>
			保存
		</button>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#summernote').summernote(
			{
				popover: {
					image: [
						['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
						['float', ['floatLeft', 'floatRight', 'floatNone']],
						['remove', ['removeMedia']]
					],
					link: [
						['link', ['linkDialogShow', 'unlink']]
					],
					air: [
						['color', ['color']],
						['font', ['bold', 'underline', 'clear']],
						['para', ['ul', 'paragraph']],
						['table', ['table']],
						['insert', ['link', 'picture']]
					]
				},
				height:'600',
				bottom:0
			}
		);
	});
</script>