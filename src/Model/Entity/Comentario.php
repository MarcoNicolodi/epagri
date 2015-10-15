<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Comentario Entity.
 *
 * @property int $id
 * @property string $conteudo
 * @property \Cake\I18n\Time $data
 * @property \Cake\I18n\Time $updated
 * @property int $usuario_id
 * @property \App\Model\Entity\Usuario $usuario
 * @property int $tabela_id
 * @property \App\Model\Entity\Tabela $tabela
 * @property string $tabela_nome
 */
class Comentario extends Entity
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
