<?php

use Phinx\Migration\AbstractMigration;

class DropExtraTalkFields extends AbstractMigration
{
    public function up()
    {
        $this->table('talks')
            ->removeColumn('category')
            ->removeColumn('desired')
            ->save();
    }

    public function down()
    {
        $this->table('talks')
            ->addColumn('category', 'string', ['limit' => 50])
            ->addColumn('desired', 'boolean')
            ->save();
    }
}
