<?php
// src/Model/Entity/Game.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Game extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
        'slug' => false,
    ];
}
