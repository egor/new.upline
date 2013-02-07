<?php

class CalendarController extends Controller {

    /**
     * Вывод списка событий по языкам
     */
    public function actionIndex() {
        //foreach (Yii::app()->params['siteLanguage'] as $key => $value) {
        //    $calendar[$key] = Calendar::model()->findAllByAttributes(array('language' => $key), array('order' => 'start_date DESC'));
        //}
        $this->render('index');
        
    }

    /**
     * Добавление нового события на календарь.
     * Все поля будут пустыми, после добавления редиректит на редактирование
     * добавленного события
     */
    public function actionAddEvent() {
        $calendar = new Calendar;
        $calendar->language = $_GET['lang'];
        
        if (isset($_GET['start'])) {
            $calendar->start_date = $calendar->end_date = (int)($_GET['start']);
        } else {
            $calendar->start_date = $calendar->end_date = mktime(0, 0, 0, date(m), date(d), date(Y));
        }
        $calendar->save();
        if (isset($calendar->calendar_id)) {
            Yii::app()->request->redirect('/ru/admin/calendar/editEvent/' . $calendar->calendar_id);
        }
    }

    /**
     * Редактирование события календаря
     * 
     * @param type $id - id события
     * @return type
     */
    public function actionEditEvent($id = 0) {
        $model = Calendar::model()->findByPk($id);
        $list = EventType::model()->findAll('language="'.$model->language.'"', array('order' => 'position'));
        $list = CHtml::listData($list, 'event_type_id', 'name');

        if (isset($_POST['Calendar'])) {
            $model->attributes = $_POST['Calendar'];
            $model->start_date = DateOperations::dateToUnixTime($model->start_date);
            $model->end_date = DateOperations::dateToUnixTime($model->end_date);
            //var_dump($_POST['Calendar']);
            //echo $model->type.$_POST['Calendar']['type']; die;
            if ($model->validate()) {
                if (!isset($_POST['yt0'])) {
                    $model->save();
                }
                if (isset($_POST['yt2']) || isset($_POST['yt0'])) {
                    Yii::app()->request->redirect('/ru/admin/calendar/');
                } else {
                    Yii::app()->request->redirect('/ru/admin/calendar/editEvent/' . $model->calendar_id);
                }
                return;
            }
        } else {
          $model->start_date =  date('d.m.Y', $model->start_date);
          $model->end_date =  date('d.m.Y', $model->end_date);
        }
        $this->render('edit', array('calendar' => $model, 'list' => $list));
    }

    /**
     * Удаление события
     * 
     * @param int $id id записи
     */
    public function actionDeleteEvent($id = 0) {
        if (!empty($id)) {
            Calendar::model()->deleteByPk($id);
            Yii::app()->request->redirect('/ru/admin/calendar/');
        } else {
            $this->render('error', array('text' => 'Нет такой новости'));
        }
    }
    
    
    public function actionLook($type = 'list') {
        if (isset($_GET['look'])) {
            $type = $_GET['look'];
        }
        $_SESSION['calendar']['look'] = $type;
        Yii::app()->request->redirect('/ru/admin/calendar/');
    }
    
    /**
     * ajax
     */
    public function actionChangeMonth() {
        $month = $_POST['month'];
        $year = $_POST['year'];
        Yii::app()->user->setState('calendarMonth', $month);
        Yii::app()->user->setState('calendarYear', $year);
        $this->widget('application.components.CalendarTypeLookWidget', array('lang' => 'ru', 'month' => $month, 'year' => $year));
    }
    // Uncomment the following methods and override them if needed
    /*
      public function filters()
      {
      // return the filter configuration for this controller, e.g.:
      return array(
      'inlineFilterName',
      array(
      'class'=>'path.to.FilterClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }

      public function actions()
      {
      // return external action classes, e.g.:
      return array(
      'action1'=>'path.to.ActionClass',
      'action2'=>array(
      'class'=>'path.to.AnotherActionClass',
      'propertyName'=>'propertyValue',
      ),
      );
      }
     */
}