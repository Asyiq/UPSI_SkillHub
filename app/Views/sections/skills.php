<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
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

        .main-content h1 {
            font-size: 2rem;
            color: #1d3557;
            margin-bottom: 20px;
            text-align: center;
        }

        .skills-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        .skill-category {
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            color: white;
        }

        .skill-category:nth-child(1) {
            background: #e63946; /* Light red for Technical Skills */
        }

        .skill-category:nth-child(2) {
            background: #457b9d; /* Light blue for Soft Skills */
        }

        .skill-category:nth-child(3) {
            background: #2a9d8f; /* Light green for Knowledge */
        }

        .skill-category h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
            text-align: center;
        }

        .skill-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .skill-list li {
            background: rgba(255, 255, 255, 0.8);
            margin-bottom: 10px;
            padding: 10px 15px;
            border-radius: 10px;
            font-size: 1rem;
            color: #333;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease, transform 0.3s ease;
        }

        .skill-list li:hover {
            background: #f1f1f1;
            transform: translateY(-2px);
        }

        .skill-list li.text-muted {
            color: #999;
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
            left: 250px;
            width: calc(100% - 250px);
            z-index: 10;
        }
    </style>
</head>
<body>
    <div class="layout">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo">SkillHub</div>
            <nav>
                <a href="/dashboard"><i class="fas fa-home"></i> Dashboard</a>
                <a href="/student-subjects"><i class="fas fa-book"></i> My Subjects</a>
                <a href="/skills" class="active"><i class="fas fa-cogs"></i> Skills</a>
                <a href="/job-recommendations"><i class="fas fa-briefcase"></i> Jobs</a>
                <a href="/student-profile"><i class="fas fa-user"></i> Profile</a>
                <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Student Skills</h1>
            <div class="skills-container">
                <!-- Technical Skills -->
                <div class="skill-category">
                    <h3><i class="fas fa-tools"></i> Technical Skills (<?= count($technical_skills); ?>)</h3>
                    <ul class="skill-list">
                        <?php if (!empty($technical_skills)): ?>
                            <?php foreach ($technical_skills as $skill): ?>
                                <li><?= esc(trim($skill)); ?></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="text-muted"><i class="fas fa-info-circle"></i> No technical skills found.</li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Soft Skills -->
                <div class="skill-category">
                    <h3><i class="fas fa-user"></i> Soft Skills (<?= count($soft_skills); ?>)</h3>
                    <ul class="skill-list">
                        <?php if (!empty($soft_skills)): ?>
                            <?php foreach ($soft_skills as $skill): ?>
                                <li><?= esc(ucwords(trim($skill))); ?></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="text-muted"><i class="fas fa-info-circle"></i> No soft skills found.</li>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Knowledge -->
                <div class="skill-category">
                    <h3><i class="fas fa-book"></i> Knowledge (<?= count($knowledge); ?>)</h3>
                    <ul class="skill-list">
                        <?php if (!empty($knowledge)): ?>
                            <?php foreach ($knowledge as $item): ?>
                                <li><?= esc(trim($item)); ?></li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="text-muted"><i class="fas fa-info-circle"></i> No knowledge found.</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        © 2024 SkillHub. Your Path to Success.
    </footer>
</body>
</html>
