<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    /**
     * Display a listing of projects.
     */
    public function index(): View
    {
        $projects = Project::orderBy('order')->latest()->paginate(10);

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     */
    public function create(): View
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created project in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'badge' => ['nullable', 'string', 'max:100'],
            'tech_stack' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'demo_url' => ['nullable', 'url', 'max:255'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'status' => ['required', 'string', 'max:50'],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['order'] = $validated['order'] ?? 0;

        Project::create($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyek portofolio berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified project.
     */
    public function edit(Project $project): View
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified project in storage.
     */
    public function update(Request $request, Project $project): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'badge' => ['nullable', 'string', 'max:100'],
            'tech_stack' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'demo_url' => ['nullable', 'url', 'max:255'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'status' => ['required', 'string', 'max:50'],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['order'] = $validated['order'] ?? 0;

        $project->update($validated);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Data proyek berhasil diperbarui!');
    }

    /**
     * Remove the specified project from storage.
     */
    public function destroy(Project $project): RedirectResponse
    {
        $project->delete();

        return redirect()->route('admin.projects.index')
            ->with('success', 'Proyek berhasil dihapus.');
    }
}
