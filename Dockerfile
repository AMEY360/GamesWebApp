# Use official PHP image with Apache
FROM php:8.2-apache

# Copy all project files into the container
COPY . /var/www/html/

# (Optional) Enable Apache rewrite module if you use pretty URLs
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html/

# Expose port 80 (Render will map it automatically)
EXPOSE 80
