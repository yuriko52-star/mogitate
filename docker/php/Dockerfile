FROM php:8.2-fpm  
# ← Laravel 11はPHP 8.2以上が必須！
# ===== uid / gid を受け取る =====
ARG USER_ID
ARG GROUP_ID
# PHP設定ファイルをコピー
COPY php.ini /usr/local/etc/php/

# システムパッケージとPHP拡張をインストール
RUN apt update \
  && apt install -y \
     default-mysql-client \
     zlib1g-dev \
     libzip-dev \
     unzip \
     curl \
     git \
     libonig-dev \
     libpng-dev \
     libxml2-dev \
  && docker-php-ext-install \
     pdo_mysql \
     zip \
     mbstring \
     exif \
     pcntl \
     xml

# Composerのインストール
RUN curl -sS https://getcomposer.org/installer | php \
  && mv composer.phar /usr/local/bin/composer \
  && composer self-update
# ===== ユーザー作成（ここが重要）=====
RUN groupadd -g ${GROUP_ID} laravel \
 && useradd -u ${USER_ID} -g laravel -m laravel
# ===== php-fpm 実行ユーザー変更 =====
RUN sed -i 's/www-data/laravel/g' /usr/local/etc/php-fpm.d/www.conf
# 作業ディレクトリを指定
WORKDIR /var/www
# ===== laravel ユーザーで実行 =====
USER laravel