<p align="center"><a href="https://github.com/lucianolima00" target="_blank"><img src="public/LIMA_Logo.png" width="200" alt="Lima Logo"></a></p>

## About TaskSys

TaskSys is a simple task management application created as part of a job application test to demonstrate practical software development skills. It enables users to efficiently organize, track, and prioritize tasks through a clean and intuitive interface, supporting features such as creating, updating, deleting, and marking tasks as complete. TaskSys is using the following frameworks and requirements:

- PHP v8.4
- Laravel v12.24.0
- Sail v1.44
- NodeJS v22.18.0
- Jquery v3.7.1
- TailwindCSS v4.0.0

TaskSys is a [Laravel](https://laravel.com) project designed and developed by [Luciano Lima](https://github.com/lucianolima00).

## Launching TaskSys

TaskSys is using Laravel/Sail, that uses docker to launch the project. Both `vendor` and `node_modules` folders will not be available on the .zip and the git repository, so is required to have PHP and NodeJS installed to make the firsts step before launching. 

For launching you need first to create an environment file on the root folder of the project.

Create a `.env` file on the root folder with the following variables:
```dotenv
APP_NAME=TaskSys
APP_ENV=local
APP_KEY=base64:abcdefghijklmnopqrstuvwxyz123456789=
APP_DEBUG=true
APP_DOMAIN=localhost
APP_URL="http://${APP_DOMAIN}"
APP_PORT=8000
FORWARD_APP_PORT=8001
APP_SERVICE=app
SAIL_XDEBUG_MODE=debug
SAIL_XDEBUG_CONFIG=client_host=host.docker.internal
WWWGROUP=1000
WWWUSER=1000
XDEBUG=true
XDEBUG_PORT=9001

DB_CONNECTION=mysql
DB_HOST=tasksys_db
DB_PORT=3306
DB_DATABASE=tasksys-db
DB_USERNAME=root
DB_PASSWORD=123456

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

GITHUB_CLIENT_ID=
GITHUB_CLIENT_SECRET=
GITHUB_REDIRECT=

VITE_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
VITE_PUSHER_HOST="${PUSHER_HOST}"
VITE_PUSHER_PORT="${PUSHER_PORT}"
VITE_PUSHER_SCHEME="${PUSHER_SCHEME}"
VITE_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

## Commands

With the `.env` file created, execute the following commands to install the PHP/Composer and NodeJS required to launch Sail. If you already have both installed in your machine, jump to [launching](#launching)

#### PHP
Linux Debian Systems (OS used to create the project).
```shell
sudo apt update
sudo apt install -y php8.4
```
MacOS Systems
```shell
curl -o- https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh | bash

brew install php@8.4
brew link --force --overwrite php@8.4
```

#### Composer
```shell
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'dac665fdc30fdd8ec78b38b9800061b4150413ff2e3b6f88543c636f7cd84f6db9189d43a81e5503cda447da73c7e5b6') { echo 'Installer verified'.PHP_EOL; } else { echo 'Installer corrupt'.PHP_EOL; unlink('composer-setup.php'); exit(1); }"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

#### NodeJS
Linux Debian Systems (OS used to create the project).
```shell
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.3/install.sh | bash
\. "$HOME/.nvm/nvm.sh"
nvm install 22
node -v
nvm current
npm -v
```
MacOS Systems
```shell
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.3/install.sh | bash
\. "$HOME/.nvm/nvm.sh"
nvm install 22
node -v
nvm current
npm -v
```
#### Launching
```shell
composer install
npm install
./vendor/bin/sail up
```

#### Seeding the database
To be easier to test the system, you can seed the database with random values running the following command
```shell
sail artisan db:seed
```

## License

The TaskSys is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
