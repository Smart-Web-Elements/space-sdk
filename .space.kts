job("Build and run tests") {
    startOn {
        gitPush {
            branchFilter = "refs/heads/main"
        }
        schedule {
            cron("0 2 * * *")
        }
    }

    parallel {
        container(displayName = "Test PHP 7.4", image = "php:7.4-cli") {
            shellScript {
                interpreter = "/bin/bash"
                content = """
                    ./install-composer.sh
                    composer.phar update
                    php ./vendor/bin/phpunit --configuration ./phpunit.xml
                """
            }
        }

        container(displayName = "Test PHP 8.0", image = "php:8.0-cli") {
            shellScript {
                interpreter = "/bin/bash"
                content = """
                    ./install-composer.sh
                    composer.phar update
                    php ./vendor/bin/phpunit --configuration ./phpunit.xml
                """
            }
        }

        container(displayName = "Test PHP 8.1", image = "php:8.1-cli") {
            shellScript {
                interpreter = "/bin/bash"
                content = """
                    ./install-composer.sh
                    composer.phar update
                    php ./vendor/bin/phpunit --configuration ./phpunit.xml
                """
            }
        }
    }
}