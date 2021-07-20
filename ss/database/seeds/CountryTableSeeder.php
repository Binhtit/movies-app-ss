<?php

use Illuminate\Database\Seeder;
use App\Models\Country;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(Country::count() == 0){
            $countries = Country::getList('en');
            foreach($countries as $country){
                Country::firstOrCreate([
                    'name' => $country,
                    'status' => 1,
                    'created_by' => 'seeder',
                    'updated_by' => 'seeder',
                ]);
            }
        }

    }
}
