<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Courier New', Courier, monospace;
            background-color: #f0f0f0;
        }

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
        <!-- Sidebar -->
        <?php include 'sidebar.php'; ?>
        
    <p class="typewriter">Welcome Back My Master</p>
</body>
</html>