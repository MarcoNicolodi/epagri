<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Especie extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
