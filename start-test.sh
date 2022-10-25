php composer update

[ $? -eq 0 ] || exit 1

php ./vendor/bin/phpunit --configuration ./phpunit.xml

[ $? -ne 0 ] || exit 0

cd ../space-sdk-builder

php composer update

[ $? -eq 0 ] || exit 1

php ./build.php

[ $? -eq 0 ] || exit 1

mv ../space-sdk/src ../space-sdk/src-old
cp -r ./build/src ../space-sdk/src

cd ../space-sdk
php composer dump-autoload
php ./vendor/bin/phpunit --configuration ./phpunit.xml

[ $? -eq 0 ] || exit 1

echo "-> Commit changes!"
php ../space-sdk-builder/commit-changes.php