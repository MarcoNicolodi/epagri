<?php
namespace App\Model\Table;

use App\Model\Entity\CategoriasCultivo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class CategoriasCultivosTable extends Table
{

    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('categorias_cultivos');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->belongsToMany('Especies', [
            'foreignKey' => 'categorias_cultivo_id',
            'targetForeignKey' => 'especie_id',
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
