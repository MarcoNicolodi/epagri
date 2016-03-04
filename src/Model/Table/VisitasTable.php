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

    public function getMediaPesoPeixes($ciclo_id)
    {
        $q = $this->find('all')->where(['ciclo_id' => $ciclo_id]);
        $q->select(['media_peso_peixes' => $q->func()->avg('Visitas.peso_peixes')]);
        return $q->first()->media_peso_peixes;
    }

    public function getMediaLarguraPeixes($ciclo_id)
    {
        $q = $this->find('all')->where(['ciclo_id' => $ciclo_id]);
        $q->select(['media_largura_peixes' => $q->func()->avg('Visitas.largura_peixes')]);
        return $q->first()->media_largura_peixes;
    }

    public function getMediaOxigenacaoAgua($ciclo_id)
    {
        $q = $this->find('all')->where(['ciclo_id' => $ciclo_id]);
        $q->select(['media_oxigenacao_agua' => $q->func()->avg('Visitas.oxigenio_agua')]);
        return $q->first()->media_oxigenacao_agua;
    }

    public function getMediaIonizacaoAgua($ciclo_id)
    {
        $q = $this->find('all')->where(['ciclo_id' => $ciclo_id]);
        $q->select(['media_ionizacao_agua' => $q->func()->avg('Visitas.ionizacao_agua')]);
        return $q->first()->media_ionizacao_agua;
    }

    public function getMediaTemperaturaAgua($ciclo_id)
    {
        $q = $this->find('all')->where(['ciclo_id' => $ciclo_id]);
        $q->select(['media_temperatura_agua' => $q->func()->avg('Visitas.temperatura_agua')]);
        return $q->first()->media_temperatura_agua;
    }

    public function getAllMedias($ciclo_id)
    {
        $dados = [];

        $dados['media_peso_peixes'] = $this->getMediaPesoPeixes($ciclo_id);
        $dados['media_largura_peixes'] = $this->getMediaLarguraPeixes($ciclo_id);
        $dados['media_ionizacao_agua'] = $this->getMediaIonizacaoAgua($ciclo_id);
        $dados['media_oxigenacao_agua'] = $this->getMediaOxigenacaoAgua($ciclo_id);
        $dados['media_temperatura_agua'] = $this->getMediaTemperaturaAgua($ciclo_id);

        return $dados;
    }

    public function getCicloId($visita_id)
    {
        $visita = $this->find('all')->where(['id'=>$visita_id])->first();
        return $visita->ciclo_id;

    }
}
