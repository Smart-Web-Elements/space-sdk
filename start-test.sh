php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

php ./composer.phar update

[ $? -eq 0 ] || exit 1

php ./vendor/bin/phpunit --configuration ./phpunit.xml

#[ $? -ne 0 ] || exit 0

cd ../space-sdk-builder

php ../space-sdk/composer.phar update

[ $? -eq 0 ] || exit 1

php ./build.php

[ $? -eq 0 ] || exit 1

rm -rf ./build/space-sdk/src
cp -r ./build/src ./space-sdk/src

cd ./space-sdk

php ../../space-sdk/composer.phar update
php ./vendor/bin/phpunit --configuration ./phpunit.xml

[ $? -eq 0 ] || exit 1

git add --all
git status