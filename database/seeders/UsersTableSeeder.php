<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'zuseadmin',
                'email' => 'zuseadmin@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Ucr1/Or5/4UZssnYSRQeTeiFqXkn6sNRmAq2quuHmS9zsmqhTGcH2',
                'role_id' => 0,
                'role_name' => 'is_admin',
                'remember_token' => NULL,
                'created_at' => '2023-08-16 08:55:26',
                'updated_at' => '2023-08-16 08:55:26',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'test',
                'email' => 'test@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$8cexTTxktgnW5qCjlZATm.wyaRqaQVI41C9a4TMPa1Q9/ThAVmXaG',
                'role_id' => 1,
                'role_name' => 'is_editor',
                'remember_token' => NULL,
                'created_at' => '2023-10-12 10:29:58',
                'updated_at' => '2023-10-12 10:29:58',
            ),
            2 => 
            array (
                'id' => 5,
                'name' => 'VEB@Thisaru.V01',
                'email' => 'VEB@Thisaru.V01',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Iatj6VFIkmHAw0SmbuumceNSv5B3D3vy8YIa.hhmQXlGWMEsxy4.m',
                'role_id' => 1,
                'role_name' => 'is_editor',
                'remember_token' => NULL,
                'created_at' => '2023-10-13 05:01:32',
                'updated_at' => '2023-10-13 05:01:32',
            ),
            3 => 
            array (
                'id' => 6,
                'name' => 'VEB@Chanaka.V02',
                'email' => 'VEB@Chanaka.V02',
                'email_verified_at' => NULL,
                'password' => '$2y$10$68sI.dsYJEj9le4uc06.r.pkD2Pcj1WIgwwPZlO4jx9b37dMFuGpS',
                'role_id' => 1,
                'role_name' => 'is_editor',
                'remember_token' => NULL,
                'created_at' => '2023-10-13 05:01:57',
                'updated_at' => '2023-10-13 05:01:57',
            ),
            4 => 
            array (
                'id' => 7,
                'name' => 'NWS@Dhanushaka.V01',
                'email' => 'NWS@Dhanushaka.V01',
                'email_verified_at' => NULL,
                'password' => '$2y$10$FmmSRiR2v8AN7RWBoUvz../d216/QPeMZkPwE8l/0IYFKvh1k2kG2',
                'role_id' => 1,
                'role_name' => 'is_editor',
                'remember_token' => NULL,
                'created_at' => '2023-10-13 05:02:19',
                'updated_at' => '2023-10-13 05:02:19',
            ),
            5 => 
            array (
                'id' => 8,
                'name' => 'ZUZ@Admin.V01',
                'email' => 'ZUZ@Admin.V01',
                'email_verified_at' => NULL,
                'password' => '$2y$10$w6A.6x4nFasuOhJ6HIXycepKM4kI2mW6dwPfkNlyogGk2E6vwgYDG',
                'role_id' => 1,
                'role_name' => 'is_editor',
                'remember_token' => NULL,
                'created_at' => '2023-10-13 05:02:33',
                'updated_at' => '2023-10-13 05:02:33',
            ),
            6 => 
            array (
                'id' => 9,
                'name' => 'ZUZ@Admin.V02',
                'email' => 'ZUZ@Admin.V02',
                'email_verified_at' => NULL,
                'password' => '$2y$10$t8XmFjOu7ie9edW0e65XrOm.OyvSivkXRRPw/fIi8X6f.8HvsClnu',
                'role_id' => 1,
                'role_name' => 'is_editor',
                'remember_token' => NULL,
                'created_at' => '2023-10-13 05:02:47',
                'updated_at' => '2023-10-13 05:02:47',
            ),
        ));
        
        
    }
}