# SCOPEIFY INC website
1. Install XAMPP (PHP 8+, MySQL). Copy this folder to `htdocs/scopeify-inc`.
2. Start Apache and MySQL, open phpMyAdmin, import `database/scopeify.sql` (creates `scopeify_inc`).
3. Edit `includes/config.php` (DB credentials, company name, email, phone, URL).
4. Open http://localhost/scopeify-inc/. Admin: /admin/login.php, user `admin`, password `ChangeMe123!`. Change it: run `php -r 'echo password_hash("NEW",PASSWORD_DEFAULT);'` and update `users.password_hash` in phpMyAdmin.
5. Projects, services, pricing and testimonials are database rows; edit them in phpMyAdmin (admin screens for these are not built yet).
6. cPanel: create a database and user, import the SQL, upload files to `public_html`, update config.php, select PHP 8+. Email uses PHP `mail()`; configure mail/SMTP on your host.
7. Security: change the admin password, keep DEBUG false, use HTTPS.
- `preview.html`: static version of the whole site; open it in any browser (no PHP needed).
