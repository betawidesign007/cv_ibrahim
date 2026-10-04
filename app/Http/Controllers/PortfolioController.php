<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    /**
     * Show the main portfolio homepage.
     */
    public function index(): View
    {
        $profile = Profile::first() ?? new Profile([
            'name' => 'Ibrahim',
            'title' => 'Fullstack Web Developer & Software Engineer',
            'headline' => 'Menciptakan Solusi Melalui Kode & Desain',
            'bio' => 'Berpengalaman dalam merancang dan mengembangkan aplikasi web yang cepat, responsif, dan terstruktur rapi. Fokus pada ekosistem Laravel, arsitektur API modern, database relasional, dan UI/UX interaktif yang memanjakan pengguna di berbagai perangkat.',
            'about_text' => 'Saya adalah seorang web developer berdedikasi yang mencintai ekosistem web modern. Memiliki ketertarikan mendalam dalam membangun sistem backend yang aman menggunakan Laravel serta mengintegrasikan antarmuka frontend yang luwes, ringan, dan cepat di berbagai layar smartphone (HP) maupun desktop.',
            'email' => 'ibrahim@example.com',
            'phone' => '+62 812-3456-7890',
            'location' => 'Indonesia',
            'github_url' => 'https://github.com',
            'linkedin_url' => 'https://linkedin.com',
            'is_available' => true,
            'availability_badge' => 'Tersedia untuk Pekerjaan Full-time / Freelance',
            'experience_years' => 3,
            'completed_projects' => 20,
        ]);

        $projects = Project::orderBy('order')->latest()->get();
        $skills = Skill::orderBy('order')->get()->groupBy('category');

        return view('portfolio', compact('profile', 'projects', 'skills'));
    }

    /**
     * Handle incoming contact messages from portfolio visitors.
     */
    public function sendMessage(Request $request): JsonResponse|RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:150'],
            'subject' => ['nullable', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ]);

        $message = ContactMessage::create($validated);

        $successText = 'Terima kasih, '.$message->name.'! Pesan Anda telah tersimpan dan akan segera saya balas.';

        if ($request->wantsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => $successText,
            ]);
        }

        return back()->with('contact_success', $successText);
    }
}
