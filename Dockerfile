FROM amd64/php:8.2-apache-bullseye

# Install a couple of tools for testing purposes
RUN apt-get update && \
    apt-get -y install nano screen tmux htop

# Update UID/GID for web user to use (probably) same user as at build time
RUN usermod -u 1000 www-data && \
    groupmod -g 1000 www-data

# Copy in apache config
COPY apache2-config.conf /etc/apache2/sites-enabled/000-default.conf
COPY entrypoint /usr/local/bin/

ENTRYPOINT ["entrypoint"]
STOPSIGNAL SIGWINCH
CMD ["apache2-foreground"]
