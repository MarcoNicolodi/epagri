<?php
namespace App\Test\TestCase\Controller;

use App\Controller\VisitasController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\VisitasController Test Case
 */
class VisitasControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.visitas',
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
        'app.categorias_cultivos',
        'app.especies',
        'app.parametros_ideais'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
