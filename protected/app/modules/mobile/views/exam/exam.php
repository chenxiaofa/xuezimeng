<link rel="stylesheet" href="/static/css/mobile/exam.css">

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
					<input type="checkbox" class="weui_check" name="option-fot-question-<?php echo $q->id;?>" id="option-<?php echo $op->id;?>" >
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
					<input type="radio" class="weui_check" name="option-fot-question-<?php echo $q->id;?>" id="option-<?php echo $op->id;?>">
					<span class="weui_icon_checked"></span>
				</div>
			</label>
		<?php endforeach;?>
		</div>
	<?php endif;?>
	</div>
</div>
<?php endforeach; ?>
<div class="weui">
	<a href="javascript:;" class="weui_btn weui_btn_primary" id="next">下一步</a>
</div>
