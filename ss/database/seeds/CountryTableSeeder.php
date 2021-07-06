<?php

use Illuminate\Database\Seeder;
use Monarobase\CountryList\CountryListFacade;
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
            $countries = Countries::getList('en');
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
