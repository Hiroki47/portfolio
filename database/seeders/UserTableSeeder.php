<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = [
            [
                'name' => 'Kyle Admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin12345'),
                'role_id' => 1,
                'created_at' => NOW(),
                'updated_at' => NOW()
            ]
            ];

            $this->user->insert($admin);

        // $this->user->name = 'Kyle Admin';
        // $tis->user->email = 'admin@admin.com';
        // ...
        // $this->user->save();
    }
}
