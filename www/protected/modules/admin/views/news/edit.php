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
    $('#colorpickerField1, #colorpickerField2, #colorpickerField3').ColorPicker({
        onSubmit: function(hsb, hex, rgb, el) {
            $(el).val(hex);
            $(el).ColorPickerHide();
        },
        onBeforeShow: function () {
            $(this).ColorPickerSetColor(this.value);
        }
    })
    .bind('keyup', function(){
        $(this).ColorPickerSetColor(this.value);
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
    'Администратирование'=>array('/ru/admin/'),
    'Новости'=>array('/ru/admin/news/'),
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

    <?php echo $form->errorSummary($news); ?>
<div class="row">
                                <?php echo $form->labelEx($news, 'visibility'); ?>
                                <?php echo $form->checkBox($news, 'visibility'); ?>
                                <?php echo $form->error($news, 'visibility'); ?>
                            </div>
    <table>
        <tr>
            <td>
                <div class="row">
                    <?php echo $form->labelEx($news, 'url'); ?>
                    <?php echo $form->textField($news, 'url'); ?>
                    <?php echo $form->error($news, 'url'); ?>
                </div>
            </td>
            <td>
                <table>
                    <tr>
                        <td>
                            <div class="row">
                                <?php echo $form->labelEx($news, 'in_main'); ?>
                                <?php echo $form->checkBox($news, 'in_main', array('onclick' => 'hideShowBox();', 'id' => 'box-link')); ?>
                                <?php echo $form->error($news, 'in_main'); ?>
                            </div>
                        </td>
                        <td>
                            <div class="row" id="box-field">
                                <?php echo $form->labelEx($news, 'box'); ?>
                                <?php echo $form->textField($news, 'box'); ?>
                                <?php echo $form->error($news, 'box'); ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>

        <tr>
            <td>
                <div class="row">
                    <?php echo $form->labelEx($news, 'menu_name'); ?>
                    <?php echo $form->textField($news, 'menu_name'); ?>
                    <?php echo $form->error($news, 'menu_name'); ?>
                </div>
            </td>
            <td>
                <table>
                    <tr>
                        <td>
                            <div class="row">
                                <?php echo $form->labelEx($news, 'event'); ?>
                                <?php echo $form->checkBox($news, 'event', array('onclick' => 'hideShowEventLink();', 'id' => 'event-link')); ?>
                                <?php echo $form->error($news, 'event'); ?>
                            </div>
                        </td>
                        <td>
                            <div class="row" id="event-link-field">
                                <?php echo $form->labelEx($news, 'link_to_event'); ?>
                                <?php echo $form->textField($news, 'link_to_event'); ?>
                                <?php echo $form->error($news, 'link_to_event'); ?>
                            </div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>    











    <div id="tabs">
        <ul>
            <li><a href="#tabs-content">Контент</a></li>
            <li><a href="#tabs-seo">SEO</a></li>
            <li><a href="#tabs-pic">Картинки</a></li>
            <li><a href="#tabs-add">Дополнительно</a></li>
        </ul>
        <div id="tabs-content">




            <div class="row">
                <?php echo $form->labelEx($news, 'date'); ?>
                <?php echo $form->textField($news, 'date', array('id' => 'datepicker')); ?>
                <?php echo $form->error($news, 'date'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($news, 'color'); ?>
                <?php echo $form->textField($news, 'color', array('id' => 'colorpickerField1')); ?>
                <?php echo $form->error($news, 'color'); ?>
            </div>  

            <div class="row">
                <?php echo $form->labelEx($news, 'h1'); ?>
                <?php echo $form->textField($news, 'h1'); ?>
                <?php echo $form->error($news, 'h1'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($news, 'short_text'); ?>
                <?php echo $form->textArea($news, 'short_text'); ?>
                <?php echo $form->error($news, 'short_text'); ?>
            </div>    

            <div class="row">
                <?php echo $form->labelEx($news, 'text'); ?>
                <?php echo $form->textArea($news, 'text'); ?>
                <?php echo $form->error($news, 'text'); ?>
            </div>





        </div>
        <div id="tabs-seo">
            <div class="row">
                <?php echo $form->labelEx($news, 'meta_title'); ?>
                <?php echo $form->textField($news, 'meta_title'); ?>
                <?php echo $form->error($news, 'meta_title'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($news, 'meta_keywords'); ?>
                <?php echo $form->textField($news, 'meta_keywords'); ?>
                <?php echo $form->error($news, 'meta_keywords'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($news, 'meta_description'); ?>
                <?php echo $form->textField($news, 'meta_description'); ?>
                <?php echo $form->error($news, 'meta_description'); ?>
            </div>

        </div>
        <div id="tabs-pic">
            <p>Mauris eleifend est et turpis. Duis id erat. Suspendisse potenti. Aliquam vulputate, pede vel vehicula accumsan, mi neque rutrum erat, eu congue orci lorem eget lorem. Vestibulum non ante. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Fusce sodales. Quisque eu urna vel enim commodo pellentesque. Praesent eu risus hendrerit ligula tempus pretium. Curabitur lorem enim, pretium nec, feugiat nec, luctus a, lacus.</p>
            <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
        </div>
        <div id="tabs-add">
            <div class="row">
                <?php echo $form->labelEx($news, 'language'); ?>
                <?php echo $form->textField($news, 'language'); ?>
                <?php echo $form->error($news, 'language'); ?>
            </div>
        </div>
    </div>





    <div class="row buttons">
        <?php echo CHtml::submitButton('Отменить'); ?>
        <?php echo CHtml::submitButton('Сохранить'); ?>
        <?php echo CHtml::submitButton('Сохранить и выйти'); ?>
    </div>

    <?php $this->endWidget(); ?>
