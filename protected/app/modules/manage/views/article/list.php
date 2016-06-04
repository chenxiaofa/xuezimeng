<?php
/** @var integer $type */
?>

<div class="page-header">
	<h1>
		<?php echo \app\models\Articles::tranlateType($type) ?>
		<small>
			<a href="/manage/article/add/<?php echo $type;?>" style="vertical-align: super;" class="btn btn-sm btn-success">
				添加
			</a>
		</small>
	</h1>
</div>

<div class="col-xs-12" id="article-list">

</div>

<script>
	(
		function()
		{
			var table = new Util.RestTable(Api.restArticles(),
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
								var a = $('<a href="javascript:void(0);" target="_blank" style="margin-right: 5px;">编辑</a>').attr('onclick','Util.openSubWindow(\'/manage/article/edit/'+id+'?sub-window=1\')');
								var d = $('<a href="javascript:void(0);" target="_blank" style="margin-right: 5px;">删除</a>').on(
									'click',
									function()
									{
										if (confirm('确认删除吗?'))table.getApi().delete(id,function(){table.reload();});
									}
								);
								return $('<div></div>').append(a).append(d);
							}
						}
					]
				}
			);
		}
	)();
</script>