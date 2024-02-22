FROM amd64/php:8.2-apache-bullseye

# Update UID/GID for web user to use (probably) same user as at build time
RUN usermod -u 1000 www-data && \
    groupmod -g 1000 www-data

RUN a2enmod headers

# Copy in apache config
COPY docker-support/apache2-config.conf /etc/apache2/sites-enabled/000-default.conf
COPY docker-support/entrypoint docker-support/apache2-run /usr/local/bin/

ENTRYPOINT ["entrypoint"]
CMD ["apache2-run"]
