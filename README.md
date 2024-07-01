# AnmeldungConnecting Project

A- Description
AnmeldungConnecting is a simple PHP-based web application for user registration and login.
The project includes user authentication, session management, and a styled homepage.
The design incorporates German national colors.

B- Features

1. **User Registration**: Users can register with a username, email, and password.
2. **User Login**: Registered users can log in with their credentials.
3. **Session Management**: Sessions are used to manage logged-in users.
4. **Homepage**: A welcome page for logged-in users with a navigation menu and German-themed design.
5. **Logout Functionality**: Users can log out, which destroys the session.

C- Files Structure

1. index.php -------------------- Login page
2. connection.php --------------- Database connection setup
3. prozess.php ------------------ Processing script for registration
4. homepage.php ----------------- User's homepage after login
5. logout.php ------------------- Script to handle user logout
6. layout_homepage.css ---------- Compiled CSS file for homepage styling
7. registrierung.php ------------ Registration page
8. README.txt ------------------- Project description and instructions (this file)

D- Usage

1. REGISTRATION:

- Go to `registrierung.php` to create a new account.
- Fill in the required details and submit the form.

2. LOGIN:

- Go to `index.php` to log in with your credentials.

3. HOMEPAGE:

- Upon successful login, you will be redirected to `homepage.php`.
- The page displays a welcome message and a navigation menu, simple navigation menu.

4. LOGOUT:

- Use the "Abmelden" button in the navigation menu to log out and end your session.

E- Important Code Sections

- DATABASE CONNECTION ->> (`connection.php`):

**>>>>>--- PHP CODING ---<<<<<**

<?php
$host = 'localhost';
$db = 'your_database';
$user = 'your_username';
$pass = 'your_password';

try {
   $con = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
   $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
   echo 'Connection failed: ' . $e->getMessage();
}
?>

**-----LOG IN ('your_username', 'your_password' => 'index.php')-----**

<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>

**-----LOGOUT('logout.php')-----**;

<?php
session_start();
session_destroy();
header("Location: index.php");
exit;
?>

License
This project is licensed under the MIT License. See the LICENSE file for more details.

================ >>> This includes: <<< ================
MIT License

Copyright (c) 2024 Daa-GramsGruppe (Adam, Andrej, Eduard, Johannes, Lukas, Setche)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
