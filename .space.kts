job("Build and run generated tests") {
    startOn {
        gitPush {
            branchFilter = "refs/heads/v2"
        }

        schedule {
            cron("0 2 * * *")
        }
    }

    /*git {
        refSpec {
            +"refs/heads/v2"
        }
    }*/

    git("space-sdk-builder")

    container(displayName = "Test PHP 8.1", image = "mistermarlu/testing:8.1") {
        env["CLIENT_ID"] = Secrets("space_client_id")
        env["CLIENT_SECRET"] = Secrets("space_client_secret")
        env["URL"] = Params("space_url")
        shellScript {
            interpreter = "/bin/sh"
            location = "./start-test.sh"
        }
    }
}