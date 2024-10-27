<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
        body {
            margin: 0;
            font-family: 'Courier New', Courier, monospace;
            background-color: #f0f0f0;
            display: flex;
            height: 100vh;
            overflow: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            width: 250px;
            background-color: #007bff;
            color: white;
            padding: 20px;
            display: flex;
            flex-direction: column;
            height: 100%;
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            transition: transform 0.3s ease;
            transform: translateX(0);
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
        }

        .sidebar.hidden {
            transform: translateX(-230px); /* Sidebar tersembunyi, tetapi tetap terlihat sedikit */
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            margin: 5px 0;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #0056b3;
        }

        /* Toggle Button Styles */
        .toggle-sidebar {
            background-color: transparent;
            color: white;
            border: none;
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            padding: 8px;
            z-index: 1000;
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f0f0f0;
            transition: margin-left 0.3s ease;
            margin-left: 250px;
            width: 100%;
            height: 100%;
        }

        .main-content.shifted {
            margin-left: 20px;
        }

        /* Typewriter Effect */
        .typewriter {
            font-size: 24px;
            white-space: nowrap;
            overflow: hidden;
            border-right: 2px solid black;
            width: 0;
            animation: typing 3s steps(22) 1s forwards, blink-caret 0.75s step-end infinite;
        }

        @keyframes typing {
            from { width: 0; }
            to { width: 22ch; }
        }

        @keyframes blink-caret {
            from { border-right-color: black; }
            to { border-right-color: transparent; }
        }
    </style>
</head>
<body>
    <div class="sidebar" id="sidebar">
        <button class="toggle-sidebar" id="toggleSidebar">☰</button>
        <h2>Admin Panel</h2>
        <a href="#">Dashboard</a>
        <a href="#">Manage Users</a>
        <a href="#">Manage Donations</a>
        <a href="#">Reports</a>
        <a href="#">Settings</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="main-content" id="mainContent">
        <p class="typewriter">Welcome Back My Master</p>
    </div>

    <script>
        const toggleButton = document.getElementById('toggleSidebar');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('mainContent');

        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('hidden');
            mainContent.classList.toggle('shifted');
        });
    </script>
</body>
</html>
