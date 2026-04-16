@extends('layouts.app', ['title' => 'MFC-Connect | Balloons & Party Needs'])

@push('styles')
    <link rel="stylesheet" href="/assets/css/home.css">
@endpush

@section('content')
    <main class="page active" id="page-home">
        <section class="hero">
            <div class="hero-content">
                <p class="hero-eyebrow">Party Supply &amp; Rentals</p>
                <h1 class="hero-title">MFC Balloons &amp; Party Needs</h1>
                <p class="hero-sub">Affordable balloon decors, food carts &amp; party entertainment.</p>
                <div class="hero-cta">
                    <button class="btn btn-primary">Start booking</button>
                    <button class="btn btn-outline-white" onClick="window.location.href='{{ route('availability') }}'">View availability</button>
                </div>
            </div>
        </section>

        <section class="categories">
            <div class="cat-inner">
                <div class="cat-item"><div class="cat-icon">🎉</div><span class="cat-label">Service/Item</span></div>
                <div class="cat-item"><div class="cat-icon">🎉</div><span class="cat-label">Service/Item</span></div>
                <div class="cat-item"><div class="cat-icon">🎉</div><span class="cat-label">Service/Item</span></div>
                <div class="cat-item"><div class="cat-icon">🎉</div><span class="cat-label">Service/Item</span></div>
                <div class="cat-item"><div class="cat-icon">🎉</div><span class="cat-label">Service/Item</span></div>
                <div class="cat-item"><div class="cat-icon">🎉</div><span class="cat-label">Service/Item</span></div>
                <div class="cat-item"><div class="cat-icon">🎉</div><span class="cat-label">Service/Item</span></div>
                <div class="cat-item"><div class="cat-icon">🎉</div><span class="cat-label">Service/Item</span></div>
            </div>
        </section>

        <section class="value-section">
            <h2>Bring your dream event to life</h2>
            <p>Whether it's a birthday, wedding, or corporate event, MFC provides complete party solutions.</p>
            <div class="value-cta">
                <button class="btn btn-primary">Start booking</button>
                <button class="btn btn-outline" onClick="window.location.href='https://web.facebook.com/profile.php?id=100057537996091&sk=photos'">View our work</button>
            </div>
        </section>

        <section class="packages-section">
            <h2>Popular Rental Packages</h2>
            <div class="packages-grid">
                <div class="pkg-card">
                    <div class="pkg-img">🎂</div>
                    <div class="pkg-body">
                        <h3>Popular Package 1</h3>
                        <div class="pkg-price">Starting at ₱1,500</div>
                        <p>Description of Package 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="btn btn-primary btn-block">Book this</button>
                    </div>
                </div>
                <div class="pkg-card">
                    <div class="pkg-img">🎂</div>
                    <div class="pkg-body">
                        <h3>Popular Package 2</h3>
                        <div class="pkg-price">Starting at ₱3,500</div>
                        <p>Description of Package 2 Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="btn btn-primary btn-block">Book this</button>
                    </div>
                </div>
                <div class="pkg-card">
                    <div class="pkg-img">🎂</div>
                    <div class="pkg-body">
                        <h3>Popular Package 3</h3>
                        <div class="pkg-price">Starting at ₱8,000</div>
                        <p>Description of Package 3 Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        <button class="btn btn-primary btn-block">Book this</button>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
