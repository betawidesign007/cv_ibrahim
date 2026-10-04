@extends('layouts.app')

@section('title', 'Ibrahim Dot Kom')

@section('meta_description', 'Portofolio resmi Ibrahim - Fullstack Web Developer berpengalaman dengan Laravel, PHP,
    Tailwind CSS, REST API, dan database relasional.')

@section('content')
    <!-- 1. Hero Section Partisan -->
    @include('partials.hero')

    <!-- 2. About Section Partisan -->
    @include('partials.about')

    <!-- 3. Skills Section Partisan -->
    @include('partials.skills')

    <!-- 4. Projects Showcase Partisan -->
    @include('partials.projects')

    <!-- 5. Experience & Education Timeline Partisan -->
    @include('partials.experience')

    <!-- 6. Contact Section Partisan -->
    @include('partials.contact')
@endsection
