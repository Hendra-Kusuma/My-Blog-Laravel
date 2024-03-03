<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // create permissions
        Permission::create(['name' => 'edit articles']);
        Permission::create(['name' => 'delete articles']);
        Permission::create(['name' => 'create articles']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('create articles');

        $role2 = Role::create(['name' => 'editor']);
        $role2->givePermissionTo('edit articles');
        $role2->givePermissionTo('delete articles');

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Hendra Writer',
            'email' => 'test@writer.com',
        ]);
        $user->assignRole($role1);

        $user2 = \App\Models\User::factory()->create([
            'name' => 'Hendra Editor',
            'email' => 'admin@editor.com',
        ]);
        $user2->assignRole($role2);
    }
}
