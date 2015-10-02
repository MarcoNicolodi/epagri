<?php
namespace App\Model\Table;

use App\Model\Entity\Ciclo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ciclos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Tanques
 * @property \Cake\ORM\Association\BelongsTo $Status
 * @property \Cake\ORM\Association\HasMany $EspeciesCategoriasCultivos
 * @property \Cake\ORM\Association\HasMany $Visitas
 */
class CiclosTable extends Table
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

        $this->table('ciclos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Tanques', [
            'foreignKey' => 'tanque_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Status', [
            'foreignKey' => 'status_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('EspeciesCategoriasCultivos', [
            'foreignKey' => 'ciclo_id'
        ]);
        $this->hasMany('Visitas', [
            'foreignKey' => 'ciclo_id'
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
            ->add('data_inicio', 'valid', ['rule' => 'date'])
            ->requirePresence('data_inicio', 'create')
            ->notEmpty('data_inicio');

        $validator
            ->add('povoamento_inicio', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('povoamento_inicio');

        $validator
            ->add('data_fim', 'valid', ['rule' => 'date'])
            ->allowEmpty('data_fim');

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
        $rules->add($rules->existsIn(['tanque_id'], 'Tanques'));
        $rules->add($rules->existsIn(['status_id'], 'Status'));
        return $rules;
    }
}
