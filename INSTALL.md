## Installation Step by Step

-   Download or Clone this repository using command.

    ```bash
    $ git clone https://github.com/ariefid/hiring-test-dot.git
    ```

-   Change directory to this repository.

    ```bash
    $ cd hiring-test-dot
    ```

-   Run composer install.

    ```bash
    $ composer install
    ```

-   Copy file .env.example to .env using command.

    ```bash
    $ cp .env.example .env
    ```

-   Generate key using command.

    ```bash
    $ php artisan key:generate --ansi
    ```

-   Change database connection in file .env using your database configuration. Below is example default database configuration.

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=
    ```

-   Run migrate with database seeder command.

    ```bash
    $ php artisan migrate --seed
    ```

-   Run npm install to install node packages.

    ```bash
    $ npm install
    ```

-   Run command for build vite module.

    ```bash
    $ npm run build
    ```

-   Run artisan serve commmand to launch php development server.

    ```bash
    $ php artisan serve
    ```

-   Open your browser and browse url [http://localhost:8000](http://localhost:8000).
