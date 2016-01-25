<?php
namespace api\controllers;

use Yii;
use api\components\ApiController;
use common\models\UserSearch;
use yii\filters\auth\HttpBearerAuth;
use yii\web\ForbiddenHttpException;

/**
 * Site controller
 */
class UserController extends ApiController
{
    public $modelClass = 'common\models\UserModel';

    /*public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'dataProvider',
    ];*/


    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }

    /**
     * @Note: By default OPTIONS not need to be authorized, if any action not need authorization include inside array
     * Header: Authorization , Value: Bearer <auth_key> (need space between Bearer and auth_key)
     * $guestActions : array of action which will not execute HttpBearerAuth
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $action = Yii::$app->requestedAction->id;
        $guestActions = [];
        if (!in_array($action, $guestActions)&&(Yii::$app->request->method!='OPTIONS')) {
            $behaviors['authenticator'] = [
                'class' => HttpBearerAuth::className(),
            ];
        }
        return $behaviors;
    }

    /**
     * @return \yii\data\ActiveDataProvider
     * @Note: You can use default index if you need
     */
    public function actionIndex()
    {
        $model = new UserSearch();
        $params[$model->formName()] = Yii::$app->request->get();
        $dataProvider = $model->search($params);
        return $dataProvider;
    }

    public function actionSearch(){
        $model = new UserSearch();
        $params[$model->formName()] = Yii::$app->request->post();
        $dataProvider = $model->search($params);
        return $dataProvider;
    }

    /**
     * @param string $action
     * @param null $model
     * @param array $params
     * @return bool|void
     * @throws ForbiddenHttpException
     * @Note Change conditions for each action according to your need throw ForbiddenHttpException if it fails
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        if (in_array($action, ['create', 'options', 'index'])) {
            return true;
        } elseif (in_array($action, ['view', 'update', 'delete'])) {
            if (Yii::$app->user->id == $model->id) {
/*                you can check the condition like $model->create_by current user like. The above condition check current model id with current user id so only that user can perform above actions view ,update, delete
  */
                return true;
            }
        }
        throw new ForbiddenHttpException("You are not Authorized to access this page");
    }

}
