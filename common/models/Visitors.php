<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "visitors".
 *
 * @property string $id
 * @property string $employee_id
 * @property string $user_name
 * @property string $id_card
 * @property string $company
 * @property integer $num
 * @property integer $type
 * @property string $email
 * @property string $telephone
 * @property string $info
 * @property string $created_at
 * @property string $updated_at
 * @property integer $is_send_email
 * @property integer $is_send_mobile
 */
class Visitors extends \yii\db\ActiveRecord
{
    const IS_SEND_EMAIL = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visitors';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['employee_id', 'num', 'type', 'is_send_email', 'is_send_mobile', 'location_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_name', 'company', 'email', 'info'], 'string', 'max' => 255],
            [[ 'telephone'], 'string', 'max' => 11],
            [['id_card'], 'string', 'max' => 18],
            [['employee_id', 'user_name', 'id_card'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employee_id' => '被访者',
            'location_id' => '访问办公室',
            'user_name' => '您的姓名',
            'id_card' => '身份证号码',
            'company' => '您的公司',
            'num' => '来访人数',
            'type' => '来访事由',
            'email' => '邮箱',
            'telephone' => '电话',
            'info' => 'Info',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'is_send_email' => '发送Email',
            'is_send_mobile' => 'Is Send Mobile',
        ];
    }

    /**
     * 访客拜访类型
     * @param null $type
     * @return bool
     */
    public static function getTypeList($type = null)
    {
        $list = Yii::$app->params['visitorTypeList'];
        if($type == null){
            return $list;
        }else if(array_key_exists($type, $list)){
            return $list[$type];
        }else{
            return false;
        }
    }

    /**
     * 办公地点
     *
     * @param null $type
     * @return bool
     */
    public static function getLocationList($type = null)
    {
        $list = Yii::$app->params['locationList'];
        if($type == null){
            return $list;
        }else if(array_key_exists($type, $list)){
            return $list[$type];
        }else{
            return false;
        }
    }

    /**
     * 关联employees表
     *
     * @return \yii\db\ActiveQuery
     * @author:tlh
     */
    public function getEmployee()
    {
        return $this->hasOne(\common\models\Employees::className(), ['employee_id' => 'employee_id']);
    }

    public static function sendMobile($mobile, $code){
        //TODO

    }

    public static function sendEmail($model)
    {
        $employee = Employees::findOne(['employee_id'=>$model->employee_id]);
        if($employee){
            $email = $employee->email;
        }

        $visitorsName = $model->user_name;
        $location = Visitors::getLocationList($model->location_id);
        $message = '您有访客' . $visitorsName . '来访，已到达' . $location .'前台';

        //发送邮件
        $mail= Yii::$app->mailer->compose('visitor', ['model'=>$model]);    //邮件模板common/mail/visitor
        $subject = $message;
        $mail->setTo($email); //要发送给那个人的邮箱
        $mail->setSubject($subject); //邮件主题

        $model->is_send_email = self::IS_SEND_EMAIL;
        $model->save();
        return $mail->send();
    }

}
