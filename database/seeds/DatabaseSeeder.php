<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    protected $tables = [
//         'users',
//         'tags',
//         'elements',
//         'items',
//        'groups',
        'reviews',
    ];

    protected $seeders = [
//          'UserTableSeeder',
//          'TagTableSeeder',
//          'ElementTableSeeder',
//          'ItemTableSeeder',
//         'GroupTableSeeder',
         'ReviewTableSeeder',

    ];

    public function run()
    {
        Model::unguard();

        $this->cleanDatabase();

        foreach ($this->seeders as $seedClass) {
            $this->call($seedClass);
        }

        // $this->call(TableSeeder::class);

        Model::reguard();
    }

        public function cleanDatabase()
        {
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
            foreach ($this->tables as $table) {
                DB::table($table)->truncate();
            }
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
}
