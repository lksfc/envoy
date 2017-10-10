<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employees".
 *
 * @property integer $employee_id
 * @property string $name
 * @property string $email
 * @property string $telephone
 */
class Employees extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'employees';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'telephone'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'employee_id' => 'Employee ID',
            'name' => 'Name',
            'email' => 'Email',
            'telephone' => 'Telephone',
        ];
    }

    /**
     * 获取雇员名
     *
     * @param null $storeId
     * @return mixed|string
     * @author:tlh
     */
    public static function getName()
    {
        $list = array_column(self::getList(), 'name', 'employee_id');
        return $list;
    }

    /**
     * list
     *
     * @return array
     * @author:tlh
     */
    public static function getList()
    {
        $records = self::findAll(['status'=>1]);
        $arr = [];
        foreach($records as $val)
        {
            $arr[$val->employee_id] = $val->attributes;    //二维数组
        }

        return $arr;
    }
}
