<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Administrator;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Menu;



class AdminTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create a user.
        Administrator::truncate();
        Administrator::insert([
            [
                'username' => 'admin',
                'password' => '$2y$10$mtu208GvsO2fAKbBj5vPZ.aKM8L6tdfGzaqJFOztzgsi9sX7O4L.m',
                'name'     => 'Administrator',
            ],
            [
                'username' => 'trieutran',
                'password' => Hash::make('trieu@123'),
                'name'     => 'Trieu Tran',
            ]
        ]);

        // create a role.
        Role::truncate();
        Role::insert([
            [
                'name' => 'Administrator',
                'slug' => 'administrator',
            ],
            [
                'name' => 'Manager',
                'slug' => 'Manager',
            ]
        ]);

        // add role to user.
        Administrator::first()->roles()->save(Role::first());
        Administrator::find(2)->roles()->save(Role::find(2));

        //create a permission
        Permission::truncate();
        Permission::insert([
            [
                'name'        => 'All permission',
                'slug'        => '*',
                'http_method' => '',
                'http_path'   => '*',
            ],
            [
                'name'        => 'Dashboard',
                'slug'        => 'dashboard',
                'http_method' => 'GET',
                'http_path'   => '/',
            ],
            [
                'name'        => 'Login',
                'slug'        => 'auth.login',
                'http_method' => '',
                'http_path'   => "/auth/login\r\n/auth/logout",
            ],
            [
                'name'        => 'User setting',
                'slug'        => 'auth.setting',
                'http_method' => 'GET,PUT',
                'http_path'   => '/auth/setting',
            ],
            [
                'name'        => 'Auth management',
                'slug'        => 'auth.management',
                'http_method' => '',
                'http_path'   => "/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs",
            ],
            [
                'name'        => 'Modules',
                'slug'        => 'modules',
                'http_method' => '',
                'http_path'   => "/episodes\r\n/films\r\n/film-categories\r\n/types\r\n/countries\r\n/ads",
            ]
        ]);

        Role::first()->permissions()->save(Permission::first());
        Role::find(2)->permissions()->save(Permission::find(6));

        // add default menus.
        Menu::truncate();
        Menu::insert([
            [
                'parent_id' => 0,
                'order'     => 1,
                'title'     => 'Dashboard',
                'icon'      => 'fa-bar-chart',
                'uri'       => '/',
                'permission' => '',
            ],
            [
                'parent_id' => 0,
                'order'     => 8,
                'title'     => 'Admin',
                'icon'      => 'fa-tasks',
                'uri'       => '',
                'permission' => '',
            ],
            [
                'parent_id' => 2,
                'order'     => 9,
                'title'     => 'Users',
                'icon'      => 'fa-users',
                'uri'       => 'auth/users',
                'permission' => '',
            ],
            [
                'parent_id' => 2,
                'order'     => 10,
                'title'     => 'Roles',
                'icon'      => 'fa-user',
                'uri'       => 'auth/roles',
                'permission' => '',
            ],
            [
                'parent_id' => 2,
                'order'     => 11,
                'title'     => 'Permission',
                'icon'      => 'fa-ban',
                'uri'       => 'auth/permissions',
                'permission' => '',
            ],
            [
                'parent_id' => 2,
                'order'     => 12,
                'title'     => 'Menu',
                'icon'      => 'fa-bars',
                'uri'       => 'auth/menu',
                'permission' => '',
            ],
            [
                'parent_id' => 2,
                'order'     => 13,
                'title'     => 'Operation log',
                'icon'      => 'fa-history',
                'uri'       => 'auth/logs',
                'permission' => '',
            ],
            [
                'parent_id' => 0,
                'order' => 4,
                'title' => "Film Category",
                'icon' => 'fa-film',
                'uri' => 'film-categories',
                'permission' => 'modules'
            ], 
            [
                'parent_id' => 0,
                'order' => 3,
                'title' => "Film",
                'icon' => 'fa-play',
                'uri' => 'films',
                'permission' => 'modules'
            ], 
            [
                'parent_id' => 0,
                'order' => 2,
                'title' => "Episode",
                'icon' => 'fa-play-circle-o',
                'uri' => 'episodes',
                'permission' => 'modules'
            ],
            [
                'parent_id' => 0,
                'order' => 6,
                'title' => "Country",
                'icon' => 'fa-flag',
                'uri' => 'countries',
                'permission' => 'modules'
            ],
            [
                'parent_id' => 0,
                'order' => 7,
                'title' => "Ad",
                'icon' => 'fa-tv',
                'uri' => 'ads',
                'permission' => 'modules'
            ],
            [
                'parent_id' => 0,
                'order' => 5,
                'title' => "Type",
                'icon' => 'fa-file-movie-o',
                'uri' => 'types',
                'permission' => 'modules'
            ]
        ]);

        // add role to menu.
        Menu::find(2)->roles()->save(Role::first());
    }
}
