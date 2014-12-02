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
        'collectionEnvelope' => 'dataProvider',
    ];

    public function actions(){
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex(){
        $model = new ProjectSearch();
        $params[$model->formName()] = Yii::$app->request->get();
        $dataProvider = $model->search($params);
        return $dataProvider;
    }


}
