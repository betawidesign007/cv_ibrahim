<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('Ibrahim');
            $table->string('title')->default('Fullstack Web Developer & Software Engineer');
            $table->string('headline')->default('Menciptakan Solusi Melalui Kode & Desain');
            $table->text('bio')->nullable();
            $table->text('about_text')->nullable();
            $table->string('email')->default('ibrahim@example.com');
            $table->string('phone')->default('+62 812-3456-7890');
            $table->string('location')->default('Indonesia');
            $table->string('github_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->boolean('is_available')->default(true);
            $table->string('availability_badge')->default('Tersedia untuk Pekerjaan Full-time / Freelance');
            $table->integer('experience_years')->default(3);
            $table->integer('completed_projects')->default(20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
