<?php
namespace App\Model\Table;

use App\Model\Entity\EspeciesCategoriasCultivo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EspeciesCategoriasCultivos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $CategoriasCultivos
 * @property \Cake\ORM\Association\BelongsTo $Especies
 * @property \Cake\ORM\Association\BelongsTo $Ciclos
 */
class EspeciesCategoriasCultivosTable extends Table
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

        $this->table('especies_categorias_cultivos');
        $this->displayField('categorias_cultivo_id');
        $this->primaryKey(['categorias_cultivo_id', 'especie_id']);

        $this->belongsTo('CategoriasCultivos', [
            'foreignKey' => 'categorias_cultivo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Especies', [
            'foreignKey' => 'especie_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Ciclos', [
            'foreignKey' => 'ciclo_id',
            'joinType' => 'INNER'
        ]);
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
        $rules->add($rules->existsIn(['categorias_cultivo_id'], 'CategoriasCultivos'));
        $rules->add($rules->existsIn(['especie_id'], 'Especies'));
        $rules->add($rules->existsIn(['ciclo_id'], 'Ciclos'));
        return $rules;
    }
}
