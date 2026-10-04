<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SkillController extends Controller
{
    /**
     * Display a listing of skills.
     */
    public function index(): View
    {
        $skills = Skill::orderBy('category')->orderBy('order')->get();
        $categories = [
            'Backend Dev',
            'Frontend & Mobile UI',
            'Database & Storage',
            'Tools & Workflow',
        ];

        return view('admin.skills.index', compact('skills', 'categories'));
    }

    /**
     * Show the form for creating a new skill.
     */
    public function create(): View
    {
        $categories = [
            'Backend Dev',
            'Frontend & Mobile UI',
            'Database & Storage',
            'Tools & Workflow',
        ];

        return view('admin.skills.create', compact('categories'));
    }

    /**
     * Store a newly created skill in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'category' => ['required', 'string', 'max:100'],
            'level' => ['nullable', 'string', 'max:50'],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['order'] = $validated['order'] ?? 0;

        Skill::create($validated);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Keahlian baru berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified skill.
     */
    public function edit(Skill $skill): View
    {
        $categories = [
            'Backend Dev',
            'Frontend & Mobile UI',
            'Database & Storage',
            'Tools & Workflow',
        ];

        return view('admin.skills.edit', compact('skill', 'categories'));
    }

    /**
     * Update the specified skill in storage.
     */
    public function update(Request $request, Skill $skill): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'category' => ['required', 'string', 'max:100'],
            'level' => ['nullable', 'string', 'max:50'],
            'order' => ['nullable', 'integer', 'min:0'],
        ]);

        $validated['order'] = $validated['order'] ?? 0;

        $skill->update($validated);

        return redirect()->route('admin.skills.index')
            ->with('success', 'Data keahlian berhasil diperbarui!');
    }

    /**
     * Remove the specified skill from storage.
     */
    public function destroy(Skill $skill): RedirectResponse
    {
        $skill->delete();

        return redirect()->route('admin.skills.index')
            ->with('success', 'Keahlian berhasil dihapus.');
    }
}
