<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\User;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create permissions
        Permission::create(['name' => 'edit states']);
        Permission::create(['name' => 'delete states']);
        Permission::create(['name' => 'add states']);
        

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'writer']);
        $role1->givePermissionTo('edit states');
        $role1->givePermissionTo('delete states');

        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo('add states');

        $role3 = Role::create(['name' => 'super-admin']);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        
        // create demo users
        $user = Factory(App\User::class)->create([
            'name' => 'Rodrigo',
            'email' => 'rodrigo@gmail.com',
            
        ]);
        $user->assignRole($role1);

        $user = Factory(App\User::class)->create([
            'name' => 'Juan',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role2);

        $user = Factory(App\User::class)->create([
            'name' => 'Example Super-Admin User',
            'email' => 'superadmin@example.com',
        ]);
        $user->assignRole($role3);
    }
}
