<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to UPSI SkillHub</title>
    <style>
        /* General Styling */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: radial-gradient(circle at 50% 50%, #0d1b2a, #1d3557, #0a0e1a); /* Galaxy-style gradient */
            position: relative;
            color: #fff;
        }

        /* Stars Background */
        #stars-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
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
            width: 5px;
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
                transform: translateX(100px) translateY(-200px);
                opacity: 0;
            }
        }

        /* Welcome Container */
        .welcome-container {
            background: linear-gradient(to bottom right, #ffffff, #f8f9fa);
            padding: 50px 40px;
            border-radius: 20px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.4);
            text-align: center;
            z-index: 1;
            width: 400px;
            animation: popUp 0.8s ease-out;
        }

        @keyframes popUp {
            from {
                transform: scale(0.8);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        h1 {
            font-size: 2.5em;
            color: #457b9d;
            margin-bottom: 15px;
            font-family: 'Poppins', sans-serif;
        }

        p {
            font-size: 1.2em;
            color: #333;
            margin-bottom: 30px;
        }

        .btn {
            padding: 12px 30px;
            background: linear-gradient(45deg, #f4a261, #e76f51);
            color: #fff;
            border: none;
            border-radius: 50px;
            text-decoration: none;
            font-size: 1rem;
            font-weight: bold;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .btn:hover {
            background: linear-gradient(45deg, #e76f51, #f4a261);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
    <div id="stars-container"></div>

    <div class="welcome-container">
        <h1>Welcome to UPSI SkillHub</h1>
        <p>Your journey to skills and opportunities starts here.</p>
        <a href="/login" class="btn">Go to Login</a>
    </div>

    <script>
        function createRandomStar() {
            const star = document.createElement("div");
            star.classList.add("dynamic-star");
            const size = Math.random() * 6 + 5; // Random size
            star.style.width = `${size}px`;
            star.style.height = `${size}px`;
            star.style.top = `${Math.random() * 100}%`;
            star.style.left = `${Math.random() * 100}%`;
            star.style.animationDuration = `${Math.random() * 1.5 + 0.5}s`; // Random animation duration
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
