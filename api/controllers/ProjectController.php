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
    /*public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'dataProvider',
    ];*/

    /**
     * ActiveController implements a common set of actions for supporting RESTful access to ActiveRecord.
     *
     * - `index`: list of models
     * - `view`: return the details of a model
     * - `create`: create a new model
     * - `update`: update an existing model
     * - `delete`: delete an existing model
     *
     */
    public function actions(){
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    /**
     * Returns the data model based on the attributes given.
     *
     * @param integer $id the ID of the action to be executed.
     * @param string $model the model to be accessed. If null, it means no specific model is being accessed.
     * @param array $params additional parameters.
     *
     */

    public function actionIndex(){
        $model = new ProjectSearch();
        $params[$model->formName()] = Yii::$app->request->get();
        $dataProvider = $model->search($params);
        return $dataProvider;
    }


}
