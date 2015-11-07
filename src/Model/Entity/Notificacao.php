<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Notificacao extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
