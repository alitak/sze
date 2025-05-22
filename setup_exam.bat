@echo off
setlocal

REM Állítsd be a cél mappa nevét
set TARGET_DIR=C:\Data\PHP_d104\php-sze-vizsga

REM 1. Mappa létrehozása / ürítése
echo [1/5] Mappa előkészítése: %TARGET_DIR%
if exist "%TARGET_DIR%" (
    echo Mappa létezik, tartalom törlése...
    rmdir /S /Q "%TARGET_DIR%"
)
mkdir "%TARGET_DIR%"

REM 2. ZIP letöltése
echo [2/5] ZIP letöltése...
powershell -Command "Invoke-WebRequest -Uri 'https://github.com/alitak/sze/raw/2025/l11.zip' -OutFile '%TEMP%\l11.zip'"

REM 3. ZIP kicsomagolása
echo [3/5] ZIP kicsomagolása...
powershell -Command "Expand-Archive -Path '%TEMP%\l11.zip' -DestinationPath '%TARGET_DIR%' -Force"

REM 4. Docker konténer indítása
echo [4/5] Docker compose indítása...
cd /D "%TARGET_DIR%\.docker"
docker compose up -d

REM 5. Composer install a konténeren belül
echo [5/5] Composer install a konténeren...
docker exec php-sze composer install

echo ✅ Kész vagyunk!
pause
