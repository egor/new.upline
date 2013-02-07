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
        $( "#datepicker" ).datepicker($.datepicker.regional[ "ru" ]);
    });
</script>
<script>
    $(function() {
        $( "#tabs" ).tabs();
    });
</script>

<?php
/* @var $this NewsController */

$this->breadcrumbs = array(
    'Администратирование' => array('/ru/admin/'),
    'Новости',
);
?>
<h1>Новости</h1>
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
    <p><a href="/ru/admin/news/add/' . $key . '">Добавить новость</a></p>
';
        if (!empty($news[$key])) {
            echo '<table>';
            foreach ($news[$key] as $val) {
                echo '<tr><td><a href="/ru/admin/news/edit/' . $val->news_id . '">(' . $val->news_id . ') ' . (empty($val->menu_name) ? 'Название пустое' : $val->menu_name) . '</a></td>
<td>' . date('d.m.Y', $val->date) . '</a></td>                
<td>
' . ($val->in_main == 1 ? 'выв на глав' : '') . '
' . ($val->event == 1 ? 'нов о соб' : '') . '    
<div class="adm-box-color" style="background-color:#' . $val->color . '">&nbsp;</div>
</td>
<td>' . ($val->visibility == 1 ? 'да' : 'нет') . '</td>
<td>
' . (!empty($val->url) ? '<a href="/' . $key . '/news/' . $val->url . '/">посмотреть</a>' : 'нет url') . '
</td>
<td><a href="/ru/admin/news/delete/' . $val->news_id . '">Удалить</a></td></tr>';
            }
            echo '</table>';
        } else {
            echo '<p>Нет новостей</p>';
        }
        echo '</div>';
    }
    ?>
</div>