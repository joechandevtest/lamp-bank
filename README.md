# Simulation Banking System

This simulation banking system is a course project developed using the LAMP stack (Linux, Apache, MySQL, PHP). It allows users to register for a new bank account, deposit, and withdraw money, maintaining a transaction history and account balance.

## Features
  - User Registration: Secure signup process with field validation.
  - Login/Logout: Managed session for user authentication.
  - Account Balance: View and manage your account balance.
  - Transactions: Perform deposits and withdrawals, with a history log.

## Prerequisites
  - Apache server
  - MySQL/MariaDB
  - PHP 8.1 or higher

## Installation
  Clone the Repository
  ````
git clone https://github.com/joechandevtest/lamp-bank
  ````

## Database Setup

Import the 127_0_0_2.sql file into your MySQL/MariaDB server to create the database and tables.
Adjust the database connection settings in PHP scripts as necessary.
Server Configuration

Place the project files in your Apache server's document root.
Ensure the Apache server and MySQL/MariaDB are running.

## Usage
Open your web browser and navigate to the project URL (e.g., http://localhost/your_project_folder).
Register for a new account using the Sign Up page.
Log in with your credentials.
Deposit or withdraw money from the account balance page.
View your transaction history and manage your account.
