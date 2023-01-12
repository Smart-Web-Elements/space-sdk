while test "$#" -gt 0; do
  case "$1" in
  --force)
    export FORCE=true
    ;;
  esac

  shift
done

php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

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