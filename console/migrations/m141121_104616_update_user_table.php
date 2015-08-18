<?php

use yii\db\Schema;
use yii\db\Migration;

class m141121_104616_update_user_table extends Migration
{
    public function up()
    {
        $this->execute(
            "ALTER TABLE user ADD first_name VARCHAR(25) NULL AFTER id, ADD last_name VARCHAR(25) NULL AFTER first_name;"
        );
    }

    public function down()
    {
        echo "m141121_104616_project_table cannot be reverted.\n";

        return false;
    }
}
