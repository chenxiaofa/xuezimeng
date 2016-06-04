<script type="text/javascript" charset="utf-8" src="/static/umeditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/static/umeditor/ueditor.all.min.js"> </script>
<script type="text/javascript" charset="utf-8" src="/static/umeditor/lang/zh-cn/zh-cn.js"></script>
<style>
	.col-sm-12
	{
		margin:5px 0;
	}
</style>

<div class="page-header">
	<h1>
		添加内容
		<small>
			<?php echo \app\models\Articles::tranlateType($type) ?>
		</small>
	</h1>
</div>
<div class="container" style="text-align: left;margin:0;">
<div class="row">

	<div class="col-sm-12" >
		<input id="title" placeholder="标题" style="width:100%;padding:5px;"/>
	</div>
	<div class="col-sm-12">
		<textarea id="introduction" placeholder="简介" style="width:100%;padding:5px;" ></textarea>
	</div>

	<?php if ($type == 2):
		include 'includes/image_upload.php';
	endif;?>

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
</div>
<script>
	$(document).ready(
		function()
		{
			var ue = UE.getEditor('editor',{});
			ue.addListener( 'ready', function( status ) {
			    var editorDocument = ue.window.document;
				editorDocument.querySelector('body').classNames += ' container';
				ue.setContent('<section class="container"><div class="row"><section class="col-sm-12 maincontent"><h3>关于学子梦培训</h3><p>赣州学子梦是一群具有教育情怀的本地学子创建的教育培训机构，致力帮助更多学子更好地实现升学梦。</p><p>立足会昌、面向赣南，立志打造成集多元化培训、公益咨询、慈善助学为一体的教育培训机构。</p><p>赣州学子梦培训辅导范围包括小学、中学各个学科课程；精准测评、针对不同学生量身定做个性化教育方案，小班制课堂，短期迅速提高学生的学习成绩，培养良好的学习习惯，打破师生代沟，聆听叛逆期孩子的心声。</p></section></div></section>');
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
			var add_article = function()
			{
				var title = $('#title').val();
				var content = ue.getContent();
				var type = '<?php echo $type?>';
				var introduction = $('#introduction').val();
				var api = Api.restArticles();
				api.add(
					{
						title:title,
						content:content,
						type:type,
						image_url:window.image_url,
						introduction:introduction
					},success,failed,failed
				);
				function success()
				{
					alert('添加成功');
					window.location.reload(true);
				}
				function failed()
				{
					alert('保存失败,请重试!')
				}
			};
			$('#add_article').on('click',add_article);
		}
	);
</script>