FROM php:8.1-fpm

# Actualizar los repositorios e instalar las dependencias necesarias
RUN apt-get update --fix-missing && apt-get upgrade -y \
    && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libxml2-dev \
    libonig-dev \
    unzip \
    git \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar las extensiones de PHP necesarias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql zip mbstring

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establecer el directorio de trabajo
WORKDIR /var/www

# Copiar los archivos de la aplicación
COPY . .

# Ejecutar composer install
RUN composer install --no-dev --optimize-autoloader

# Exponer el puerto 8000
EXPOSE 8000

# Comando para ejecutar el servidor de Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
