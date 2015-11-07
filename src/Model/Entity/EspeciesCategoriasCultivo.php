<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class EspeciesCategoriasCultivo extends Entity
{
    protected $_accessible = [
        '*' => true,
        'categorias_cultivo_id' => false,
        'especie_id' => false,
    ];
}
