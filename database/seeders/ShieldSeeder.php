<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class ShieldSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[{"name":"super_admin","guard_name":"web","permissions":["view_guest","view_any_guest","create_guest","update_guest","restore_guest","restore_any_guest","replicate_guest","reorder_guest","delete_guest","delete_any_guest","force_delete_guest","force_delete_any_guest","view_hotel","view_any_hotel","create_hotel","update_hotel","restore_hotel","restore_any_hotel","replicate_hotel","reorder_hotel","delete_hotel","delete_any_hotel","force_delete_hotel","force_delete_any_hotel","view_payment","view_any_payment","create_payment","update_payment","restore_payment","restore_any_payment","replicate_payment","reorder_payment","delete_payment","delete_any_payment","force_delete_payment","force_delete_any_payment","view_period","view_any_period","create_period","update_period","restore_period","restore_any_period","replicate_period","reorder_period","delete_period","delete_any_period","force_delete_period","force_delete_any_period","view_role","view_any_role","create_role","update_role","delete_role","delete_any_role","view_room","view_any_room","create_room","update_room","restore_room","restore_any_room","replicate_room","reorder_room","delete_room","delete_any_room","force_delete_room","force_delete_any_room","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user"]},{"name":"filament_user","guard_name":"web","permissions":[]}]';
        $directPermissions = '[]';

        static::makeRolesWithPemrissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPemrissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions,true))) {

            foreach ($rolePlusPermissions as $rolePlusPermission) {

                $role = Role::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name']
                ]);

                if (! blank($rolePlusPermission['permissions'])) {

                    $role->givePermissionTo($rolePlusPermission['permissions']);

                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions,true))) {

            foreach($permissions as $permission) {

                if (Permission::whereName($permission)->doesntExist()) {
                    Permission::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
