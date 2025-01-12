<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Subjects</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
  /* General Reset */
body, html {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background: #f4f6f9;
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

h1, h2 {
    color: #1d3557;
    font-weight: 600;
    margin-bottom: 20px;
    text-align: left;
}

/* Center Search Form and Related Elements */
/* Center Search Form and Instruction Text */
#search {
    display: block;
    margin: 0 auto 10px auto; /* Center the search input */
    width: 100%;
    max-width: 500px;
    padding: 10px 15px;
    border: 2px solid #ddd;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.form-text {
    text-align: center; /* Center align the text */
    margin-top: 10px; /* Add space above */
    display: block; /* Ensure it takes a block layout */
    font-size: 0.9rem;
    color: #555;
    width: 100%;
    max-width: 500px; /* Matches the width of the search input */
    margin-left: auto; /* Ensures alignment in responsive layouts */
    margin-right: auto; /* Ensures alignment in responsive layouts */
}


/* Center Search Results */
#search-results {
    margin: 10px auto 0 auto; /* Center results under the search bar */
    max-width: 500px;
    list-style: none;
    padding: 0;
}

#search-results li {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 10px 15px;
    margin-bottom: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

#search-results li:hover {
    background: #e0f7fa;
}

#search-results .btn {
    font-size: 0.9rem;
    padding: 8px 15px;
    border-radius: 20px;
    background-color: #1d3557;
    color: white;
    transition: background 0.3s ease;
}

#search-results .btn:hover {
    background-color: #457b9d;
}

/* Table Styling */
table {
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin-top: 20px;
    width: 100%;
}

table thead {
    background-color: #457b9d;
    color: white;
    text-transform: uppercase;
    font-size: 0.9rem;
}

table th, table td {
    padding: 15px;
    text-align: center;
    border: 1px solid #ddd;
}

table tbody tr:nth-child(even) {
    background-color: #f8f9fa;
}

table tbody tr:hover {
    background-color: #e0f7fa;
    cursor: pointer;
}

/* Buttons */
.btn {
    border-radius: 20px;
    padding: 8px 15px;
    transition: all 0.3s ease;
}

.btn-primary {
    background-color: #1d3557;
    color: white;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
}

.btn-primary:hover {
    background-color: #457b9d;
    box-shadow: 0 5px 12px rgba(0, 0, 0, 0.2);
}

.btn-danger {
    background-color: #e63946;
    color: white;
}

.btn-danger:hover {
    background-color: #b42d3b;
    box-shadow: 0 3px 6px rgba(0, 0, 0, 0.2);
}

.form-select {
    padding: 8px;
    font-size: 0.9rem;
    border-radius: 5px;
    border: 1px solid #ddd;
}

/* Flash Messages */
.alert {
    padding: 10px;
    margin-bottom: 20px;
    border-radius: 5px;
    font-size: 0.9rem;
    text-align: center;
    animation: fadeIn 0.5s ease;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.alert-success {
    background-color: #d4edda;
    color: #155724;
}

.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
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
    <div class="layout">
        <div class="sidebar">
            <div class="logo">SkillHub</div>
            <nav>
                <a href="/dashboard"><i class="fas fa-home"></i> Dashboard</a>
                <a href="/student-subjects" class="active"><i class="fas fa-book"></i> My Subjects</a>
                <a href="/skills"><i class="fas fa-cogs"></i> Skills</a>
                <a href="/job-recommendations"><i class="fas fa-briefcase"></i> Jobs</a>
                <a href="/student-profile"><i class="fas fa-user"></i> Profile</a>
                <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </div>

        <div class="main-content">
            <h1>My Subjects</h1>

            <!-- Flash Messages -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success"> <?= session()->getFlashdata('success'); ?> </div>
            <?php elseif (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"> <?= session()->getFlashdata('error'); ?> </div>
            <?php endif; ?>
            <?php if (empty($studentSubjects)): ?>
    <div class="text-center mt-5">
        <i class="fas fa-book-open fa-3x" style="color: #457b9d;"></i>
        <p class="mt-3 text-muted">You haven't added any subjects yet. Start searching for subjects now!</p>
    </div>
<?php endif; ?>


            <!-- Search Form -->
            <input type="text" id="search" class="form-control" placeholder="Search for subjects...">
            <small class="form-text">Please enter the subject code in uppercase only.</small>
            <ul id="search-results" class="list-group mt-2"></ul>

            <!-- Subject Table -->
            <h2>Your Selected Subjects</h2>
            <table>
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Name</th>
                        <th>Credit Hours</th>
                        <th>Grade</th>
                        <th>Recommendation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($studentSubjects as $subject): ?>
                        <tr>
                            <td><?= esc($subject['code']); ?></td>
                            <td><?= esc($subject['name']); ?></td>
                            <td><?= esc($subject['credit_hours']); ?></td>
                            <td>
                                <form action="<?= site_url('student-subjects/updateGrade/' . $subject['id']); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <select name="grade" class="form-select">
                                        <?php foreach (['A', 'A-', 'B+', 'B', 'B-', 'C+', 'C', 'C-', 'D+', 'D', 'F'] as $grade): ?>
                                            <option value="<?= $grade; ?>" <?= ($subject['grade'] === $grade) ? 'selected' : ''; ?>><?= $grade; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <button type="submit" class="btn btn-primary btn-sm mt-1">Update</button>
                                </form>
                            </td>
                            <td><?= esc($subject['recommendation_level'] ?? 'N/A'); ?></td>
                            <td>
                                <form action="<?= site_url('student-subjects/delete/' . $subject['id']); ?>" method="post">
                                    <?= csrf_field(); ?>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        © 2024 SkillHub. Your Path to Success.
    </footer>
    <!-- Search Functionality -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#search').on('input', function () {
                const keyword = $(this).val();

                if (keyword.length > 0) {
                    $.post('<?= site_url('student-subjects/search'); ?>', { keyword: keyword }, function (data) {
                        let results = '';

                        if (Array.isArray(data) && data.length > 0) {
                            data.forEach(function(subject) {
                                results += `
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        ${subject.subject_code} - ${subject.subject_name}
                                        <form action="<?= site_url('student-subjects/add'); ?>" method="post">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="subject_code" value="${subject.subject_code}">
                                            <input type="hidden" name="grade" value="A"> <!-- Default grade -->
                                            <button class="btn btn-primary btn-sm">Add</button>
                                        </form>
                                    </li>
                                `;
                            });
                        } else {
                            results = '<li class="list-group-item">No subjects found</li>';
                        }

                        $('#search-results').html(results).show();
                    });
                } else {
                    $('#search-results').hide();
                }
            });
        });
    </script>
</body>
</html>
