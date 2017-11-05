<?php
namespace App\Controller;

class NotesController extends AppController
{

		public function beforeFilter(\Cake\Event\Event $event)
		{
				 $this->Auth->allow(['view']);
				 //$this->Auth->allow(['logout']);
		}

		public function initizalize() {
    	parent::inintialize();
    	$this->loadComponent('Flash');
    }

    public function view()
    {
			$user = $this->Auth->user();
			$notes = $this->Notes->find()->contain(['Users'])->where(['private !=' => true]);
			$this->set(compact('notes'));

			if (isset($user)){
				$username = $this->Auth->user('username');
				$this->set(compact('username'));
			}
    }
}

?>
