<div id="exam-session-list">

</div>

<script>
	(
		function()
		{
			var stageMap = {
				1:'1-3年级',
				2:'1-3年级',
				3:'1-3年级',
				4:'四年级',
				5:'五年级',
				6:'六年级',
				7:'初一',
				8:'初二',
				9:'初三',
				11:'高中',
				12:'高中',
				10:'高中'
			};
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
						{'element':'年级','class':'c'},
						{'element':'电话','class':'r'},
						{'element':'QQ、微信','class':'r'},
						{'element':'学习遇到的困难','class':'h'},
						{'element':'留言','class':'h'},
						{'element':'时间','class':'r'}
					],
					'data_map':[
						{'key':'id'},
						{'key':'name','class':'c'},
						{'key':'school','class':'c'},
						{'key':'stage','class':'c','format':
							function(data)
							{
								console.log(data)
								if (data in stageMap)
								{
									return stageMap[data];
								}
								return '';
							}
						},
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

						{'key':'message','class':'r'},
						{'key':'exam_time','class':'r'}
					]
				}
			);
		}
	)();
</script>