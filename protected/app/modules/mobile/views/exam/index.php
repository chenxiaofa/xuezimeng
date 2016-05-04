<link rel="stylesheet" href="/static/css/mobile/exam.css">

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">请选择你所处阶段?</h3>
	</div>
	<div class="panel-body weui exam-select-stage">

		<div class="weui_cells weui_cells_access active">
			<a class="weui_cell big-stage" id="h" href="javascript:;">
				<div class="weui_cell_bd weui_cell_primary">
					<p>高中</p>
				</div>
				<div class="weui_cell_ft">
				</div>
			</a>
		</div>


		<!-- 高中 -->
		<div class="weui_cells weui_cells_radio stage-level high-level" style="display: block;" >
			<label class="weui_cell weui_check_label" for="h3">
				<div class="weui_cell_bd weui_cell_primary">
					<p>高三</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check" name="stage-level" id="h3" checked="checked">
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			<label class="weui_cell weui_check_label" for="h2">

				<div class="weui_cell_bd weui_cell_primary">
					<p>高二</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" name="stage-level" class="weui_check" id="h2" >
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			<label class="weui_cell weui_check_label" for="h1">

				<div class="weui_cell_bd weui_cell_primary">
					<p>高一</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" name="stage-level" class="weui_check" id="h1" >
					<span class="weui_icon_checked"></span>
				</div>
			</label>
		</div>




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
		<div class="weui_cells weui_cells_radio stage-level middle-level" style="" >
			<label class="weui_cell weui_check_label" for="m3"">
			<div class="weui_cell_bd weui_cell_primary">
				<p>初三</p>
			</div>
			<div class="weui_cell_ft">
				<input type="radio" class="weui_check" name="stage-level" id="m3">
				<span class="weui_icon_checked"></span>
			</div>
			</label>
			<label class="weui_cell weui_check_label" for="m2">

				<div class="weui_cell_bd weui_cell_primary">
					<p>初二</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" name="stage-level" class="weui_check" id="m2" >
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			<label class="weui_cell weui_check_label" for="m1">

				<div class="weui_cell_bd weui_cell_primary">
					<p>初一</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" name="stage-level" class="weui_check" id="m1" >
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
			<label class="weui_cell weui_check_label" for="p6">
				<div class="weui_cell_bd weui_cell_primary">
					<p>六年级</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" class="weui_check" name="stage-level" id="p6">
					<span class="weui_icon_checked"></span>
				</div>
			</label>
			<label class="weui_cell weui_check_label" for="p5">

				<div class="weui_cell_bd weui_cell_primary">
					<p>五年级</p>
				</div>
				<div class="weui_cell_ft">
					<input type="radio" name="stage-level" class="weui_check" id="p5" >
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
foreach($questions as $q):
	$options = call_user_func($getOptions,$q->id);
	?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title"><?php echo $q->question?></h3>
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
		</div>
	</div>
<?php endforeach; ?>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">你的联系方式</h3>
	</div>
	<div class="panel-body weui">
		<div class="weui_cells weui_cells_form">
			<div class="weui_cell">
				<div class="weui_cell_hd"><label class="weui_label">姓名</label></div>
				<div class="weui_cell_bd weui_cell_primary">
					<input class="weui_input" id="name" type="text"  placeholder="请输入姓名">
				</div>
			</div>

			<div class="weui_cell weui_cell_select weui_select_after">
				<div class="weui_cell_hd">
					<label class="weui_label">性别</label>
				</div>
				<div class="weui_cell_bd weui_cell_primary">
					<select class="weui_select" id="sex" style=" padding-left: 0px;">
						<option value="1">男</option>
						<option value="2">女</option>
						<option value="0">保密</option>
					</select>
				</div>
			</div>

			<div class="weui_cell">
				<div class="weui_cell_hd"><label class="weui_label">年龄</label></div>
				<div class="weui_cell_bd weui_cell_primary">
					<input class="weui_input" id="age" type="number" pattern="[0-9]*" placeholder="年龄">
				</div>
			</div>

			<div class="weui_cell">
				<div class="weui_cell_hd"><label class="weui_label">Q Q</label></div>
				<div class="weui_cell_bd weui_cell_primary">
					<input class="weui_input" id="qq" type="number" pattern="[0-9]*" placeholder="请输入qq号">
				</div>
			</div>
			<div class="weui_cell">
				<div class="weui_cell_hd"><label class="weui_label">手机</label></div>
				<div class="weui_cell_bd weui_cell_primary">
					<input class="weui_input" id="phone" type="number" pattern="[0-9]*" placeholder="请输入号码">
				</div>
			</div>


		</div>
	</div>
</div>


<div class="weui">
	<a href="javascript:;" class="weui_btn weui_btn_primary" id="post">提交</a>
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
	function init()
	{
		var post = $('#post');
		var allStageLevel = $('[name="stage-level"]');
		var loading = $('#loading-toast');
		var complete = $('#complete-toast');
		var waid = '<?php echo $waid ?>';
		var openid = '<?php echo $openid ?>';


		var getStage = function()
		{
			var selected = allStageLevel.filter(':checked').attr('id');
			var map = {
				p5:'5',
				p6:'6',
				m1:'7',
				m2:'8',
				m3:'9',
				h1:'10',
				h2:'11',
				h3:'12'
			};
			if (selected in map)
			{
				return map[selected];
			}
			return false;
		};



		var last = -1;
		$('.big-stage').on('click',
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
						allStageLevel.filter('#p6')[0].checked=true;
						break;
					case 'm':
						stages.filter('.middle-level').show();
						allStageLevel.filter('#m3')[0].checked=true;
						break;
					case 'h':
						stages.filter('.high-level').show();
						allStageLevel.filter('#h3')[0].checked=true;
						break;
				}
			}
		);
		switch(allStageLevel.filter(':checked').attr('id').match(/^(\w)/)[0])
		{
			case 'p':
				$('#p').click();
				break;
			case 'm':
				$('#m').click();
				break;
			case 'h':
				$('#h').click();
				break;
		}


		/**
		 * 提交到后台
		 */
		post.on('click',
			function()
			{
				loading.show();
				var api = Api.apiExamSave(waid,openid);
				var name = $('#name').val();
				var sex = $('#sex').val();
				var age = $('#age').val();
				var phone = $('#phone').val();
				var qq = $('#qq').val();
				api.setCompleteCallback(
					function()
					{
						window.location.href = '/exam/finished';
					}
				);

				api.setPayload('name',name)
					.setPayload('phone',phone)
					.setPayload('sex',sex)
					.setPayload('age',age)
					.setPayload('stage',getStage()
						.setPayload('qoid',$('.question-options').filter(':checked').toArray().map(function(e){return e.getAttribute('data-qoid')}).join(','))
					.send();


			}
		);








	}
	$(init);
</script>