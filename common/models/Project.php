<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "project".
 *
 * @property integer $id
 * @property string $project_name
 * @property string $username
 * @property string $company
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $priority
 */
class Project extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_name', 'username', 'company', 'created_at', 'updated_at', 'priority'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['priority'], 'string'],
            [['project_name', 'username', 'company'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'project_name' => Yii::t('app', 'Project Name'),
            'username' => Yii::t('app', 'Username'),
            'company' => Yii::t('app', 'Company'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'priority' => Yii::t('app', 'Priority'),
        ];
    }
    /**
     * fields use output data
     */
    public function fields()
    {
        //parent fields
        $fields = parent::fields();

        //add new fields
        $fields = array_merge(
            $fields,
            [
                'project'=>function($model){
                    return $model->project_name."@".$model->company;
                }
            ]
        );

        //remove unwanted fields
        $fields['created_at'] = function($model){
            return date("d-m-Y",$model->created_at);
        };
        $fields['updated_at'] = function($model){
            return date("d-m-Y",$model->updated_at);
        };

        return $fields;
    }
}
