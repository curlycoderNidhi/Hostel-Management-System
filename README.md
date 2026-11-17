# 🏨 Hostel Management System

A web-based Hostel Management System developed using **PHP, MySQL, HTML, and CSS** to simplify hostel administration, student record management, and fee-related operations.

## 📌 Project Overview

The Hostel Management System is designed to streamline administrative activities by providing a centralized platform for managing student information, hostel facilities, fee records, and related operations.

The application aims to improve administrative efficiency, maintain organized records, and simplify hostel management workflows.

## ✨ Key Features

- **Student Management:** Manage and maintain student records.
- **Admin Authentication:** Secure administrator login and session management.
- **Hostel Fee Management:** Maintain hostel fee and payment records.
- **Room Allocation:** Manage hostel room allocation operations.
- **Mess Management:** Manage mess-related information and operations.
- **Fee Reports:** Generate branch-wise and semester-wise fee summaries.
- **PDF Generation:** Generate downloadable fee receipts.
- **Form Validation:** Validate user inputs and maintain data consistency.
- **Contact Support:** Provide contact-related functionality.

## 🛠️ Technology Stack

| Category | Technologies |
|---|---|
| Backend | PHP |
| Database | MySQL |
| Frontend | HTML5, CSS3 |
| PDF Generation | FPDF |
| Local Server | XAMPP |
| Code Editor | Visual Studio Code |
| Version Control | Git & GitHub |

## 📂 Project Structure

```text
Hostel-Management-System/
│
├── doc/
├── font/
├── fpdf182/
├── makefont/
├── tutorial/
├── uploads/
│
├── admin_login.php
├── allocate_room.php
├── config.php
├── contact_us.php
├── fees.php
├── generate_pdf.php
├── index.php
├── mess_details.php
├── register_student.php
├── register_warden.php
├── view_residents.php
├── styles.css
│
├── students.json
├── rooms.json
├── fees.json
├── wardens.json
│
└── README.md
```

## ⚙️ Installation & Setup

### Prerequisites

- XAMPP
- PHP
- MySQL
- Web browser

### Step 1: Clone the Repository

```bash
git clone https://github.com/curlycoderNidhi/Hostel-Management-System.git
```

### Step 2: Move the Project

Copy the project folder into the XAMPP `htdocs` directory.

```text
C:\xampp\htdocs\Hostel-Management-System
```

### Step 3: Start XAMPP

Start the following services:

- Apache
- MySQL

### Step 4: Configure the Database

1. Open phpMyAdmin.
2. Create the database required by the application.
3. Configure the database connection in `config.php`.
4. Import the database SQL file if available.

### Step 5: Run the Application

Open your browser:

```text
http://localhost/Hostel-Management-System/
```

## 🔐 Security Considerations

- Validate user input on the server side.
- Protect database credentials and configuration files.
- Use secure authentication and session handling.
- Avoid publishing real student information or private records.

## 🎯 Learning Outcomes

- Practical PHP backend development.
- Database connectivity and data management.
- Form validation and session management.
- Dynamic web application development.
- PDF document generation.
- Understanding of Git and GitHub workflows.

## 👩‍💻 Author

**Nidhi Sakariya**

B.Tech – Information Technology

GitHub: [@curlycoderNidhi](https://github.com/curlycoderNidhi)

---

⭐ If you find this project useful, consider giving the repository a star.

**Building practical, secure, and efficient software solutions.**
