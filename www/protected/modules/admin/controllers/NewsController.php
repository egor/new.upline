<?php

class NewsController extends Controller {

    public function actionIndex() {
        foreach (Yii::app()->params['siteLanguage'] as $key => $value) {
            $news[$key] = News::model()->findAllByAttributes(array('language' => $key), array('order'=>'date DESC'));
        }
        $this->render('index', array('news' => $news));
    }

    public function actionAdd() {

        $news = new News;
        $news->date = time();
        $news->language = $_GET['lang'];
        $news->save();
        if (isset($news->news_id)) {
            Yii::app()->request->redirect('/ru/admin/news/edit/' . $news->news_id);
        }
    }

    public function actionEdit($id = 0) {
        // = $_GET['id'];
        $model = News::model()->findByPk($id);
        if (isset($_POST['News'])) {
            $model->attributes = $_POST['News'];            
            if ($model->validate()) {
                
                 $u = News::model()->find('language="'. $model->language.'" AND url="'.$model->url.'" AND news_id!="'.$id.'"');
                 if (!empty($u->news_id)) {
                    $model->addError('url', 'url уже занят');
                    $this->render('edit', array('news' => $model));
                    return;
                 }
            
                //sreturn $model;
                $model->date = DateOperations::dateToUnixTime($model->date);
                if (!isset($_POST['yt0'])) {
                    $model->save();
                }
                if (isset($_POST['yt2']) || isset($_POST['yt0'])) { 
                    Yii::app()->request->redirect('/ru/admin/news/');
                } else {
                    Yii::app()->request->redirect('/ru/admin/news/edit/'.$model->news_id);
                }
                // form inputs are valid, do something here
                return;
            }
        } else {

            //$model = NewsPrimary::model()->findByPk($id);
             //('news_primary_id='.$id.' AND language = "'.$language.'"');
            $model->date =  date('d.m.Y', $model->date);
            /*
              if (empty($newsData->news_data_id)) {
              //если страницы с указаным языком нет в БД,
              //то создать страницу
              $newsData = new NewsData;
              $newsData->news_primary_id = $id;
              $newsData->language = $language;
              $newsData->save();
              } */
        }
        //$this->render('edit');
        //$this->render('_form',array('model'=>$model));
        $this->render('edit', array('news' => $model));
    }

    /**
     * Удаление новости
     * 
     * @todo удаление картинки новости
     * @param int $id id записи
     */
    public function actionDelete($id = 0) {
        if (!empty($id)) {
            News::model()->deleteByPk($id);
            Yii::app()->request->redirect('/ru/admin/news/');
        } else {
            $this->render('error', array('text' => 'Нет такой новости'));
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