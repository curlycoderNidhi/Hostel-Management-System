<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hostel Management System</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Inline style for demonstration; ideally, add to styles.css */
        body {
            background-image: url('scet1.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed; /* Keeps background fixed during scroll */
            color: #fff; /* Ensure text is readable against background */
        }

            header, footer, main {
                background-color: rgb(44, 62, 80, 0.8); /* Semi-transparent background */
                border-radius: 8px;
                padding: 20px;
                margin: 20px;
        }

        /* Adjust text colors for better contrast */
        
         h1,h2, h3, p, li, a {
            color: #2be4e1;
            
        }

        /* Table Styles Adjusted for Dark Background */
        table {
            background-color: rgba(236, 240, 241, 0.9);
            color: #2c3e50;
        }

        table thead {
            background-color: #2980b9;
            color: #fff;
        }

        /* Alert Styles for Dark Background */
        .alert-success {
            background-color: #27ae60;
            color: #fff;
        }

        .alert-error {
            background-color: #c0392b;
            color: #fff;
        }

         /* Additional CSS for security section */
         .security-section {
            background-color: #f1f1f1;
            padding: 30px;
            border-radius: 8px;
            margin: 20px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .security-section h2 {
            color: #2e7d32;
            font-size: 2em;
            text-align: center;
        }
        .security-features {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }
        .security-item {
            background-color: #fff;
            padding: 20px;
            margin: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex-basis: 30%;
            text-align: center;
        }
        .security-item img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .security-item h3 {
            color: #2e7d32;
            font-size: 1.5em;
        }
        .security-item p {
            font-size: 1.1em;
        }
         /* Image Gallery Styling */
         .image-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 15px;
            margin-top: 20px;
        }

        .image-gallery img {
            width: 30%; /* 3 images per row */
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Responsive for smaller screens */
        @media (max-width: 768px) {
            .image-gallery img {
                width: 48%; /* 2 images per row */
            }
        }

        @media (max-width: 480px) {
            .image-gallery img {
                width: 100%; /* 1 image per row */
            }
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #2e7d32;
            color: white;
            margin-top: 30px;
            font-size: 1.2em;
        }
        .contact-link {
            position: fixed; /* Fixed position to keep it in the corner */
            bottom: 50px; /* Distance from the bottom */
            right: 50px; /* Distance from the right */
            z-index: 1000; /* Ensure it's above other content */
        }

        .contact-link img {
            width: 100px; /* Adjust size of the image */
            height: auto;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Hostel Management System</h1>
            
            <nav>
                <h5>
                <ul>
                    <li><a href="register_student.html">Student Registration</a></li>
                    <li><a href="register_admin.html">Admin Registration</a></li>
                    <li><a href="register_warden.html">Warden Registration</a></li>
                    <li><a href="allocate_room.html">Room Allocation</a></li>
                    <li><a href="fee_details.html">Fee Details</a></li>
                    <li><a href="mess.html">Mess Management</a></li> 
                    <li><a href="notice.html"> Notice Board</a></li> 
                    <li><a href="contact_us.html"> Contact For More Details</a></li>
                    
                </ul>
            </nav>
    </h5>
        </div>
    </header>

    
    

    <!-- Optional: Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Welcome to Our Hostel</h2>
            <p>Your comfortable stay is our priority.</p>
            <a href="register_student.html" class="btn-primary">Register Now</a>
        </div>
    </section>

    <main class="container fade-in">
        <section>
            <h2>About Us</h2>
            <h4><p>Manage hostel registrations and room allocations efficiently with our user-friendly system.</p></h4>
        </section>
        <h1>Features</h3>
        <section class="card">
            
            <h3>
            <ul>
                <li>Easy Student Registration</li>
                <li>Admin Management</li>
                <li>Warden Management</li> <!-- New -->
                <li>Seamless Room Allocation</li>
                <li>Manage Fee Details</li> <!-- New -->
                <li>View Registered Data</li>
            </ul>
    </h3>

        <!-- Image Gallery -->
        <div class="image-gallery">
            <img src="hostel1.jpg" alt="Hostel Image 1">
            <img src="hostel2.jpg" alt="Hostel Image 2">
            <img src="hostel3.jpg" alt="Hostel Image 3">
            <img src="hostel4.jpg" alt="Hostel Image 4">
            <img src="hostel5.jpg" alt="Hostel Image 5">
            <img src="hostel6.png" alt="Hostel Image 6">
        </div>
    </div>
             <!-- Security Section -->
        <section class="security-section">
            <h2>Hostel Security Features</h2>
            <div class="security-features">
                <!-- CCTV Cameras -->
                <div class="security-item">
                    <img src="cctv.jpg" alt="CCTV Cameras">
                    <h3>CCTV Surveillance</h3>
                    <p>Our hostel is equipped with 24/7 CCTV cameras that monitor all entry points, common areas, and critical locations to ensure safety and security.</p>
                </div>

                <!-- Security Guards -->
                <div class="security-item">
                    <img src="security_icon.jpg" alt="Security Guards">
                    <h3>Security Personnel</h3>
                    <p>Trained security personnel are stationed at the entrance and around the premises to ensure safety and provide assistance when needed.</p>
                </div>

                <!-- Fire Safety -->
                <div class="security-item">
                    <img src="fire1.jpg" alt="Fire Safety">
                    <h3>Fire Safety Equipment</h3>
                    <p>The hostel is equipped with fire extinguishers and fire alarms installed in key areas, ensuring preparedness for emergency situations.</p>
                </div>
            </div>
        
        </section>
        

        <!-- Optional: Features Section -->
        <section class="features">
            
            
        </section>
    </main>
     
    <footer>
        <p>&copy; 2025 Hostel Management System. All rights reserved.</p>
    </footer>
</body>
</html>
