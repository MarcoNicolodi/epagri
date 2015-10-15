<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * TanquesFixture
 *
 */
class TanquesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'cobertura_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'capacidade' => ['type' => 'float', 'length' => null, 'precision' => null, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => ''],
        'nome' => ['type' => 'string', 'length' => 45, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'propriedade_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'id_propriedade_idx' => ['type' => 'index', 'columns' => ['propriedade_id'], 'length' => []],
            'id_cobertura_idx' => ['type' => 'index', 'columns' => ['cobertura_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'id_cobertura' => ['type' => 'foreign', 'columns' => ['cobertura_id'], 'references' => ['coberturas', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'id_propriedade' => ['type' => 'foreign', 'columns' => ['propriedade_id'], 'references' => ['propriedades', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'cobertura_id' => 1,
            'capacidade' => 1,
            'nome' => 'Lorem ipsum dolor sit amet',
            'propriedade_id' => 1
        ],
    ];
}
