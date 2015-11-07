<?php
namespace App\Model\Table;

use App\Model\Entity\Notificacao;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class NotificacoesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('notificacoes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Visitas', [
            'foreignKey' => 'visita_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('alimentacao');

        $validator
            ->allowEmpty('aeradores');

        $validator
            ->allowEmpty('alerta_alimentacao');

        $validator
            ->allowEmpty('alerta_aeradores');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['visita_id'], 'Visitas'));
        return $rules;
    }
}
