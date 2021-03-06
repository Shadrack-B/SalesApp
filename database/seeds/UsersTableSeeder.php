<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::Class, 1)->create([
        	'name' => 'Sam',
        	'email' => 'sam@gmail.com',
        	'user_type_id' => 1,
            'email_verified_at' => now(),
            
        ]);

        factory(App\User::Class, 1)->create([
        	'name' => 'Michelle',
        	'email' => 'michelle@gmail.com',
        	'user_type_id' => 1,
            'email_verified_at' => now(),
            
        ]);

        factory(App\User::Class, 1)->create([
        	'name' => 'John',
        	'email' => 'john@gmail.com',
        	'user_type_id' => 1,
            'email_verified_at' => now(),
            
        ]);

        factory(App\User::Class, 15)->create();

        factory(App\Usertype::Class, 1)->create([
        	'user_type' => 'Manager',
        ]);

        factory(App\Usertype::Class, 1)->create([
        	'user_type' => 'Supervisor',
        ]);

        factory(App\Usertype::Class, 1)->create([
        	'user_type' => 'Sales Rep',
        ]);

        factory(App\CommissionRate::Class, 1)->create([
        	'user_type_id' => 1,
        	'rate' => 2/100,
        ]);
        factory(App\CommissionRate::Class, 1)->create([
        	'user_type_id' => 2,
        	'rate' => 5/100,
        ]);
        factory(App\CommissionRate::Class, 1)->create([
        	'user_type_id' => 3,
        	'rate' => 10/100, 
        ]);
    }
    
}
