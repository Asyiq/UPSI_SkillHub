# Use the official PHP image with Apache
FROM php:8.1-apache

# Enable Apache mod_rewrite for CodeIgniter
RUN a2enmod rewrite

# Set the working directory in the container
WORKDIR /var/www/html

# Copy the application code to the container
COPY . /var/www/html

# Install required dependencies and PostgreSQL development libraries
RUN apt-get update && apt-get install -y \
    git \
    unzip zip \
    libicu-dev \
    libpq-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl pdo pdo_pgsql pgsql

# Install Composer for dependency management
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Create the writable and cache directories if they don't exist
RUN mkdir -p /var/www/html/writable /var/www/html/cache

# Set correct permissions for writable and cache directories
RUN chown -R www-data:www-data /var/www/html/writable /var/www/html/cache

# Expose port 80 for the web server
EXPOSE 80

# Start the Apache server
CMD ["apache2-foreground"]
