<?php

use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Type::count() == 0){
            Type::firstOrCreate([
                'name' => "Hành động",
                'status' => 1,
                'created_by' => 'seeder',
                'updated_by' => 'seeder'
            ]);
            Type::firstOrCreate([
                'name' => "Phép thuật",
                'status' => 1,
                'created_by' => 'seeder',
                'updated_by' => 'seeder'
            ]);
            Type::firstOrCreate([
                'name' => "Harem",
                'status' => 1,
                'created_by' => 'seeder',
                'updated_by' => 'seeder'
            ]);
        }
    }
}
