<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Estoque extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
