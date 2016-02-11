<?php
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;

class AppController extends Controller
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
              'authorize' => 'Controller',
              'unauthorizedRedirect' => ['controller' => 'propriedades','action' => 'index'],
              'authError' => 'Você não está autorizado a acessar esse conteúdo',
              'flash' => [
                  'element' => 'error'
              ],
              'authenticate' => [
                  'Form' => [
                      'userModel' => 'Usuarios',
                      'fields' => [
                          'username' => 'email',
                          'password' => 'password'
                      ]
                  ]
              ],
              'loginAction' => [
                  'controller' => 'Usuarios',
                  'action' => 'login'
              ]
        ]);

    }

    public function isAuthorized($user = null)
    {
        if($user['autorizacao'] === 'admin' || $user['autorizacao'] === 'epagri'){
            return true;
        }
    }

    public function beforeRender(Event $event)
    {
        $this->eventManager()->off($this->Csrf);
        $this->response->header('Access-Control-Allow-Origin', '*');
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
}
