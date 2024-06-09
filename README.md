# Laravel 11 Login with OTP Verification

This Laravel 11 application provides a robust registration and login system with OTP (One-Time Password) verification, enhancing security for user authentication. Leveraging the power of Laravel 11, PHP 8, and MySQL, this project ensures reliability, scalability, and performance for the authentication needs.


## Table of Contents
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Stack](#stack)
- [Contributing](#contributing)
- [Contact](#contact)

## Stack

- **Backend:**
  - Laravel 11
  - PHP 8
  - MySQL

- **Frontend:**
  - Bootstrap 5
  - HTML 5

- **API Testing:**
  - Postman

## Features
- **Secure Authentication:** Utilizes OTP verification for both registration and login, enhancing security.
- **Password Management:** Includes functionality for password reset and change password.
- **Modern UI:** Utilizes Laravel UI for frontend components and Bootstrap 5 for a responsive and visually appealing interface.
- **Scalable and Reliable:** Built on Laravel 11 and PHP 8, ensuring scalability and reliability for your authentication needs.

## Installation

### Prerequisites
Before you begin, ensure you have met the following requirements:
- PHP >= 8.1
- Composer
- MySQL
- Node.js & NPM
- Git

### Step-by-Step Guide

1. **Clone the repository:**
    ```bash
    git clone https://github.com/shababsalehin/laravel-11-login-with-otp-verification.git
    cd laravel-11-login-with-otp-verification
    ```

2. **Install dependencies:**
    ```bash
    composer install
    npm install
    npm run dev
    ```

3. **Set up the environment file:**
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4. **Configure the database:**
    Update the `.env` file with your database credentials:
    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=otp_verification
    DB_USERNAME=root
    DB_PASSWORD=
    ```

5. **Run migrations:**
    ```bash
    php artisan migrate
    ```

6. **Start the application:**
    ```bash
    php artisan serve
    ```

7. **Visit the application:**
    Open your web browser and visit `http://127.0.0.1:8000/`.

## Usage

### Registration
1. Go to the registration page.
2. Fill in the registration form with your details.
3. Submit the form to receive an OTP.
4. Enter the OTP to complete the registration.

### Login
1. Go to the login page.
2. Login with Email and Password.
3. Clicking forget password will redirects in a page where user's registered mobile number is needed to generate otp.
4. Enter the OTP to log in.

### Change Password
1. Log in to your account.
2. Navigate to the "Change Password" section in the dashboard.
3. Enter old password, then enter your current password and the new password.

### API Testing with Postman
API endpoints can be tested using Postman. Import the provided Postman collection and environment file for easy testing.


## Contributing

Feel free to contribute to this project. Pull requests are welcome.

## Contact

If you have any questions or suggestions, feel free to reach out:

Email: auddhayashabab@gmail.com
