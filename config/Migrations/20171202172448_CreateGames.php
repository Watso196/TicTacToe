<?php
use Migrations\AbstractMigration;

class CreateGames extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('games');
        $table->addColumn('winner', 'string', [
            'default' => null,
            'limit' => 255,
            'null' => false,
        ]);
        $table->addColumn('time_stamp', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->create();
    }
}
