<?php
namespace App\Model\Table;

use App\Model\Entity\Cidade;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CidadesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('cidades');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->belongsTo('Estados', [
            'foreignKey' => 'estado_id'
        ]);
        $this->hasMany('Propriedades', [
            'foreignKey' => 'cidade_id'
        ]);
        $this->hasMany('Usuarios', [
            'foreignKey' => 'cidade_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('nome');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['estado_id'], 'Estados'));
        return $rules;
    }
}
