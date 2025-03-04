# Usar una imagen base con PHP y Composer
FROM php:8.1-fpm

# Instalar dependencias de sistema necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar extensiones necesarias para Laravel
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip

# Establecer el directorio de trabajo
WORKDIR /var/www

# Copiar los archivos de la app
COPY . .

# Instalar dependencias de PHP
RUN composer install --no-dev --optimize-autoloader

# Exponer el puerto de Laravel
EXPOSE 8000

# Ejecutar el servidor de Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
