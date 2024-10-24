<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Location Tracking System</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Lusitana:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    
    <div id="top-nav">
        <div id="logo">Tracking System</div>
        <nav>
            <a href="#" id="home-link">Home</a>
            <a href="#" id="who-are-we-link">Who are we</a>
            <a href="#" id="services-link">Services</a>
            <a href="#" id="contact-us-link">Contact Us</a>
        </nav>
    </div>
    
    <header id="main-header">
        <h1 class="{{ session('location-ts') }}">Location Tracking System</h1>
        <button class="contact-btn">Contact Us</button>
    </header>
    
    <main>
        <div id="content-area">
            <div id="combined-panel">
                <section id="tracking-panel">
                    <h2>Tracking Panel</h2>
                    <form action="/add-locationts" method="post">
                        <div id="track-info">
                            <label for="location-name">Location Name:</label>
                            <input type="text" id="location-name" name="location_name" placeholder="Enter location name">
                            <button type="submit" id="track-button">Track</button>
                        </div>
                        <div id="current-status">
                            <p>Tracking Status: <span id="status">Idle</span></p>
                        </div>
                        @csrf
                    </form>
                    @if(session('status'))
                    <div>{{ session('status') }}</div>
                    @endif
                </section>
                
                <section id="map-container">
                    <div id="map"></div>
                </section>
            </div>

            <div id="who-are-we-content">
                <h2 class="title-class">About Tracking System</h2>
                <div class="who-are-we-container">
                    <div class="who-are-we-left">
                        <h3 class="baumans-regular">About Tracking System</h3>
                        <p class="who-are-we-description baumans-regular">Tracking Maps Foundation is one of the largest leading institutions in the field of vehicle tracking.</p>
                        <p class="who-are-we-description baumans-regular">Approved by the Communications and Information Technology Commission with license number: 650-07-43.</p>
                        <p class="who-are-we-description baumans-regular">Approved by the Public Transport Authority.</p>
                        <p class="who-are-we-description baumans-regular">Commercial Registration No.: 1128185906.</p>
                    </div>
                    <div class="who-are-we-right">
                        <h3 class="baumans-regular">Welcome to Tracking System</h3>
                        <p class="who-are-we-description baumans-regular">Tracking device with weight sensor including linking with the Transport Authority with an annual subscription.</p>
                        <p class="who-are-we-description baumans-regular">Car tracking service is a device installed inside the car, which enables you to locate the car with ease to be able to secure and control the car remotely.</p>
                        <p class="who-are-we-description baumans-regular">It works on all types of vehicles and equipment, and helps you manage your fleet of vehicles and protect them from thefts.</p>
                    </div>
                </div>
            </div>

            <div id="services-section">
                <h2 class="title-class">Our Services</h2>
                <div class="services-container">
                    <div class="service-item">
                        <h3 class="lusitana-bold">Vehicle Tracking</h3>
                        <p>Real-time tracking for all types of vehicles.</p>
                    </div>
                    <div class="service-item">
                        <h3 class="lusitana-bold">Fleet Management</h3>
                        <p>Manage and monitor your fleet effectively.</p>
                    </div>
                    <div class="service-item">
                        <h3 class="lusitana-bold">Maintenance Alerts</h3>
                        <p>Get notifications for vehicle maintenance.</p>
                    </div>
                    <div class="service-item">
                        <h3 class="lusitana-bold">Reporting & Analytics</h3>
                        <p>Comprehensive reports on vehicle usage and performance.</p>
                    </div>
                </div>

            </div>

            <div id="contact-us-section">
                <h2 class="title-class">Contact Us</h2>
                <form id="contact-form">
                    <div>
                        <h3 class="baumans-regular">Contact us for any inquiry</h3>
                        <input type="text" placeholder="Full Name" id="contact-name">
                        <input type="email" placeholder="Email" id="contact-email">
                        <input type="text" placeholder="Subject" id="contact-subject">
                        <input type="text" placeholder="mission" id="contact-mission">
                        <button class="contact-btn" type="submit">Send</button>
                    </div>
                </form>

                <div id="follow-us-section" class="follow-us-background">
                    <h2>Follow us on</h2>
                        <div class="social-media-logos">
                        <a href="https://www.instagram.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                            <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334"/>
                        </svg>
                        </a>
                        <a href="https://twitter.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334q.002-.211-.006-.422A6.7 6.7 0 0 0 16 3.542a6.7 6.7 0 0 1-1.889.518 3.3 3.3 0 0 0 1.447-1.817 6.5 6.5 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.32 9.32 0 0 1-6.767-3.429 3.29 3.29 0 0 0 1.018 4.382A3.3 3.3 0 0 1 .64 6.575v.045a3.29 3.29 0 0 0 2.632 3.218 3.2 3.2 0 0 1-.865.115 3 3 0 0 1-.614-.057 3.28 3.28 0 0 0 3.067 2.277A6.6 6.6 0 0 1 .78 13.58a6 6 0 0 1-.78-.045A9.34 9.34 0 0 0 5.026 15"/>
                        </svg>
                        </a>
                        <a href="https://www.linkedin.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                            <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                        </svg>
                        </a>
                        <a href="https://www.facebook.com">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951"/>
                        </svg>
                        </a>
                    </div>
                </div>
            </div>
            
        </div>
    </main>
    
    <footer>
        <p>&copy; 2024 Real-time Tracking System</p>
    </footer>
    
    <script src="{{ asset('js/script.js') }}" defer></script>
</body>
</html>
