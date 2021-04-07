FROM php:7.4-apache

RUN apt-get update && apt-get install -y \
        npm \
        nodejs

#Install Postgre PDO
RUN apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Install Redis
RUN pecl install redis \
	&& docker-php-ext-enable redis
	
# Igbinary module
RUN pecl install igbinary \
    && docker-php-ext-enable igbinary

# Setup Memcached
RUN apt-get install -y libmemcached-dev zlib1g-dev \
    && pecl install memcached-3.1.4 \
    && docker-php-ext-enable memcached

# HTTP_Request2
#RUN DEBIAN_FRONTEND=noninteractive pear install HTTP_Request2

# Setup awscli
RUN DEBIAN_FRONTEND=noninteractive apt-get -y install python3 python3-pip git wget
RUN DEBIAN_FRONTEND=noninteractive pip3 install awscli

# Setup Apache2
RUN a2enmod rewrite

# Enable the new virtualhost
COPY zotero.conf /etc/apache2/sites-available/
RUN a2dissite 000-default
RUN a2ensite zotero

# Override gzip configuration
COPY gzip.conf /etc/apache2/conf-available/
RUN a2enconf gzip

# AWS local credentials todo aws setup
RUN mkdir ~/.aws \
	&& bash -c 'echo -e "[default]\nregion = us-east-1" > ~/.aws/config' \
	&& bash -c 'echo -e "[default]\naws_access_key_id = zotero\naws_secret_access_key = zoterodocker" > ~/.aws/credentials'

# Chown log directory
RUN chown 33:33 /var/log/apache2

# Expose
EXPOSE 80/tcp

VOLUME /var/www/zotero

COPY url.patch /

#Entrypoint
COPY entrypoint.sh /
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
