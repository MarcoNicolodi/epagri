<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * VisitasFixture
 *
 */
class VisitasFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ciclo_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'oxigenio_agua' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'ionizacao_agua' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'temperatura_agua' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'largura_peixes' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'peso_peixes' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'data' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'params_ideais_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_visita_ciclo1_idx' => ['type' => 'index', 'columns' => ['ciclo_id'], 'length' => []],
            'fk_visita_params_ideais1_idx' => ['type' => 'index', 'columns' => ['params_ideais_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'ciclo_id'], 'length' => []],
            'fk_visita_ciclo1' => ['type' => 'foreign', 'columns' => ['ciclo_id'], 'references' => ['ciclos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_visita_params_ideais1' => ['type' => 'foreign', 'columns' => ['params_ideais_id'], 'references' => ['parametros_ideais', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'id' => 1,
            'ciclo_id' => 1,
            'oxigenio_agua' => 1,
            'ionizacao_agua' => 1,
            'temperatura_agua' => 1,
            'largura_peixes' => 1,
            'peso_peixes' => 1,
            'data' => 1443458820,
            'params_ideais_id' => 1
        ],
    ];
}
