@extends('layouts.app')

@section('content')
    <div class="bg-primary text-white py-5" style="background: linear-gradient(135deg, #eaa166 0%, #a24b4b 100%);">
        <div class="container py-5">
            <div class="row align-items-center text-center">
                <div class="col-lg-8 mx-auto">
                    <h1 class="display-3 fw-bold mb-4">Our Mission</h1>
                    <p class="lead mb-4">Empowering developers to share knowledge and build the future of the web, one post at a time.</p>
                    <div class="d-flex gap-3 justify-content-center">
                        <a href="#our-story" class="btn btn-light rounded-5 btn-lg px-4">Our Story</a>
                        <a href="{{ route('blog.index') }}" class="btn btn-outline-light rounded-5 btn-lg px-4">Browse Content</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="our-story" class="container py-5 my-5">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?w=800&h=600&fit=crop"
                     class="img-fluid rounded-5 shadow-lg"
                     alt="Our Team Working">
            </div>
            <div class="col-lg-6 ps-lg-5">
                <h2 class="display-5 fw-bold mb-4">From Developers, For Developers</h2>
                <p class="lead text-muted">Laravel Blog started as a small internal project to document our coding challenges. Today, it has grown into a vibrant community hub.</p>
                <p class="text-muted">We believe that the best way to master a technology is to teach it. That's why we built this platform—to provide a clean, fast, and intuitive space for developers of all levels to document their journey and contribute to the open-source ecosystem.</p>
                <hr class="my-4 w-25">
                <p class="fst-italic text-gradient fw-bold">"Code is poetry, and every developer has a story to tell."</p>
            </div>
        </div>
    </div>

    <div class="bg-light py-5">
        <div class="container py-5">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="display-5 fw-bold mb-3">Our Core Values</h2>
                    <p class="lead text-muted">The principles that guide our community every day.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow rounded-5 p-4">
                        <div class="mb-3">
                            <i class="bi bi-heart-fill fs-1 text-danger"></i>
                        </div>
                        <h3 class="h4 mb-3">Passion for Code</h3>
                        <p class="text-muted">We are driven by a genuine love for building software and solving complex problems with elegant solutions.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow rounded-5 p-4">
                        <div class="mb-3">
                            <i class="bi bi-door-open-fill fs-1 text-primary"></i>
                        </div>
                        <h3 class="h4 mb-3">Open Access</h3>
                        <p class="text-muted">Knowledge should be free. We are committed to keeping this platform open and accessible to everyone globally.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow rounded-5 p-4">
                        <div class="mb-3">
                            <i class="bi bi-shield-check fs-1 text-success"></i>
                        </div>
                        <h3 class="h4 mb-3">Quality Content</h3>
                        <p class="text-muted">We encourage meaningful, well-researched tutorials and insights that provide real value to the reader.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-dark text-white py-5">
        <div class="container py-4">
            <div class="row text-center">
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="display-4 fw-bold text-gradient">{{ \App\Models\User::count() }}</div>
                    <p class="lead mb-0">Community Members</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="display-4 fw-bold text-gradient">{{ \App\Models\Post::count() }}</div>
                    <p class="lead mb-0">Tutorials Published</p>
                </div>
                <div class="col-md-4 mb-4 mb-md-0">
                    <div class="display-4 fw-bold text-gradient">50k+</div>
                    <p class="lead mb-0">Monthly Readers</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5 my-5">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="display-6 fw-bold mb-4">Want to Join the Team?</h2>
                <p class="lead text-muted mb-4">We are always looking for guest contributors and community moderators to help grow our ecosystem.</p>
                @guest
                    <a href="{{ route('register') }}" class="btn btn-gradient rounded-5 btn-lg px-5">Create an Account</a>
                @else
                    <a href="mailto:hello@laravelblog.com" class="btn btn-gradient rounded-5 btn-lg px-5">Contact Us</a>
                @endguest
            </div>
        </div>
    </div>
@endsection
