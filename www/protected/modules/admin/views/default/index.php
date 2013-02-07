<?php
/* @var $this DefaultController */

$this->breadcrumbs = array(
    'Администратирование'
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>
<ul>
    <li>
        <a href="/ru/admin/news/">Новости</a>
    </li>
    <li>
        <a href="/ru/admin/editFields">Редактируемые поля</a>
    </li>
    <li>
        <a href="/ru/admin/calendar">Календарь</a>
    </li>
    <li>
        <a href="/ru/admin/eventType">Типы событий</a>
    </li>
    
    <li>
        <a href="/ru/admin/country">Страны</a>
    </li>
    <li>
        <a href="/ru/admin/city">Города</a>
    </li>
</ul>