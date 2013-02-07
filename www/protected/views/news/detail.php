<?php
/* @var $this NewsController */

$this->breadcrumbs=array(
	    'Новости' => array('/'.Yii::app()->language.'/news/'),
    $news->menu_name,
);
?>
<h1><?php echo date('d.m.Y', $news->date). ' ' . $news->h1 ?></h1>

<?php
echo $news->text;


?>
