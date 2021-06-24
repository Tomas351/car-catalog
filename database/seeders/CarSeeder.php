<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cars')->insert([
                [
                    "brand"       =>    "Audi",
                    "model"      =>    "A5",
                    "fuel_type"      =>    "Diesel",
                    "fuel_tank_capacity"        =>    "60",
                    "max_speed"    =>    "230",
                    "price"    =>    "8999",
                    "color"    =>    "Yellow",
                    "description"    =>    "A great daily",
                    "horsepower"    =>    "180",
                    "transmission" =>    "Automatic"
                ],
                [
                    "brand"       =>    "Volkswagen",
                    "model"      =>    "Golf",
                    "fuel_type"      =>    "Diesel",
                    "fuel_tank_capacity"        =>    "65",
                    "max_speed"    =>    "200",
                    "price"    =>    "1999",
                    "color"    =>    "Green",
                    "description"    =>    "Great all around car",
                    "horsepower"    =>    "89",
                    "transmission" =>    "Manual"
                ],
                [
                    "brand"       =>    "Ford",
                    "model"      =>    "Fiesta",
                    "fuel_type"      =>    "Diesel",
                    "fuel_tank_capacity"        =>    "70",
                    "max_speed"    =>    "190",
                    "price"    =>    "4999",
                    "color"    =>    "Blue",
                    "description"    =>    "Old but reliable",
                    "horsepower"    =>    "80",
                    "transmission" =>    "Manual"
                ],
                [
                    "brand"       =>    "BMW",
                    "model"      =>    "335i",
                    "fuel_type"      =>    "Petrol",
                    "fuel_tank_capacity"        =>    "80",
                    "max_speed"    =>    "250",
                    "price"    =>    "13000",
                    "color"    =>    "Silver",
                    "description"    =>    "Very fast",
                    "horsepower"    =>    "300",
                    "transmission" =>    "Automatic"
                ]
        ]);
    }
}
