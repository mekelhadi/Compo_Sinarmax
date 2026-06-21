<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        HeroSection::create([
            'achievement' => 'LED Street Lighting Assembly Industry Established in 2015',
            'heading' => 'Welcome to PT.Abadi Benua Cermelang',
            'subheading' => 'Producing products through Quality. Cost and Delivery that meet customer satisfaction.',
            'path_video' => 'ANb-J7Bonl0',
            'banner' => 'banners/Team2.png',
        ]);
    }
}