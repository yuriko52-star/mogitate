<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Season;

use Illuminate\Database\Seeder;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $seasons = ['春','夏','秋','冬'];
        foreach($seasons as $season) {
            Season::create(['name' => $season]);
        }
    }
}
