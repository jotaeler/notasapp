<?php
use Migrations\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class CreateDataMigrations extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up(){

        $faker = \Faker\Factory::create();

        $populator = new Faker\ORM\CakePHP\Populator($faker);

        $populator -> addEntity('Users',10,[
            'name' => function() use ($faker){
                return $faker -> firstName();
            },
            'username' => function() use ($faker){
                return $faker -> firstName();
            },
            'password' => function (){
                $hasher = new DefaultPasswordHasher();
                return $hasher -> hash('user');
            },
            'role' => 'user'
            // 'created' => function () use ($faker){
            //     return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
            // },
            // 'modified' => function () use ($faker){
            //     return $faker->dateTimeBetween($startDate = 'now', $endDate = 'now');
            // }

        ]);

        $populator -> execute();
    }
}
