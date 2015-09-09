FROM ubuntu:14.04
RUN apt-get update
RUN apt-get install -y curl \
    git php5 mysql-server php5-mcrypt php5-json
RUN apt-get install nano
RUN /usr/sbin/a2enmod rewrite
RUN curl -sS https://getcomposer.org/installer | /usr/bin/php
RUN mv composer.phar /usr/local/bin/composer
RUN mkdir /var/www/html/laravel
EXPOSE 80
