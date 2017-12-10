<?php
// src/Model/Table/ArticlesTable.php
namespace App\Model\Table;

use Cake\ORM\Table;

class GamesTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('games');
	$this->setPrimaryKey('time_stamp');
    }
}
