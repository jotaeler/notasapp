<?php
namespace App\Controller;
use Cake\Log\Log;

class UsersController extends AppController
{

    public function beforeFilter(\Cake\Event\Event $event)
    {
        $this->Auth->deny(['edit','view']);
        $this->Auth->allow(['logout','login']);
        $this->set('current_user', $this->Auth->user());
    }

    public function index()
    {
        exit();
    }

    public function view()
    {
        $user = $this->Users->get($this->Auth->user()['id']);
        $this->set(compact('user'));
    }

    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{
                $this->Flash->error('Incorrect username or password', ['key' => 'auth']);
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function edit()
    {
        $user = $this->Users->get($this->Auth->user()['id']);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success('Data saved');
                // CORREGIR RUTA DE REDIRECCIÓN //
                return $this->redirect(['controller' => 'Notes', 'action' => 'index']);
            } else {
                $this->Flash->error(__('Something was wrong'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Este método define las condiciones para que un usuario acceda al los métodos
     * que no son públicos. En este caso el usuario debe ser él mismo para poder
     * acceder a los métodos que son afectados por este metodo.
     * @param  [type]  $user [description]
     * @return boolean       [description]
     */
     public function isAuthorized($user){
      // The owner of an article can edit and delete it
      if (isset($user) && $user['id'] == $this->Auth->user()['id']) {
          return true;
      }else{
        return false;
      }
    }

}

?>
