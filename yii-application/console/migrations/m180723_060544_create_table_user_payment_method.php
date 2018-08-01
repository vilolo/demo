<?php

use yii\db\Migration;

class m180723_060544_create_table_user_payment_method extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_payment_method}}', [
            'tid' => $this->bigPrimaryKey(),
            'user_id' => $this->bigInteger()->defaultValue('0')->comment('用户ID'),
            'payment_method_id' => $this->bigInteger()->defaultValue('0')->comment('支付方式ID'),
            'account_organizational' => $this->string()->defaultValue('')->comment('帐户组织 如 中国银行、支付宝、微信、银联等'),
            'account_organizational_branch' => $this->string()->defaultValue('')->comment('帐户组织分支  如 高新园分行'),
            'account_no' => $this->string()->defaultValue('')->comment('帐号  如银行卡号、支付帐号、微信号等'),
            'account_code' => $this->string()->defaultValue('')->comment('帐号二维码  QR Code'),
            'account_code_pic' => $this->string()->defaultValue('')->comment('帐号二维码图片地址  QR Code'),
            'account_info' => $this->string()->defaultValue('')->comment('帐号汇款信息'),
            'account_status' => $this->tinyInteger()->defaultValue('0')->comment('帐号状态 0：不可用 1：可用 2：禁用'),
            'created_at' => $this->integer()->defaultValue('0')->comment('创建时间'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%user_payment_method}}');
    }
}
