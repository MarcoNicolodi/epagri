<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Visita extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
