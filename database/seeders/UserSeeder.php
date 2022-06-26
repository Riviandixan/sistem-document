<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
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
                'username' => 'maker@mail.com',
                'password' => bcrypt('password'),
                'role_id' => '1',
            ],
            [
                'username' => 'approver@mail.com',
                'password' => bcrypt('password'),
                'role_id' => '2',
            ],
        ];

        User::insert($users);
    }
}
