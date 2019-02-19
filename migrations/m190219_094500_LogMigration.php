<?php

use yii\db\Migration;

/**
 * Class m190210_141936_BaseMigration
 */
class m190219_094500_LogMigration extends Migration {

    public function up() {

        $this->CreateLogTable();
    }

    public function down() {

        $this->dropIfExist('log');
    }

    public function CreateLogTable() {
        $this->dropIfExist('log');

        $this->createTable('log', [
            'id' => $this->integer(20)->bigPrimaryKey(),
            'level' => $this->integer(11),
            'category' => $this->string(255),
            'log_time' => $this->double(),
            'prefix' => $this->string(),
            'message' => $this->string(),
        ]);

    }

    public function dropIfExist($tableName) {
        if (in_array($tableName, $this->getDb()->schema->tableNames)) {
            $this->dropTable($tableName);
        }
    }

}
