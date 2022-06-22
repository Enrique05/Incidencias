<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Incident;
use App\User;
use App\Status;
use App\Operator;
use App\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        // factory(Role::class)->create(['name' => 'Administrador']);
        // factory(Role::class)->create(['name' => 'Operador']);
        // factory(Role::class)->create(['name' => 'User']);
        // factory(Role::class)->create(['name' => 'Sin atender']);
      
        
        // factory(Status::class)->create(['name' => 'Abierto']);
        // factory(Status::class)->create(['name' => 'En revision']);
        // factory(Status::class)->create(['name' => 'Cerrado']);
        
        //factory(User::class)->create(['name'=>'Sin Operador','email'=>'administrador@quiriquiregas.com','level'=> 1]);

        // factory(User::class)->create(['name'=>'Administrador','email'=>'administrador@quiriquiregas.com','role_id'=> 1,'password' => Hash::make('Ingreso01')]);
        // factory(User::class)->create(['name'=>'Enrique Martinez','email'=>'martineze@quiriquiregas.com','role_id'=> 1,'password' => Hash::make('Ingreso01')]);
        // factory(User::class)->create(['name'=>'Alejandro Parrilla','email'=>'parrillaa@quiriquiregas.com','role_id'=> 1,'password' => Hash::make('Ingreso01'),]);
        // factory(User::class)->create(['name'=>'Maria Rengel','email'=>'rengelm@quiriquiregas.com','role_id'=> 3,'password' => Hash::make('Ingreso01'),]);

        // factory(User::class)->create(['name'=>'Yanimar Cancino','email'=>'cancinoyn@quiriquiregas.com','role_id'=> 3,'password' => Hash::make('Ingreso01')]);
        
        // factory(Operator::class)->create(['user_id' => 1]);
        // factory(Operator::class)->create(['user_id' => 2]);
        // factory(Operator::class)->create(['user_id' => 3]);
        


        factory(User::class,10)->create();
        // factory(Incident::class,20)->create();
        // factory(Comment::class,100)->create();

        
        factory(Incident::class, 20)->create()->each(function($incident){
            
            $incident->user()->save(User::class)->make();
            $incident->status()->save(Status::class)->make();
            $number_comments = rand(1,6);

	            for($i=0; $i < $number_comments;$i++){
	    
	            $incident->comments()->save(factory(Comment::class)->make());
	    
                } 
                
        });
        
    }
}
