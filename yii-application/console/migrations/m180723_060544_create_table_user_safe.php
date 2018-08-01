<?php

use yii\db\Migration;

class m180723_060544_create_table_user_safe extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_safe}}', [
            'tid' => $this->bigPrimaryKey(),
            'user_id' => $this->bigInteger()->defaultValue('0')->comment('用户ID'),
            'login_pwd' => $this->string()->defaultValue('')->comment('用户密码'),
            'trade_pwd' => $this->string()->defaultValue('')->comment('交易密码'),
            'bind_mobile' => $this->string()->defaultValue('')->comment('绑定手机'),
            'bind_mobile_status' => $this->tinyInteger()->defaultValue('0')->comment('绑定手机状态 0：未绑定 1：已绑定'),
            'bind_mobile_at' => $this->integer()->defaultValue('0')->comment('绑定手机时间'),
            'bind_email' => $this->string()->defaultValue('')->comment('用户邮箱'),
            'bind_email_status' => $this->tinyInteger()->defaultValue('0')->comment('绑定状态 0：未绑定 1：已绑定'),
            'bind_email_at' => $this->integer()->defaultValue('0')->comment('绑定邮箱时间'),
            'bind_google' => $this->string(),
            'bind_google_status' => $this->tinyInteger()->defaultValue('0')->comment('绑定状态 0：未绑定 1：已绑定'),
            'bind_google_at' => $this->integer()->defaultValue('0')->comment('绑定谷歌验证码时间'),
            'bind_id_card_no' => $this->string()->defaultValue('')->comment('身份证号码'),
            'bind_id_card_name' => $this->string()->defaultValue('')->comment('身份证姓名'),
            'bind_id_card_pic_front' => $this->string()->defaultValue('')->comment('身份证正面图片Url'),
            'bind_id_card_pic_back' => $this->string()->defaultValue('')->comment('身份证背面图片Url'),
            'bind_id_card_pic_hold' => $this->string()->defaultValue('')->comment('身份证手持图片Url'),
            'bind_id_card_status' => $this->tinyInteger()->defaultValue('0')->comment('绑定状态 0：未绑定 1：已绑定'),
            'bind_id_card_at' => $this->integer()->defaultValue('0')->comment('绑定身份证时间（实名验证）'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%user_safe}}');
    }
}
