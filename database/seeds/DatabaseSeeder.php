<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Basic roles data
        App\Role::insert([
            ['name' => 'admin'],
            ['name' => 'user'],
        ]);

        // Basic permissions data
        App\Permission::insert([
            ['name' => 'admin.home'],
            ['name' => 'user.profile'],
            ['name' => 'user.post'],
            ['name' => 'user.editpost'],
            ['name' => 'user.deletepost'],
        ]);

        // Add a permission to a role
        $role = App\Role::where('name', 'admin')->first();
        $role->addPermission('admin.home');

        //Add User Permission
        $user = App\Role::where('name', 'user')->first();
        $user->addPermission('user.profile');
        $user->addPermission('user.post');
        $user->addPermission('user.editpost');
        $user->addPermission('user.deletepost');

        // Create a user, and give roles
        $user = App\User::create([
            'name' => 'Admin Putri',
            'email' => 'putridamayanti13@yahoo.com',
            'password' => bcrypt('200895'),
        ]);

        $user->assignRole('admin');

        // $this->call(UserTableSeeder::class);
    }
}
