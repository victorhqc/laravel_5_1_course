FROM ubuntu:14.04
RUN apt-get update
RUN apt-get install -y curl \
    git php5 php5-mcrypt php5-json php5-mysql nano mysql-client
RUN /usr/sbin/a2enmod rewrite
RUN curl -sS https://getcomposer.org/installer | /usr/bin/php
RUN mv composer.phar /usr/local/bin/composer
RUN mkdir /var/www/html/laravel ; chmod 775 -R /var/www/html/laravel; chown 1000:1001 -R /var/www/html/laravel
RUN echo "<VirtualHost *:80>\n\tDocumentRoot /var/www/html/laravel/public\n\t<Directory /var/www/>\n\t\tAllowOverride all\n\t</Directory>\n\t<Directory /var/www/laravel/public/>\n\t\tAllowOverride all\n\t</Directory>\n</Virtualhost>" > /etc/apache2/sites-available/000-default.conf
EXPOSE 80
CMD /usr/sbin/apache2ctl -D FOREGROUND
