# CareerBridge – Student Placement Portal

Modern responsive Student Placement Portal for a T.Y.B.Sc. Computer Science academic project.

## Stack
PHP 8+, MySQL, HTML5, CSS3, JavaScript, Font Awesome, XAMPP.

## Main modules
- Student: registration, profile, resume, job search/filter, eligibility, applications, status, notifications, feedback, help.
- Company: registration, admin approval, profile, job posting, job approval, applicants, shortlist/reject/select, notifications.
- Admin: dashboard, student/company/job management, application monitoring, print-ready reports.

## XAMPP installation
1. Start Apache and MySQL.
2. Extract this folder to `C:/xampp/htdocs/student-placement-portal/`.
3. Open phpMyAdmin at `http://localhost/phpmyadmin/`.
4. Import `database/student_placement_portal.sql`.
5. Check `config/database.php` (XAMPP default root password is blank).
6. Open `http://localhost/student-placement-portal/`.
7. Open `http://localhost/student-placement-portal/setup_admin.php` once. Default admin: `admin@careerbridge.local` / `Admin@123`.
8. Delete `setup_admin.php` after creating the admin.

## Testing flow
Admin → approve company → company posts job → admin approves job → student registers and uploads resume → student applies → company updates status → student checks My Applications/Notifications.

## Security
Password hashing, password_verify, PDO prepared statements, CSRF tokens, role-based sessions, upload validation and unique application constraint are included.

## Notes
Email/SMS delivery is not included; portal notifications are database-based. Interview and placement tables are included for future workflow expansion.
