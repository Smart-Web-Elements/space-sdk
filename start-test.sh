while test "$#" -gt 0; do
  case "$1" in
  --force)
    export FORCE=true
    ;;
  esac

  shift
done

EXPECTED_CHECKSUM="$(php -r 'copy("https://composer.github.io/installer.sig", "php://stdout");')"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_CHECKSUM="$(php -r "echo hash_file('sha384', 'composer-setup.php');")"

if [ "$EXPECTED_CHECKSUM" != "$ACTUAL_CHECKSUM" ]
then
    >&2 echo 'ERROR: Invalid installer checksum'
    rm composer-setup.php
    exit 1
fi

php composer-setup.php --quiet
rm composer-setup.php

php ./composer.phar install -o -n --no-progress

[ $? -eq 0 ] || exit 1

export URL=$JB_SPACE_API_URL

if [ -z ${FORCE+x} ]; then
    php ./vendor/bin/phpunit --configuration ./phpunit.xml

    [ $? -ne 0 ] || exit 0
fi

chmod +x ../space-sdk-builder/upgrade.sh
../space-sdk-builder/upgrade.sh

exit $?