<?php
namespace App\Model\Table;

use App\Model\Entity\Visita;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Visitas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Ciclos
 * @property \Cake\ORM\Association\BelongsTo $ParametrosIdeais
 */
class VisitasTable extends Table
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

        $this->table('visitas');
        $this->displayField('id');
        $this->primaryKey(['id']);

        $this->belongsTo('Ciclos', [
            'foreignKey' => 'ciclo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('ParametrosIdeais', [
            'foreignKey' => 'params_ideais_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('Notificacoes', [
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
            ->add('oxigenio_agua', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('oxigenio_agua');

        $validator
            ->add('ionizacao_agua', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('ionizacao_agua');

        $validator
            ->add('temperatura_agua', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('temperatura_agua');

        $validator
            ->add('largura_peixes', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('largura_peixes');

        $validator
            ->add('peso_peixes', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('peso_peixes');

        $validator
            ->allowEmpty('data');

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
        $rules->add($rules->existsIn(['ciclo_id'], 'Ciclos'));
        $rules->add($rules->existsIn(['params_ideais_id'], 'ParametrosIdeais'));
        return $rules;
    }
}
