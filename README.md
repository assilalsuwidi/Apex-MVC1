
# Apex-MVC

A custom-built, secure PHP MVC framework designed for performance and scalability. This project is a specialized evolution of the original framework, customized by **Assil Al-Suwidi** to integrate security best practices and modern backend testing.

##  Author
**Assil Al-Suwidi**
assilalswuidi@gmail.com
*Backend Developer*

---
## Development Team
* **Aseel Al-Suwaidi** (Lead Backend Developer) - assilalswuidi@gmail.com
* **Amjad Sadiq** (Contributor)
* **Hossam Mustafa** (Contributor)
* **Aboudi Al-Obaidi** (Contributor)
* **Ahmed Abdullah** (Contributor)


##  Getting Started

### Prerequisites
* **Server:** Apache (XAMPP / Laragon)
* **PHP:** 7.4 or higher
* **Node.js:** For frontend assets
* **Database:** MySQL

###  Installation & Setup

1. **Clone the project:**
   ```bash
   git clone [https://github.com/assilalsuwidi/Apex-MVC.git](https://github.com/assilalsuwidi/Apex-MVC1.git)

 * Setup Database:
   * Create a new database in PhpMyAdmin (e.g., shareposts).
   * Import the shareposts.sql file located in the database folder.
 * Configure the App:
   * Open app/config/config.php and update your database credentials:
   <!-- end list -->
   // Database Configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', ''); // Your DB Password
define('DB_NAME', 'Apex-MVC');

 * Finalize Setup:
   * Run the following command to install dependencies:
     npm install

   * Adjust the .htaccess file in the public folder to match your local installation directory name.

 Security Highlights (OWASP Focused)
This project implements core security principles to protect against common web vulnerabilities:
 * SQL Injection Prevention: All database interactions are handled via PDO with Prepared Statements to ensure user input is never executed as code.
 * XSS Mitigation: Dynamic data is sanitized and escaped before being rendered to views to prevent script injection.
 * Secure Authentication: Password security is managed using the robust BCRYPT hashing algorithm.

Built With
 * Backend: PHP (Object Oriented Programming)
 * Database: MySQL (PDO)
 * Frontend: Bootstrap 4.0, JavaScript
 * Environment: Node.js

License
This project is licensed under the MIT License.

---


---س
