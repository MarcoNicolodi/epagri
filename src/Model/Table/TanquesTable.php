<?php
namespace App\Model\Table;

use App\Model\Entity\Tanque;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class TanquesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('tanques');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->belongsTo('Coberturas', [
            'foreignKey' => 'cobertura_id'
        ]);
        $this->belongsTo('Propriedades', [
            'foreignKey' => 'propriedade_id'
        ]);
        $this->hasMany('Ciclos', [
            'foreignKey' => 'tanque_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('capacidade', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('capacidade');

        $validator
            ->requirePresence('nome')
            ->notEmpty('nome');

        $validator
            ->requirePresence('propriedade_id','create')
            ->notEmpty('propriedade_id')
            ->add('propriedade_id','valid',['rule' => 'numeric']);

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['cobertura_id'], 'Coberturas'));
        $rules->add($rules->existsIn(['propriedade_id'], 'Propriedades'));
        return $rules;
    }

    public function getOwner($id)
    {
        $q = $this->find('all')->where(['Tanques.id' => $id])->contain(['Propriedades' => ['Usuarios']])->first();
        return $q ? $q->propriedade->usuario->id_usuario : false;
    }
}
