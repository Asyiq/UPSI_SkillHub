<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillHub - Register</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
    <style>
        /* General Styling */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: radial-gradient(circle at 50% 50%, #0d1b2a, #1d3557, #0a0e1a); /* Darker galaxy-style gradient */
            position: relative;
        }

        /* Stars Background */
        #stars-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0; /* Ensure stars are behind */
        }

        .dynamic-star {
            position: absolute;
            background-color: white;
            border-radius: 50%;
            opacity: 0;
            animation: fadeInOut 2s infinite ease-in-out;
        }

        @keyframes fadeInOut {
            0%, 100% {
                opacity: 0;
            }
            50% {
                opacity: 0.8;
            }
        }

        .shooting-star {
            position: absolute;
            width: 5px; /* Larger shooting stars */
            height: 5px;
            background: white;
            box-shadow: 0px 0px 15px 5px white;
            border-radius: 50%;
            animation: shoot 2s ease-in-out;
            opacity: 0;
        }

        @keyframes shoot {
            0% {
                transform: translateX(0) translateY(0);
                opacity: 1;
            }
            70% {
                opacity: 0.5;
            }
            100% {
                transform: translateX(100px) translateY(-200px); /* Diagonal movement */
                opacity: 0;
            }
        }

        /* Register Container */
        .register-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 380px;
            z-index: 1; /* Place above stars */
        }

        h1 {
            font-size: 2.5rem;
            font-family: 'Pacifico', cursive;
            color: #457b9d;
            margin-bottom: 5px;
        }

        h2 {
            font-size: 1rem;
            color: #555;
            margin-bottom: 20px;
        }

        .input-group {
            position: relative;
            margin-bottom: 20px;
        }

        .input-group input {
            width: 100%;
            padding: 12px 40px;
            box-sizing: border-box;
            border-radius: 25px;
            border: 1px solid #ccc;
            font-size: 1rem;
        }

        .input-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #457b9d;
            font-size: 1.2rem;
        }

        button {
            background: #457b9d;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            width: 100%;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        button:hover {
            background: #345d6f;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .footer {
            margin-top: 20px;
            font-size: 0.9rem;
            color: #777;
        }

        a {
            color: #457b9d;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .alert {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            font-size: 0.9rem;
        }

        .alert-error {
            background-color: #f8d7da;
            color: #721c24;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>
    <div id="stars-container"></div>

    <!-- Register Container -->
    <div class="register-container">
        <h1>SkillHub</h1>
        <h2>Create Your Account</h2>

        <!-- Display Flash Messages -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-error"><?= session()->getFlashdata('error'); ?></div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
        <?php endif; ?>

        <form action="/register" method="post">
            <div class="input-group">
                <i class="fas fa-id-card"></i>
                <input type="text" name="student_id" placeholder="Student ID (e.g., D20211097850)" 
                       pattern="^D\d{11}$" title="Student ID must start with 'D' followed by 11 digits."
                       maxlength="12" required>
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <div class="input-group">
                <i class="fas fa-check-circle"></i>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            </div>

            <button type="submit">Register</button>
        </form>

        <div class="footer">
            <p>Already have an account? <a href="/login">Login here</a></p>
        </div>
    </div>

    <script>
        function createRandomStar() {
            const star = document.createElement("div");
            star.classList.add("dynamic-star");
            const size = Math.random() * 4 + 6;
            star.style.width = `${size}px`;
            star.style.height = `${size}px`;
            star.style.top = `${Math.random() * 100}%`;
            star.style.left = `${Math.random() * 100}%`;
            star.style.animationDuration = `${Math.random() * 1.5 + 0.5}s`;
            document.getElementById("stars-container").appendChild(star);
            setTimeout(() => star.remove(), 2000);
        }

        function createShootingStar() {
            const star = document.createElement("div");
            star.classList.add("shooting-star");
            star.style.top = `${Math.random() * 100}%`;
            star.style.left = `${Math.random() * 100}%`;
            document.getElementById("stars-container").appendChild(star);
            setTimeout(() => star.remove(), 2000);
        }

        function generateStars() {
            setInterval(createRandomStar, 200);
            setInterval(createShootingStar, 2000);
        }

        generateStars();
    </script>
</body>
</html>
