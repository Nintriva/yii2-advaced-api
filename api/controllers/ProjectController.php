<?php
namespace api\controllers;

use common\models\ProjectSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;


/**
 * Site controller
 */
class ProjectController extends ActiveController
{
    public $modelClass = 'common\models\Project';
    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'response',
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
