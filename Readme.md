# Széchenyi István Egyetem  GKLB_INTM041_PHP tárgyának 2023 tavaszi féléves tárgyának kódjai

## Szerző
* **Kukel Attila**

## Licensz

A projekt forráskódja MIT Licensz alatt kerül kiadásra. Bővebb információ: [LICENSE.md](LICENSE.md) | [lf;dr Legal](https://tldrlegal.com/license/mit-license)

## Kapcsolat
* Kukel Attila <kukel.attila@sze.hu>

### Konténerbe belépés
```docker exec -it php-sze bash```

### Laravel rendszer telepítése
- ```git clone git@github.com:alitak/sze.git```
- ```cd .docker```
- ```docker-compose up -d```

#### Konténerbe belépés után az alábbi parancsokat kell lefuttatni:
- ```composer install```
- ```cp .env.example .env```
- ```php artisan key:generate```
- ```npm install```
- ```npm run build```

#### Adatbáziskapcsolat beállítása
Az .env fájlban a DB_ blokkot be kell állítani:
DB_CONNECTION=mysql
DB_HOST=mysql-local
DB_PORT=3306
DB_DATABASE=sze
DB_USERNAME=root
DB_PASSWORD=a
