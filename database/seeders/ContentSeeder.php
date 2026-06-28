<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            // Hero Section
            ['key' => 'hero_heading', 'value' => 'Welcome to <span class="text-cp-dark-blue">PT.Eran Plastindo Utama</span>'],
            ['key' => 'hero_subheading', 'value' => 'Producing products through Quality. Cost and Delivery that meet costumer satisfaction.'],
            ['key' => 'hero_achievement', 'value' => 'Plastic Injection Industry Established in January 2020'],

            // Stats
            ['key' => 'stats_machines_number', 'value' => '35'],
            ['key' => 'stats_machines', 'value' => 'Maximum Brightness'],

            // Company Profile
            ['key' => 'company_profile_title', 'value' => 'Company Profile Video'],
            ['key' => 'company_profile_desc', 'value' => 'Get to know PT Abadi Banua Cemerlang — our capabilities, facilities, and commitment to quality.'],

            // Business Plan
            ['key' => 'bp_title', 'value' => 'Business Plan'],

            // Featured Products
            ['key' => 'featured_title', 'value' => 'Featured Products'],

            // Clients
            ['key' => 'clients_title', 'value' => 'Our Clients'],
            ['key' => 'clients_subtitle', 'value' => 'Trusted by Leading Manufacturers'],

            // Services
            ['key' => 'services_title', 'value' => 'Our Services'],
            ['key' => 's1_title', 'value' => 'Street Lighting Components'],
            ['key' => 's1_desc', 'value' => 'High-quality LED lighting solutions for public roads and open spaces.'],
            ['key' => 's2_title', 'value' => 'LED Lighting & Illumination Solutions'],
            ['key' => 's2_desc', 'value' => 'LED lighting components and solutions for various industrial and infrastructure needs.'],
            ['key' => 's3_title', 'value' => 'Support Services'],
            ['key' => 's3_desc', 'value' => 'LED light assembly, quality testing, lighting system installation, as well as maintenance and technical support.'],

            // News
            ['key' => 'news_title', 'value' => 'Latest News'],

            // CTA
            ['key' => 'contact_cta_title', 'value' => 'Create high-quality lighting solutions with us'],
            ['key' => 'contact_cta_desc', 'value' => 'Send your drawings/specifications, and our team will propose tooling & production plans.'],
            ['key' => 'contact_cta_button', 'value' => 'Request Consultation'],

            // Gallery
            ['key' => 'gallery_title', 'value' => 'Our Facilities'],
            ['key' => 'gallery_subtitle', 'value' => 'A glimpse of facilities and daily activities at PT Abadi Banua Cemerlang.'],

            // FAQ
            ['key' => 'faq_title', 'value' => 'Frequently Asked Questions'],
        ];

        foreach ($contents as $item) {
            Content::firstOrCreate(
                ['key' => $item['key']],
                ['value' => $item['value']]
            );
        }
    }
}
