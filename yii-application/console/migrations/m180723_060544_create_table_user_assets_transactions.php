<?php

use yii\db\Migration;

class m180723_060544_create_table_user_assets_transactions extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user_assets_transactions}}', [
            'tid' => $this->bigPrimaryKey(),
            'from_user_id' => $this->bigInteger()->defaultValue('0')->comment('来源用户ID'),
            'from_user_assets_id' => $this->bigInteger()->defaultValue('0')->comment('来源用户资产ID'),
            'from_wallet_address' => $this->string()->defaultValue('')->comment('来源钱包地址'),
            'to_user_id' => $this->bigInteger()->defaultValue('0')->comment('目标用户ID'),
            'to_user_assets_id' => $this->bigInteger()->defaultValue('0')->comment('目标用户资产ID'),
            'to_wallet_address' => $this->string()->defaultValue('')->comment('目标钱包地址'),
            'coin_id' => $this->bigInteger()->defaultValue('0')->comment('币种ID'),
            'coin_name' => $this->string()->defaultValue('')->comment('币种名称'),
            'coin_quantity' => $this->decimal()->defaultValue('0.000000')->comment('币数量'),
            'txid' => $this->string()->defaultValue('')->comment('流水  可是以区块交易ID，也可以是银行交易ID，取决于交易币种'),
            'status' => $this->tinyInteger()->defaultValue('0')->comment('交易状态 0：失败 1：处理中 2：成功'),
            'created_at' => $this->integer()->defaultValue('0')->comment('创建时间'),
            'finish_at' => $this->integer()->defaultValue('0')->comment('处理完成时间'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%user_assets_transactions}}');
    }
}
