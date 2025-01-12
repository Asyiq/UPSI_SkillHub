<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Recommendations</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* General Styling */
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

        .card-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .card {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .job-name {
            font-size: 1.5rem;
            font-weight: 600;
            color: #1d3557;
            margin-bottom: 10px;
        }

        .recommendation-tag {
            font-size: 0.9rem;
            font-weight: 600;
            padding: 5px 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            display: inline-block;
        }

        .recommended {
            background-color: #d1f7d6;
            color: #388e3c;
        }

        .highly-recommended {
            background-color: #dceefd;
            color: #1976d2;
        }

        .not-recommended {
            background-color: #fde2e1;
            color: #d32f2f;
        }

        .fairly-recommended {
            background-color: #fff3e0;
            color: #f57c00;
        }

        .description {
            color: #4f4f4f;
            margin-bottom: 10px;
        }

        .required-skills span {
            background: #e1f5fe;
            color: #0288d1;
            padding: 5px 10px;
            border-radius: 5px;
            margin-right: 5px;
            font-size: 0.85rem;
            display: inline-block;
        }

        .average-salary {
            font-weight: 600;
            color: #e63946;
            margin-top: auto;
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
                <a href="/skills"><i class="fas fa-cogs"></i> Skills</a>
                <a href="/job-recommendations" class="active"><i class="fas fa-briefcase"></i> Jobs</a>
                <a href="/student-profile"><i class="fas fa-user"></i> Profile</a>
                <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Jobs</h1>
            <div class="card-container">
                <?php if (!empty($jobRecommendations)): ?>
                    <?php foreach ($jobRecommendations as $recommendation): ?>
                        <div class="card">
                            <div class="job-name"><?= esc($recommendation['job_name']); ?></div>
                            <div class="recommendation-tag <?= strtolower(str_replace(' ', '-', $recommendation['recommendation_level'])); ?>">
                                <?= esc($recommendation['recommendation_level']); ?>
                            </div>
                            <div class="description"><?= esc($recommendation['description']); ?></div>
                            <div class="required-skills">
                                <strong>Required Skills:</strong>
                                <?php foreach (explode(',', $recommendation['required_skills']) as $skill): ?>
                                    <span><?= esc(trim($skill)); ?></span>
                                <?php endforeach; ?>
                            </div>
                            <div class="average-salary">
                                <strong>Average Salary:</strong> RM <?= number_format($recommendation['average_salary'], 2); ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center text-muted">No job recommendations available at this time.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        © 2024 SkillHub. Your Path to Success.
    </footer>
</body>
</html>
