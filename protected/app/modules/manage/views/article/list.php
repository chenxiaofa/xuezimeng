
<div class="col-xs-12">
	<h3 class="header smaller lighter green">
		<a href="/manage/article/add/1" class="btn btn-app btn-success">
			添加
		</a>
	</h3>

</div>
<div class="col-xs-12" id="article-list">

</div>

<script>
	(
		function()
		{
			new Util.RestTable(Api.restArticles(),
				{
					'edit':false,
					'fixed_condition':{'status':1},
					'container':'#article-list',
					'primary_key':'id',
					'header':[
						{'element':'#'},
						{'element':'标题','class':'c'},
						{'element':'类型','class':'c'},
						{'element':'状态','class':'c'},
						{'element':'时间','class':'r'},
						{'element':'操作','class':'r'},
					],
					'data_map':[
						{'key':'id'}
					]
				}
			);
		}
	)();
</script>