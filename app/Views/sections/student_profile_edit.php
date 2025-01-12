<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student Profile</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

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

        .form-container {
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 800px;
            margin: 20px auto;
        }

        .form-section-title {
            color: #1d3557;
            font-weight: 600;
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }

        .form-control {
            margin-bottom: 15px;
            border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px 12px;
        }

        .form-control:focus {
    border-color: #457b9d;
    box-shadow: 0 0 5px rgba(69, 123, 157, 0.5);
}

.form-section-divider {
    border-top: 2px solid #e0e0e0;
    margin: 20px 0;
}

        .btn-primary {
            background: #457b9d;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            color: white;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: #345d6f;
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

        @media (max-width: 768px) {
    .main-content {
        padding: 15px;
    }
    .form-container {
        padding: 20px;
    }
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
            <h1>Edit Student Profile</h1>
            <div class="form-container">
                <form action="<?= site_url('student-profile/update'); ?>" method="post">
                    <?= csrf_field(); ?>

                    

            <!-- Personal Details -->
            <h3 class="form-section-title">Personal Details</h3>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control" value="<?= esc($profile['name'] ?? ''); ?>" required>
            </div>
            <div class="mb-3">
    <label for="gender" class="form-label">Gender</label>
    <select name="gender" id="gender" class="form-control">
        <option value="" disabled <?= empty($profile['gender']) ? 'selected' : ''; ?>>Select Gender</option>
        <option value="Male" <?= esc($profile['gender'] ?? '') === 'Male' ? 'selected' : ''; ?>>Male</option>
        <option value="Female" <?= esc($profile['gender'] ?? '') === 'Female' ? 'selected' : ''; ?>>Female</option>
        <option value="Other" <?= esc($profile['gender'] ?? '') === 'Other' ? 'selected' : ''; ?>>Other</option>
    </select>
</div>

            <div class="mb-3">
                <label for="birth_date" class="form-label">Birth Date</label>
                <input type="date" name="birth_date" id="birth_date" class="form-control" value="<?= esc($profile['birth_date'] ?? ''); ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="<?= esc($profile['email'] ?? ''); ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="tel" name="phone" id="phone" class="form-control" value="<?= esc($profile['phone'] ?? ''); ?>">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea name="address" id="address" class="form-control"><?= esc($profile['address'] ?? ''); ?></textarea>
            </div>

            <div class="form-section-divider"></div>

            <!-- Academic Information -->
            <h3 class="form-section-title">Academic Information</h3>
            <div class="mb-3">
    <label for="faculty" class="form-label">Faculty</label>
    <select name="faculty" id="faculty" class="form-control">
        <option value="" disabled <?= empty($profile['faculty']) ? 'selected' : ''; ?>>Select Faculty</option>
        <option value="Fakulti Bahasa dan Komunikasi" <?= esc($profile['faculty'] ?? '') == "Fakulti Bahasa dan Komunikasi" ? 'selected' : ''; ?>>Fakulti Bahasa dan Komunikasi</option>
        <option value="Fakulti Pembangunan Manusia" <?= esc($profile['faculty'] ?? '') == "Fakulti Pembangunan Manusia" ? 'selected' : ''; ?>>Fakulti Pembangunan Manusia</option>
        <option value="Fakulti Sains & Matematik" <?= esc($profile['faculty'] ?? '') == "Fakulti Sains & Matematik" ? 'selected' : ''; ?>>Fakulti Sains & Matematik</option>
        <option value="Fakulti Pengurusan & Ekonomi" <?= esc($profile['faculty'] ?? '') == "Fakulti Pengurusan & Ekonomi" ? 'selected' : ''; ?>>Fakulti Pengurusan & Ekonomi</option>
        <option value="Fakulti Sains Kemanusiaan" <?= esc($profile['faculty'] ?? '') == "Fakulti Sains Kemanusiaan" ? 'selected' : ''; ?>>Fakulti Sains Kemanusiaan</option>
        <option value="Fakulti Seni, Kelestarian & Industri Kreatif" <?= esc($profile['faculty'] ?? '') == "Fakulti Seni, Kelestarian & Industri Kreatif" ? 'selected' : ''; ?>>Fakulti Seni, Kelestarian & Industri Kreatif</option>
        <option value="Fakulti Muzik & Seni Persembahan" <?= esc($profile['faculty'] ?? '') == "Fakulti Muzik & Seni Persembahan" ? 'selected' : ''; ?>>Fakulti Muzik & Seni Persembahan</option>
        <option value="Fakulti Sains Sukan & Kejurulatihan" <?= esc($profile['faculty'] ?? '') == "Fakulti Sains Sukan & Kejurulatihan" ? 'selected' : ''; ?>>Fakulti Sains Sukan & Kejurulatihan</option>
        <option value="Fakulti Teknikal & Vokasional" <?= esc($profile['faculty'] ?? '') == "Fakulti Teknikal & Vokasional" ? 'selected' : ''; ?>>Fakulti Teknikal & Vokasional</option>
        <option value="Fakulti Komputeran & Meta Teknologi" <?= esc($profile['faculty'] ?? '') == "Fakulti Komputeran & Meta Teknologi" ? 'selected' : ''; ?>>Fakulti Komputeran & Meta Teknologi</option>
    </select>
</div>

            <div class="mb-3">
                <label for="program" class="form-label">Program</label>
                <input type="text" name="program" id="program" class="form-control" value="<?= esc($profile['program'] ?? ''); ?>">
            </div>
            <div class="mb-3">
    <label for="semester" class="form-label">Semester</label>
    <select name="semester" id="semester" class="form-control">
        <option value="" disabled <?= empty($profile['semester']) ? 'selected' : ''; ?>>Select Semester</option>
        <?php for ($i = 1; $i <= 20; $i++): ?>
            <option value="<?= $i; ?>" <?= esc($profile['semester'] ?? '') == $i ? 'selected' : ''; ?>><?= $i; ?></option>
        <?php endfor; ?>
    </select>
</div>

            <div class="mb-3">
    <label for="status_of_study" class="form-label">Status of Study</label>
    <select name="status_of_study" id="status_of_study" class="form-control">
        <option value="" disabled <?= empty($profile['status_of_study']) ? 'selected' : ''; ?>>Select Status of Study</option>
        <option value="Active" <?= esc($profile['status_of_study'] ?? '') === 'Active' ? 'selected' : ''; ?>>Active</option>
        <option value="Completed" <?= esc($profile['status_of_study'] ?? '') === 'Completed' ? 'selected' : ''; ?>>Completed</option>
        <option value="Graduated" <?= esc($profile['status_of_study'] ?? '') === 'Graduated' ? 'selected' : ''; ?>>Graduated</option>
        <option value="Deferred" <?= esc($profile['status_of_study'] ?? '') === 'Deferred' ? 'selected' : ''; ?>>Deferred</option>
        <option value="Dropped Out" <?= esc($profile['status_of_study'] ?? '') === 'Dropped Out' ? 'selected' : ''; ?>>Dropped Out</option>
    </select>
</div>

            <div class="mb-3">
                <label for="level_of_study" class="form-label">Level of Study</label>
                <input type="text" name="level_of_study" id="level_of_study" class="form-control" value="<?= esc($profile['level_of_study'] ?? ''); ?>">
            </div>

            <div class="form-section-divider"></div>
            <!-- Socioeconomic Information -->
            <h3 class="form-section-title">Socioeconomic Information</h3>
            <div class="mb-3">
                <label for="family_income" class="form-label">Family Income</label>
                <input type="number" name="family_income" id="family_income" class="form-control" value="<?= esc($profile['family_income'] ?? ''); ?>">
            </div>
            <div class="mb-3">
                <label for="siblings_count" class="form-label">Number of Siblings</label>
                <input type="number" name="siblings_count" id="siblings_count" class="form-control" value="<?= esc($profile['siblings_count'] ?? ''); ?>">
            </div>

            <div class="form-section-divider"></div>
            <!-- Location Information -->
            <h3 class="form-section-title">Location Information</h3>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" name="city" id="city" class="form-control" value="<?= esc($profile['city'] ?? ''); ?>">
            </div>
            <div class="mb-3">
    <label for="state" class="form-label">State</label>
    <select name="state" id="state" class="form-control">
        <option value="" disabled <?= empty($profile['state']) ? 'selected' : ''; ?>>Select State</option>
        <option value="Johor" <?= esc($profile['state'] ?? '') === 'Johor' ? 'selected' : ''; ?>>Johor</option>
        <option value="Kedah" <?= esc($profile['state'] ?? '') === 'Kedah' ? 'selected' : ''; ?>>Kedah</option>
        <option value="Kelantan" <?= esc($profile['state'] ?? '') === 'Kelantan' ? 'selected' : ''; ?>>Kelantan</option>
        <option value="Melaka" <?= esc($profile['state'] ?? '') === 'Melaka' ? 'selected' : ''; ?>>Melaka</option>
        <option value="Negeri Sembilan" <?= esc($profile['state'] ?? '') === 'Negeri Sembilan' ? 'selected' : ''; ?>>Negeri Sembilan</option>
        <option value="Pahang" <?= esc($profile['state'] ?? '') === 'Pahang' ? 'selected' : ''; ?>>Pahang</option>
        <option value="Penang" <?= esc($profile['state'] ?? '') === 'Penang' ? 'selected' : ''; ?>>Penang</option>
        <option value="Perak" <?= esc($profile['state'] ?? '') === 'Perak' ? 'selected' : ''; ?>>Perak</option>
        <option value="Perlis" <?= esc($profile['state'] ?? '') === 'Perlis' ? 'selected' : ''; ?>>Perlis</option>
        <option value="Sabah" <?= esc($profile['state'] ?? '') === 'Sabah' ? 'selected' : ''; ?>>Sabah</option>
        <option value="Sarawak" <?= esc($profile['state'] ?? '') === 'Sarawak' ? 'selected' : ''; ?>>Sarawak</option>
        <option value="Selangor" <?= esc($profile['state'] ?? '') === 'Selangor' ? 'selected' : ''; ?>>Selangor</option>
        <option value="Terengganu" <?= esc($profile['state'] ?? '') === 'Terengganu' ? 'selected' : ''; ?>>Terengganu</option>
        <option value="Kuala Lumpur" <?= esc($profile['state'] ?? '') === 'Kuala Lumpur' ? 'selected' : ''; ?>>Kuala Lumpur</option>
        <option value="Labuan" <?= esc($profile['state'] ?? '') === 'Labuan' ? 'selected' : ''; ?>>Labuan</option>
        <option value="Putrajaya" <?= esc($profile['state'] ?? '') === 'Putrajaya' ? 'selected' : ''; ?>>Putrajaya</option>
    </select>
</div>

            <div class="mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" name="country" id="country" class="form-control" value="<?= esc($profile['country'] ?? ''); ?>">
            </div>

            <div class="form-section-divider"></div>
            <!-- Marital and Identity Information -->
            <h3 class="form-section-title">Personal Information</h3>
            <div class="mb-3">
    <label for="marital_status" class="form-label">Marital Status</label>
    <select name="marital_status" id="marital_status" class="form-control">
        <option value="" disabled <?= empty($profile['marital_status']) ? 'selected' : ''; ?>>Select Marital Status</option>
        <option value="Single" <?= esc($profile['marital_status'] ?? '') === 'Single' ? 'selected' : ''; ?>>Single</option>
        <option value="Married" <?= esc($profile['marital_status'] ?? '') === 'Married' ? 'selected' : ''; ?>>Married</option>
        <option value="Divorced" <?= esc($profile['marital_status'] ?? '') === 'Divorced' ? 'selected' : ''; ?>>Divorced</option>
        <option value="Widowed" <?= esc($profile['marital_status'] ?? '') === 'Widowed' ? 'selected' : ''; ?>>Widowed</option>
    </select>
</div>

            <div class="mb-3">
                <label for="ic_number" class="form-label">IC Number</label>
                <input type="text" name="ic_number" id="ic_number" class="form-control" value="<?= esc($profile['ic_number'] ?? ''); ?>">
            </div>

                <!-- Submit Button -->
                <button type="button" class="btn-primary" data-bs-toggle="modal" data-bs-target="#confirmModal">Update Profile</button>
  
                </form>
            </div>
            <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmModalLabel">Confirm Update</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to update your profile?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="confirmSubmit">Yes, Update</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script -->
<script>
document.getElementById('confirmSubmit').addEventListener('click', function () {
    const form = document.querySelector('form');
    if (form) {
        form.submit();
    }
});
</script>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        © 2024 SkillHub. Your Path to Success.
    </footer>
   
</body>
</html>
