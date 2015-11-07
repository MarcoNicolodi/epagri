<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class EntradaProduto extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
