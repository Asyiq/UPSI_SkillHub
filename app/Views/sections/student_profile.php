<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
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

        .profile-container {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 800px;
            margin: 20px auto;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-header img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #f8f9fa;
        }

        .edit-button {
            display: inline-block;
            padding: 10px 20px;
            color: white;
            background-color: #457b9d;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s ease;
            margin-top: 10px;
        }

        .edit-button:hover {
            background-color: #345d6f;
        }

        .card {
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            font-size: 1.2rem;
            color: white;
            background-color: #457b9d;
            padding: 10px 15px;
            border-radius: 10px;
            text-align: center;
            margin-bottom: 15px;
        }

        .field {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            color: #555;
        }

        .field-label {
            font-weight: bold;
        }

        .field-value {
            color: #333;
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
                <a href="/job-recommendations"><i class="fas fa-briefcase"></i> Jobs</a>
                <a href="/student-profile" class="active"><i class="fas fa-user"></i> Profile</a>
                <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <h1>Student Profile</h1>
            <div class="profile-container">
                <div class="profile-header">
                    <h2><?= esc($profile['name'] ?? 'Not Available'); ?></h2>
                    <p><strong>Student ID:</strong> <?= esc($profile['student_id'] ?? 'Not Available'); ?></p>
                    <a href="/student-profile/edit/<?= esc($profile['student_id']); ?>" class="edit-button">Edit Profile</a>
                </div>

                <!-- Personal Details -->
                <div class="card">
                    <div class="card-header">Personal Details</div>
                    <div class="field">
                        <span class="field-label">Gender:</span>
                        <span class="field-value"><?= esc($profile['gender'] ?? 'Not Available'); ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Birth Date:</span>
                        <span class="field-value"><?= esc($profile['birth_date'] ?? 'Not Available'); ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Email:</span>
                        <span class="field-value"><?= esc($profile['email'] ?? 'Not Available'); ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Phone:</span>
                        <span class="field-value"><?= esc($profile['phone'] ?? 'Not Available'); ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Address:</span>
                        <span class="field-value"><?= esc($profile['address'] ?? 'Not Available'); ?></span>
                    </div>
                </div>

                <!-- Academic Information -->
                <div class="card">
                    <div class="card-header">Academic Information</div>
                    <div class="field">
                        <span class="field-label">Faculty:</span>
                        <span class="field-value"><?= esc($profile['faculty'] ?? 'Not Available'); ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Program:</span>
                        <span class="field-value"><?= esc($profile['program'] ?? 'Not Available'); ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Semester:</span>
                        <span class="field-value"><?= esc($profile['semester'] ?? 'Not Available'); ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Status of Study:</span>
                        <span class="field-value"><?= esc($profile['status_of_study'] ?? 'Not Available'); ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Level of Study:</span>
                        <span class="field-value"><?= esc($profile['level_of_study'] ?? 'Not Available'); ?></span>
                    </div>
                </div>

                 <!-- Socioeconomic Information -->
                 <div class="card">
                    <div class="card-header">Socioeconomic Information</div>
                    <div class="field">
                        <span class="field-label">Family Income:</span>
                        <span class="field-value"><?= esc($profile['family_income'] ?? 'Not Available'); ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Number of Siblings:</span>
                        <span class="field-value"><?= esc($profile['siblings_count'] ?? 'Not Available'); ?></span>
                    </div>
                </div>

                <!-- Location Information -->
                <div class="card">
                    <div class="card-header">Location Information</div>
                    <div class="field">
                        <span class="field-label">City:</span>
                        <span class="field-value"><?= esc($profile['city'] ?? 'Not Available'); ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">State:</span>
                        <span class="field-value"><?= esc($profile['state'] ?? 'Not Available'); ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">Country:</span>
                        <span class="field-value"><?= esc($profile['country'] ?? 'Not Available'); ?></span>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">Personal Information</div>
                    <div class="field">
                        <span class="field-label">Marital Status:</span>
                        <span class="field-value"><?= esc($profile['marital_status'] ?? 'Not Available'); ?></span>
                    </div>
                    <div class="field">
                        <span class="field-label">IC Number:</span>
                        <span class="field-value"><?= esc($profile['ic_number'] ?? 'Not Available'); ?></span>
                    </div>
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
