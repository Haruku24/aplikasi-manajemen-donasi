<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            margin-top: 20px;
        }
        .container-custom {
            max-width: 800px;
            margin: 0 auto;
        }
        .navbar, .categories, .content {
            background-color: #ffffff;
            border-radius: 10px;
            margin-bottom: 10px;
            border: 1px solid #e0e0e0;
            transition: box-shadow 0.3s;
        }
        .navbar:hover, .categories:hover, .content:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar {
            padding: 10px;
            position: relative;
        }
        .navbar .logo {
            width: 100px;
            height: 50px;
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            border: 1px solid #ccc;
            transition: box-shadow 0.3s;
        }
        .navbar .logo:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .navbar .search-bar {
            flex-grow: 1;
            margin: 0 10px;
            position: relative;
        }
        .navbar .search-bar input {
            width: 100%;
            padding: 10px 40px 10px 20px;
            border-radius: 25px;
            border: 1px solid #ccc;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .navbar .search-bar input:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }
        .navbar .search-bar .search-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #ccc;
        }
        .navbar .menu-icon {
            width: 50px;
            height: 50px;
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            border: 1px solid #ccc;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
        }
        .navbar .menu-icon:hover {
            background-color: #f0f0f0;
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .dropdown-menu-custom {
            display: none;
            position: absolute;
            top: 60px;
            right: 10px;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            transition: opacity 0.3s, transform 0.3s;
            opacity: 0;
            transform: translateY(-10px);
        }
        .dropdown-menu-custom.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }
        .dropdown-menu-custom a {
            display: block;
            padding: 10px 20px;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .dropdown-menu-custom a:hover {
            background-color: #f0f0f0;
        }
        .categories {
            padding: 10px;
            display: flex;
            justify-content: flex-start;
            gap: 10px;   
            white-space: nowrap;
            overflow-x: auto;
        }
        .categories .category {
            background-color: #ffffff;
            padding: 10px 20px;
            border-radius: 20px;
            border: 1px solid #8bc34a; /* Matcha green border */
            color: #8bc34a; /* Matcha green text */
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s, color 0.3s;
            display: inline-block;
        }
        .categories .category:hover {
            background-color: #f0f0f0;
            transform: scale(1.1);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .categories .category.active {
            background-color: #8bc34a; /* Matcha green background */
            color: #ffffff; /* White text */
        }
        .content {
            padding: 20px;
        }
        .content .content-item {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 10px;
            border: 1px solid #e0e0e0;
            transition: box-shadow 0.3s;
        }
        .content .content-item:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .content .content-item:last-child {
            height: 300px; /* Adjust the height as needed */
        }
        /* hero section */
        .custom-rounded-box {
            border-radius: 10px;
            background-color: #d3d3d3;
            padding: 0;
            text-align: center;
            margin-bottom: 20px;
            height: 300px;
            overflow: hidden;
            position: relative;
        }
         /* Styling for the back icon */
         .custom-back-icon {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            padding: 10px;
            cursor: pointer;
        }
        @media (max-width: 768px) {
            .navbar .logo, .navbar .menu-icon {
                width: 50px;
                height: 50px;
            }
            .navbar .search-bar {
                margin: 0;
            }
            .categories {
                overflow-x: auto;
            }
            /* hero section */
        .custom-rounded-box {
            border-radius: 10px;
            background-color: #d3d3d3;
            padding: 0;
            text-align: center;
            margin-bottom: 20px;
            height: 200px;
            overflow: hidden;
            position: relative;
        }
         /* Styling for the back icon */
         .custom-back-icon {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 50%;
            padding: 10px;
            cursor: pointer;
        }
        }
    </style>
</head>
<body>
    <div class="container container-custom">
        <!-- Navbar -->
        <div class="navbar d-flex align-items-center">
            <div class="logo">logo</div>
            <div class="search-bar">
                <input type="text" placeholder="Search" id="search-input">
                <i class="fas fa-search search-icon"></i>
            </div>
            <div class="menu-icon" id="menu-icon">
                <i class="fas fa-bars"></i>
            </div>
            <div class="dropdown-menu-custom" id="dropdown-menu">
                <a href="./../../../aplikasi-manajemen-donasi/view/layouts/pilihan_lainnya/pilihan_lainnya.php">Campaign Pilihan</a>
                <a href="#">Shop & Donate</a>
                <a href="#">Donasi Rutin</a>
                <a href="#">Tentang Kami</a>
                <a href="#">FAQ</a>
                <a href="#">Kebijakan Privasi</a>
            </div>
        </div>
        <!-- hero section -->
        <div class="custom-rounded-box">
        <a class="custom-back-icon" href="../../../index.php">
            <i class="fas fa-arrow-left"></i>
        </a>
            <img alt="Placeholder image" class="img-fluid h-100 w-100" height="300" src="https://img.freepik.com/free-photo/painting-mountain-lake-with-mountain-background_188544-9126.jpg" width="600"/>
        </div>
        <!-- Categories -->
        <div class="categories d-flex">
            <div class="category" onclick="categoryClick(this, 'semua')">semua</div>
            <div class="category" onclick="categoryClick(this, 'campaign')">campaign</div>
            <div class="category" onclick="categoryClick(this, 'kesehatan')">kesehatan</div>
            <div class="category" onclick="categoryClick(this, 'shop & donate')">shop & donate</div>
        </div>
        <!-- Content -->
        <div class="content">
            <div class="content-item"></div>
            <div class="content-item"></div>
            <div class="content-item"></div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script>
        document.getElementById('search-input').addEventListener('focus', function() {
            this.style.borderColor = '#007bff';
            this.style.boxShadow = '0 0 5px rgba(0, 123, 255, 0.5)';
        });

        document.getElementById('search-input').addEventListener('blur', function() {
            this.style.borderColor = '#ccc';
            this.style.boxShadow = 'none';
        });

        document.getElementById('menu-icon').addEventListener('click', function() {
            var dropdownMenu = document.getElementById('dropdown-menu');
            if (dropdownMenu.classList.contains('show')) {
                dropdownMenu.classList.remove('show');
            } else {
                dropdownMenu.classList.add('show');
            }
        });

        function categoryClick(element, category) {
            // Remove active class from all categories
            var categories = document.querySelectorAll('.category');
            categories.forEach(function(cat) {
                cat.classList.remove('active');
                cat.style.backgroundColor = '#ffffff';
                cat.style.color = '#8bc34a';
            });

            // Add active class to the clicked category
            element.classList.add('active');
            element.style.backgroundColor = '#8bc34a';
            element.style.color = '#ffffff';

            alert(category + ' clicked!');
        }
    </script>
</body>
</html>