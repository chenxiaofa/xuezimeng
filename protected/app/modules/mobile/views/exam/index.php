<link rel="stylesheet" href="/static/css/mobile/exam.css?20160505">


<div class="panel panel-default steps" data-step="1">
	<div class="panel-heading">
		<h3 class="panel-title">1.你现在读几年级？</h3>
	</div>
	<div class="panel-body weui exam-select-stage">


		<div class="weui_cells weui_cells_access">
			<a class="weui_cell  big-stage" id="m" href="javascript:;">
				<div class="weui_cell_bd weui_cell_primary">
					<p>初中</p>
				</div>
				<div class="weui_cell_ft">
				</div>
			</a>
		</div>


		<!-- 初中 -->
		<div class="weui_cells weui_cells_radio stage-level middle-level"  >
			<label class="weui_cell weui_check_label" for="m1">

				<div class="weui_cell_bd weui_cell_primary">
					<p>初一</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" name="stage-level" class="weui_check" id="m1" data-stage="7" >
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			<label class="weui_cell weui_check_label" for="m2">

				<div class="weui_cell_bd weui_cell_primary">
					<p>初二</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" name="stage-level" class="weui_check" id="m2"  data-stage="8">
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			<label class="weui_cell weui_check_label" for="m3"">
				<div class="weui_cell_bd weui_cell_primary">
					<p>初三</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check" name="stage-level" id="m3" data-stage="9">
					<span class="weui_icon_checked"></span>
				</div>
			</label>
		</div>







		<div class="weui_cells weui_cells_access">
			<a class="weui_cell  big-stage" id="p" href="javascript:;">
				<div class="weui_cell_bd weui_cell_primary">
					<p>小学</p>
				</div>
				<div class="weui_cell_ft">
				</div>
			</a>
		</div>



		<!-- 小学 -->
		<div class="weui_cells weui_cells_radio stage-level primary-level" style="" >
			<label class="weui_cell weui_check_label" for="p4">

				<div class="weui_cell_bd weui_cell_primary">
					<p>四年级</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" name="stage-level" class="weui_check" id="p4" data-stage="4" >
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			<label class="weui_cell weui_check_label" for="p5">

				<div class="weui_cell_bd weui_cell_primary">
					<p>五年级</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" name="stage-level" class="weui_check" id="p5" data-stage="5" >
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			<label class="weui_cell weui_check_label" for="p6">
				<div class="weui_cell_bd weui_cell_primary">
					<p>六年级</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check" name="stage-level" id="p6" data-stage="6">
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			<label class="weui_cell weui_check_label" for="p3">

				<div class="weui_cell_bd weui_cell_primary">
					<p>1-3年级</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" name="stage-level" class="weui_check" id="p3" data-stage="3" >
					<span class="weui_icon_checked"></span>
				</div>
			</label>
		</div>




<!--		<div class="weui_cells weui_cells_access ">-->
<!--			<a class="weui_cell big-stage" id="h" href="javascript:;">-->
<!--				<div class="weui_cell_bd weui_cell_primary">-->
<!--					<p>高中</p>-->
<!--				</div>-->
<!--				<div class="weui_cell_ft">-->
<!--				</div>-->
<!--			</a>-->
<!--		</div>-->
		<!-- 高中 -->
		<div class="weui_cells weui_cells_radio " >
			<label class="weui_cell weui_check_label" for="h3">
				<div class="weui_cell_bd weui_cell_primary">
					<p style=" font-weight: normal;">高中</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check" name="stage-level" id="h3" data-stage="12" >
					<span class="weui_icon_checked"></span>
				</div>
			</label>
		</div>


	</div>

</div>


<?php
/** @var  array $questions */
/** @var  callable $getOptions */
/** @var  \app\models\ExamQuestions $q */
/** @var  \app\models\ExamQuestionOptions $op */
$step = 1;
foreach($questions as $q):
	$options = call_user_func($getOptions,$q->id);
	$step++;
	?>
	<div class="panel panel-default steps" style="display: none;" data-step="<?php echo $step?>">
		<div class="panel-heading">
			<img class="go_back_btn" src="/static/images/icon_back_n.png"><h3 class="panel-title" style="display: inline;"><?php echo $step?>.<?php echo $q->question?>(可多选)</h3>
		</div>
		<div class="panel-body weui">
			<?php if ($q->type == $q::QUESTION_TYPE_MULTIPLE_SELECT ):?>
				<div class="weui_cells weui_cells_checkbox">
					<?php foreach($options as $op):?>
						<label class="weui_cell weui_check_label" for="option-<?php echo $op->id;?>">
							<div class="weui_cell_hd">
								<input type="checkbox" class="weui_check question-options" data-qoid="<?php echo $op->id;?>" name="option-fot-question-<?php echo $q->id;?>" id="option-<?php echo $op->id;?>" >
								<i class="weui_icon_checked"></i>
							</div>
							<div class="weui_cell_bd weui_cell_primary">
								<p><?php echo $op->content;?></p>
							</div>
						</label>
					<?php endforeach;?>
				</div>
			<?php endif;?>
			<?php if ($q->type == $q::QUESTION_TYPE_SINGLE_SELECT ):?>
				<div class="weui_cells weui_cells_radio">
					<?php foreach($options as $op):?>
						<label class="weui_cell weui_check_label" for="option-<?php echo $op->id;?>">
							<div class="weui_cell_bd weui_cell_primary">
								<p><?php echo $op->content;?></p>
							</div>
							<div class="weui_cell_ft">
								<input type="radio" class="weui_check question-options" data-qoid="<?php echo $op->id;?>" name="option-fot-question-<?php echo $q->id;?>" id="option-<?php echo $op->id;?>">
								<span class="weui_icon_checked"></span>
							</div>
						</label>
					<?php endforeach;?>
				</div>
			<?php endif;?>
			<?php if ($q->type == $q::QUESTION_TYPE_FILL ):?>
				<div class="weui_cell">
					<div class="weui_cell_bd weui_cell_primary">
						<textarea class="weui_textarea fillable-options" data-eqid="<?php echo $q->id;?>" placeholder="<?php echo $q->placeholder;?>" rows="4"></textarea>
					</div>
				</div>
			<?php endif;?>
		</div>
	</div>
<?php endforeach; ?>

<div class="panel panel-default steps" style="display: none;" data-step="<?php echo ++$step?>">
	<div class="panel-heading">
		<img class="go_back_btn" src="/static/images/icon_back_n.png"><h3 class="panel-title">你的联系方式</h3>
	</div>
	<div class="panel-body weui">
		<div class="weui_cells weui_cells_form">
			<!--姓名-->
			<div class="weui_cell">
				<div class="weui_cell_hd"><label class="weui_label" style="margin-bottom: 0;width:5em;text-align: right;">姓&nbsp;&nbsp;&nbsp;&nbsp;名</label></div>
				<div class="weui_cell_bd weui_cell_primary">
					<input class="weui_input" id="name" type="text"  placeholder="请输入姓名">
				</div>
			</div>

			<!--学校-->
			<div class="weui_cell">
				<div class="weui_cell_hd"><label class="weui_label" style="margin-bottom: 0;width:5em;text-align: right;">学&nbsp;&nbsp;&nbsp;&nbsp;校</label></div>
				<div class="weui_cell_bd weui_cell_primary">
					<input class="weui_input" id="school" type="text"  placeholder="请填写学校">
				</div>
			</div>

			<!--班级-->
<!--			<div class="weui_cell">-->
<!--				<div class="weui_cell_hd"><label class="weui_label">班级</label></div>-->
<!--				<div class="weui_cell_bd weui_cell_primary">-->
<!--					<input class="weui_input" id="class" type="text"  placeholder="请填写班级">-->
<!--				</div>-->
<!--			</div>-->


<!--			<div class="weui_cell weui_cell_select weui_select_after">-->
<!--				<div class="weui_cell_hd">-->
<!--					<label class="weui_label">性别</label>-->
<!--				</div>-->
<!--				<div class="weui_cell_bd weui_cell_primary">-->
<!--					<select class="weui_select" id="sex" style=" padding-left: 0px;">-->
<!--						<option value="1">男</option>-->
<!--						<option value="2">女</option>-->
<!--						<option value="0">保密</option>-->
<!--					</select>-->
<!--				</div>-->
<!--			</div>-->

<!--			<div class="weui_cell">-->
<!--				<div class="weui_cell_hd"><label class="weui_label">年龄</label></div>-->
<!--				<div class="weui_cell_bd weui_cell_primary">-->
<!--					<input class="weui_input" id="age" type="number" pattern="[0-9]*" placeholder="年龄">-->
<!--				</div>-->
<!--			</div>-->

			<div class="weui_cell">
				<div class="weui_cell_hd"><label class="weui_label" style="margin-bottom: 0;width:5em;text-align: right;">QQ、微信</label></div>
				<div class="weui_cell_bd weui_cell_primary">
					<input class="weui_input" id="qq" type="number" placeholder="请填写QQ或微信号">
				</div>
			</div>
			<div class="weui_cell">
				<div class="weui_cell_hd"><label class="weui_label" style="margin-bottom: 0;width:5em;text-align: right;">联系方式</label></div>
				<div class="weui_cell_bd weui_cell_primary">
					<input class="weui_input" id="phone" type="number" pattern="[0-9]*" placeholder="请填写手机号码">
				</div>
			</div>


		</div>
	</div>
</div>


<div class="weui btn-container" >
	<a href="javascript:;" class="weui_btn weui_btn_primary" id="next">下一步</a>
</div>

<div class="weui btn-container" >
	<a href="javascript:;" class="weui_btn weui_btn_primary" style="display: none;" id="post">提交</a>
</div>

<div id="loading-toast" class="weui_loading_toast" style="display:none;">
	<div class="weui_mask_transparent"></div>
	<div class="weui_toast">
		<div class="weui_loading">
			<div class="weui_loading_leaf weui_loading_leaf_0"></div>
			<div class="weui_loading_leaf weui_loading_leaf_1"></div>
			<div class="weui_loading_leaf weui_loading_leaf_2"></div>
			<div class="weui_loading_leaf weui_loading_leaf_3"></div>
			<div class="weui_loading_leaf weui_loading_leaf_4"></div>
			<div class="weui_loading_leaf weui_loading_leaf_5"></div>
			<div class="weui_loading_leaf weui_loading_leaf_6"></div>
			<div class="weui_loading_leaf weui_loading_leaf_7"></div>
			<div class="weui_loading_leaf weui_loading_leaf_8"></div>
			<div class="weui_loading_leaf weui_loading_leaf_9"></div>
			<div class="weui_loading_leaf weui_loading_leaf_10"></div>
			<div class="weui_loading_leaf weui_loading_leaf_11"></div>
		</div>
		<p class="weui_toast_content">提交中</p>
	</div>
</div>
<script>
	function _alert(content,title)
	{
		var dlg = $('<div class="weui_dialog_alert" id="dialog" ><div class="weui_mask"></div><div class="weui_dialog"><div class="weui_dialog_hd"><strong class="weui_dialog_title"></strong></div><div class="weui_dialog_bd"><p class="weui_dialog_content"></p></div><div class="weui_dialog_ft"><a href="javascript:;" class="weui_btn_dialog primary">确定</a></div></div></div>');
		dlg.appendTo('body');
		dlg.find('.weui_btn_dialog').on('click',function(){dlg.remove();});
		dlg.find('.weui_dialog_title').html(title);
		dlg.find('.weui_dialog_content').html(content);

	}
	function init()
	{
		var post = $('#post');
		var next = $('#next');
		var prev = $('.go_back_btn');
		var allStageLevel = $('[name="stage-level"]');
		var loading = $('#loading-toast');
		var complete = $('#complete-toast');
		var waid = '<?php echo $waid ?>';
		var openid = '<?php echo $openid ?>';
		var currStep = 0;
		var lastStep = parseInt('<?php echo $step;?>',10);
		prev.on('click',
			function()
			{
				currStep--;
				$('.steps').hide().filter('[data-step="%step%"]'.replace('%step%',currStep)).show();
				next.show();
				post.hide();
			}
		);
		next.on('click',
			function()
			{
				if (currStep == 1)
				{
					if (getStage() === false)
					{
						_alert('请告诉我们你读几年级','完善信息');
						return;
					}
				}
				currStep++;
				$('.steps').hide().filter('[data-step="%step%"]'.replace('%step%',currStep)).show();
				if (currStep == lastStep)
				{
					next.hide();
					post.show();
				}
			}
		).trigger('click');

		var getStage = function()
		{
			var selected = allStageLevel.filter(':checked');
			if (selected.length)
			{
				return selected.attr('data-stage');
			}
			return false;
		};

		window.getStage = getStage;

		var last = -1;
		$('.big-stage,#h3').on('click',
			function()
			{
				var now = this.getAttribute('id');
				if (now == last)
				{
					return
				}
				last = now;
				var stages = $('.stage-level').hide();
				allStageLevel.map(function(i,e){e.checked=false;});
				$('.weui_cells_access').removeClass('active');
				$(this).parents('.weui_cells_access').addClass('active');
				switch(now)
				{
					case 'p':
						stages.filter('.primary-level').show();
						allStageLevel.filter('#p4')[0].checked=true;
						break;
					case 'm':
						stages.filter('.middle-level').show();
						allStageLevel.filter('#m1')[0].checked=true;
						break;
					case 'h3':
						stages.filter('.high-level').show();
						allStageLevel.filter('#h3')[0].checked=true;
						break;
				}
			}
		);
		var pre = getStage();
		switch(pre)
		{
			case '5':case '6':				$('#p').click();break;
			case '7':case '8':case '9':	$('#m').click();break;
			case '10':case '11':case '12':	$('#h').click();break;
		}


		/**
		 * 提交到后台
		 */
		post.on('click',
			function()
			{

				var api = Api.apiExamSave(waid,openid);
				var name = $('#name').val();
				var school = $('#school').val();
				var classText = $('#class').val();
				var phone = $('#phone').val();
				var fillable = {};
				var qq = $('#qq').val();
				var eqoid = $('.question-options').filter(':checked').toArray().map(function(e){return e.getAttribute('data-qoid')}).join(',');

				$('.fillable-options').each(
					function(i,e)
					{
						fillable[e.getAttribute('data-eqid')] = this.value;
					}
				);

				api.setCompleteCallback(
					function()
					{
						loading.hide();
					}
				);
				api.setSuccessCallback(
					function()
					{
						window.location.href = '/survey/finished';
					}
				);
				api.setFailedCallback(
					function()
					{
						alert('网络错误,请重试');
					}
				);
				api.setBeforeSendCallback(
					function()
					{
						loading.show();
					}
				);
				if (!qq && !phone)
				{
					_alert('请至少留下QQ号码、微信号或者手机号码,方便老师跟着你的情况','完善信息');
					return;
				}

				api.setPayload('name',name)
					.setPayload('phone',phone)
					.setPayload('school',school)
					.setPayload('class',classText)
					.setPayload('qq',qq)
					.setPayload('stage',getStage())
					.setPayload('fillable',fillable)
						.setPayload('eqoid',eqoid)
					.send();
			}
		);








	}
	$(init);
</script>