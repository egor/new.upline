<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CheckLanguage
 *
 * @author egorik
 */
class CheckLanguage extends CUrlManager{
    public $connectionID = 'db';
    public $currentLanguage = 'db';
 
    
 public function createUrl($manager,$route,$params,$ampersand)
    {
        if ($route==='car/index')
        {
            if (isset($params['manufacturer'], $params['model']))
                return $params['manufacturer'] . '/' . $params['model'];
            else if (isset($params['manufacturer']))
                return $params['manufacturer'];
        }
        return false;  // не применяем данное правило
    }
    public function parseUrl($manager,$request,$pathInfo,$rawPathInfo)
    {
        Yii::app()->language=Yii::app()->params['siteLanguageDefault'];
        
        //var_dump($manager);
        $pathInfoLanguage = explode('/', $pathInfo);        
        //echo $pathInfo;
        //echo Yii::app()->params['siteLanguage'][$pathInfoLanguage[0]];
       
           
        if (is_array(Yii::app()->params['siteLanguage'][$pathInfoLanguage[0]]) || $pathInfo == '') {
           
            //Yii::app()->language=Yii::app()->params['siteLanguage'][$pathInfoLanguage[0]];
            if ($pathInfoLanguage[0]!='') {
                Yii::app()->language=$pathInfoLanguage[0];
            }
            //var_dump(Yii::app()->language);
            if ($pathInfoLanguage[1] == 'news' && !empty($pathInfoLanguage[2])) {
                //echo 'news/detail/'.$pathInfoLanguage[2]; die;
                return 'news/detail/url/'.$pathInfoLanguage[2];
            }
            if ($pathInfo != '') {       
                return false;
                //return $pathInfo;
                //echo substr($pathInfo, 3); die;
                return substr($pathInfo, 3);
            } else {
                return false;
            }
        } else { 
            return '404';
        }
        /*
        $ret = false;
        $pathInfoE = explode('/', $pathInfo);        
        $models = Area::model()->find('url=:url', array(':url'=>$pathInfoE[0]));
        if (!empty($pathInfoE[1])) {
            if ($pathInfoE[1]=='продам') {
                $ret = 'ad/list/method/1/area/'.$models->id;
            }
            if ($pathInfoE[1]=='куплю') {
                $ret = 'ad/list/method/2/area/'.$models->id;
            }
            if ($pathInfoE[1]=='отдам_в_хорошие_руки') {
                $ret = 'ad/list/method/3/area/'.$models->id;
            }
            if ($pathInfoE[1]=='обменяю') {
                $ret = 'ad/list/method/4/area/'.$models->id;
            }
            
            if (!empty($pathInfoE[2])) {
                $adId = explode('_', $pathInfoE[2]);
                $ret = 'ad/detail/adId/' . $adId[0];
            }
        }
        else if (isset($models->url)) {
            $area = Area::model()->findByAttributes(array('url'=>$pathInfoE[0]));
            //var_dump($area['id']); die;
            if ($area['id'])
                $ret = 'area';
        }

        
        return $ret;
        //if (preg_match('%^(\w+)(/(\w+))?$%', $pathInfo, $matches))
        //{
            //echo $matches[1]; die;
            // Проверяем $matches[1] и $matches[3] на предмет
            // соответствия производителю и модели в БД.
            // Если соответствуют, выставляем $_GET['manufacturer'] и/или $_GET['model']
            // и возвращаем строку с маршрутом 'car/index'.
            
        //}
        return false;  // не применяем данное правило
         * 
         */
    }
}

?>
