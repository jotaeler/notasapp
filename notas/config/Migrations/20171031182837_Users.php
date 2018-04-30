<?php
use Migrations\AbstractMigration;

class Users extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
      $table = $this->table('users');
      $table -> addColumn ('name','string',[
                           'limit' => 100,
                           'null'=> false]);

      $table -> addColumn ('username','string',[
                           'limit' => 50,
                           'null' => false]);

      $table -> addColumn ('password','string',[
                           'limit' => 200,
                           'null' => false]);

      $table -> addColumn ('role','enum',[
                           'values' => 'admin,user']);

      $table -> create();
    }
}
