<?php

use yii\db\Migration;

class m180723_060544_create_table_config_currency_unit extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%config_currency_unit}}', [
            'tid' => $this->bigPrimaryKey(),
            'currency_unit_code' => $this->string()->defaultValue('')->comment('法币单位缩写 如 CNY，SGD'),
            'currency_unit_name' => $this->string()->defaultValue('')->comment('法币单位名称 如 人民币，澳元'),
            'country_id' => $this->bigInteger()->defaultValue('0')->comment('所属国家ID'),
            'status' => $this->tinyInteger()->defaultValue('0')->comment('货币单位状态 0：不可用 1：可用 2：禁用'),
            'created_at' => $this->integer()->defaultValue('0')->comment('创建时间'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%config_currency_unit}}');
    }
}
