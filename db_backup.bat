@echo off
set "PATH=%PATH%;C:\xampp\htdocs\ecommerce-site"
call C:
call cd C:\xampp\htdocs\ecommerce-site
:loop
call php index.php Cron db_backup
Pause

