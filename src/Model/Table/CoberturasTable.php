<?php
namespace App\Model\Table;

use App\Model\Entity\Cobertura;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CoberturasTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('coberturas');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->hasMany('Tanques', [
            'foreignKey' => 'cobertura_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->allowEmpty('descricao');

        return $validator;
    }
}
