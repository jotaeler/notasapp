<?php
namespace App\Controller;

class NotesController extends AppController
{

    public function index()
    {
        $notes = $this->Notas->find('all');
        $this->set(compact('notes')); //Esto envia la variable con las notas a la vista
    }
}

?>
