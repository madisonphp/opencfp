<?php

use Phinx\Migration\AbstractMigration;

class ChangeLastLoginToDatetime extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
        $table = $this->table('users');
        $table
            ->changeColumn('last_login', 'datetime')
            ->save();
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
        $table = $this->table('users');
        $table
            ->changeColumn('last_login', 'string')
            ->save();
    }
}
