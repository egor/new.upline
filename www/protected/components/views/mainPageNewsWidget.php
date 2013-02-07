<?php

//var_dump($mainNews);
if ($mainNews) {

foreach ($mainNews as $news) {
    echo date('d.m.Y', $news->date) . ' ' . $news->menu_name . '<br>';

}
    
} else {
    echo 'Здесь пока нет объявлений';
}
