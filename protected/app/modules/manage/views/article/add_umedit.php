<script type="text/javascript" charset="utf-8" src="/static/umeditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/umeditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/static/umeditor/lang/zh-cn/zh-cn.js"></script>
<style>
</style>
<div class="row">

	<div class="col-sm-12">
		<input id="title" placeholder="标题" style="width:100%;padding:5px;margin:10px 0;"/>
	</div>
	<div class="col-sm-12">
		<textarea id="editor"></textarea>
	</div>

	<div class="col-md-12" style="margin-top: 10px;;">
		<button class="btn btn-info" id="add_article" type="button">
			<i class="icon-ok bigger-110"></i>
			保存
		</button>
	</div>
</div>

<script>
	$(document).ready(
		function()
		{
			var ue = UE.getEditor('editor',{});

			var add_article = function()
			{
				var title = $('#title').val();
				var content = ue.getContent();
				var type = '<?php echo $type?>';

				var api = Api.restArticles();
				api.add(
					{
						'title':title,
						content:content,
						type:type
					}
				)
			};
			$('#add_article').on('click',add_article);
		}
	);
</script>