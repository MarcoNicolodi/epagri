<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Status extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}
