job("Build and run generated tests") {
    startOn {
        schedule {
            cron("0 2 * * *")
        }
    }

    git {
        refSpec {
            +"refs/heads/v2"
        }
    }

    git("space-sdk-builder")

    container(displayName = "Test PHP 8.1", image = "mistermarlu/testing:8.1") {
        env["CLIENT_ID"] = Secrets("space_client_id")
        env["CLIENT_SECRET"] = Secrets("space_client_secret")
        shellScript {
            interpreter = "/bin/sh"
            location = "./start-test.sh"
        }
    }
}

job("Force rebuild and run generated tests") {
    startOn {
        // "startOn" ist leer, damit dieser Job nur manuell ausgeführt werden kann.
    }

    git {
        refSpec {
            +"refs/heads/v2"
        }
    }

    git("space-sdk-builder")

    container(displayName = "Test PHP 8.1", image = "mistermarlu/testing:8.1") {
        env["CLIENT_ID"] = Secrets("space_client_id")
        env["CLIENT_SECRET"] = Secrets("space_client_secret")
        env["URL"] = Params("space_url")
        shellScript {
            interpreter = "/bin/sh"
            location = "./start-test.sh"
            args("--force")
        }
    }
}