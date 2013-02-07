<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/library/jquery-ui-1.9.2.custom/css/ui-lightness/jquery-ui-1.9.2.custom.css" />
<link rel="stylesheet" href="/css/colorpicker/colorpicker.css" type="text/css" />
<script type="text/javascript" src="/js/colorpicker/colorpicker.js"></script>
<script type="text/javascript" src="/js/colorpicker/eye.js"></script>
<script type="text/javascript" src="/js/colorpicker/utils.js"></script>
<script type="text/javascript" src="/js/colorpicker/layout.js?ver=1.0.2"></script>
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
    });
</script>
<script>
    $(function() {
        hideShowEventLink();
        hideShowBox();
        $( "#datepicker" ).datepicker($.datepicker.regional[ "ru" ]);
        $( "#tabs" ).tabs();
    });
    
    function hideShowEventLink() {
        if ($('#event-link').is(':checked')) {
            $('#event-link-field').show();
        } else {
            $('#event-link-field').hide();
        } 
    }
    function hideShowBox() {
        if ($('#box-link').is(':checked')) {
            $('#box-field').show();
        } else {
            $('#box-field').hide();
        } 
    }

</script>

<?php
/* @var $this NewsController */

$this->breadcrumbs = array(
    'Администратирование' => array('/ru/admin/'),
    'Типы событий' => array('/ru/admin/eventType/'),
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

    <?php echo $form->errorSummary($model); ?>











    <div id="tabs">
        <ul>
            <li><a href="#tabs-content">Контент</a></li>

        </ul>
        <div id="tabs-content">

            

            
            <div class="row">
                <?php echo $form->labelEx($model, 'name'); ?>
                <?php echo $form->textField($model, 'name'); ?>
                <?php echo $form->error($model, 'name'); ?>
            </div>

<div class="row">
                <?php echo $form->labelEx($model, 'description'); ?>
                <?php echo $form->textArea($model, 'description'); ?>
                <?php echo $form->error($model, 'description'); ?>
            </div>



            
            <div class="row">
                <?php echo $form->labelEx($model, 'color'); ?>
                <?php echo $form->textField($model, 'color', array('id' => 'colorpickerField1')); ?>
                <?php echo $form->error($model, 'color'); ?>
            </div>  

            <div class="row">
                <?php echo $form->labelEx($model, 'position'); ?>
                <?php echo $form->textField($model, 'position'); ?>
                <?php echo $form->error($model, 'position'); ?>
            </div> 
            
        </div>
    </div>





    <div class="row buttons">
        <?php echo CHtml::submitButton('Отменить'); ?>
        <?php echo CHtml::submitButton('Сохранить'); ?>
        <?php echo CHtml::submitButton('Сохранить и выйти'); ?>
    </div>

    <?php $this->endWidget(); ?>
