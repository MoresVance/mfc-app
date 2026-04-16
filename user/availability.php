<?php include '../includes/header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Booking Calendar</title>
    <link rel="stylesheet" href="/assets/css/availability-calendar.css">
</head>
<body>

    <div class="admin-container">
        <div class="content-wrapper">
            
            <header class="calendar-header">
                <h1>Booking Calendar</h1>
            </header>

            <div class="main-layout">
                <div class="calendar-card">
                    
                    <div class="month-navigation">
                        <button class="nav-btn">
                            <i data-lucide="chevron-left"></i>
                        </button>
                        <h2>April 2026</h2>
                        <button class="nav-btn">
                            <i data-lucide="chevron-right"></i>
                        </button>
                    </div>

                    <div class="calendar-grid day-headers">
                        <div>SUN</div><div>MON</div><div>TUE</div><div>WED</div><div>THU</div><div>FRI</div><div>SAT</div>
                    </div>

                    <div class="calendar-grid calendar-days">
                        <div class="day-cell empty"></div>
                        <div class="day-cell empty"></div>
                        
                        <div class="day-cell booked"><span class="day-number">1</span><button type="button" class="day-action day-action--booked" disabled>Fully Booked</button></div>
                        <div class="day-cell booked"><span class="day-number">2</span><button type="button" class="day-action day-action--booked" disabled>Fully Booked</button></div>
                        <div class="day-cell available"><span class="day-number">3</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell available"><span class="day-number">4</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell available"><span class="day-number">5</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell booked"><span class="day-number">6</span><button type="button" class="day-action day-action--booked" disabled>Fully Booked</button></div>
                        <div class="day-cell booked"><span class="day-number">7</span><button type="button" class="day-action day-action--booked" disabled>Fully Booked</button></div>

                        <div class="day-cell available"><span class="day-number">8</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell available"><span class="day-number">9</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell booked"><span class="day-number">10</span><button type="button" class="day-action day-action--booked" disabled>Fully Booked</button></div>
                        <div class="day-cell available"><span class="day-number">11</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell available"><span class="day-number">12</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell booked"><span class="day-number">13</span><button type="button" class="day-action day-action--booked" disabled>Fully Booked</button></div>
                        <div class="day-cell booked"><span class="day-number">14</span><button type="button" class="day-action day-action--booked" disabled>Fully Booked</button></div>

                        <div class="day-cell available"><span class="day-number">15</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell available"><span class="day-number">16</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell available"><span class="day-number">17</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell available"><span class="day-number">18</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell booked"><span class="day-number">19</span><button type="button" class="day-action day-action--booked" disabled>Fully Booked</button></div>
                        <div class="day-cell booked"><span class="day-number">20</span><button type="button" class="day-action day-action--booked" disabled>Fully Booked</button></div>
                        <div class="day-cell booked"><span class="day-number">21</span><button type="button" class="day-action day-action--booked" disabled>Fully Booked</button></div>

                        <div class="day-cell available"><span class="day-number">22</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell available"><span class="day-number">23</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell available"><span class="day-number">24</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell available"><span class="day-number">25</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell available"><span class="day-number">26</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell booked"><span class="day-number">27</span><button type="button" class="day-action day-action--booked" disabled>Fully Booked</button></div>
                        <div class="day-cell booked"><span class="day-number">28</span><button type="button" class="day-action day-action--booked" disabled>Fully Booked</button></div>
                        <div class="day-cell available"><span class="day-number">29</span><button type="button" class="day-action day-action--available">Book Now</button></div>
                        <div class="day-cell available"><span class="day-number">30</span><button type="button" class="day-action day-action--available">Book Now</button></div>

                        <div class="day-cell empty"></div>
                        <div class="day-cell empty"></div>
                        <div class="day-cell empty"></div>
                        </div>

                    <div class="legend">
                        <div class="legend-item">
                            <div class="dot available"></div>
                            <span>Available</span>
                        </div>
                        <div class="legend-item">
                            <div class="dot booked"></div>
                            <span>Fully Booked</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>
</html>

<?php include '../includes/footer.php'; ?>
