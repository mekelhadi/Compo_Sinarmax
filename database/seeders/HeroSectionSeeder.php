<?php

namespace Database\Seeders;

use App\Models\HeroSection;
use Illuminate\Database\Seeder;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        HeroSection::create([
            'achievement' => 'Street Light Assembly Industry Established in 2015',
            'heading' => 'Welcome to PT.SINARMAX',
            'subheading' => 'Producing products through Quality. Cost and Delivery that meet customer satisfaction.',
            'path_video' => 'ANb-J7Bonl0',
            'banner' => 'banners/Team2.png',
        ]);
    }
}