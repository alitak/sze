@echo off
setlocal

REM Állítsd be a cél mappa nevét
set TARGET_DIR=C:\Data\PHP_d104\php-sze-vizsga
set ZIP_NAME=l11.zip
set ZIP_PATH=%TARGET_DIR%\%ZIP_NAME%

REM 1. Mappa létrehozása / ürítése
echo [1/6] Mappa előkészítése: %TARGET_DIR%
if exist "%TARGET_DIR%" (
    echo Mappa létezik, tartalom törlése...
    rmdir /S /Q "%TARGET_DIR%"
)
mkdir "%TARGET_DIR%"

REM 2. ZIP letöltése a projekt mappába
echo [2/6] ZIP letöltése: %ZIP_PATH%
powershell -Command "Invoke-WebRequest -Uri 'https://github.com/alitak/sze/raw/2025/l11.zip' -OutFile '%ZIP_PATH%'"

REM 3. ZIP kicsomagolása
echo [3/6] ZIP kicsomagolása...
powershell -Command "Expand-Archive -Path '%ZIP_PATH%' -DestinationPath '%TARGET_DIR%' -Force"

REM 4. ZIP fájl törlése
echo [4/6] ZIP fájl törlése...
del "%ZIP_PATH%"

REM 5. Docker konténer indítása
echo [5/6] Docker compose indítása...
cd /D "%TARGET_DIR%\.docker"
docker compose up -d

REM 6. Composer install a konténeren belül
echo [6/6] Composer install a konténeren...
docker exec php-sze composer install

echo ✅ Kész vagyunk!
pause
