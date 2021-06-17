<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Translation\Dumper\CsvFileDumper;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$CGhEbwk0uFaWzmEz7qhC5u3Y7H0Ac0KMSKOsTb4OAK.97h8X363QG',
                'remember_token' => 'mVugWTt6zVlAjV4hI6GBsSgd0t1n4zv7fQxVaJnY4OMFFLc6PtOBmkNLe5T5',
                'status' => 1,
            ],
            [
                'id' => 2,
                'name' => 'kullanıcı',
                'email' => 'kullanici@gmail.com',
                'password' => '$2y$10$n23wSYCAIUewGU7NgdihIeWxVqsrO4tulQ4K2Dimd2R6PtMA0Ot3G',
                'remember_token' => 'mVugWTt6zVlAjV4hI6GBsSgd0t1n4zv7fQxVaJnY4OMFFLc6PtOBmkNLe5T5',
                'status' => 0,
            ],

        ]);

    }
}
