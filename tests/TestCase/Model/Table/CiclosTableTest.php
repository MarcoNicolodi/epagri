<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CiclosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CiclosTable Test Case
 */
class CiclosTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ciclos',
        'app.tanques',
        'app.coberturas',
        'app.propriedades',
        'app.usuarios',
        'app.cidades',
        'app.estados',
        'app.comentarios',
        'app.tabelas',
        'app.estoques',
        'app.produtos',
        'app.status',
        'app.especies_categorias_cultivos',
        'app.visitas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Ciclos') ? [] : ['className' => 'App\Model\Table\CiclosTable'];
        $this->Ciclos = TableRegistry::get('Ciclos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ciclos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
