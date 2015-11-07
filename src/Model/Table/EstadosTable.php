<?php
namespace App\Model\Table;

use App\Model\Entity\Estado;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class EstadosTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('estados');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->hasMany('Cidades', [
            'foreignKey' => 'estado_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('nome');

        $validator
            ->allowEmpty('uf');

        return $validator;
    }
}
