<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Usuario Entity.
 *
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $endereco
 * @property int $cidade_id
 * @property \App\Model\Entity\Cidade $cidade
 * @property int $id_usuario
 * @property int $autorizacao
 * @property \App\Model\Entity\Comentario[] $comentarios
 * @property \App\Model\Entity\Estoque[] $estoques
 * @property \App\Model\Entity\Propriedade[] $propriedades
 */
class Usuario extends Entity
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
        'id_usuario' => false,
    ];

    protected function _setPassword($value)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($value);
    }
}
