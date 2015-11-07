<?php
namespace App\Model\Table;

use App\Model\Entity\Especie;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class EspeciesTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('especies');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->belongsToMany('CategoriasCultivos', [
            'foreignKey' => 'especie_id',
            'targetForeignKey' => 'categorias_cultivo_id',
            'joinTable' => 'especies_categorias_cultivos'
        ]);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->allowEmpty('descricao');

        return $validator;
    }
}
