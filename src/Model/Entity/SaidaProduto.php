<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class SaidaProduto extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
