<?php
/** @var integer $type */
?>
<div class="col-xs-12">
	<h3 class="header smaller lighter green">
		<a href="/manage/article/add/<?php echo $type;?>" class="btn btn-app btn-success">
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
					'fixed_condition':{'status':1,'type':'<?php echo $type;?>'},
					'container':'#article-list',
					'primary_key':'id',
					'header':[

						{'element':'标题','class':'c'},
						{'element':'最后修改时间','class':'r'},
						{'element':'操作','class':'r'}
					],
					'data_map':[

						{'key':'title'},
						{'key':'create_time','class':'r'},
						{'key':'id','class':'',
							format:function(id,row)
							{
								var a = $('<a href="" target="_blank" style="margin-right: 5px;">编辑</a>').attr('href','/manage/article/edit/'+id);
								return a;
							}
						}
					]
				}
			);
		}
	)();
</script>