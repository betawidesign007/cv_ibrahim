<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create or update Default Admin User
        User::updateOrCreate(
            ['email' => 'admin@portfolio.test'],
            [
                'name' => 'Ibrahim (Admin)',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Create Default Profile
        Profile::firstOrCreate(
            ['email' => 'ibrahim@example.com'],
            [
                'name' => 'Ibrahim',
                'title' => 'Fullstack Web Developer & Software Engineer',
                'headline' => 'Menciptakan Solusi Melalui Kode & Desain',
                'bio' => 'Berpengalaman dalam merancang dan mengembangkan aplikasi web yang cepat, responsif, dan terstruktur rapi. Fokus pada ekosistem Laravel, arsitektur API modern, database relasional, dan UI/UX interaktif yang memanjakan pengguna di berbagai perangkat.',
                'about_text' => 'Saya adalah seorang web developer berdedikasi yang mencintai ekosistem web modern. Memiliki ketertarikan mendalam dalam membangun sistem backend yang aman menggunakan Laravel serta mengintegrasikan antarmuka frontend yang luwes, ringan, dan cepat di berbagai layar smartphone (HP) maupun desktop.',
                'phone' => '+62 812-3456-7890',
                'location' => 'Indonesia (WIB / Wita)',
                'github_url' => 'https://github.com',
                'linkedin_url' => 'https://linkedin.com',
                'is_available' => true,
                'availability_badge' => 'Tersedia untuk Pekerjaan Full-time / Freelance',
                'experience_years' => 3,
                'completed_projects' => 20,
            ]
        );

        // 3. Create Default Projects
        $defaultProjects = [
            [
                'title' => 'Sistem Manajemen Keuangan & Operasional',
                'category' => 'Enterprise ERP',
                'badge' => 'Enterprise',
                'tech_stack' => 'Laravel 11, MySQL, Tailwind CSS',
                'description' => 'Aplikasi ERP internal untuk pencatatan transaksi kas, invoice otomatis, laporan neraca keuangan berkala, dan manajemen hak akses karyawan (RBAC).',
                'demo_url' => 'https://example.com',
                'github_url' => 'https://github.com',
                'status' => 'Selesai',
                'order' => 1,
            ],
            [
                'title' => 'Toko Online & Integrasi Checkout Otomatis',
                'category' => 'E-Commerce',
                'badge' => 'Payment Gateway',
                'tech_stack' => 'Laravel API, Midtrans, RajaOngkir',
                'description' => 'Platform toko online dengan kalkulasi ongkos kirim real-time, notifikasi WhatsApp otomatis saat order dibuat, dan pembayaran QRIS/Virtual Account terverifikasi instan.',
                'demo_url' => 'https://example.com',
                'github_url' => 'https://github.com',
                'status' => 'Selesai',
                'order' => 2,
            ],
            [
                'title' => 'Presensi & Absensi Pegawai Berbasis Lokasi',
                'category' => 'Mobile Web PWA',
                'badge' => 'Geolocation PWA',
                'tech_stack' => 'PWA, GPS Geolocation, Selfie Cam',
                'description' => 'Web portal presensi khusus layar smartphone (HP) dilengkapi deteksi radius GPS kantor, selfie camera verifikasi, dan rekap otomatis keterlambatan.',
                'demo_url' => 'https://example.com',
                'github_url' => 'https://github.com',
                'status' => 'Selesai',
                'order' => 3,
            ],
        ];

        foreach ($defaultProjects as $proj) {
            Project::firstOrCreate(['title' => $proj['title']], $proj);
        }

        // 4. Create Default Skills
        $defaultSkills = [
            ['name' => 'Laravel 11/12', 'category' => 'Backend Dev', 'level' => 'Expert', 'order' => 1],
            ['name' => 'PHP 8.x', 'category' => 'Backend Dev', 'level' => 'Expert', 'order' => 2],
            ['name' => 'RESTful API', 'category' => 'Backend Dev', 'level' => 'Advanced', 'order' => 3],
            ['name' => 'MVC Pattern', 'category' => 'Backend Dev', 'level' => 'Advanced', 'order' => 4],
            ['name' => 'Composer', 'category' => 'Backend Dev', 'level' => 'Advanced', 'order' => 5],

            ['name' => 'TailwindCSS', 'category' => 'Frontend & Mobile UI', 'level' => 'Expert', 'order' => 1],
            ['name' => 'Blade Engine', 'category' => 'Frontend & Mobile UI', 'level' => 'Expert', 'order' => 2],
            ['name' => 'JavaScript ES6+', 'category' => 'Frontend & Mobile UI', 'level' => 'Advanced', 'order' => 3],
            ['name' => 'Responsive UX', 'category' => 'Frontend & Mobile UI', 'level' => 'Expert', 'order' => 4],
            ['name' => 'HTML5 / CSS3', 'category' => 'Frontend & Mobile UI', 'level' => 'Expert', 'order' => 5],

            ['name' => 'MySQL', 'category' => 'Database & Storage', 'level' => 'Advanced', 'order' => 1],
            ['name' => 'PostgreSQL', 'category' => 'Database & Storage', 'level' => 'Intermediate', 'order' => 2],
            ['name' => 'SQLite', 'category' => 'Database & Storage', 'level' => 'Advanced', 'order' => 3],
            ['name' => 'Eloquent ORM', 'category' => 'Database & Storage', 'level' => 'Expert', 'order' => 4],
            ['name' => 'Migrations', 'category' => 'Database & Storage', 'level' => 'Expert', 'order' => 5],

            ['name' => 'Git / GitHub', 'category' => 'Tools & Workflow', 'level' => 'Advanced', 'order' => 1],
            ['name' => 'Vite', 'category' => 'Tools & Workflow', 'level' => 'Advanced', 'order' => 2],
            ['name' => 'Postman', 'category' => 'Tools & Workflow', 'level' => 'Advanced', 'order' => 3],
            ['name' => 'NPM', 'category' => 'Tools & Workflow', 'level' => 'Advanced', 'order' => 4],
            ['name' => 'Linux CLI', 'category' => 'Tools & Workflow', 'level' => 'Intermediate', 'order' => 5],
        ];

        foreach ($defaultSkills as $sk) {
            Skill::firstOrCreate(['name' => $sk['name']], $sk);
        }
    }
}
