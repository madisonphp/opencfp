<?php

use Phinx\Migration\AbstractMigration;

class ChangeSponsorshipField extends AbstractMigration
{
    public function up()
    {
        $this->table('talks')
            ->changeColumn('sponsor', 'text')
            ->save();
    }

    public function down()
    {
        $this->table('talks')
            ->changeColumn('sponsor', 'boolean')
            ->save();
    }
}
