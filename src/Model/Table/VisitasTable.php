<?php
namespace App\Model\Table;

use App\Model\Entity\Visita;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class VisitasTable extends Table
{

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

        $this->hasOne('Notificacoes', [
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
            ->add('ciclo_id','valid',['rule' => 'numeric'])
            ->requirePresence('ciclo_id')
            ->notEmpty('ciclo_id');

        // $validator
        //     ->add('data','valid',['rule' => 'date'])
        //     ->requirePresense('data')
        //     ->notEmpty('data');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['ciclo_id'], 'Ciclos'));
        return $rules;
    }

    public function getOwner($id)
    {
        $q = $this->find('all')->where(['Visitas.id' => $id])->contain(['Ciclos' => ['Tanques' => ['Propriedades' => ['Usuarios']]]])->first();
        return $q->ciclo->tanque->propriedade->usuario->id_usuario;
    }
}
