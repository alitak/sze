@echo off
setlocal

set TARGET_DIR=C:\Data\PHP_d104\php-sze-vizsga
set ZIP_NAME=l11.zip
set ZIP_PATH=%TARGET_DIR%\%ZIP_NAME%
set INNER_DIR=%TARGET_DIR%\l11

REM 1. Docker Desktop indítása (ha nem fut)
echo [1/7] Docker Desktop indítása...
tasklist /FI "IMAGENAME eq Docker Desktop.exe" | find /I "Docker Desktop.exe" >nul
if errorlevel 1 (
    start "" "C:\Program Files\Docker\Docker\Docker Desktop.exe"
    echo Várunk 60 másodpercet a Docker elindulására...
    timeout /T 60 >nul
)

REM 2. Fájlok előkészítése
echo [2/7] Projektmappa előkészítése...
if exist "%TARGET_DIR%" (
    echo Mappa létezik, törlés...
    rmdir /S /Q "%TARGET_DIR%"
)
mkdir "%TARGET_DIR%"

echo ZIP letöltése...
powershell -Command "Invoke-WebRequest -Uri 'https://github.com/alitak/sze/raw/2025/l11.zip' -OutFile '%ZIP_PATH%'"

echo ZIP kicsomagolása...
powershell -Command "Expand-Archive -Path '%ZIP_PATH%' -DestinationPath '%TARGET_DIR%' -Force"

echo Tartalom áthelyezése...
xcopy "%INNER_DIR%\*" "%TARGET_DIR%\" /E /H /Y
rmdir /S /Q "%INNER_DIR%"

echo ZIP törlése...
del "%ZIP_PATH%"

REM 3. Docker Compose indítása
echo [3/7] Docker konténerek indítása...
cd /D "%TARGET_DIR%\.docker"
docker compose up -d

REM 4. Composer install a konténerben
echo [4/7] Composer install futtatása...
docker exec php-sze composer install

REM 5. Chrome megnyitása 2 füllel
echo [5/7] Chrome böngésző indítása...
start "" "C:\Program Files (x86)\Google\Chrome\Application\chrome.exe" "http://localhost:29083" "http://localhost:29082"

REM 6. PhpStorm indítása
echo [6/7] PhpStorm indítása...
start "" "C:\Program Files\JetBrains\PhpStorm 2022.3.2\bin\phpstorm64.exe" "%TARGET_DIR%"

echo [7/7] ✅ Vizsgakörnyezet teljesen kész!
pause
