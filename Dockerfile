FROM misterabdul/alpine-lamp:1.0.0-php-only

ENV APP_NAME=Laravel \
    APP_ENV=local \
    APP_KEY='' \
    APP_DEBUG=true \
    APP_URL=http://localhost \
    LOG_CHANNEL=daily \
    DB_CONNECTION=mysql \
    DB_HOST=127.0.0.1 \
    DB_PORT=3306 \
    DB_DATABASE=laravel \
    DB_USERNAME=root \
    DB_PASSWORD='' \
    BROADCAST_DRIVER=log \
    CACHE_DRIVER=file \
    QUEUE_CONNECTION=sync \
    SESSION_DRIVER=file \
    SESSION_LIFETIME=120 \
    REDIS_HOST=127.0.0.1 \
    REDIS_PASSWORD=null \
    REDIS_PORT=6379 \
    MAIL_DRIVER=smtp \
    MAIL_HOST=smtp.mailtrap.io \
    MAIL_PORT=2525 \
    MAIL_USERNAME='' \
    MAIL_PASSWORD='' \
    MAIL_ENCRYPTION='' \
    MAIL_FROM_ADDRESS='' \
    MAIL_FROM_NAME=Laravel \
    PASSPORT_TOKENS_EXPIRES=30 \
    PASSPORT_REFRESH_EXPIRES=14 \
    PASSPORT_PERSONAL_EXPIRES=6 \
    AWS_ACCESS_KEY_ID='' \
    AWS_SECRET_ACCESS_KEY='' \
    AWS_DEFAULT_REGION=us-east-1 \
    AWS_BUCKET='' \
    PUSHER_APP_ID='' \
    PUSHER_APP_KEY='' \
    PUSHER_APP_SECRET='' \
    PUSHER_APP_CLUSTER=mt1 \
    MIX_PUSHER_APP_KEY='' \
    MIX_PUSHER_APP_CLUSTER=''

WORKDIR /var/www/localhost

COPY --chown=apache:apache . /var/www/localhost/laravel

RUN rm -rf /var/www/localhost/htdocs
RUN ln -s /var/www/localhost/laravel/public /var/www/localhost/htdocs

WORKDIR /var/www/localhost/laravel

RUN composer install

EXPOSE 80
