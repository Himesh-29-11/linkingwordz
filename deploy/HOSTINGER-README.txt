LinkingWordz — Hostinger deploy pack
====================================

Files
-----
1) linkingwordz-hostinger.zip  — Laravel project (includes vendor/)
2) linkingwordz.sql            — MySQL database (schema + seed data)

Upload / install
----------------
1. In Hostinger, create a MySQL database + user.
2. phpMyAdmin → Import → linkingwordz.sql
3. Upload + extract the zip above public_html (or into your domain folder).
4. Point the domain document root to the /public folder.
5. Copy .env.example to .env and set:

   APP_URL=https://YOUR-DOMAIN
   APP_ENV=production
   APP_DEBUG=false

   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_db_name
   DB_USERNAME=your_db_user
   DB_PASSWORD=your_db_password

6. Generate app key (SSH):
   php artisan key:generate

   Or paste a key from your local .env APP_KEY if SSH is unavailable.

7. Storage permissions (SSH):
   php artisan storage:link
   chmod -R 775 storage bootstrap/cache

Admin login (from seeder)
-------------------------
URL:   https://YOUR-DOMAIN/admin/login
Email: admin@gmail.com
Pass:  Admin@123
Change this immediately after go-live.

Notes
-----
- Do NOT upload your local .env
- PHP 8.2+ required (8.4 recommended)
- If styles break, confirm document root is /public
