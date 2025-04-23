# Repository 2: RFID Attendance Web Dashboard

## 📄 Overview
This is a web-based dashboard for managing RFID-based attendance data. Built with PHP and MySQL (XAMPP stack), this dashboard allows you to add, edit, view, and delete employee data and track RFID card usage.

---

## ⚙️ Setup Instructions

1. **Requirements**
   - XAMPP installed and running
   - PHP 7.x or higher
   - MySQL

2. **Installation Steps**
   - Copy all files to your XAMPP `htdocs` folder (e.g., `C:\xampp\htdocs\absenrfid`).
   - Start Apache and MySQL services in XAMPP.
   - Access `http://localhost/phpmyadmin` and import the SQL file (from Arduino repo).
   - Make sure the database connection in `koneksi.php` matches your MySQL credentials.
   - Open the web dashboard at `http://localhost/absenrfid`.

---

## ✨ Features

- **Employee Management**
  - Add, edit, and delete employee records via `datakaryawan.php`, `edit.php`, `hapus.php`

- **RFID Card Management**
  - Assign or remove RFID cards from the system using `nokartu.php` and `kirimkartu.php`

- **Attendance Monitoring**
  - Automatically records attendance on card scan via `scan.php` and `absensi.php`

- **User Interface**
  - Responsive layout using HTML, CSS, and optional jQuery
  - Modular structure with `header.php`, `footer.php`, `menu.php`

---

