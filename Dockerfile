FROM php:8.2-fpm

# Copiar composer.lock e composer.json
COPY composer.lock composer.json /var/www/

# Definir o diretório de trabalho
WORKDIR /var/www

# Instalar dependências
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libonig-dev \
    libzip-dev \
    zlib1g-dev

# Limpar o cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensões do PHP
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl

# Instalar extensão Redis
RUN pecl install redis && docker-php-ext-enable redis

# Instalar dependências do GD
RUN apt-get update && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev

# Configurar e instalar extensão GD
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd

# Instalar o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Adicionar usuário para a aplicação Laravel
RUN groupadd -g 1000 www && \
    useradd -u 1000 -ms /bin/bash -g www www

# Copiar os arquivos existentes do diretório da aplicação
COPY . /var/www

# Copiar as permissões do diretório existente da aplicação
COPY --chown=www:www . /var/www

# Mudar para o usuário www
USER www

# Expor a porta 9000 e iniciar o servidor php-fpm
EXPOSE 9000
CMD ["php-fpm"]
