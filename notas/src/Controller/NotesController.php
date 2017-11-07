<?php
namespace App\Controller;

class NotesController extends AppController
{

	public function beforeFilter(\Cake\Event\Event $event)
	{
		 $this->Auth->allow(['index']);
		 //$this->Auth->allow(['logout']);
		 $this->set('current_user', $this->Auth->user());
	}

	public function initizalize() {
    	parent::initialize();
    	$this->loadComponent('Flash');
    }

   	public function index()
    {
		$user = $this->Auth->user();
		$notes = $this->paginate($this->Notes->find()->contain(['Users'])->where(['private' => false]));
		$this->set(compact('notes'));

		if (isset($user)){
			$username = $this->Auth->user('username');
			$this->set(compact('username'));
		}
    }

	public function owned(){
		$user = $this->Auth->user();
		$notes = $this->paginate($this->Notes->find()->where(['user_id' => $user['id']]));
		$this->set(compact('notes'));
  	}

	public function view($id){
		$user = $this->Auth->user();
		$note = $this->Notes->find()->contain(['Users'])->where(['Notes.id' => $id])->first();
		$this->set(compact('note'));
	}

	public function add(){
		$note = $this->Notes->newEntity();

		if($this->request->is('post')){
			$note = $this->Notes->patchEntity($note, $this->request->data);

			if($this->Notes->save($note)){
				$this->Flash->success('Note added');
				return $this->redirect(['controller'=>'Notes','action'=>'owned']);
			}else{
				$this->Flash->error('Something was wrong');
			}
		}
		$this->set(compact('note'));
	}

	public function del($id){
		$this->request->allowMethod(['post']);
		$note = $this->Notes->get($id);
		if($this->Notes->delete($note)){
			$this->Flash->success('Note deleted');
		}else{
			$this->Flash->error('Something was wrong');
		}
		return $this->redirect(['controller'=>'Notes','action'=>'owned']);
	}

	/**
	 * Comprobar si una nota pertenece a un usuario
	 * @param  [type]  $user_id
	 * @param  [type]  $note_id
	 * @return boolean
	 */
	public function isOwnedBy($user_id, $note_id){
		$note = $this->Notes->find()->where(['id' => $note_id])->first();
		if($note['user_id'] == $user_id){
			return true;
		}else{
			return false;
		}
	}

	/**
	 * Comprobar si una nota es publica o no
	 * @param  [type]  $id
	 * @return boolean
	 */
	public function isPublic($id){
		$note = $this->Notes->find()->where(['id' => $id])->first();
		if(!$note['private']){
			return true;
		}else{
			return false;
		}
	}


		/**
     * Este método define las condiciones para que un usuario acceda al los métodos
     * que no son públicos. En este caso el usuario debe ser él mismo para poder
     * acceder a los métodos que son afectados por este metodo.
     * @param  [type]  $user [description]
     * @return boolean       [description]
     */
    public function isAuthorized($user){
		$action = $this->request->getParam('action');
	    // The add and tags actions are always allowed to logged in users.
	    if (in_array($action, ['view'])) {
			if($this->isPublic($this->request->getParam('pass.0'))){
				return true;
			}
	    }

      	// The owner of an note can edit and delete it
		if (isset($user) && $user['id'] == $this->Auth->user()['id']) {
			if($this->request->getParam('pass.0') != null){
				//Significa que estamos intentando acceder a una nota concreta, ya sea para verla, editarla o eliminarla
				if($this->isOwnedBy($user['id'], (int)$this->request->getParam('pass.0'))){
					return true;
				}else{
					return false;
				}
			}
  			return true;
    	}else{
    		return false;
    	}
    }
}

?>
