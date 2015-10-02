<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EspeciesCategoriasCultivosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EspeciesCategoriasCultivosTable Test Case
 */
class EspeciesCategoriasCultivosTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.especies_categorias_cultivos',
        'app.categorias_cultivos',
        'app.especies',
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
        $config = TableRegistry::exists('EspeciesCategoriasCultivos') ? [] : ['className' => 'App\Model\Table\EspeciesCategoriasCultivosTable'];
        $this->EspeciesCategoriasCultivos = TableRegistry::get('EspeciesCategoriasCultivos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EspeciesCategoriasCultivos);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
