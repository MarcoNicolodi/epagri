<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EspeciesCategoriasCultivo Entity.
 *
 * @property int $categorias_cultivo_id
 * @property \App\Model\Entity\CategoriasCultivo $categorias_cultivo
 * @property int $especie_id
 * @property \App\Model\Entity\Especie $especie
 * @property int $ciclo_id
 * @property \App\Model\Entity\Ciclo $ciclo
 */
class EspeciesCategoriasCultivo extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'categorias_cultivo_id' => false,
        'especie_id' => false,
    ];
}
