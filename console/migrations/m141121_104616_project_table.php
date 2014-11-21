<?php

use yii\db\Schema;
use yii\db\Migration;

class m141121_104616_project_table extends Migration
{
    public function up()
    {
        $this->execute(
            "CREATE TABLE project (
              id int(11) NOT NULL AUTO_INCREMENT,
              project_name varchar(50) NOT NULL,
              username varchar(50) NOT NULL,
              company varchar(50) NOT NULL,
              created_at int(11) NOT NULL,
              updated_at int(11) NOT NULL,
              priority enum('high','normal','low') NOT NULL,
              PRIMARY KEY (id)
            ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;"
        );
    }

    public function down()
    {
        echo "m141121_104616_project_table cannot be reverted.\n";

        return false;
    }
}
