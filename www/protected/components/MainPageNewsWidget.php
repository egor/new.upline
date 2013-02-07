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

class MainPageNewsWidget extends CWidget {
    //public $adsType;
    public function run() {
        
        $mainNews = News::model()->findAll('in_main=1 AND language="'.Yii::app()->language.'" AND visibility=1 ORDER BY box');
        $this->render('mainPageNewsWidget',array('mainNews'=>$mainNews));
    }

}

?>
