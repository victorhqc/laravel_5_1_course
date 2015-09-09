FROM ubuntu:14.04
RUN apt-get update
RUN apt-get install -y curl \
    git php5 mysql-server php5-mcrypt php5-json
RUN apt-get install nano
RUN /usr/sbin/a2enmod rewrite
RUN curl -sS https://getcomposer.org/installer | /usr/bin/php
RUN mv composer.phar /usr/local/bin/composer
RUN mkdir /var/www/html/laravel
RUN echo "<VirtualHost *:80>\n\tDocumentRoot /var/www/html\n\t<Directory /var/www/>\n\t\tAllowOverride all\n\t</Directory>\n</Virtualhost>" > /etc/apache2/sites-available/000-default.conf
EXPOSE 80
