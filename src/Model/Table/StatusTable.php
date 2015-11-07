<?php
namespace App\Model\Table;

use App\Model\Entity\Status;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class StatusTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('status');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->hasMany('Ciclos', [
            'foreignKey' => 'status_id'
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
