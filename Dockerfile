FROM php:8.1-fpm

# Instalar dependencias necesarias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip mbstring

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establecer el directorio de trabajo
WORKDIR /var/www

# Copiar archivos de la aplicación
COPY . .

# Ejecutar composer install
RUN composer install --no-dev --optimize-autoloader

# Exponer puerto
EXPOSE 8000

# Comando para ejecutar el servidor de Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
FROM php:8.1-fpm

# Instalar dependencias necesarias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    libxml2-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip mbstring

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establecer el directorio de trabajo
WORKDIR /var/www

# Copiar archivos de la aplicación
COPY . .

# Ejecutar composer install
RUN composer install --no-dev --optimize-autoloader

# Exponer puerto
EXPOSE 8000

# Comando para ejecutar el servidor de Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
