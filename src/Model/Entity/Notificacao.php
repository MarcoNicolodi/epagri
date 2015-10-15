<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Notificacao Entity.
 *
 * @property int $id
 * @property int $visita_id
 * @property \App\Model\Entity\Visita $visita
 * @property string $alimentacao
 * @property string $aeradores
 * @property string $alerta_alimentacao
 * @property string $alerta_aeradores
 */
class Notificacao extends Entity
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
    ];
}
