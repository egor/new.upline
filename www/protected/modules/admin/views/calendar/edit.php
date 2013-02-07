<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/library/jquery-ui-1.9.2.custom/css/ui-lightness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="/library/jquery-ui-1.9.2.custom/development-bundle/ui/i18n/jquery.ui.datepicker-ru.js"></script>
<script>
    $(function() {
        $( "#from" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3,
            onClose: function( selectedDate ) {
                $( "#to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#to" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 3,
            onClose: function( selectedDate ) {
                $( "#from" ).datepicker( "option", "maxDate", selectedDate );
            }
        });

        
        
        $( "#datepicker" ).datepicker($.datepicker.regional[ "ru" ]);
        $( "#tabs" ).tabs();
    });    
</script>

<?php
/* @var $this NewsController */

$this->breadcrumbs = array(
    'Администратирование' => array('/ru/admin/'),
    'Календарь' => array('/ru/admin/calendar/'),
    'Редактирование',
);
?>


<h1>Редактирование</h1>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'news-data-_form-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($calendar); ?>









    <div id="tabs">
        <ul>
            <li><a href="#tabs-content">Контент</a></li>

        </ul>
        <div id="tabs-content">

            <div class="row">
                <?php echo $form->labelEx($calendar, 'visibility'); ?>
                <?php echo $form->checkBox($calendar, 'visibility'); ?>
                <?php echo $form->error($calendar, 'visibility'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($calendar, 'type'); ?>
                <?php echo $form->dropDownList($calendar, 'type', $list, array('empty' => 'Тип события')); ?>                
                <?php echo $form->error($calendar, 'type'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($calendar, 'menu_name'); ?>
                <?php echo $form->textField($calendar, 'menu_name'); ?>
                <?php echo $form->error($calendar, 'menu_name'); ?>
            </div>
                       

            <div class="row">
                <?php echo $form->labelEx($calendar, 'h1'); ?>
                <?php echo $form->textField($calendar, 'h1'); ?>
                <?php echo $form->error($calendar, 'h1'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($calendar, 'short_text'); ?>
                <?php echo $form->textArea($calendar, 'short_text'); ?>
                <?php echo $form->error($calendar, 'short_text'); ?>
            </div>    
            <div class="row">
                <?php echo $form->labelEx($calendar, 'start_date'); ?>
                <?php echo $form->textField($calendar, 'start_date', array('id' => 'from')); ?>
                <?php echo $form->error($calendar, 'start_date'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($calendar, 'end_date'); ?>
                <?php echo $form->textField($calendar, 'end_date', array('id' => 'to')); ?>
                <?php echo $form->error($calendar, 'end_date'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($calendar, 'link_to_event'); ?>
                <?php echo $form->textField($calendar, 'link_to_event'); ?>
                <?php echo $form->error($calendar, 'link_to_event'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($calendar, 'position'); ?>
                <?php echo $form->textField($calendar, 'position'); ?>
                <?php echo $form->error($calendar, 'position'); ?>
            </div>            
            <div class="row">
                <?php echo $form->labelEx($calendar, 'language'); ?>
                <?php echo $form->textField($calendar, 'language'); ?>
                <?php echo $form->error($calendar, 'language'); ?>
            </div>
        </div>
    </div>





    <div class="row buttons">
        <?php echo CHtml::submitButton('Отменить'); ?>
        <?php echo CHtml::submitButton('Сохранить'); ?>
        <?php echo CHtml::submitButton('Сохранить и выйти'); ?>
    </div>

    <?php $this->endWidget(); ?>
