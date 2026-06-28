<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        // ============================================
        // ENGLISH CONTENT
        // ============================================
        $en = [
            // Meta
            'home_meta_title_en' => 'PT Abadi Banua Cemerlang | LED Street Lighting Assembly Manufacturer',
            'home_meta_description_en' => 'PT Abadi Banua Cemerlang is a manufacturing company specializing in the assembly of LED street lights and solar-powered street lights. Reliable, Bright, Optimal.',

            // Company Profile Video
            'home_company_profile_title_en' => 'Company Profile Video',
            'home_company_profile_desc_en' => 'Get to know PT Abadi Banua Cemerlang — our capabilities, facilities, and commitment to quality.',
            'home_company_profile_video_url_en' => 'https://www.youtube.com/embed/rhGl6-n2yVU',

            // Business Plan
            'home_bp_title_en' => 'Business Plan',
            'home_bp1_title_en' => 'Customer & Product Expansion',
            'home_bp1_desc_en' => 'Entering non-automotive sectors while developing aftermarket opportunities and new customers.',
            'home_bp2_title_en' => 'Operational Excellence & Capacity',
            'home_bp2_desc_en' => 'Upgrading machinery and scaling up capacity to capture opportunities and meet customer needs.',
            'home_bp3_title_en' => 'Human Resources & Customer Satisfaction',
            'home_bp3_desc_en' => 'Enhancing skills and services through continuous QCD improvement.',

            // Featured Products
            'home_featured_title_en' => 'Featured Products',

            // Clients
            'home_clients_title_en' => 'Our Clients',
            'home_clients_subtitle_en' => 'Trusted by Leading Manufacturers',

            // Services
            'home_services_title_en' => 'Our Services',
            'home_s1_title_en' => 'Street Lighting Components',
            'home_s1_desc_en' => 'High-quality LED lighting solutions for public roads and open spaces.',
            'home_s2_title_en' => 'LED Lighting & Illumination Solutions',
            'home_s2_desc_en' => 'LED lighting components and solutions for various industrial and infrastructure needs.',
            'home_s3_title_en' => 'Support Services',
            'home_s3_desc_en' => 'LED light assembly, quality testing, lighting system installation, as well as maintenance and technical support.',

            // News
            'home_news_title_en' => 'Latest News',
            'home_news1_title_en' => 'Lighting Industry Enhances Competitiveness Through Innovation and Collaboration',
            'home_news1_desc_en' => 'Highlights of industry development programs through education, productivity improvement, and innovation in lighting technology.',
            'home_news2_title_en' => 'Strengthening the lighting industry supply chain through integrated and sustainable financing.',
            'home_news2_desc_en' => 'Collaboration to improve access to financing and supplier resilience.',
            'home_news3_title_en' => 'Ministry of Industry & JICA Accelerate Lighting Industry Digitalization',
            'home_news3_desc_en' => 'Digital transformation initiatives for component manufacturers.',

            // Contact CTA
            'home_contact_cta_title_en' => 'Create high-quality lighting solutions with us',
            'home_contact_cta_desc_en' => 'Send your drawings/specifications, and our team will propose tooling & production plans.',
            'home_contact_cta_button_en' => 'Request Consultation',

            // Gallery
            'home_gallery_title_en' => 'Our Facilities',
            'home_gallery_subtitle_en' => 'A glimpse of facilities and daily activities at PT Abadi Banua Cemerlang.',
            'home_gallery_1_title_en' => 'Production Area',
            'home_gallery_1_desc_en' => 'Clean and well-organized workspace for efficient manufacturing.',
            'home_gallery_2_title_en' => 'Injection Molding Line',
            'home_gallery_2_desc_en' => 'Consists of 35 modern machines with capacities ranging from 170 tons to 1050 tons.',
            'home_gallery_3_title_en' => 'Automated Machines',
            'home_gallery_3_desc_en' => 'Advanced equipment with robotic integration.',
            'home_gallery_4_title_en' => 'Mirror Assembly Line',
            'home_gallery_4_desc_en' => 'Structured processes for high productivity.',
            'home_gallery_5_title_en' => 'Laser Welding Machine',
            'home_gallery_5_desc_en' => 'High-precision welding for durable products.',

            // FAQ
            'home_faq_title_en' => 'Frequently Asked Questions',
            'faq_q1_en' => 'What is PT Abadi Banua Cemerlang?',
            'faq_a1_en' => 'PT SinarMax is a trademark of PT Abadi Banua Cemerlang, engaged in LED street lighting assembly. Research and development of SinarMax products began in early 2015.',
            'faq_q2_en' => 'What products and services are available?',
            'faq_a2_en' => 'We provide high-quality LED lighting solutions through precise assembly processes and high-standard testing. Our services include lighting system installation, quality control, as well as maintenance and technical support to ensure optimal and sustainable performance.',
            'faq_q3_en' => 'What certifications and advantages do you have?',
            'faq_a3_en' => 'We implement a quality management system in accordance with ISO 9001:2015, operate more than 35 injection machines (170–1050 tons), and focus on QCD (Quality, Cost, Delivery). Continuous human resource development is a priority.',
            'faq_q4_en' => 'Who are your main customers and markets?',
            'faq_a4_en' => 'We are trusted by various partners and clients in providing LED lighting solutions for infrastructure and industrial needs.',
            'faq_q5_en' => 'How can we collaborate with you?',
            'faq_a5_en' => 'Please contact us via the "Contact Us" page for consultation. You can send drawings/specifications so our team can prepare suitable tooling proposals and production plans.',
        ];

        // ============================================
        // INDONESIAN CONTENT
        // ============================================
        $id = [
            // Meta
            'home_meta_title_id' => 'PT Abadi Banua Cemerlang | Pabrik Perakitan Lampu PJU LED',
            'home_meta_description_id' => 'PT Abadi Banua Cemerlang adalah Pabrik yang bergerak di bidang perakitan lampu PJU LED dan Lampu PJU TS (Tenaga Surya). Handal, Terang, Maksimal.',

            // Company Profile Video
            'home_company_profile_title_id' => 'Video Profil Perusahaan',
            'home_company_profile_desc_id' => 'Kenal lebih dekat PT Abadi Banua Cemerlang — kapabilitas, fasilitas, dan komitmen mutu kami.',
            'home_company_profile_video_url_id' => 'https://www.youtube.com/embed/rhGl6-n2yVU',

            // Business Plan
            'home_bp_title_id' => 'Rencana Bisnis',
            'home_bp1_title_id' => 'Ekspansi Pelanggan & Produk',
            'home_bp1_desc_id' => 'Masuk ke sektor non-otomotif sambil mengembangkan peluang after-market dan pelanggan baru.',
            'home_bp2_title_id' => 'Keunggulan Operasional & Kapasitas',
            'home_bp2_desc_id' => 'Upgrade mesin dan scale-up kapasitas untuk menangkap peluang dan memenuhi kebutuhan pelanggan.',
            'home_bp3_title_id' => 'SDM & Kepuasan Pelanggan',
            'home_bp3_desc_id' => 'Bangun keterampilan dan layanan melalui peningkatan QCD berkelanjutan.',

            // Featured Products
            'home_featured_title_id' => 'Produk Unggulan',

            // Clients
            'home_clients_title_id' => 'Pelanggan Kami',
            'home_clients_subtitle_id' => 'Dipercaya Produsen Terkemuka',

            // Services
            'home_services_title_id' => 'Layanan Kami',
            'home_s1_title_id' => 'Komponen Lampu PJU',
            'home_s1_desc_id' => 'Solusi pencahayaan LED berkualitas tinggi untuk jalan umum dan ruang terbuka.',
            'home_s2_title_id' => 'Pencahayaan LED & Solusi Penerangan',
            'home_s2_desc_id' => 'Komponen dan solusi pencahayaan LED untuk berbagai kebutuhan industri dan infrastruktur.',
            'home_s3_title_id' => 'Layanan Pendukung',
            'home_s3_desc_id' => 'Perakitan lampu LED, pengujian kualitas, instalasi sistem penerangan, serta perawatan dan dukungan teknis.',

            // News
            'home_news_title_id' => 'Berita Terbaru',
            'home_news1_title_id' => 'Industri Penerangan Meningkatkan Daya Saing Melalui Inovasi dan Kolaborasi',
            'home_news1_desc_id' => 'Sorotan program pengembangan industri melalui edukasi, peningkatan produktivitas, dan inovasi di bidang teknologi pencahayaan.',
            'home_news2_title_id' => 'Penguatan rantai pasok industri pencahayaan melalui pembiayaan yang terintegrasi dan berkelanjutan.',
            'home_news2_desc_id' => 'Kolaborasi untuk meningkatkan akses pembiayaan dan ketahanan pemasok.',
            'home_news3_title_id' => 'Kemenperin & JICA Percepat Digitalisasi Industri Pencahayaan',
            'home_news3_desc_id' => 'Inisiatif transformasi digital bagi produsen komponen.',

            // Contact CTA
            'home_contact_cta_title_id' => 'Wujudkan solusi pencahayaan berkualitas bersama kami',
            'home_contact_cta_desc_id' => 'Kirim gambar/spesifikasimu, tim kami akan mengusulkan tooling & rencana produksi.',
            'home_contact_cta_button_id' => 'Minta Konsultasi',

            // Gallery
            'home_gallery_title_id' => 'Fasilitas Kami',
            'home_gallery_subtitle_id' => 'Sekilas fasilitas dan aktivitas harian PT Abadi Banua Cemerlang.',
            'home_gallery_1_title_id' => 'Area Produksi',
            'home_gallery_1_desc_id' => 'Ruang kerja rapi dan bersih untuk manufaktur efisien.',
            'home_gallery_2_title_id' => 'Lini Injection Molding',
            'home_gallery_2_desc_id' => 'Terdiri dari 35 mesin modern dengan kapasitas yang bervariasi, mulai dari 170 ton hingga 1050 ton.',
            'home_gallery_3_title_id' => 'Mesin Otomatis',
            'home_gallery_3_desc_id' => 'Peralatan canggih dengan integrasi robotik.',
            'home_gallery_4_title_id' => 'Lini Perakitan Spion',
            'home_gallery_4_desc_id' => 'Proses tertata untuk produktivitas tinggi.',
            'home_gallery_5_title_id' => 'Mesin Laser Welding',
            'home_gallery_5_desc_id' => 'Pengelasan presisi tinggi untuk produk tahan lama.',

            // FAQ
            'home_faq_title_id' => 'Pertanyaan yang Sering Diajukan',
            'faq_q1_id' => 'Apa itu PT Abadi Banua Cemerlang?',
            'faq_a1_id' => 'PT SinarMax adalah merek dagang dari PT Abadi Banua Cemerlang, yang bergerak dalam bidang perakitan lampu PJU LED. Riset dan pengembangan produk SinarMax dimulai pada awal tahun 2015.',
            'faq_q2_id' => 'Produk dan layanan apa yang tersedia?',
            'faq_a2_id' => 'Kami menyediakan solusi pencahayaan LED berkualitas melalui proses perakitan yang presisi dan pengujian standar tinggi. Layanan kami mencakup instalasi sistem penerangan, quality control, serta perawatan dan dukungan teknis untuk memastikan kinerja yang optimal dan berkelanjutan.',
            'faq_q3_id' => 'Sertifikasi dan keunggulan apa yang dimiliki?',
            'faq_a3_id' => 'Kami menerapkan sistem manajemen mutu sesuai ISO 9001:2015, mengoperasikan >35 mesin injection (170–1050 ton), dan fokus pada QCD (Quality, Cost, Delivery). Peningkatan kompetensi SDM dilakukan secara berkelanjutan.',
            'faq_q4_id' => 'Siapa pelanggan utama dan pasar yang dilayani?',
            'faq_a4_id' => 'Kami dipercaya oleh berbagai mitra dan pelanggan dalam menyediakan solusi pencahayaan LED untuk kebutuhan infrastruktur dan industri.',
            'faq_q5_id' => 'Bagaimana cara bekerja sama dengan kami?',
            'faq_a5_id' => 'Silakan hubungi kami melalui halaman "Hubungi Kami" untuk konsultasi. Anda dapat mengirimkan gambar/spesifikasi agar tim kami menyiapkan usulan tooling dan rencana produksi yang sesuai.',
        ];

        // ============================================
        // IMAGE CONTENT (shared between languages)
        // ============================================
        $images = [
            // Business Plan images (paths - user can upload new ones)
            'home_bp1_image' => 'assets/Images/Team2.png',
            'home_bp2_image' => 'assets/Images/Team4.png',
            'home_bp3_image' => 'assets/Images/Team.png',

            // Gallery images
            'home_gallery_1_image' => 'assets/gallery/1.png',
            'home_gallery_2_image' => 'assets/gallery/2.png',
            'home_gallery_3_image' => 'assets/gallery/3.png',
            'home_gallery_4_image' => 'assets/gallery/4.png',
            'home_gallery_5_image' => 'assets/gallery/5.png',

            // Service icons
            'home_s1_icon' => 'assets/icons/automotive-components.svg',
            'home_s2_icon' => 'assets/icons/electronics-appliances.svg',
            'home_s3_icon' => 'assets/icons/supporting-services.svg',

            // News images
            'home_news1_image' => 'assets/news/news1.jpg',
            'home_news2_image' => 'assets/news/news2.jpg',
            'home_news3_image' => 'assets/news/news3.jpg',
        ];

        foreach (array_merge($en, $id, $images) as $key => $value) {
            Content::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
