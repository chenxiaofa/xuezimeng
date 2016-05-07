<div id="exam-session-list">

</div>

<script>
	(
		function()
		{
			new Util.RestTable(Api.restApiExamSession(),
				{
					'edit':false,
					'fixed_condition':{'status':1},
					'container':'#exam-session-list',
					'primary_key':'id',
					'header':[
						{'element':'#'},
						{'element':'姓名','class':'c'},
						{'element':'学校','class':'c'},
						{'element':'电话','class':'r'},
						{'element':'QQ、微信','class':'r'},
						{'element':'学习遇到的困难','class':'h'},
						{'element':'时间','class':'r'}
					],
					'data_map':[
						{'key':'id'},
						{'key':'name','class':'c'},
						{'key':'school','class':'c'},
						{'key':'phone','class':'r'},
						{'key':'qq','class':'r'},
						{'key':'options','class':'h',format:
							function(data)
							{
								var content = $('<div>');
								$.each(data,
									function(key,value)
									{
										$('<div>').text(key+':'+value.join(',')+';').appendTo(content);
									}
								);
								return content;
							}
						},
						{'key':'exam_time','class':'r'}
					]
				}
			);
		}
	)();
</script>