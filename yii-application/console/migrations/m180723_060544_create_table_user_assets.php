<?php

use yii\db\Migration;

class m180723_060544_create_table_user_assets extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_assets}}', [
            'tid' => $this->bigPrimaryKey(),
            'user_id' => $this->bigInteger()->defaultValue('0')->comment('用户ID'),
            'coin_id' => $this->bigInteger()->defaultValue('0')->comment('资产币ID'),
            'coin_code' => $this->string()->defaultValue('')->comment('资产币缩写  AIC、BTC、ETH'),
            'available_quantity' => $this->decimal()->defaultValue('0.000000')->comment('可用数量'),
            'frozen_quantity' => $this->decimal()->defaultValue('0.000000')->comment('冻结数量'),
            'depository_quantity' => $this->decimal()->defaultValue('0.000000')->comment('存管数量'),
            'created_at' => $this->integer()->defaultValue('0')->comment('创建时间'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%user_assets}}');
    }
}
