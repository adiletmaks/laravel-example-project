FROM php:7.4-fpm

# Install general packages
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libxpm-dev \
    libvpx-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libcurl4-gnutls-dev \
        pkg-config \
        autoconf \
        libc-dev \
    libxml2-dev \
    librabbitmq-dev \
    libssh-dev \
    unzip \
    default-mysql-client \
    zlib1g-dev \
    libicu-dev \
    wget \
    gnupg \
    software-properties-common \
    openssh-client \
    git-core \
    libzip-dev \
    libonig-dev

# Install other extensions
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install intl
RUN docker-php-ext-install pdo_mysql
RUN docker-php-ext-install mysqli
RUN docker-php-ext-install curl
RUN docker-php-ext-install zip
RUN docker-php-ext-install xml
RUN docker-php-ext-install json
RUN docker-php-ext-install mbstring

# Generate locales
RUN apt-get install locales -y
RUN echo "en_US.UTF-8 UTF-8" >> /etc/locale.gen
RUN locale-gen

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# user
# RUN usermod -u 1000 www-data && groupmod -g 1000 www-data

# Configure non-root user.
ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}

RUN groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

WORKDIR /var/www

CMD ["php-fpm"]

EXPOSE 9000
