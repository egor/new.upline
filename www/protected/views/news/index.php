<?php
/* @var $this NewsController */

$this->breadcrumbs = array(
    'News',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
    You may change the content of this page by modifying
    the file <tt><?php echo __FILE__; ?></tt>.
</p>
<?php
foreach ($news as $val) {
    $url = ($val->event == 1 ? $val->link_to_event : '/' . Yii::app()->language . '/news/' . $val->url . '/');
    echo $val->menu_name . ' ' . date('d.m.Y', $val->date) . ' <a href="' . $url . '">подробнее</a><br>';
}
?>