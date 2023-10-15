<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User as UserModel;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserModel::create(
            [
                'name'     => 'Anggi Prayoga',
                'email'    => 'agan@gmail.com',
                'password' => Hash::make('aga12345'),
            ],
        );
    }
}
