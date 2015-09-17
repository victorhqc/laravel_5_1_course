# Installation and configuration
1. Install Docker
2. Clone the Course Git repository
    ```
    git clone https://github.com/victorhqc/laravel_5_1_course.git
    ```
3. Start docker containers

    ```
$ docker run --name laravel-mysql -v /home/victor/Hacking/iTexico/training/db:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=password -d mysql:5.6
$ docker run -it -p 5000:80 --name laravel-course --link laravel-mysql:mysql -d -v /your/path/to/laravel_5_1_course/laravel:/var/www/html/laravel victorhqc/laravel-5-1-course:1.0 bash
    ```

4. Enter to the image and test MySQL (for password use "_password_")

    ```
$ docker attach laravel-course
$ mysql -h $MYSQL_PORT_3306_TCP_ADDR -u root -p
    ```
5. Once inside, create a DB called **course**.

    ```
CREATE SCHEMA IF NOT EXISTS `course`;
    ```
6. Config the database environment, the docker container has a env file so you can get the actual MySQL parameters.

    ```
$ env
echo $MYSQL_PORT_3306_TCP_ADDR
echo $MYSQL_ENV_MYSQL_ROOT_PASSWORD
    ```

7. Now, generate a Laravel cypher key:

    ```
$ php artisan key:generate
    ```
8. Start apache service

    ```
$ apachectl start
    ```
9. Give privileges to storage folder, inside `var/www/html/laravel` do:

    ```
    $ chmod -R 777 storage
    ```

Until this point Laravel should be ready to work, but if you are using something that is not Linux, then don't forget to make your tests using your virtual machine IP and **not localhost**.
