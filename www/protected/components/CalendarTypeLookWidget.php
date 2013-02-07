<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserListAdsWidget
 *
 * @author egorik
 */
class CalendarTypeLookWidget extends CWidget {

    /**
     * Язык
     * @var char
     */
    public $lang;
    
    /**
     * Текущий месяц
     * @var integer
     */
    public $month;
    
    /**
     * Текущий год
     * @var integer
     */
    public $year;

    public function run() {
        if (empty($this->lang)) {
            if (isset(Yii::app()->user->calendarMonth)) {
                $this->lang = Yii::app()->user->calendarLang;
            } else {
                $this->lang = 'ru';
            }
        }
        if (empty($this->month)) {
            if (isset(Yii::app()->user->calendarMonth)) {
                $this->month = Yii::app()->user->calendarMonth;
            } else {
                $this->month = date ('m');
            }
        }
        if (empty($this->year)) {
            if (isset(Yii::app()->user->calendarYear)) {
                $this->year = Yii::app()->user->calendarYear;
            } else {
                $this->year = date('Y');
            }
        }

        //$mainNews = News::model()->findAll('in_main=1 AND language="'.Yii::app()->language.'" AND visibility=1 ORDER BY box');
        if ($_SESSION['calendar']['look'] == 'table') {
            $calendar = Calendar::model()->findAllByAttributes(array('language' => $this->lang), array('order' => 'start_date, position ASC'));
            $this->render('calendarTypeLookTableWidget', array('week' => $this->selectedMonth($this->month, $this->year), 'calendar' => $calendar, 'lang' => $this->lang, 'month'=>$this->month, 'year'=>$this->year));
        } else {
            if (isset($_GET['sdate']) && isset($_GET['edate']) && !empty($_GET['sdate']) && !empty($_GET['edate'])) {
                $sDate = $eDate = DateOperations::dateToUnixTime($_GET['sdate']);                
                $eDate = DateOperations::dateToUnixTime($_GET['edate']);
                $calendar = Calendar::model()->findAll('language =:language AND start_date >= :sdate AND end_date <= :edate ORDER BY start_date DESC', array(':language'=>$this->lang, ':sdate'=>$sDate, ':edate'=>$eDate));
            } else {
                $calendar = Calendar::model()->findAll('language =:language ORDER BY start_date DESC', array(':language'=>$this->lang));
            }
            
            $this->render('calendarTypeLookListWidget', array('calendar' => $calendar, 'lang' => $this->lang));
        }
    }

    public function selectedMonth($month = 0, $year = 0) {
        if ($month == 0) {
            $month = date('m');
        }
        if ($year == 0) {
            $year = date('Y');
        }
        //$month=2;
        // Вычисляем число дней в текущем месяце
        $dayofmonth = date('t', mktime(0, 0, 0, $month, 1, $year));
        // Счётчик для дней месяца
        $day_count = 1;
        // 1. Первая неделя
        $num = 0;
        for ($i = 0; $i < 7; $i++) {
            // Вычисляем номер дня недели для числа
            $dayofweek = date('w', mktime(0, 0, 0, $month, $day_count, $year));
            // Приводим к числа к формату 1 - понедельник, ..., 6 - суббота
            $dayofweek = $dayofweek - 1;
            if ($dayofweek == -1)
                $dayofweek = 6;
            if ($dayofweek == $i) {
                // Если дни недели совпадают,
                // заполняем массив $week
                // числами месяца
                $week[$num][$i] = $day_count;
                $day_count++;
            } else {
                $week[$num][$i] = "";
            }
        }

        // 2. Последующие недели месяца
        while (true) {
            $num++;
            for ($i = 0; $i < 7; $i++) {
                $week[$num][$i] = $day_count;
                $day_count++;
                // Если достигли конца месяца - выходим
                // из цикла
                if ($day_count > $dayofmonth)
                    break;
            }
            // Если достигли конца месяца - выходим
            // из цикла
            if ($day_count > $dayofmonth)
                break;
        }
        return $week;
    }

}

?>
