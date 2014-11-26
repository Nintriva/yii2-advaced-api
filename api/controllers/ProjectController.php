<?php
namespace api\controllers;

use Yii;
use yii\rest\ActiveController;
use common\models\ProjectSearch;


/**
 * Site controller
 */
class ProjectController extends ActiveController
{
    public $modelClass = 'common\models\Project';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'responseData',
    ];

    public function actions(){
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex(){
        $params = Yii::$app->request->get();
        $model = new ProjectSearch();
        $dataProvider = $model->search($params);
        return $dataProvider;
    }


}
