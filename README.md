# Laravel 11 Login with OTP Verification

This Laravel 11 application provides a robust registration and login system with OTP (One-Time Password) verification, enhancing security for user authentication. Leveraging the power of Laravel 11, PHP 8, and MySQL, this project ensures reliability, scalability, and performance for authentication needs.

### Register Page 
![1 register](https://github.com/ShababSalehin/Laravel-11-login-with-otp-verification/assets/82288653/6d338385-dcc0-48ca-9c91-b0a4337646c2)

### Registration with OTP 
![2 register with otp](https://github.com/ShababSalehin/Laravel-11-login-with-otp-verification/assets/82288653/13b07b4b-1836-4ded-afcc-aef5b5f88cda)

### Change Password 
![3 change password](https://github.com/ShababSalehin/Laravel-11-login-with-otp-verification/assets/82288653/9e3a03ca-4f17-46d3-9b56-59a09a622a1a)

### Login Page
![4 login](https://github.com/ShababSalehin/Laravel-11-login-with-otp-verification/assets/82288653/5544b26d-35e7-4474-9b37-55560c4c18ee)

### Forget Password OTP generate
![5 forget password generate otp](https://github.com/ShababSalehin/Laravel-11-login-with-otp-verification/assets/82288653/a28ebc07-24fb-4959-940b-b6d3825913d0)

### Register OTP API Testing Postman
![7 registration api testing postman](https://github.com/ShababSalehin/Laravel-11-login-with-otp-verification/assets/82288653/1ed805bb-9d7a-49c0-84b5-8707437ce369)

### Login OTP API Testing Postman
![8 login api testing postman](https://github.com/ShababSalehin/Laravel-11-login-with-otp-verification/assets/82288653/5aea8cfd-f8cd-4b69-9bff-c857095988cb)


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
