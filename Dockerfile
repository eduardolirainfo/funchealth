FROM wyveo/nginx-php-fpm:latest

# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/

# Set working directory
WORKDIR /var/www
