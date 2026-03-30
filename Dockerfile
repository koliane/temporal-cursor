FROM php:8.3-cli-alpine

WORKDIR /app

RUN apk add --no-cache \
    bash \
    curl \
    git \
    unzip \
    zlib-dev \
    linux-headers \
    $PHPIZE_DEPS \
  && docker-php-ext-install sockets \
  && pecl install grpc protobuf \
  && docker-php-ext-enable grpc protobuf

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN curl -L https://github.com/roadrunner-server/roadrunner/releases/download/v2024.3.5/roadrunner-2024.3.5-linux-amd64.tar.gz \
    -o /tmp/rr.tar.gz \
  && tar -xzf /tmp/rr.tar.gz -C /tmp \
  && if [ -f /tmp/roadrunner-2024.3.5-linux-amd64 ]; then \
       mv /tmp/roadrunner-2024.3.5-linux-amd64 /usr/local/bin/rr; \
     else \
       mv /tmp/roadrunner-2024.3.5-linux-amd64/rr /usr/local/bin/rr; \
     fi \
  && chmod +x /usr/local/bin/rr \
  && rm -rf /tmp/rr.tar.gz /tmp/roadrunner-2024.3.5-linux-amd64
