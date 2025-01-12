<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillHub - Student Login</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
            background: radial-gradient(circle at 50% 50%, #0d1b2a, #1d3557, #0a0e1a);
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
            animation: fadeInOut 2s infinite ease-in-out; /* Faster twinkling */
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

        /* Login Container */
        .login-container {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 380px;
            z-index: 1; /* Place above stars */
        }

        h1 {
            font-family: 'Pacifico', cursive;
            color: #457b9d;
            font-size: 2.5rem;
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
            padding: 12px 12px 12px 45px;
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
            color: white;
            border: none;
            border-radius: 25px;
            padding: 12px;
            width: 100%;
            cursor: pointer;
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
        }

        .error-message {
            color: red;
            margin-bottom: 15px;
            background: #ffe6e6;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid red;
        }
    </style>
</head>
<body>
    <div id="stars-container"></div>

    <div class="login-container">
        <h1>SkillHub</h1>
        <h2>Your Path to Success</h2>

        <!-- Display Error Message -->
        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-message"><?= session()->getFlashdata('error'); ?></div>
        <?php endif; ?>

        <!-- Login Form -->
        <form action="/login" method="post">
            <div class="input-group">
                <i class="fas fa-id-card"></i>
                <input type="text" name="student_id" placeholder="Student ID (e.g., D20211090000)" required>
            </div>

            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder="Password" required>
            </div>

            <button type="submit">Login</button>
        </form>

        <p class="footer">Don't have an account? <a href="/register">Register here</a></p>
    </div>

    <script>
        function createRandomStar() {
            const star = document.createElement("div");
            star.classList.add("dynamic-star");
            const size = Math.random() * 2 + 4; // Larger stars (6px to 10px)
            star.style.width = `${size}px`;
            star.style.height = `${size}px`;
            star.style.top = `${Math.random() * 100}%`;
            star.style.left = `${Math.random() * 100}%`;
            star.style.animationDuration = `${Math.random() * 1.5 + 0.5}s`; // Faster twinkle duration
            document.getElementById("stars-container").appendChild(star);
            setTimeout(() => star.remove(), 2000); // Match the animation duration
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
            setInterval(createRandomStar, 200); // Create stars more frequently
            setInterval(createShootingStar, 2000); // Shooting stars every 2 seconds
        }

        generateStars();
    </script>
</body>
</html>
