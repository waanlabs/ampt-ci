FROM ubuntu:latest
LABEL author=Waan<admin@waan.email>

RUN apt update \
 && apt install -y sudo

RUN adduser --disabled-password --gecos '' waan
RUN adduser waan sudo
RUN echo '%sudo ALL=(ALL) NOPASSWD:ALL' >> /etc/sudoers

RUN apt install -y tzdata && \
    echo "America/New_York" > /etc/timezone && \
    dpkg-reconfigure -f noninteractive tzdata

USER waan

RUN sudo apt install -y software-properties-common && \
    sudo LC_ALL=C.UTF-8 add-apt-repository -y ppa:ondrej/php && \
    sudo apt update

RUN sudo apt install -y \
    php8.1 \
    php8.1-xml \
    php8.1-curl \
    php8.1-intl \
    php8.1-mbstring \
    php8.1-zip \
    apache2 \
    curl

RUN sudo a2enmod rewrite
RUN sudo a2enmod php8.1

ADD runtime/apache-config.conf /etc/apache2/sites-available/000-default.conf

RUN sudo sh -c "echo 'ServerName localhost' >> /etc/apache2/apache2.conf"

ADD services/webapp /var/www
RUN sudo chown www-data:www-data -R /var/www/

WORKDIR /var/www
RUN sudo rm -rf html/

RUN curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer && \
    sudo composer install

ADD runtime/start.sh /
RUN sudo chmod +x /start.sh

EXPOSE 80

CMD ["sudo","/start.sh"]
