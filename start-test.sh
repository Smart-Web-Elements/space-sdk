echo "-> Download and install composer"
EXPECTED_CHECKSUM="$(php -r 'copy("https://composer.github.io/installer.sig", "php://stdout");')"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_CHECKSUM="$(php -r "echo hash_file('sha384', 'composer-setup.php');")"

if [ "$EXPECTED_CHECKSUM" != "$ACTUAL_CHECKSUM" ]
then
    >&2 echo '-> ERROR: Invalid installer checksum'
    exit 1
else
    php composer-setup.php --quiet
fi

rm composer-setup.php

php ./composer.phar update

[ $? -eq 0 ] || exit 1

php ./vendor/bin/phpunit --configuration ./phpunit.xml

exit $?