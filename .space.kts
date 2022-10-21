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
        container(displayName = "Test PHP 7.4", image = "jitesoft/phpunit:7.4") {
            env["CLIENT_ID"] = Secrets("space_client_id")
            env["CLIENT_SECRET"] = Secrets("space_client_secret")
            env["URL"] = Params("space_url")
            shellScript {
                interpreter = "/bin/sh"
                location = "./start-test.sh"
            }
        }

        container(displayName = "Test PHP 8.0", image = "jitesoft/phpunit:8.0") {
            env["CLIENT_ID"] = Secrets("space_client_id")
            env["CLIENT_SECRET"] = Secrets("space_client_secret")
            env["URL"] = Params("space_url")
            shellScript {
                interpreter = "/bin/sh"
                location = "./start-test.sh"
            }
        }

        container(displayName = "Test PHP 8.1", image = "jitesoft/phpunit:8.1") {
            env["CLIENT_ID"] = Secrets("space_client_id")
            env["CLIENT_SECRET"] = Secrets("space_client_secret")
            env["URL"] = Params("space_url")
            shellScript {
                interpreter = "/bin/sh"
                location = "./start-test.sh"
            }
        }
    }
}