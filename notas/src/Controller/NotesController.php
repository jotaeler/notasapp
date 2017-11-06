<?php
namespace App\Controller;

class NotesController extends AppController
{

	public function beforeFilter(\Cake\Event\Event $event)
		{
				 $this->Auth->allow(['index']);
				 //$this->Auth->allow(['logout']);
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
			$this->set(compact('user'));
			if (isset($user)){
				$username = $this->Auth->user('username');
				$this->set(compact('username'));
			}
  	}

	public function view($id){
			//TO-DO
	}

	public function add(){

			//TO-DO
	}

	public function del($id){
			//TO-DO
	}

	public function isOwnedBy($user_id, $note_id){
		$note = $this->Notes->find($note_id);
		if($note['user_id'] == $user_id){
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
      // The owner of an article can edit and delete it
			if (isset($user) && $user['id'] == $this->Auth->user()['id']) {
				if($this->request->getParam('pass.0') != null){
			//Significa que estamos intentando acceder a una nota concreta, ya sea para verla, editarla o eliminarla
					if($this->Notes->isOwnedBy($user['id'], (int)$this->request->getParam('pass.0'))){
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
