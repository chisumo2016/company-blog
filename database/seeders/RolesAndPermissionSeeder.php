<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Models that need permissions
        $models = [
            'about',
            'answers',
            'apps',
            'categories',
            'clarifies',
            'connects',
            'contacts',
            'cores',
            'features',
            'finances',
            'posts',
            'sliders',
            'teams',
            'testimonials',
            'usability',
            'users',
            'roles',
        ];

        // Standard Filament-style permissions
        $actions = [
            'view_any',
            'view',
            'create',
            'update',
            'delete',
            'restore',
            'force_delete',
            'force_delete_any',
            'restore_any',
            'replicate',
            'reorder',
        ];

        // Create all permissions for each model
        foreach ($models as $model) {
            foreach ($actions as $action) {
                Permission::firstOrCreate([
                    'name' => "{$action}_{$model}"
                ]);
            }
        }

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /*
        |--------------------------------------------------------------------------
        | Create Moderator Role
        |--------------------------------------------------------------------------
        */

        Role::firstOrCreate(['name' => 'moderator'])
            ->givePermissionTo([
                // User permissions
                'view_any_users',
                'view_users',
                'create_users',
                'update_users',
                'force_delete_users',
                'force_delete_any_users',
                'restore_users',
                'restore_any_users',
                'replicate_users',
                'reorder_users',

                // Post permissions
                'view_any_posts',
                'view_posts',
                'create_posts',
                'update_posts',
                'force_delete_posts',
                'force_delete_any_posts',
                'restore_posts',
                'restore_any_posts',
                'replicate_posts',
                'reorder_posts',
            ]);

    }
}
