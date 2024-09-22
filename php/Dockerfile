FROM php:8.1-apache

# Install MySQL PDO extension
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite if needed (optional for pretty URLs)
RUN a2enmod rewrite

# Copy the source code into the container
COPY ./src /var/www/html
