<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the portfolio profile & settings.
     */
    public function edit(): View
    {
        $profile = Profile::firstOrCreate(
            ['id' => 1],
            [
                'name' => 'Ibrahim',
                'title' => 'Fullstack Web Developer & Software Engineer',
                'headline' => 'Menciptakan Solusi Melalui Kode & Desain',
                'email' => 'ibrahim@example.com',
                'phone' => '+62 812-3456-7890',
                'location' => 'Indonesia',
                'is_available' => true,
                'availability_badge' => 'Tersedia untuk Pekerjaan Full-time / Freelance',
                'experience_years' => 3,
                'completed_projects' => 20,
            ]
        );

        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Update the profile settings.
     */
    public function update(Request $request): RedirectResponse
    {
        $profile = Profile::firstOrCreate(['id' => 1]);

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:150'],
            'title' => ['required', 'string', 'max:200'],
            'headline' => ['required', 'string', 'max:255'],
            'bio' => ['nullable', 'string'],
            'about_text' => ['nullable', 'string'],
            'logo_initials' => ['nullable', 'string', 'max:10'],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:2048'],
            'logo_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp,svg', 'max:2048'],
            'remove_avatar' => ['nullable', 'boolean'],
            'remove_logo_image' => ['nullable', 'boolean'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['required', 'string', 'max:50'],
            'location' => ['required', 'string', 'max:100'],
            'github_url' => ['nullable', 'url', 'max:255'],
            'linkedin_url' => ['nullable', 'url', 'max:255'],
            'is_available' => ['nullable', 'boolean'],
            'availability_badge' => ['required', 'string', 'max:255'],
            'experience_years' => ['required', 'integer', 'min:0'],
            'completed_projects' => ['required', 'integer', 'min:0'],
        ]);

        $validated['is_available'] = $request->boolean('is_available');
        $validated['logo_initials'] = $validated['logo_initials'] ?? 'IB';

        // Handle Avatar Upload or Removal
        if ($request->boolean('remove_avatar')) {
            if ($profile->avatar && Storage::disk('public')->exists($profile->avatar)) {
                Storage::disk('public')->delete($profile->avatar);
            }
            $validated['avatar'] = null;
        } elseif ($request->hasFile('avatar')) {
            if ($profile->avatar && Storage::disk('public')->exists($profile->avatar)) {
                Storage::disk('public')->delete($profile->avatar);
            }
            $path = $request->file('avatar')->store('profiles/avatars', 'public');
            $validated['avatar'] = $path;
        } else {
            unset($validated['avatar']);
        }

        // Handle Logo Image Upload or Removal
        if ($request->boolean('remove_logo_image')) {
            if ($profile->logo_image && Storage::disk('public')->exists($profile->logo_image)) {
                Storage::disk('public')->delete($profile->logo_image);
            }
            $validated['logo_image'] = null;
        } elseif ($request->hasFile('logo_image')) {
            if ($profile->logo_image && Storage::disk('public')->exists($profile->logo_image)) {
                Storage::disk('public')->delete($profile->logo_image);
            }
            $logoPath = $request->file('logo_image')->store('profiles/logos', 'public');
            $validated['logo_image'] = $logoPath;
        } else {
            unset($validated['logo_image']);
        }

        $profile->update($validated);

        return redirect()->route('admin.profile.edit')
            ->with('success', 'Profil dan logo portofolio berhasil diperbarui!');
    }
}
