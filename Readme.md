# Széchenyi István Egyetem  GKLB_INTM041_PHP tárgyának 2024 tavaszi féléves tárgyának kódjai

## Szerző

* **Kukel Attila**

## Licensz

A projekt forráskódja MIT Licensz alatt kerül kiadásra. Bővebb információ: [LICENSE.md](LICENSE.md) | [lf;dr Legal](https://tldrlegal.com/license/mit-license)

## Kapcsolat

* Kukel Attila <kukel.attila@sze.hu>

### Laravel rendszer telepítése

```bash
git clone git@github.com:alitak/sze.git
git checkout 2024
cd .docker
docker-compose up -d
```

### Konténerbe belépés

```bash
docker exec -it php-sze bash
```

#### Konténerbe belépés után az alábbi parancsokat kell lefuttatni:
```bash
composer install
cp .env.example .env
php artisan key:generate
npm install
npm run build
```

#### Adatbáziskapcsolat beállítása

Az .env fájlban a DB_ blokkot be kell állítani:
```dotenv
DB_CONNECTION=mysql
DB_HOST=mysql-sze
DB_PORT=3306
DB_DATABASE=php
DB_USERNAME=root
DB_PASSWORD=a
```


#### Könyv CSV importáláshoz
[Books.csv](https://github.com/zygmuntz/goodbooks-10k/blob/master/samples/books.csv)
