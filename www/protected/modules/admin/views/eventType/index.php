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

    $(function() {
        $( "#tabs" ).tabs();
    });
</script>
<?php
/* @var $this EventTypeController */

$this->breadcrumbs = array(
    'Администратирование' => array('/ru/admin/'),
    'Календарь' => array('/ru/admin/calendar/'),
    'Типы событий',
);
?>

<h1>Типы событий</h1>
<div id="tabs">
    <ul>
        <?php
//Ссылки на другие языки
        foreach (Yii::app()->params['siteLanguage'] as $key => $value) {
            //echo '<a href="/ru/admin/news/edit/'.$model->news_primary_id.'/?lang='.$key.'" '.($_GET['lang'] == $key? ' class="current" ' : '').'>'.$value['name'].'</a> ';
            echo '<li><a href="#tabs-' . $key . '">' . $value['name'] . '</a></li>';
        }
        ?>
    </ul>
    <?php
//Ссылки на другие языки
    foreach (Yii::app()->params['siteLanguage'] as $key => $value) {
        //echo '<a href="/ru/admin/news/edit/'.$model->news_primary_id.'/?lang='.$key.'" '.($_GET['lang'] == $key? ' class="current" ' : '').'>'.$value['name'].'</a> ';
        echo '<div id="tabs-' . $key . '">
    <p><a href="/ru/admin/eventType/add/' . $key . '">Добавить тип события</a></p>
';
        if (!empty($model[$key])) {
            echo '<table>';
            foreach ($model[$key] as $val) {
                echo '<tr>
                    <td>
                    <a href="/ru/admin/eventType/edit/' . $val->event_type_id . '">(' . $val->event_type_id . ') ' . (empty($val->name) ? 'Название пустое' : $val->name) . '</a>
                        </td>
<td>
<div class="adm-box-color" style="background-color:#' . $val->color . '">&nbsp;</div>
</td>
<td>
<a href="/ru/admin/eventType/delete/' . $val->event_type_id . '"><span class="ui-icon ui-icon-trash"></span></a>
<a href="/ru/admin/eventType/edit/' . $val->event_type_id . '"><span class="ui-icon ui-icon-pencil"></span></a>    
</td></tr>';
            }
            echo '</table>';
        } else {
            echo '<p>Список пуст</p>';
        }
        echo '</div>';
    }
    ?>
</div>
