@echo off
setlocal

set TARGET_DIR=C:\Data\PHP_d104\php-sze-vizsga
set ZIP_NAME=l11.zip
set ZIP_PATH=%TARGET_DIR%\%ZIP_NAME%
set INNER_DIR=%TARGET_DIR%\l11

REM 1. Mappa létrehozása / ürítése
echo [1/7] Mappa előkészítése: %TARGET_DIR%
if exist "%TARGET_DIR%" (
    echo Mappa létezik, tartalom törlése...
    rmdir /S /Q "%TARGET_DIR%"
)
mkdir "%TARGET_DIR%"

REM 2. ZIP letöltése a projekt mappába
echo [2/7] ZIP letöltése: %ZIP_PATH%
powershell -Command "Invoke-WebRequest -Uri 'https://github.com/alitak/sze/raw/2025/l11.zip' -OutFile '%ZIP_PATH%'"

REM 3. ZIP kicsomagolása
echo [3/7] ZIP kicsomagolása...
powershell -Command "Expand-Archive -Path '%ZIP_PATH%' -DestinationPath '%TARGET_DIR%' -Force"

REM 4. Tartalom áthelyezése a l11 mappából a gyökérbe
echo [4/7] Tartalom áthelyezése...
xcopy "%INNER_DIR%\*" "%TARGET_DIR%\" /E /H /Y
rmdir /S /Q "%INNER_DIR%"

REM 5. ZIP fájl törlése
echo [5/7] ZIP fájl törlése...
del "%ZIP_PATH%"

REM 6. Docker konténer indítása
echo [6/7] Docker compose indítása...
cd /D "%TARGET_DIR%\.docker"
docker compose up -d

REM 7. Composer install a konténeren belül
echo [7/7] Composer install a konténeren...
docker exec php-sze composer install

echo ✅ Vizsgakörnyezet készen áll!
pause
