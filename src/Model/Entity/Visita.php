<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Visita Entity.
 *
 * @property int $id
 * @property int $ciclo_id
 * @property \App\Model\Entity\Ciclo $ciclo
 * @property float $oxigenio_agua
 * @property float $ionizacao_agua
 * @property float $temperatura_agua
 * @property float $largura_peixes
 * @property float $peso_peixes
 * @property \Cake\I18n\Time $data
 * @property int $params_ideais_id
 * @property \App\Model\Entity\ParametrosIdeal $parametros_ideal
 */
class Visita extends Entity
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
        'id' => false,
        'ciclo_id' => false,
    ];
}
