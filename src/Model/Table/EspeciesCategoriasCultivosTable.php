<?php
namespace App\Model\Table;

use App\Model\Entity\EspeciesCategoriasCultivo;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

class EspeciesCategoriasCultivosTable extends Table
{

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

    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['categorias_cultivo_id'], 'CategoriasCultivos'));
        $rules->add($rules->existsIn(['especie_id'], 'Especies'));
        $rules->add($rules->existsIn(['ciclo_id'], 'Ciclos'));
        return $rules;
    }
}
