FROM php:8.2-cli

# Instala dependências do sistema e extensões do PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite zip

# Instala Node.js (necessário para compilar o CSS/JS com Vite)
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# Instala o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copia os arquivos do projeto
COPY . .

# Instala as dependências do PHP
RUN composer install --optimize-autoloader --no-dev

# Instala as dependências do Node e compila os assets (CSS/JS)
RUN npm install && npm run build

# Garante que o banco SQLite existe e as permissões estão certas
RUN mkdir -p database && touch database/database.sqlite \
    && chmod -R 775 storage bootstrap/cache database

EXPOSE 10000

CMD php artisan config:cache && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=10000