<?php
/** @var Articles $model */
	if (empty($model))
	{
		echo '内容不存在';
		return;
	}
?>

<script type="text/javascript" charset="utf-8" src="/static/umeditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/umeditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/static/umeditor/lang/zh-cn/zh-cn.js"></script>
<style>
</style>
<div class="row">

	<div class="col-sm-12">
		<input id="title" placeholder="标题" style="width:100%;padding:5px;margin:10px 0;" value="<?php echo htmlspecialchars($model->title);?>"/>
	</div>
	<div class="col-sm-12">
		<textarea id="editor"><?php echo htmlspecialchars($model->content);?></textarea>
	</div>

	<div class="col-md-12" style="margin-top: 10px;;">
		<button class="btn btn-info" id="save_article" type="button">
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
			function update()
			{

				var title = $('#title').val();
				var content = ue.getContent();
				var id = '<?php echo $model->id?>';

				var api = Api.restArticles();
				api.update(id,
					{
						'title':title,
						content:content
					},success
				);
				function success()
				{
					alert('添加成功');
//					window.location.reload(true);
				}
			}
			$('#save_article').on('click',update);
		}
	);
</script>