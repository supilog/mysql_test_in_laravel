<?php

namespace Database\Seeders;

use App\Models\Test;
use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{
    public function run()
    {
        $num = 10000;
        for($i = 0; $i < 10; $i++){
            Test::factory()->count($num)->create();
        }
    }
}
