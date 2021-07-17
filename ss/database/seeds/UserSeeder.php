<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{   
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\User::class, 10)->create();
        if(User::count() == 0){
            User::firstOrCreate([
                'name' => 'admin',
                'email' => 'admin@example.com',
                'email_verified_at' => '',
                'password' => bcrypt('123456'),
                'remember_token' => '',
                'status' => 1,
                'position' => 0,
                'created_by' => 'seeder',
                'updated_by' => 'seeder',
                'deleted_by' => ''
            ]);
            User::firstOrCreate([
                'name' => 'Dung Tran',
                'email' => 'dungtran@example.com',
                'email_verified_at' => '',
                'password' => bcrypt('123456'),
                'remember_token' => '',
                'status' => 1,
                'position' => 0,
                'created_by' => 'seeder',
                'updated_by' => 'seeder',
                'deleted_by' => ''
            ]);
        }
    }
}
