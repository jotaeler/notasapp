<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;

class NotesController extends AppController
{

		public function initizalize() {
    	parent::inintialize();
    	$this->loadComponent('Flash');
    }

    public function view()
    {
			$notes = TableRegistry::get('Notes')->find('all')->contain(['Users']);
			foreach ($notes as $note) {
				echo $note->users[0]->text;
			}

			$this->set(compact('notes'));
    }
}

?>
