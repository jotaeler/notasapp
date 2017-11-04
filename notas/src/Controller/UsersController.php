<?php
namespace App\Controller;
use Cake\Log\Log;

class UsersController extends AppController
{

    public function beforeFilter(\Cake\Event\Event $event)
    {
         //$this->Auth->allow(['logout']);
         $this->Auth->deny(['edit','view']);
    }

    public function index()
    {

    }

    public function view($id)
    {
        $user = $this->Users->get($id);
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
                $this->Flash->error('Datos incorrectos', ['key' => 'auth']);
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function edit($id)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('Los cambios se han guardado.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Los datos no se guardaron. Por favor, vuelve a intentarlo.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    public function isAuthorized($user){
      Log::write('debug',$user);
      Log::write('debug',$this->Auth->user());
      if(isset($user) && $user['id'] == $this->Auth->user()['id']){
        return true;
      }else{
        return false;
      }
    }

}

?>
