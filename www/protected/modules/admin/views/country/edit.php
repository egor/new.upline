<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/library/jquery-ui-1.9.2.custom/css/ui-lightness/jquery-ui-1.9.2.custom.css" />
<script type="text/javascript" src="/library/jquery-ui-1.9.2.custom/development-bundle/ui/i18n/jquery.ui.datepicker-ru.js"></script>
<script>
    $(function() {
        $( "#tabs" ).tabs();
    });
</script>
<?php
$this->breadcrumbs = array(
    'Администратирование'=>array('/ru/admin/'),
    'Новости'=>array('/ru/admin/news/'),
    'Редактирование',
);
?>
<h1>Редактирование</h1>
<div class="form">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'country-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>
<div class="row">
                                <?php echo $form->labelEx($model, 'position'); ?>
                                <?php echo $form->textField($model, 'position'); ?>
                                <?php echo $form->error($model, 'position'); ?>
                            </div>
   
<div id="tabs">
    <ul>
        <?php
        foreach (Yii::app()->params['siteLanguage'] as $key => $value) {
            echo '<li><a href="#tabs-' . $key . '">' . $value['name'] . '</a></li>';
        }
        ?>
    </ul>
    <?php
    foreach (Yii::app()->params['siteLanguage'] as $key => $value) {
        echo '<div id="tabs-' . $key . '"><div class="row">'.
            $form->labelEx($model, 'name_'.$key).
            $form->textField($model, 'name_'.$key).
            $form->error($model, 'name_'.$key).'</div></div>';
    }
    ?>
</div>
<div class="row buttons">
    <?php echo CHtml::submitButton('Отменить'); ?>
    <?php echo CHtml::submitButton('Сохранить'); ?>
    <?php echo CHtml::submitButton('Сохранить и выйти'); ?>
</div>
<?php $this->endWidget(); ?>