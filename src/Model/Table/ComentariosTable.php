<?php
namespace App\Model\Table;

use App\Model\Entity\Comentario;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class ComentariosTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('comentarios');
        $this->displayField('conteudo');
        $this->primaryKey('id');

        $this->belongsTo('Usuarios', [
            'foreignKey' => 'usuario_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Tabelas', [
            'foreignKey' => 'tabela_id'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->allowEmpty('conteudo');

        $validator
            ->allowEmpty('data');

        $validator
            ->allowEmpty('tabela_nome');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['usuario_id'], 'Usuarios'));
        $rules->add($rules->existsIn(['tabela_id'], 'Tabelas'));
        return $rules;
    }
}
