<nav class="nav" id="mainNav">
    <a href="{{ route('home') }}" class="nav-brand">
        <span class="logo"></span>
        <span class="nav-brand-text">MFC Balloons & Party Needs</span>
    </a>
    <ul class="nav-links">
        <li><a href="{{ route('home') }}" id="nav-home" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('home') }}#packages-section" id="nav-browse">Browse Services</a></li>
        <li>
            <a
                href="{{ auth()->check() ? route('bookings.index') : route('login') }}"
                id="nav-bookings"
                class="{{ request()->routeIs('bookings.*') || request()->routeIs('admin.bookings.*') ? 'active' : '' }}"
            >
                My Bookings
            </a>
        </li>
        <li><a href="{{ route('availability') }}" id="nav-availability" class="{{ request()->routeIs('availability') ? 'active' : '' }}">Availability</a></li>
    </ul>
    <div class="nav-actions">
        @auth
            <a class="nav-icon-btn" id="Account" href="{{ auth()->user()->isAdmin() ? route('admin.bookings.index') : route('bookings.index') }}"></a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="nav-icon-btn" id="Logout"></button>
            </form>
        @else
            <button class="nav-icon-btn" id="Account" onClick="window.location.href='{{ route('login') }}'"></button>
            <button class="nav-icon-btn" id="Logout" onClick="window.location.href='{{ route('login') }}'"></button>
        @endauth
    </div>
</nav>
