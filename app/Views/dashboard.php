<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillHub - Automatic Slider</title>

    <!-- Google Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">

    <style>
        /* General Reset */
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background: #f8f9fa;
            color: #333;
        }

        .layout {
            display: flex;
            width: 100%;
        }

        /* Sidebar Styling */
        .sidebar {
    background: #1d3557;
    width: 250px;
    height: 100vh;
    padding: 20px 0;
    color: white;
    display: flex;
    flex-direction: column;
    position: fixed;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
}

        .sidebar .logo {
            font-family: 'Pacifico', cursive;
            font-size: 1.8rem;
            text-align: center;
            margin-bottom: 20px;
        }

        .sidebar nav a {
    color: white;
    text-decoration: none;
    padding: 10px 20px;
    display: block;
    font-weight: 600;
    transition: background 0.3s ease, padding-left 0.3s ease;
}

.sidebar nav a:hover {
    background: #457b9d;
    padding-left: 30px;
    border-radius: 10px;
}

.sidebar nav a.active {
    background: #457b9d;
    border-radius: 10px;
    padding-left: 30px;
}

        /* Main Content Styling */
        .main-content {
            margin-left: 250px;
            flex: 1;
            padding: 30px;
            background: white;
            min-height: 100vh;
        }

        .main-content h2 {
            font-size: 2rem;
            color: #1d3557;
            margin-bottom: 20px;
        }

        /* Image Slider */
        .slider {
    width: 100%;
    max-width: 800px;
    margin: 0 auto 30px;
    overflow: hidden;
    border-radius: 10px;
    position: relative;
}

.slider-images {
    display: flex;
    width: calc(100% * 4); /* Double the slides for seamless looping */
    animation: loopSlide 20s linear infinite; /* Slow continuous movement */
}
@keyframes loopSlide {
    0% {
        transform: translateX(0);
    }
    100% {
        transform: translateX(-50%); /* Moves half the width to loop back seamlessly */
    }}

        .slider-images img {
    width: 100%; /* Ensure each image takes up the full width of the slider */
    height: 300px;
    object-fit: cover;
}

.pinterest-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr); /* Four cards in one row */
    gap: 20px; /* Space between cards */
    justify-items: center; /* Center-align cards horizontally */
    margin-top: 20px;
}

.pinterest-card {
    background: #ffffff;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-align: center;
    padding: 20px;
    width: 90%; /* Adjust card width */
    max-width: 200px; /* Ensure cards fit comfortably in a row */
}
.pinterest-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
}

        .pinterest-card .card-content {
            padding: 15px;
            color: #333;
        }

        .pinterest-card .card-content h3 {
            margin: 0 0 10px;
            font-size: 1.2rem;
            color: #1d3557;
        }

        .pinterest-card .card-content p {
            font-size: 0.9rem;
            color: #555;
        }

        .pinterest-card .card-content a {
            text-decoration: none;
            color: #1d3557;
            font-weight: bold;
        }
        .card-icon {
    font-size: 2.5rem;
    color: #1d3557;
    margin-bottom: 10px;
}

.card-content h3 {
    margin: 10px 0;
    font-size: 1.2rem;
    color: #1d3557;
}

.card-content p {
    font-size: 0.9rem;
    color: #555;
}

.card-content a {
    text-decoration: none;
    color: #1d3557;
    font-weight: bold;
}
        /* Footer Styling */
        footer {
    background: #1d3557;
    color: white;
    text-align: center;
    padding: 10px 0;
    font-size: 0.9rem;
    position: fixed;
    bottom: 0;
    left: 250px; /* Matches the width of the sidebar */
    width: calc(100% - 250px); /* Subtracts the sidebar's width */
    z-index: 10;
}

    </style>
</head>
<body>
    <!-- Layout -->
    <div class="layout">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">SkillHub</div>
            <nav>
                <a href="/dashboard" class="active"><i class="fas fa-home"></i> Dashboard</a>
                <a href="/student-subjects"><i class="fas fa-book"></i> My Subjects</a>
                <a href="/skills"><i class="fas fa-cogs"></i> Skills</a>
                <a href="/job-recommendations"><i class="fas fa-briefcase"></i> Jobs</a>
                <a href="/student-profile"><i class="fas fa-user"></i> Profile</a>
                <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content">
           
            <h2>Welcome to SkillHub, <?= esc($student_id); ?>!</h2>
            <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error'); ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('info')): ?>
    <div class="alert alert-info"><?= session()->getFlashdata('info'); ?></div>
<?php endif; ?>

            <!-- Image Slider -->
            <div class="slider">
            <div class="slider-images">
    <img src="/assets/images/slide1.jpg" alt="Slide 1">
    <img src="/assets/images/slide2.jpg" alt="Slide 2">
    <img src="/assets/images/slide3.jpg" alt="Slide 3">
    <img src="/assets/images/slide4.jpg" alt="Slide 4"> <!-- New Image -->
</div>

</div>


            <!-- Pinterest Grid -->
            <div class="pinterest-grid">
    <div class="pinterest-card">
        <div class="card-icon">
            <i class="fas fa-book"></i>
        </div>
        <div class="card-content">
            <h3>My Subjects</h3>
            <p>View and manage your enrolled subjects.</p>
            <a href="/student-subjects">Go to My Subjects</a>
        </div>
    </div>
    <div class="pinterest-card">
        <div class="card-icon">
            <i class="fas fa-cogs"></i>
        </div>
        <div class="card-content">
            <h3>Skills</h3>
            <p>Track and improve your skills.</p>
            <a href="/skills">View Skills</a>
        </div>
    </div>
    <div class="pinterest-card">
        <div class="card-icon">
            <i class="fas fa-briefcase"></i>
        </div>
        <div class="card-content">
            <h3>Job Recommendations</h3>
            <p>Find suitable job opportunities based on your skills.</p>
            <a href="/job-recommendations">Explore Jobs</a>
        </div>
    </div>
    <div class="pinterest-card">
        <div class="card-icon">
            <i class="fas fa-user"></i>
        </div>
        <div class="card-content">
            <h3>Profile</h3>
            <p>Update your personal and academic information.</p>
            <a href="/student-profile">Edit Profile</a>
        </div>
    </div>
</div>


        </div>
    </div>

    <!-- Footer -->
    <footer>
        © 2024 SkillHub. Your Path to Success.
    </footer>

    <!-- Slider Script -->
    <script>
      const sliderImages = document.getElementById('sliderImages');
const totalSlides = sliderImages.children.length;
let currentIndex = 0;

function updateSlide() {
    sliderImages.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Auto-slide functionality
setInterval(() => {
    currentIndex = (currentIndex + 1) % totalSlides; // Loop back to first slide
    updateSlide();
}, 8000); // 3 seconds per slide
    </script>
</body>
</html>
