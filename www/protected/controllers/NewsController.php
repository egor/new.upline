<?php

class NewsController extends Controller {

    public function actionIndex() {
        
        $news = News::model()->findAll('language = :language AND date < :date AND url <> "" ORDER BY date DESC', array(':language' => Yii::app()->language, ':date'=>time()));
        
        $this->render('index', array('news' => $news));
    }
 
    public function actionDetail($url = '') {
        
        $news = News::model()->find('language = :language AND url = :url', array(':language' => Yii::app()->language, ':url'=>$url));
        if ($url === '' || empty($news->news_id) || $news->event == 1) {
            throw new CHttpException(404, '404');
        }
        //var_dump($news); die;
        $this->render('detail', array('news' => $news));
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

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('deny',
                'actions' => array('index'),
                'users' => array('?'),
            ),
        );
    }

}