job("Build and run tests") {
    startOn {
        gitPush {
            branchFilter = "refs/heads/main"
        }
        schedule {
            cron("0 2 * * *")
        }
    }

    failOn {
        testFailed { enabled = false }
        nonZeroExitCode { enabled = false }
    }

    container(displayName = "Setup environment variables", image = "jitesoft/phpunit:7.4") {
        env["SPACE_CLIENT_ID"] = Secrets("space_client_id")
        env["SPACE_CLIENT_SECRET"] = Secrets("space_client_secret")
        env["SPACE_URL"] = Params("space_url")
        shellScript {
            interpreter = "/bin/sh"
            content = """
                touch ${'$'}JB_SPACE_FILE_SHARE_PATH/.env
                echo "CLIENT_ID=\"${'$'}SPACE_CLIENT_ID\"" >> ${'$'}JB_SPACE_FILE_SHARE_PATH/.env
                echo "CLIENT_SECRET=\"${'$'}SPACE_CLIENT_SECRET\"" >> ${'$'}JB_SPACE_FILE_SHARE_PATH/.env
                echo "URL=\"${'$'}SPACE_URL\"" >> ${'$'}JB_SPACE_FILE_SHARE_PATH/.env
            """
        }
    }

    parallel {
        container(displayName = "Test PHP 7.4", image = "jitesoft/phpunit:7.4") {
            shellScript {
                interpreter = "/bin/sh"
                location = "./start-test.sh"
            }
        }

        container(displayName = "Test PHP 8.0", image = "jitesoft/phpunit:8.0") {
            shellScript {
                interpreter = "/bin/sh"
                location = "./start-test.sh"
            }
        }

        container(displayName = "Test PHP 8.1", image = "jitesoft/phpunit:8.1") {
            shellScript {
                interpreter = "/bin/sh"
                location = "./start-test.sh"
            }
        }
    }
}