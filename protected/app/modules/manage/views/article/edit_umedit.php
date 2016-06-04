<?php

use app\models\Articles;
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

<div class="page-header">
	<h1>
		编辑内容
		<small>
			<?php echo $model->getTypeText() ?>
		</small>
	</h1>
</div>
<div class="row">

	<div class="col-sm-12">
		<input id="title" placeholder="标题" style="width:1240px;padding:5px;margin:10px 0;" value="<?php echo htmlspecialchars($model->title);?>"/>
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
			ue.addListener( 'ready', function( status ) {
				var editorDocument = ue.window.document;
				$.each([
							'/assets/css/bootstrap.min.css',
							'/assets/css/font-awesome.min.css',
							'/assets/css/bootstrap-theme.css',
							'/assets/css/style.css'
						],
						function(k,v)
						{
							var linkNode1 = editorDocument.createElement('link');
							linkNode1.setAttribute('rel','stylesheet');
							linkNode1.setAttribute('type','text/css');
							linkNode1.setAttribute('href',v);
							editorDocument.querySelector('head').appendChild(linkNode1);
						}
				);

			} );


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
					window.close();
				}
			}
			$('#save_article').on('click',update);
		}
	);
</script>