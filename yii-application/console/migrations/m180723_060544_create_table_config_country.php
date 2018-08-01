<?php

use yii\db\Migration;

class m180723_060544_create_table_config_country extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%config_country}}', [
            'tid' => $this->bigPrimaryKey(),
            'country_name' => $this->string()->defaultValue('')->comment('国家名称 中国、美国'),
            'status' => $this->tinyInteger()->defaultValue('0')->comment('状态 0：不可用 1：可用 2：禁用'),
            'created_at' => $this->integer()->defaultValue('0')->comment('创建时间'),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('{{%config_country}}');
    }
}
