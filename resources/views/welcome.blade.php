<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Malaysia Super League</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f8f9fa;
      margin: 0;
    }

    .navbar {
      font-weight: 600;
      background-color: #fff;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      z-index: 10;
    }

    .hero {
      position: relative;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
      color: #fff;
      overflow: hidden;
    }

    .hero video {
      position: absolute;
      top: 0;
      left: 0;
      object-fit: cover;
      width: 100%;
      height: 100%;
      z-index: -1;
      filter: brightness(0.4);
    }

    .hero-content {
      padding: 20px;
    }

    .hero-content h1 {
      font-size: 3.8rem;
      font-weight: 800;
      color: #e6b800; /* Less bright yellow */
      text-shadow: 2px 2px 6px rgba(0,0,0,0.7);
    }

    .hero-content p {
      font-size: 1.3rem;
      margin-top: 10px;
      text-shadow: 1px 1px 5px rgba(0,0,0,0.6);
    }

    .features {
      padding: 80px 0;
      background-color: #fff;
    }

    .feature-item {
      transition: transform 0.3s ease;
    }

    .feature-item:hover {
      transform: translateY(-5px);
    }

    .feature-icon {
      font-size: 3rem;
      color: #e6b800; /* Less bright yellow */
    }

    .cta {
      padding: 80px 20px;
      text-align: center;
      background: linear-gradient(to right, #f5e8b3, #f9f1c8); /* Muted yellow gradient */
    }

    .cta h3 {
      font-size: 2.2rem;
      font-weight: 700;
      margin-bottom: 20px;
    }

    .cta p {
      font-size: 1.1rem;
      margin-bottom: 30px;
      color: #333;
    }

    .cta a.btn {
      background-color: #e6b800; /* Less bright yellow */
      color: #000;
      font-weight: 600;
      padding: 15px 40px;
      border-radius: 50px;
      font-size: 1.1rem;
      transition: all 0.3s ease;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
      animation: bounce 2s infinite;
    }

    .cta a.btn:hover {
      background-color: #cc9900; /* Darker muted yellow */
      transform: scale(1.05);
    }

    .btn-warning {
      background-color: #e6b800; /* Less bright yellow */
      color: #000;
    }

    .btn-warning:hover {
      background-color: #cc9900; /* Darker muted yellow */
      color: #000;
    }

    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-7px); }
    }

    @media (max-width: 768px) {
      .hero-content h1 {
        font-size: 2.5rem;
      }

      .hero-content p {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#">Malaysia Super League</a>
      <div class="ms-auto d-flex gap-2">
        <a href="{{ route('login') }}" class="btn btn-outline-dark">Login</a>
        <a href="{{ route('register') }}" class="btn btn-warning">Register</a>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <div class="hero">
    <video autoplay muted loop playsinline>
      <source src="{{ asset('asset/videos/malaysia-football.mp4') }}" type="video/mp4">
      Your browser does not support the video tag.
    </video>
    <div class="hero-content">
      <h1>Welcome to Malaysia Football</h1>
      <p>Experience live scores, team stats, and match-day excitement!</p>
    </div>
  </div>

  <!-- Features Section -->
  <section class="features text-center">
    <div class="container">
      <div class="row g-5">
        <div class="col-md-4">
          <div class="feature-item">
            <div class="feature-icon mb-3">⚽</div>
            <h4>Live Match Updates</h4>
            <p>Real-time scores and fixtures updated instantly during every match.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-item">
            <div class="feature-icon mb-3">📊</div>
            <h4>Team & Player Stats</h4>
            <p>Access comprehensive statistics for teams and your favorite players.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-item">
            <div class="feature-icon mb-3">📰</div>
            <h4>Latest News</h4>
            <p>Stay informed with the latest news, transfers, and league updates.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Call To Action Section -->
  <section class="cta">
    <div class="container">
      <h3>Join the Football Revolution</h3>
      <p>Create an account now and dive into the full Malaysia Super League experience.</p>
      <a href="{{ route('register') }}" class="btn">Get Started</a>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
