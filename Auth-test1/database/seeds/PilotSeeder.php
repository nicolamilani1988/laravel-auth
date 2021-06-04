<?php

use Illuminate\Database\Seeder;
use App\Car;
use App\Pilot;

class PilotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pilot::class, 30) -> create()
            -> each(function($pilots) {
            $cars = Car::inRandomOrder() 
                        -> limit(rand(1,3))
                        -> get();
            $pilots -> cars() -> attach($cars);
            $pilots -> save();
        });
    }
}
