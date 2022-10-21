job("Build and run tests") {
    startOn {
        gitPush {
            branchFilter = "refs/heads/main"
        }
        schedule {
            cron("0 2 * * *")
        }
    }

    container(displayName = "Setup environment variables", image = "php:7.4-cli") {
        env["SPACE_CLIENT_ID"] = Secrets("space_client_id")
        env["SPACE_CLIENT_SECRET"] = Secrets("space_client_secret")
        env["SPACE_URL"] = Params("space_url")
        shellScript {
            interpreter = "/bin/bash"
            content = """
                touch ${$}JB_SPACE_FILE_SHARE_PATH/.env
                echo "CLIENT_ID=\"${$}SPACE_CLIENT_ID\"" >> ${$}JB_SPACE_FILE_SHARE_PATH/.env
                echo "CLIENT_SECRET=\"${$}SPACE_CLIENT_SECRET\"" >> ${$}JB_SPACE_FILE_SHARE_PATH/.env
                echo "URL=\"${$}SPACE_URL\"" >> ${$}JB_SPACE_FILE_SHARE_PATH/.env
            """
        }
    }

    parallel {
        container(displayName = "Test PHP 7.4", image = "php:7.4-cli") {
            shellScript {
                interpreter = "/bin/bash"
                content = """
                    ./install-composer.sh
                    ./composer.phar update
                    php ./vendor/bin/phpunit --configuration ./phpunit.xml
                """
            }
        }

        container(displayName = "Test PHP 8.0", image = "php:8.0-cli") {
            shellScript {
                interpreter = "/bin/bash"
                content = """
                    ./install-composer.sh
                    ./composer.phar update
                    php ./vendor/bin/phpunit --configuration ./phpunit.xml
                """
            }
        }

        container(displayName = "Test PHP 8.1", image = "php:8.1-cli") {
            shellScript {
                interpreter = "/bin/bash"
                content = """
                    ./install-composer.sh
                    ./composer.phar update
                    php ./vendor/bin/phpunit --configuration ./phpunit.xml
                """
            }
        }
    }
}