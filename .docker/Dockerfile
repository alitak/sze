FROM php:8.2-apache

RUN apt-get update && \
    apt-get -y install apt-utils gnupg2 && \
    apt-get -y upgrade && \
    apt-get update --fix-missing && \
    apt-get --purge autoremove -y

RUN apt-get install -y \
#    openssl # \
    zip \
    zlib1g-dev \
    libzip-dev
    #libpng-dev \
    #libjpeg-dev \
    #libfreetype6-dev \
    #libonig-dev \
    #supervisor \
    #wget \
    #apt-transport-https \
    #gnupg2 \
    #unzip

RUN a2enmod rewrite proxy proxy_http proxy_wstunnel headers

RUN curl -sSLf \
    -o /usr/local/bin/install-php-extensions \
    https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions && \
    chmod +x /usr/local/bin/install-php-extensions

RUN install-php-extensions \
    gd \
#    sqlsrv pdo_sqlsrv \
    pdo pdo_mysql \
    mbstring \
    zip \
    redis \
    intl

# copy files
WORKDIR /var/www
COPY ./apache.conf /etc/apache2/sites-available/000-default.conf
#COPY ./ /var/www

# install npm
RUN curl -sL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs
#    && \
#    npm install && \
#    npm run prod && \
#    rm -rf node_modules

# install composer packages
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# && \
#    composer install && \
#    rm -rf /root/.composer

# cleanup
RUN rmdir /var/www/html && \
    chown -R www-data: /var/www
#    rm -rf /var/lib/apt/lists/*
