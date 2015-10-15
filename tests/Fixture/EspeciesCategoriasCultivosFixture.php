<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EspeciesCategoriasCultivosFixture
 *
 */
class EspeciesCategoriasCultivosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'categorias_cultivo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'especie_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ciclo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_ctg_cultivo_has_especie_especie1_idx' => ['type' => 'index', 'columns' => ['especie_id'], 'length' => []],
            'fk_ctg_cultivo_has_especie_ctg_cultivo1_idx' => ['type' => 'index', 'columns' => ['categorias_cultivo_id'], 'length' => []],
            'fk_ctg_cultivo_has_especie_ciclo1_idx' => ['type' => 'index', 'columns' => ['ciclo_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['categorias_cultivo_id', 'especie_id'], 'length' => []],
            'fk_ctg_cultivo_has_especie_ciclo1' => ['type' => 'foreign', 'columns' => ['ciclo_id'], 'references' => ['ciclos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ctg_cultivo_has_especie_ctg_cultivo1' => ['type' => 'foreign', 'columns' => ['categorias_cultivo_id'], 'references' => ['categorias_cultivos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_ctg_cultivo_has_especie_especie1' => ['type' => 'foreign', 'columns' => ['especie_id'], 'references' => ['especies', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'categorias_cultivo_id' => 1,
            'especie_id' => 1,
            'ciclo_id' => 1
        ],
    ];
}
