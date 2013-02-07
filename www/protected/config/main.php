<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'My Web Application',
    //текущая тема
    'theme' => 'metro',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'test',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
        'admin',
    ),
    // application components
    'components' => array(
        
        // uncomment the following to enable URLs in path-format

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            //'baseUrl' => 'http://new.upline24.local',
            //'basePath' => array('themeManager' => 'metro'),
            'rules' => array(
                
                              /*
                //gii
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',*/
                array(
                    'class' => 'application.components.CheckLanguage',
                    'connectionID' => 'db',
                ),
                //'<language:\w+>/<modules:\w+>/<id:\d+>' => '<modules>/view',
                //'<controller:\w+>/<action:\w+>/<url:\w+>' => '<controller>/<action>',
                
                '/ru/admin/' => 'admin',                
                
                '<language:\w+>/<modules:\w+>/<controller:\w+>/<id:\d+>' => '<modules>/<controller>/view',                
                '<language:\w+>/<modules:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<modules>/<controller>/<action>',
                '<language:\w+>/<modules:\w+>/<controller:\w+>/<action:\w+>/<lang:\w+>' => '<modules>/<controller>/<action>',
                '<language:\w+>/<modules:\w+>/<controller:\w+>/<action:\w+>' => '<modules>/<controller>/<action>',
                
                //'<language:\w+>/<controller:\w+>/<id:\d+>' => '<controller>/view',
                
                '<language:\w+>/<controller:\w+>' => '<controller>/index',
                
                
                
                '<language:\w+>/<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                
                '<language:\w+>/<controller:\w+>/<action:\w+>' => '<controller>/<action>',

  
            ),
        ),
        'user' => array(
            // enable cookie-based authentication
            'allowAutoLogin' => true,
            'loginUrl'=>array('ru/site/login'),
        ),
        /*
          'db'=>array(
          'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
          ),
         *
         */
        // uncomment the following to use a MySQL database

        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=upline24_new',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'webmaster@example.com',
        'siteLanguage' => array(
            'ru' => array(
                'name' => 'Русский',
                'work' => 1
            ),
            'en' => array(
                'name' => 'English',
                'work' => 1
            ),
            'ua' => array(
                'name' => 'Украинский',
                'work' => 1
            ),
            'fr' => array(
                'name' => 'France',
                'work' => 1
            )
        ),
        'siteLanguageDefault' => 'ru',
    ),
);
