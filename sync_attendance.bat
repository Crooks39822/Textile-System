@echo off
cd /d "C:\My Projects\mtfombeni"

echo Running zkteco:sync...
php artisan zkteco:sync

echo.
echo Now syncing local to CPanel...
php artisan sync:local-to-cpanel

echo.
echo Done.
pause
