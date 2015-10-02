<?php
namespace App\Model\Table;

use App\Model\Entity\Especie;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Especies Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $CategoriasCultivos
 */
class EspeciesTable extends Table
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

        $this->table('especies');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->belongsToMany('CategoriasCultivos', [
            'foreignKey' => 'especie_id',
            'targetForeignKey' => 'categorias_cultivo_id',
            'joinTable' => 'especies_categorias_cultivos'
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
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->allowEmpty('descricao');

        return $validator;
    }
}
