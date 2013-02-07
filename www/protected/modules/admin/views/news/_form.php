<?php
/* @var $this NewsDataController */
/* @var $model NewsData */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'news-data-_form-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'visibility'); ?>
		<?php echo $form->textField($model,'visibility'); ?>
		<?php echo $form->error($model,'visibility'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'in_main'); ?>
		<?php echo $form->textField($model,'in_main'); ?>
		<?php echo $form->error($model,'in_main'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'box'); ?>
		<?php echo $form->textField($model,'box'); ?>
		<?php echo $form->error($model,'box'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event'); ?>
		<?php echo $form->textField($model,'event'); ?>
		<?php echo $form->error($model,'event'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'menu_name'); ?>
		<?php echo $form->textField($model,'menu_name'); ?>
		<?php echo $form->error($model,'menu_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'meta_title'); ?>
		<?php echo $form->textField($model,'meta_title'); ?>
		<?php echo $form->error($model,'meta_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h1'); ?>
		<?php echo $form->textField($model,'h1'); ?>
		<?php echo $form->error($model,'h1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_link'); ?>
		<?php echo $form->textField($model,'event_link'); ?>
		<?php echo $form->error($model,'event_link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php echo $form->textField($model,'language'); ?>
		<?php echo $form->error($model,'language'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'news_primary_id'); ?>
		<?php echo $form->textField($model,'news_primary_id'); ?>
		<?php echo $form->error($model,'news_primary_id'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->