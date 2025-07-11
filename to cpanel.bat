@echo off
cd /d "C:\My Projects\mtfombeni"

echo Now syncing local to CPanel...
php artisan sync:local-to-cpanel

echo.
echo Done.
pause
