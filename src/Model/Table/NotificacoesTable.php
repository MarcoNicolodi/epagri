<?php
namespace App\Model\Table;

use App\Model\Entity\Notificacao;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Notificacoes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Visitas
 */
class NotificacoesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
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

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
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

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['visita_id'], 'Visitas'));
        return $rules;
    }
}
