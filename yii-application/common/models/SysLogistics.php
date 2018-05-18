<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sys_logistics".
 *
 * @property string $id
 * @property string $name 物流名
 * @property string $code 物流编码
 * @property int $status 状态。0=停用,1=启用
 * @property string $remark 备注
 */
class SysLogistics extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sys_logistics';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'code'], 'required'],
            [['name', 'code'], 'string', 'max' => 30],
            [['status'], 'string', 'max' => 2],
            [['remark'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'status' => 'Status',
            'remark' => 'Remark',
        ];
    }
}
