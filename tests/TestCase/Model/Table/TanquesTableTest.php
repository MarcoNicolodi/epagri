<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TanquesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TanquesTable Test Case
 */
class TanquesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        'app.ciclos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Tanques') ? [] : ['className' => 'App\Model\Table\TanquesTable'];
        $this->Tanques = TableRegistry::get('Tanques', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Tanques);

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
