<?php

class EventTypeController extends Controller {

    public function actionIndex() {
        foreach (Yii::app()->params['siteLanguage'] as $key => $value) {
            $model[$key] = EventType::model()->findAllByAttributes(array('language' => $key), array('order' => 'position'));
        }
        $this->render('index', array('model' => $model));
    }

    /**
     * Добавление нового типа события
     * Все поля будут пустыми, после добавления редиректит на редактирование
     * добавленного типа
     */
    public function actionAdd() {

        $model = new EventType;
        $model->language = $_GET['lang'];
        $model->save();
        if (isset($model->event_type_id)) {
            Yii::app()->request->redirect('/ru/admin/eventType/edit/' . $model->event_type_id);
        }
    }

    /**
     * Редактирование типа
     * 
     * @param type $id - id типа
     * @return type
     */
    public function actionEdit($id = 0) {
        $model = EventType::model()->findByPk($id);
        if (isset($_POST['EventType'])) {
            $model->attributes = $_POST['EventType'];
            if ($model->validate()) {
                if (!isset($_POST['yt0'])) {
                    $model->save();
                }
                if (isset($_POST['yt2']) || isset($_POST['yt0'])) {
                    Yii::app()->request->redirect('/ru/admin/eventType/');
                } else {
                    Yii::app()->request->redirect('/ru/admin/eventType/edit/' . $model->event_type_id);
                }
                return;
            }
        }
        $this->render('edit', array('model' => $model));
    }
        public function actionDelete($id = 0) {
        if (!empty($id)) {
            EventType::model()->deleteByPk($id);
            Yii::app()->request->redirect('/ru/admin/eventType/');
        } else {
            $this->render('error', array('text' => 'Упс ... Что-то пошло не так :('));
        }
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