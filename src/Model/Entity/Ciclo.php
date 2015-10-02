<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Ciclo Entity.
 *
 * @property int $id
 * @property int $tanque_id
 * @property \App\Model\Entity\Tanque $tanque
 * @property \Cake\I18n\Time $data_inicio
 * @property int $povoamento_inicio
 * @property int $status_id
 * @property \App\Model\Entity\Status $status
 * @property \Cake\I18n\Time $data_fim
 * @property \App\Model\Entity\EspeciesCategoriasCultivo[] $especies_categorias_cultivos
 * @property \App\Model\Entity\Visita[] $visitas
 */
class Ciclo extends Entity
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
