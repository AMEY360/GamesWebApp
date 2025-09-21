# Use official PHP image with Apache
FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy project files
COPY . /var/www/html/

# Enable Apache rewrite if needed
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html/

# Expose port 3306
EXPOSE 3306
