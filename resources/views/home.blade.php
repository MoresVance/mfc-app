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
                    <a href="{{ route('booking') }}" class="btn btn-primary">Start booking</a>
                    <button class="btn btn-outline-white" onClick="window.location.href='{{ route('availability') }}'">View availability</button>
                </div>
            </div>
        </section>

         <section class="categories">
            <div class="cat-inner">
                <div class="cat-item">
                    <div class="cat-icon">🎈</div>
                    <span class="cat-label">Balloon Backdrops</span>
                </div>
                <div class="cat-item">
                    <div class="cat-icon">🌸</div>
                    <span class="cat-label">Entrance Arch</span>
                </div>
                <div class="cat-item">
                    <div class="cat-icon">🎀</div>
                    <span class="cat-label">Pillars &amp; Stands</span>
                </div>
                <div class="cat-item">
                    <div class="cat-icon">🎁</div>
                    <span class="cat-label">Centerpieces</span>
                </div>
                <div class="cat-item">
                    <div class="cat-icon">💐</div>
                    <span class="cat-label">Bouquets</span>
                </div>
                <div class="cat-item">
                    <div class="cat-icon">🌮</div>
                    <span class="cat-label">Food Carts</span>
                </div>
                <div class="cat-item">
                    <div class="cat-icon">🎭</div>
                    <span class="cat-label">Entertainment</span>
                </div>
                <div class="cat-item">
                    <div class="cat-icon">🎉</div>
                    <span class="cat-label">Event Packages</span>
                </div>
            </div>
        </section>
        
        <!-- <div class="booking-notice">
            <span class="notice-icon">📋</span>
            <span>
                Venue setup quotes are <strong>customized</strong> based on theme &amp; event area.
                Multi-day events are available — pricing varies per event.
                <strong>No payment required</strong> until your request is reviewed.
            </span>
        </div> -->

        <section class="value-section">
            <h2>Bring your dream event to life</h2>
            <p>Whether it's a birthday, wedding, corporate event, or any celebration, MFC provides
                complete party solutions — from stunning balloon decorations to delicious food carts
                and professional entertainment. We customize every detail around your theme and venue.</p>
            <div class="value-cta">
                <a href="{{ route('booking') }}" class="btn btn-primary">Start booking</a>
                <button class="btn btn-outline" onClick="window.location.href='https://web.facebook.com/profile.php?id=100057537996091&sk=photos'">View our work</button>
            </div>
        </section>

        <section class="packages-section">
            <h2>Balloon Decor &amp; Event Packages</h2>
            <p class="section-sub">
                Custom quotes based on your theme &amp; venue size.
                Book at least <strong>3–7 days</strong> in advance.
                Multi-day events welcome — fixed billing per event.
            </p>
            <div class="packages-grid">
 
                <div class="pkg-card">
                    <div class="pkg-img">
                        <img src="/assets/images/balloon-backdrop.jpg" alt="Balloon backdrop setup" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>Balloon Backdrop</h3>
                        <div class="pkg-price pkg-price--custom">₱1,000+</div>
                        <p>Themed balloon wall backdrop — any color scheme &amp; design.</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Request quote</a>
                    </div>
                </div>
 
                <div class="pkg-card">
                    <div class="pkg-img">
                        <img src="/assets/images/balloon-arch.jpg" alt="Balloon entrance arch" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>Entrance Arch</h3>
                        <div class="pkg-price pkg-price--custom">₱1,500+</div>
                        <p>Stunning balloon entrance arch customized to your event theme.</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Request quote</a>
                    </div>
                </div>
 
                <div class="pkg-card">
                    <div class="pkg-img">
                        <img src="/assets/images/venue-setup.jpg" alt="Full venue setup decoration" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>Full Venue Setup</h3>
                        <div class="pkg-price pkg-price--custom">₱3,000+</div>
                        <p>Complete decoration: backdrop, arch, pillars, centerpieces &amp; more.</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Request quote</a>
                    </div>
                </div>
 
            </div>
        </section>

        <section class="packages-section">
            <h2>Party Entertainment</h2>
            <p class="section-sub">Fixed-price entertainment add-ons for any event</p>
            <div class="packages-grid packages-grid--5">
 
                <div class="pkg-card">
                    <div class="pkg-img">
                        <img src="/assets/images/party-host.jpg" alt="Party host" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>Party Host</h3>
                        <div class="pkg-price">₱3,500</div>
                        <p>Energetic host to keep your guests entertained all event long.</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Book this</a>
                    </div>
                </div>
 
                <div class="pkg-card">
                    <div class="pkg-img">
                        <img src="/assets/images/clown" alt="Clown performer" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>Clown</h3>
                        <div class="pkg-price">₱1,000</div>
                        <p>Classic clown performance — perfect for kids' parties.</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Book this</a>
                    </div>
                </div>
 
                <div class="pkg-card">
                    <div class="pkg-img">
                        <img src="/assets/images/magician.jpg" alt="Magician performance" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>Magician</h3>
                        <div class="pkg-price">₱5,000</div>
                        <p>Stunning magic show that amazes guests of all ages.</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Book this</a>
                    </div>
                </div>
 
                <div class="pkg-card">
                    <div class="pkg-img">
                        <img src="/assets/images/mascot.jpg" alt="Mascot appearance" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>Mascot</h3>
                        <div class="pkg-price">₱1,500</div>
                        <p>Themed mascot character appearance for photo ops &amp; fun.</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Book this</a>
                    </div>
                </div>
 
                <div class="pkg-card">
                    <div class="pkg-img">
                        <img src="/assets/images/bubble-show.jpg" alt="Bubble show" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>Bubble Show</h3>
                        <div class="pkg-price">₱2,500</div>
                        <p>Magical bubble performance kids absolutely love.</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Book this</a>
                    </div>
                </div>
 
                <div class="pkg-card">
                    <div class="pkg-img pkg-img--pink">
                        <div class="pkg-img">
                            <img src="/assets/images/balloon-twister.jpg" alt="Balloon Twister" loading="lazy">
                        </div>
                    </div>
                    <div class="pkg-body">
                        <h3>Balloon Twister</h3>
                        <div class="pkg-price">₱2,500</div>
                        <p>Live balloon sculpting — take-home art for every guest.</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Book this</a>
                    </div>
                </div>
 
                <div class="pkg-card">
                    <div class="pkg-img">
                        <img src="/assets/images/face-painting.jpg" alt="Face painting" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>Face Painting</h3>
                        <div class="pkg-price">₱2,500</div>
                        <p>Creative face art that transforms kids into their favorite characters.</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Book this</a>
                    </div>
                </div>
 
            </div>
        </section>

         <section class="packages-section packages-section--alt">
            <h2>Food Carts</h2>
            <p class="section-sub">Fixed-price food cart rentals — contact us to book</p>
            <div class="packages-grid packages-grid--4">
 
                <div class="pkg-card pkg-card--food">
                    <div class="pkg-img">
                        <img src="/assets/images/cotton-candy-cart.jpg" alt="Cotton candy cart" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>Cotton Candy</h3>
                        <div class="pkg-price">₱1,800</div>
                        <p class="pkg-desc-small">Sweet fluffy cloud on a stick</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Add to booking</a>
                    </div>
                </div>
 
                <div class="pkg-card pkg-card--food">
                    <div class="pkg-img">
                        <img src="/assets/images/popcorn-cart.png" alt="Popcorn cart" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>Popcorn</h3>
                        <div class="pkg-price">₱1,800</div>
                        <p class="pkg-desc-small">Freshly popped — salt or cheese flavor</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Add to booking</a>
                    </div>
                </div>
 
                <div class="pkg-card pkg-card--food">
                    <div class="pkg-img">
                        <img src="/assets/images/hot-dog-cart.jpg" alt="Hotdog cart" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>Hotdog</h3>
                        <div class="pkg-price">₱1,800</div>
                        <p class="pkg-desc-small">Cooked on a hot roller &amp; served on a stick</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Add to booking</a>
                    </div>
                </div>
 
                <div class="pkg-card pkg-card--food">
                    <div class="pkg-img">
                        <img src="/assets/images/ice-cream-cart.jpg" alt="Ice cream cart" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>Ice Cream</h3>
                        <div class="pkg-price">₱2,800</div>
                        <p class="pkg-desc-small">2 flavors on a wafer cone</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Add to booking</a>
                    </div>
                </div>
 
                <div class="pkg-card pkg-card--food">
                    <div class="pkg-img">
                        <img src="/assets/images/french-fries.jpg" alt="French fries cart" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>French Fries</h3>
                        <div class="pkg-price">₱2,800</div>
                        <p class="pkg-desc-small">Crispy fries in salt or cheese flavor</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Add to booking</a>
                    </div>
                </div>
 
                <div class="pkg-card pkg-card--food">
                    <div class="pkg-img">
                        <img src="/assets/images/street-food.jpg" alt="Street foods cart" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>Street Foods</h3>
                        <div class="pkg-price">₱2,800</div>
                        <p class="pkg-desc-small">Fishball, squidball &amp; kikiam — served hot</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Add to booking</a>
                    </div>
                </div>
 
                <div class="pkg-card pkg-card--food">
                    <div class="pkg-img">
                        <img src="/assets/images/corndog.jpg" alt="Corndog cart" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>Corndog</h3>
                        <div class="pkg-price">₱2,800</div>
                        <p class="pkg-desc-small">Crispy dough outside, juicy sausage inside</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Add to booking</a>
                    </div>
                </div>
 
                <div class="pkg-card pkg-card--food">
                    <div class="pkg-img">
                        <img src="/assets/images/hot-dog-waffle.jpg" alt="Hotdog waffle cart" loading="lazy">
                    </div>
                    <div class="pkg-body">
                        <h3>Hotdog Waffle</h3>
                        <div class="pkg-price">₱2,800</div>
                        <p class="pkg-desc-small">Fluffy waffle stuffed with a hotdog on a stick</p>
                        <a href="{{ route('booking') }}" class="btn btn-primary btn-block">Add to booking</a>
                    </div>
                </div>
 
            </div>
        </section>

        
    </main>
@endsection