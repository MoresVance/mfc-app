<nav class="nav" id="mainNav">
    <div class="nav-brand">
        <span class="logo"></span>
        <span class="nav-brand-text">MFC Balloons & Party Needs</span>
    </div>
    <ul class="nav-links">
        <li><a href="{{ route('home') }}" id="nav-home" class="{{ request()->routeIs('home') ? 'active' : '' }}">Home</a></li>
        <li><a href="#" id="nav-browse">Browse Services</a></li>
        <li><a href="#" id="nav-bookings">My Bookings</a></li>
        <li><a href="{{ route('availability') }}" id="nav-availability" class="{{ request()->routeIs('availability') ? 'active' : '' }}">Availability</a></li>
    </ul>
    <div class="nav-actions">
        <button class="nav-icon-btn" id="Account"></button>
        <button class="nav-icon-btn" id="Logout" onClick="window.location.href='{{ route('login') }}'"></button>
    </div>
</nav>
