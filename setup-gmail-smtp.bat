@echo off
echo ========================================
echo Gmail SMTP Setup untuk OTP System
echo ========================================
echo.
echo Langkah-langkah setup:
echo.
echo 1. Buka https://myaccount.google.com/security
echo 2. Aktifkan 2-Step Verification jika belum
echo 3. Klik "App passwords" 
echo 4. Generate password untuk "Mail"
echo 5. Copy password yang dihasilkan
echo.
echo ========================================
echo Setelah dapat App Password, edit file .env:
echo ========================================
echo.
echo MAIL_MAILER=smtp
echo MAIL_HOST=smtp.gmail.com
echo MAIL_PORT=587
echo MAIL_USERNAME=methajwi@gmail.com
echo MAIL_PASSWORD=your-16-digit-app-password
echo MAIL_ENCRYPTION=tls
echo MAIL_FROM_ADDRESS=methajwi@gmail.com
echo MAIL_FROM_NAME="SMK Negeri 4 Bogor"
echo.
echo ========================================
echo Kemudian jalankan: php artisan config:clear
echo ========================================
pause
