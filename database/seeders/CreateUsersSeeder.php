<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
               'name'=>'Admin 1',
               'email'=>'admin@localhost',
               'type'=>1,
               'password'=> Hash::make('123456')
            ],
            [
               'name'=>'Technician 1',
               'email'=>'technician@localhost',
               'type'=> 2,
               'password'=> Hash::make('123456')
            ],
            [
               'name'=>'User 1',
               'email'=>'user@localhost',
               'type'=>3,
               'password'=> Hash::make('123456')
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}
