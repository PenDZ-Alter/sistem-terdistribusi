# Start from tomsik68/xampp
FROM tomsik68/xampp:7

# Set working directory to the XAMPP web root
WORKDIR /opt/lampp/htdocs

# Install curl
RUN apt-get update && apt-get install -y curl gnupg2

# Create shortcut of php
RUN ln -s /opt/lampp/bin/php /usr/local/bin/php

# Install Composer manually
RUN curl -k -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Install dotenv using Composer
RUN composer require vlucas/phpdotenv

# Expose XAMPP default ports (optional)
EXPOSE 80 443 3306