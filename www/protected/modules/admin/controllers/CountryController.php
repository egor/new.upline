<?php

class CountryController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    /**
     * Создаем новую страну, пустую
     */
    public function actionAdd() {
        $model = new Country;
        $model->save();
        if (isset($model->country_id)) {
            Yii::app()->request->redirect('/ru/admin/country/edit/' . $model->country_id);
        }
    }

    /**
     * Редактирование данных о стране
     * @param int $id id страны
     * @return form
     */
    public function actionEdit($id = 0) {
        $model = Country::model()->findByPk($id);
        if (isset($_POST['Country'])) {
            $model->attributes = $_POST['Country'];
            if ($model->validate()) {
                
            }
        }
        $this->render('edit', array('model' => $model));
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