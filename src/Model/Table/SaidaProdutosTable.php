<?php
namespace App\Model\Table;

use App\Model\Entity\SaidaProduto;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class SaidaProdutosTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('saida_produtos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Produtos', [
            'foreignKey' => 'produto_id',
            'joinType' => 'INNER'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->add('qtde', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('qtde');

        $validator
            ->allowEmpty('data');

        return $validator;
    }

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['produto_id'], 'Produtos'));
        return $rules;
    }
}
