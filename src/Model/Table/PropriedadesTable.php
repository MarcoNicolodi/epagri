<?php
namespace App\Model\Table;

use App\Model\Entity\Propriedade;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class PropriedadesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('propriedades');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Cidades', [
            'foreignKey' => 'cidade_id'
        ]);
        $this->hasMany('Tanques', [
            'foreignKey' => 'propriedade_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->add('tamanho', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('tamanho');

        $validator
            ->requirePresence('endereco')
            ->notEmpty('endereco');

        $validator
            ->requirePresence('cidade_id')
            ->notEmpty('cidade_id');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'));
        $rules->add($rules->existsIn(['cidade_id'], 'Cidades'));
        return $rules;
    }
}
