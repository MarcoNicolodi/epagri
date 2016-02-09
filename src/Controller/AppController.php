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
