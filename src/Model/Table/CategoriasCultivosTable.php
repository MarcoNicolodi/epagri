<?php
namespace App\Model\Table;

use App\Model\Entity\CategoriasCultivo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CategoriasCultivos Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Especies
 */
class CategoriasCultivosTable extends Table
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

        $this->table('categorias_cultivos');
        $this->displayField('nome');
        $this->primaryKey('id');

        $this->belongsToMany('Especies', [
            'foreignKey' => 'categorias_cultivo_id',
            'targetForeignKey' => 'especie_id',
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
