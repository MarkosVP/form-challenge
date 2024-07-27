# Get the php 8.2 image
FROM php:8.2-cli

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- \
--install-dir=/usr/bin --filename=composer

# Copy the content from the current dir into the working dir
COPY . /var/www/html

# Define the workdir
WORKDIR /var/www/html

# Run the php built-in server
CMD ["php", "-S", "0.0.0.0:80", "-t", "/var/www/html", "/var/www/html/src/index.php"]