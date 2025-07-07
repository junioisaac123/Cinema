### Credentials

| User Role | Email                        | Password     |
| --------- | ---------------------------- | ------------ |
| Admin     | admin&#64;cinemat&#46;com    | adminpass    |
| Customer  | customer&#64;cinemat&#46;com | customerpass |

<br>

---

<br>

## Installation Instructions

<br>

1. Clone the repository by running the following command in your terminal or command prompt:
    ```bash
    git clone https://github.com/junioisaac123/Cinema.git
    ```
2. Change into the project directory:
    ```bash
    cd Cinemat
    ```
3. Install the project dependencies using Composer. Ensure you have Composer installed on your machine. Run the following command:
    ```bash
    composer install
    ```
4. Create a copy of the .env.example file, name it .env, and enter database credentials:
    ```bash
    cp .env.example .env
    ```
5. Generate an application key:
    ```bash
    php artisan key:generate
    ```
6. Configure the .env file. Open the .env file in a text editor and set the necessary configuration options, such as database credentials and application-specific settings.
7. Run the database migrations to create the required tables:
    ```bash
    php artisan migrate
    ```
8. Optionally, seed the database with 20 movies, shows, users, and categories:
    ```bash
    php artisan db:seed
    ```
9. Create a symbolic link from public/storage to storage/app/public by:
    ```bash
    php artisan storage:link
    ```
    The Laravel application will be accessible at the specified URL (usually http://localhost:8000).
10. Finally, you can start the local development server:
    ```bash
    php artisan serve
    ```
    The Laravel application will be accessible at the specified URL (usually http://localhost:8000).

<br>

## User Roles

<br>

**Administrator:**

-   Manages users' creation and website authorities
-   Accepts requests from managers to become managers
-   Can delete existing users

**Customers:**

-   Registered users who have provided their personal data
-   Can reserve movie tickets
-   Able to reserve any number of tickets for non-clashing movies

**Guests:**

-   Unregistered or non-logged-in users
-   Can view current movies' details
-   Can log in or register (sign up) as a customer
-   Unable to reserve tickets
