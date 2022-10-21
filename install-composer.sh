echo "-> Download and install composer"
EXPECTED_CHECKSUM="$(php -r 'copy("https://composer.github.io/installer.sig", "php://stdout");')"
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
ACTUAL_CHECKSUM="$(php -r "echo hash_file('sha384', 'composer-setup.php');")"
RESULT=0

if [ "$EXPECTED_CHECKSUM" != "$ACTUAL_CHECKSUM" ]
then
    >&2 echo '-> ERROR: Invalid installer checksum'
    RESULT=1
else
    php composer-setup.php --quiet
fi

rm composer-setup.php

#Abort if the last command failed
if [ ! $RESULT -eq 0 ]; then
  echo "-> Unable to install composer"
  exit 1
fi
