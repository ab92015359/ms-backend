<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
                'text/json' => 'yii\web\JsonParser'
            ]
        ],
        'response' => [
            // ...
            'formatters' => [
                \yii\web\Response::FORMAT_JSON => [
                    'class' => 'yii\web\JsonResponseFormatter',
                    'prettyPrint' => YII_DEBUG, // use "pretty" output in debug mode
                    'encodeOptions' => JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE,
                    // ...
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\FileTarget',
                    // 'prefix' => function ($message) {
                    //     if (Yii::$app === null) {
                    //         return '';
                    //     }
                    //     $request = Yii::$app->getRequest();
                    //     $userIP = $request ? $request->getUserIP() : '-';

                    //     $user = Yii::$app->get('user');
                    //     $userID = $user ? $user->getId() : '-';

                    //     $session = Yii::$app->get('session');
                    //     $sessionID = $session ? $session->getId() : '-';
                    //     return "[$userIP][$userID][$sessionID]";
                    // },
                    'levels' => ['error', 'info', 'warning'],
                    'categories' => ['myfm'],
                    'logFile' => '@app/runtime/logs/myfm.log',
                    'maxFileSize' => 51200,
                    'logVars' => [],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,  // Pretty url==ture
            'enableStrictParsing' => false,  // disuse strict parsing
            'showScriptName' => false,   // hide index.php
            'rules' => [
                'PUT api/<controller:[\w-]+>/<id:[\w\d,]{24}>'                              => '<controller>/update',
                'DELETE api/<controller:[\w-]+>/<id:[\w\d]{24}(,[\w\d]{24})*>'              => '<controller>/delete',
                'api/<controller:[\w-]+>/<id:[\w\d,]{24}>'                                  => '<controller>/view',

                'PUT api/<module:\w+>/<controller:[\w-]+>/<id:[\w\d,]{24}>'                 => '<module>/<controller>/update',
                'DELETE api/<module:\w+>/<controller:[\w-]+>/<id:[\w\d]{24}(,[\w\d]{24})*>' => '<module>/<controller>/delete',
                'api/<module:\w+>/<controller:[\w-]+>/<id:[\w\d,]{24}>'                     => '<module>/<controller>/view',

                'api/<controller:[\w-]+>/<action:[\w-]+>'                                   => '<controller>/<action>',
                'api/<module:\w+>/<controller:[\w-]+>/<action:[\w-]+>'                      => '<module>/<controller>/<action>',
                'api/<controller:[\w-]+>/<action:[\w-]+>/<id:[\w\d,]{24}>'                  => '<controller>/<action>',
                'api/<module:\w+>/<controller:[\w-]+>/<action:[\w-]+>/<id:[\w\d,]{24}>'     => '<module>/<controller>/<action>',
            ],
        ]
    ],
    'params' => $params,
];
