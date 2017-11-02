<?php
use Migrations\AbstractMigration;

class CreateNotesData extends AbstractMigration
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

        $populator -> addEntity ('Notes', 100, [

        	'title' => function () use ($faker) {
        		return $faker-> sentence ($nbwords = 3, $variableNbWords = true);
        	},

        	'content' => function () use ($faker) {
        		return $faker-> paragraph ($nbsentences = 3, $variableNbSentences = true);
        	},

			'private' => function (){ 
        		return rand (0,1);
        	},       	

        	'created' => function() use ($faker){
        		return $faker -> dateTimeBetween($startDate = 'now', $endDate = 'now');
        	},

        	'modified' => function() use ($faker){
        		return $faker -> dateTimeBetween($startDate = 'now', $endDate = 'now');
        	},

        	'user_id' => function () {
        		return rand (1,10);
        	}

        ]);

        $populator->execute();
   	}
   }
