<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the admin panel dashboard.
     */
    public function index(): View
    {
        $totalProjects = Project::count();
        $totalSkills = Skill::count();
        $totalMessages = ContactMessage::count();
        $unreadMessages = ContactMessage::where('is_read', false)->count();

        $recentMessages = ContactMessage::latest()->take(5)->get();
        $recentProjects = Project::orderBy('order')->latest()->take(4)->get();
        $profile = Profile::first();

        return view('admin.dashboard', compact(
            'totalProjects',
            'totalSkills',
            'totalMessages',
            'unreadMessages',
            'recentMessages',
            'recentProjects',
            'profile'
        ));
    }
}
