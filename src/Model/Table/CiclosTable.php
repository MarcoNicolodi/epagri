<?php
namespace App\Model\Table;

use App\Model\Entity\Ciclo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Model\Table\ArrayObject;
use Cake\Model\Entity;
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
        $this->displayField('nome');
        $this->primaryKey('id');
        $this->addBehavior('Timestamp');

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
            ->add('tanque_id', 'valid', ['rule' => 'numeric'])
            ->requirePresence('tanque_id')
            ->notEmpty('tanque_id');

        $validator
            ->add('data_fim', 'valid', ['rule' => 'date'])
            ->allowEmpty('data_fim');

        $validator
            ->requirePresence('status_id', 'create')
            ->notEmpty('status_id');

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

    //impede o cadastro de um ciclo em um tanque relacionado a um ciclo em atividade(status_id = 1)
    public function beforeSave(Event $event, $entity, \ArrayObject $options)
    {
        $tanques = TableRegistry::get('Tanques')->find()->notMatching('Ciclos', function ($q) {
                                                        return $q->where(['Ciclos.status_id' => 1]);
                                                    })->select('id');

        $ids = [];
        foreach($tanques as $t){
            array_push($ids, $t->id);
        }

        if(in_array($entity->tanque_id,$ids)){
            $event->stopPropagation();
            return false;
        }
        return;
    }

    public function beforeMarshal(Event $event, \ArrayObject $data, \ArrayObject $options)
    {
        if(array_key_exists('data_inicio', $data))
            $data['data_inicio'] = ($data['data_inicio']) ? date("Y-m-d", strtotime(implode('-',array_reverse(explode('/',$data['data_inicio']))))) : '';

        if(array_key_exists('data_fim', $data))
            $data['data_fim'] = ($data['data_fim']) ? date("Y-m-d", strtotime(implode('-',array_reverse(explode('/',$data['data_fim']))))) : '';
    }
}
