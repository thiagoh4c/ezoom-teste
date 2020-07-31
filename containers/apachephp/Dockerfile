FROM romeoz/docker-apache-php:7.3

RUN apt-get update
RUN apt-get upgrade -y	

RUN a2enmod rewrite
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80

ADD ./rewrite.conf /etc/apache2/conf-enabled/rewrite.conf

RUN service apache2 start

ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

