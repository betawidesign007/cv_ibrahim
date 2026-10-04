<?php

namespace Tests\Feature;

use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test login page is accessible by guest users.
     */
    public function test_login_page_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
        $response->assertSee('Masuk ke Panel Admin');
    }

    /**
     * Test user can authenticate with valid credentials.
     */
    public function test_user_can_authenticate_with_valid_credentials(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@portfolio.test',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@portfolio.test',
            'password' => 'password123',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('admin.dashboard'));
    }

    /**
     * Test user cannot authenticate with invalid credentials.
     */
    public function test_user_cannot_authenticate_with_invalid_credentials(): void
    {
        User::factory()->create([
            'email' => 'admin@portfolio.test',
            'password' => Hash::make('password123'),
        ]);

        $response = $this->post('/login', [
            'email' => 'admin@portfolio.test',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('email');
    }

    /**
     * Test unauthenticated users are redirected from admin panel to login.
     */
    public function test_unauthenticated_user_cannot_access_admin_dashboard(): void
    {
        $response = $this->get('/admin');

        $response->assertRedirect('/login');
    }

    /**
     * Test authenticated admin can view dashboard.
     */
    public function test_admin_can_view_dashboard(): void
    {
        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->get('/admin');

        $response->assertStatus(200);
        $response->assertSee('Panel Admin');
        $response->assertSee('Ringkasan Dashboard');
    }

    /**
     * Test admin can create and delete projects.
     */
    public function test_admin_can_create_and_delete_project(): void
    {
        $admin = User::factory()->create();

        // Create
        $response = $this->actingAs($admin)->post('/admin/projects', [
            'title' => 'Aplikasi Kasir Toko',
            'category' => 'Web App',
            'badge' => 'Baru',
            'tech_stack' => 'Laravel, Vue',
            'description' => 'Aplikasi POS terpadu dengan scanner barcode.',
            'status' => 'Selesai',
            'order' => 1,
        ]);

        $response->assertRedirect(route('admin.projects.index'));
        $this->assertDatabaseHas('projects', ['title' => 'Aplikasi Kasir Toko']);

        $project = Project::where('title', 'Aplikasi Kasir Toko')->first();

        // Delete
        $deleteResponse = $this->actingAs($admin)->delete("/admin/projects/{$project->id}");
        $deleteResponse->assertRedirect(route('admin.projects.index'));
        $this->assertDatabaseMissing('projects', ['id' => $project->id]);
    }

    /**
     * Test admin can create, update, and delete skills.
     */
    public function test_admin_can_manage_skills(): void
    {
        $admin = User::factory()->create();

        // Create
        $response = $this->actingAs($admin)->post('/admin/skills', [
            'name' => 'Docker',
            'category' => 'Tools & Workflow',
            'level' => 'Advanced',
            'order' => 5,
        ]);

        $response->assertRedirect(route('admin.skills.index'));
        $this->assertDatabaseHas('skills', ['name' => 'Docker']);

        $skill = Skill::where('name', 'Docker')->first();

        // Update
        $updateResponse = $this->actingAs($admin)->put("/admin/skills/{$skill->id}", [
            'name' => 'Docker Container',
            'category' => 'Tools & Workflow',
            'level' => 'Expert',
            'order' => 5,
        ]);

        $updateResponse->assertRedirect(route('admin.skills.index'));
        $this->assertDatabaseHas('skills', ['name' => 'Docker Container']);
    }

    /**
     * Test admin can update profile settings.
     */
    public function test_admin_can_update_profile(): void
    {
        $admin = User::factory()->create();

        $response = $this->actingAs($admin)->put('/admin/profile', [
            'name' => 'Ibrahim Ulil Albab',
            'title' => 'Senior Software Engineer',
            'headline' => 'Solusi Handal Melalui Kode',
            'bio' => 'Bio baru yang diperbarui dari panel admin.',
            'about_text' => 'Deskripsi tentang saya yang diperbarui.',
            'email' => 'ibrahim.admin@example.com',
            'phone' => '+62 811-2233-4455',
            'location' => 'Jakarta, Indonesia',
            'is_available' => 1,
            'availability_badge' => 'Open for hire',
            'experience_years' => 5,
            'completed_projects' => 35,
        ]);

        $response->assertRedirect(route('admin.profile.edit'));
        $this->assertDatabaseHas('profiles', [
            'name' => 'Ibrahim Ulil Albab',
            'email' => 'ibrahim.admin@example.com',
            'experience_years' => 5,
        ]);
    }

    /**
     * Test visitor can submit contact message and it is saved.
     */
    public function test_visitor_can_submit_contact_message(): void
    {
        $response = $this->post('/contact', [
            'name' => 'Ahmad Client',
            'email' => 'ahmad@client.com',
            'subject' => 'Tawaran Pembuatan Website',
            'message' => 'Halo, kami ingin membuat sistem web company profile.',
        ]);

        $this->assertDatabaseHas('contact_messages', [
            'name' => 'Ahmad Client',
            'email' => 'ahmad@client.com',
        ]);
    }

    /**
     * Test user can logout.
     */
    public function test_user_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect(route('login'));
    }

    /**
     * Test admin can view and update account credentials.
     */
    public function test_admin_can_update_account_credentials(): void
    {
        $admin = User::factory()->create([
            'email' => 'old_admin@example.com',
            'password' => Hash::make('oldpassword123'),
        ]);

        $response = $this->actingAs($admin)->get('/admin/account');
        $response->assertStatus(200);
        $response->assertSee('Pengaturan Akun & Kata Sandi');

        $updateResponse = $this->actingAs($admin)->put('/admin/account', [
            'name' => 'Administrator Baru',
            'email' => 'new_admin@example.com',
            'current_password' => 'oldpassword123',
            'password' => 'newpassword123',
            'password_confirmation' => 'newpassword123',
        ]);

        $updateResponse->assertRedirect(route('admin.account.edit'));
        $this->assertDatabaseHas('users', [
            'id' => $admin->id,
            'name' => 'Administrator Baru',
            'email' => 'new_admin@example.com',
        ]);

        $admin->refresh();
        $this->assertTrue(Hash::check('newpassword123', $admin->password));
    }

    /**
     * Test admin cannot update password without correct current password.
     */
    public function test_admin_cannot_update_password_with_wrong_current_password(): void
    {
        $admin = User::factory()->create([
            'password' => Hash::make('correctpassword'),
        ]);

        $response = $this->actingAs($admin)->put('/admin/account', [
            'name' => 'Admin Test',
            'email' => $admin->email,
            'current_password' => 'wrongpassword',
            'password' => 'newpassword123',
            'password_confirmation' => 'newpassword123',
        ]);

        $response->assertSessionHasErrors('current_password');
    }

    /**
     * Test admin can upload custom avatar and logo.
     */
    public function test_admin_can_upload_avatar_and_logo(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create();

        $avatarFile = UploadedFile::fake()->image('my-avatar.jpg', 300, 300);
        $logoFile = UploadedFile::fake()->image('my-logo.png', 120, 120);

        $response = $this->actingAs($admin)->put('/admin/profile', [
            'name' => 'Ibrahim Custom',
            'title' => 'Software Engineer',
            'headline' => 'Headline Test',
            'logo_initials' => 'IA',
            'avatar' => $avatarFile,
            'logo_image' => $logoFile,
            'email' => 'custom@example.com',
            'phone' => '+62 811-0000',
            'location' => 'Indonesia',
            'availability_badge' => 'Open',
            'experience_years' => 4,
            'completed_projects' => 15,
        ]);

        $response->assertRedirect(route('admin.profile.edit'));

        $profile = Profile::first();
        $this->assertNotNull($profile->avatar);
        $this->assertNotNull($profile->logo_image);
        $this->assertEquals('IA', $profile->logo_initials);

        Storage::disk('public')->assertExists($profile->avatar);
        Storage::disk('public')->assertExists($profile->logo_image);
    }

    /**
     * Test admin can remove existing avatar and logo.
     */
    public function test_admin_can_remove_avatar_and_logo(): void
    {
        Storage::fake('public');

        $admin = User::factory()->create();

        $avatarPath = 'profiles/avatars/sample.jpg';
        $logoPath = 'profiles/logos/sample.png';

        Storage::disk('public')->put($avatarPath, 'sample content');
        Storage::disk('public')->put($logoPath, 'sample content');

        $profile = Profile::firstOrCreate(
            ['id' => 1],
            [
                'name' => 'Ibrahim',
                'title' => 'Developer',
                'headline' => 'Headline',
                'email' => 'admin@test.com',
                'phone' => '123',
                'location' => 'ID',
                'availability_badge' => 'Open',
                'experience_years' => 1,
                'completed_projects' => 1,
            ]
        );

        $profile->update([
            'avatar' => $avatarPath,
            'logo_image' => $logoPath,
        ]);

        $response = $this->actingAs($admin)->put('/admin/profile', [
            'name' => 'Ibrahim',
            'title' => 'Developer',
            'headline' => 'Headline',
            'email' => 'admin@test.com',
            'phone' => '123',
            'location' => 'ID',
            'availability_badge' => 'Open',
            'experience_years' => 1,
            'completed_projects' => 1,
            'remove_avatar' => 1,
            'remove_logo_image' => 1,
        ]);

        $response->assertRedirect(route('admin.profile.edit'));

        $profile->refresh();
        $this->assertNull($profile->avatar);
        $this->assertNull($profile->logo_image);

        Storage::disk('public')->assertMissing($avatarPath);
        Storage::disk('public')->assertMissing($logoPath);
    }
}
