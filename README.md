# Project

You've been given the assignment to make a form template library for reuse in php 7+ using OOP.
This will be used to design a website that other developers will add to.
For now you're tasked with running sample.php that generates a web view similar to the screenshot.png.

# Project Requirements

This project requires docker and a shell script executor to start everything.

> [!WARNING]
> A WSL + Windows environment was used to build thsi project, so a similar env or a Linux is highly recomended

# Running the project

If you are running the project for the first time, you can use this command:

```bash
sh ./devops/shell/run_project.sh
```

Or if you are running it again, use this to rebuild and up the project container

```bash
sh ./devops/shell/rebuild_project.sh
```

After the command runs, the project should be visible on this URL: http://localhost:8080/

# Testing the project

This project uses PHPUnit for unitary testing of each feature created. To run all tests you can use any of the following commands

```bash
sh ./devops/shell/run_tests.sh
```

```bash
docker exec challenge vendor/bin/phpunit ./tests
```

Both commands will run every unit test avaliable in the project.