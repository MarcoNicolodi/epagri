<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Propriedade extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
