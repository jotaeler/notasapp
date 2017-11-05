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
			$notes = $this->Notes->find()->contain(['Users'])->where(['private !=' => true]);
			echo $notes->count();
			$this->set(compact('notes'));
    }
}

?>
