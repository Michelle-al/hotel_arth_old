- Need to setup your project on your local machine ?
  - Clone repo with ssh :
    ```
    git clone git@github.com:Michelle-al/hotel_arth.git
    ```
  - In the repo directory, run `npm install` and `composer install` ;
  - The `.env` file is missing : create it and generate a key with the following command.
    ```
    cp .env.example .env
    php artisan key:generate
    ```
  - During development, we're only using sqlite, since it doesn't change anything with Eloquent requests.
    ```
    DB_CONNECTION=sqlite
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=database/db.sqlite
    ```
  - Remember to change your database setup for production:
    ```
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    ```
  
- Git organization :
    - Make sure you **only** merge on the `dev` branch and **dev only**;
    - Create a new branch for each issue you are solving ;
    - Commit only to that created branch ;
    - **Make sure you did a checkout to your branch** ;
    - This file is the only one you're allowed to commit directly to the dev branch.

**Happy coding !**
