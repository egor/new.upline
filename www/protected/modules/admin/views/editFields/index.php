<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<link rel="stylesheet" href="/library/jquery-ui-1.9.2.custom/css/ui-lightness/jquery-ui-1.9.2.custom.css" />
<link rel="stylesheet" href="/css/colorpicker/colorpicker.css" type="text/css" />
<script>
    $(function() {
        $( "#tabs" ).tabs();
    });
</script>

<?php
/* @var $this EditFieldsController */

$this->breadcrumbs = array(
    'Администратирование'=>array('/ru/admin/'),
    'Редактируемые поля'
);
?>
<h1>Редактируемые поля</h1>
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
    
';
        if (!empty($data[$key])) {
            echo '<table>';
            foreach ($data[$key] as $val) {
                echo '<tr><td>'.$val->name.'</td><td>'.$form->checkBox($news, 'value').'</td></tr>';
            }
            echo '</table>';
        } else {
            echo '<p>Нет новостей</p>';
        }
        echo '</div>';
    }
    ?>
</div>