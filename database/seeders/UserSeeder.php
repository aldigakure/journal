<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();
        foreach($roles as $role){
            $user=User::updateOrCreate([
                'email' => strtolower($role->name).'@gmail.com',
                'password' => bcrypt(strtolower($role->name).'123'),
                'email_verified_at' => now(),
                'name' => ucfirst(strtolower($role->name)),
            ]);
            $user->assignRole($role->name);
        }
       
    }
}
