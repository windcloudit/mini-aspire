FROM php:7.4.3-apache

WORKDIR /var/www/html

# Install dependencies
RUN apt-get update -yqq && apt-get install vim -y libpq-dev libonig-dev libpng-dev
RUN apt-get install git -y
RUN a2enmod rewrite
RUN apt-get install -y libbz2-dev zlib1g-dev libzip-dev \
    && docker-php-ext-install bz2
RUN docker-php-ext-install mbstring zip bz2 gd
RUN docker-php-ext-install pdo pdo_pgsql
# RUN pecl install redis && docker-php-ext-enable redis
RUN pecl install xdebug-2.9.0
RUN docker-php-ext-enable xdebug
RUN echo "xdebug.remote_enable=1" >> /usr/local/etc/php/php.ini
RUN echo "date.timezone = 'Asia/Tokyo'" >> /usr/local/etc/php/php.ini
RUN echo "xdebug.remote_host = 'docker.for.mac.localhost'" >> /usr/local/etc/php/php.ini
RUN echo "xdebug.remote_connect_back = 0" >> /usr/local/etc/php/php.ini
RUN echo "xdebug.remote_autostart = 1" >> /usr/local/etc/php/php.ini
RUN echo "xdebug.remote_connect_back = 0" >> /usr/local/etc/php/php.ini
RUN echo "xdebug.remote_handler = 'dbgp'" >> /usr/local/etc/php/php.ini
RUN echo "xdebug.max_nesting_level = 250" >> /usr/local/etc/php/php.ini

RUN chown -R www-data:www-data /var/www/html

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# ADD . /var/www/html

# Run composer
# RUN cd /var/www/html && composer install && php artisan key:generate
#install cron
RUN apt-get install -y \
        cron
# Create the log file
RUN touch /var/log/schedule.log
RUN chmod 0777 /var/log/schedule.log

# Add crontab file in the cron directory
ADD docker/php-apache/cron/scheduler /etc/cron.d/scheduler

# Run the cron
RUN crontab /etc/cron.d/scheduler
