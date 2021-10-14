<?php

use Illuminate\Database\Seeder;
use Caffeinated\Shinobi\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name'=>'Admin',
            'slug'=>'admin',
            'special'=>'all-access',
        ]);
        $user = User::create([
            'name'=>'Admin',
            'email'=>'admin@gmail.com',
            'password'=>'$2y$10$HSphzVe7y78W5bvnpUIarOkb1561y6OP66GoxQB2rzdMy1BQP5j2O',
        ]);

        $user->roles()->sync(1);
    }
}
