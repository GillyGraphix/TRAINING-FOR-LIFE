# Tunatumia PHP 8.2 na Apache server
FROM php:8.2-apache

# Tuna-install vitu muhimu vya server, pamoja na curl kwa ajili ya Node.js
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs \
    && docker-php-ext-install zip pdo_mysql

# Tunaruhusu Apache kusoma routes za Laravel
RUN a2enmod rewrite

# Tuna-install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tunaseta sehemu ambayo project yetu itakaa
WORKDIR /var/www/html

# Tuna-copy code zote kwenda kwenye server
COPY . .

# Tuna-install packages za PHP (Laravel)
RUN composer install --no-dev --optimize-autoloader

# Tuna-install packages za Node na ku-build Vite (CSS/JS)
RUN npm install
RUN npm run build

# Tunatoa ruhusa (permissions) kwenye folders za storage na cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Tunaiambia Apache isome folder la public
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

EXPOSE 80