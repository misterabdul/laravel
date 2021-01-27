FROM misterabdul/alpine-supervisor:1.0.0-nginx-php

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

COPY . /app/laravel
RUN rm -rf /app/www && \
    ln -s /app/laravel/public /app/www && \
    chown -R nginx:nginx /app/laravel/storage && \
    echo "* * * * * php /app/laravel/artisan schedule:run >> /dev/null 2>&1" >> /var/spool/cron/crontabs/root

COPY queue-worker.conf /etc/supervisor.d

WORKDIR /app/laravel
RUN composer install --no-dev
