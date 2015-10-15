<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PropriedadesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PropriedadesTable Test Case
 */
class PropriedadesTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.propriedades',
        'app.usuarios',
        'app.cidades',
        'app.estados',
        'app.comentarios',
        'app.tabelas',
        'app.estoques',
        'app.produtos',
        'app.tanques'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Propriedades') ? [] : ['className' => 'App\Model\Table\PropriedadesTable'];
        $this->Propriedades = TableRegistry::get('Propriedades', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Propriedades);

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
