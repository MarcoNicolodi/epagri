<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Cobertura extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
