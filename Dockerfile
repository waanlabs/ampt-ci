FROM ubuntu:latest
LABEL maintainer=Waan<admin@waan.email>

RUN apt-get update && \
    apt-get install -y tzdata && \
    echo "America/New_York" > /etc/timezone && \
    dpkg-reconfigure -f noninteractive tzdata

RUN apt install -y software-properties-common && \
    LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php && \
    apt-get update

RUN apt-get install -y \
    php8.1 \
    php8.1-xml \
    php8.1-curl \
    php8.1-intl \
    php8.1-mbstring \
    php8.1-zip \
    apache2 \
    curl

RUN a2enmod rewrite
RUN a2enmod php8.1

ADD service /var/www/
ADD runtime/apache-config.conf /etc/apache2/sites-available/000-default.conf

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

RUN chown www-data:www-data -R /var/www/

WORKDIR /var/www
RUN rm -rf html/

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install

ADD runtime/start.sh /
RUN chmod +x /start.sh

EXPOSE 80

CMD ["/start.sh"]