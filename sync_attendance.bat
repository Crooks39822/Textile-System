@echo off
cd /d "C:\My Projects\mtfombeni"

echo Running zkteco:sync...
php artisan zkteco:sync

echo.
echo Done.
pause
