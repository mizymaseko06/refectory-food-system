# Refectory Food Ordering System

A web-based application designed for managing orders at the University of Eswatini refectory, allowing users (students and staff) to easily view the menu, add items to their cart, place orders, and manage their user balance. This project also includes an admin dashboard for managing menu items and topping up user balances.

## Features
### User Features

1. User Registration and login
- Users sign up using their school ID.
- An OTP is sent to the user's school email for account verification.
2. Ordering food
- Browse the menu, view food items, and add items to the cart.
- Place orders directly, which deduct from the user's balance.
3. User dashboard
- View balance, order history, and edit account details.

### Admin features
1. Dashboard
- Manage menu items (add, edit and remove food items).
- Top up user balances on request.
- View all users and their order history.

## Technologies used
1. Front-end: HTML, CSS, Javascript, Bootstrap
2. Back-end: PHP, MySQL
3. Email integration: PHP Mailer for OTP verification

## Setup
### Prerequisites
1. Install and configure Apache, MySQL and PHP.
2. Clone the repository to your local machine.
3. Configure the database using the provided SQL files.

### Installation
1. Clone this repository
```git clone https://github.com/mizymaseko06/refectory-food-system.git```
2. Set up the database
- Create a MySQL named refectory system
- Import the refectory.sql file in the database directory.
3. Configure database connection
- Open config/db_connect.php
- Set your database host, username and password.
4. Start the server
- Open your preferred browser and go to http://localhost/refectory-food-system

## Folder structure
- /public - contains front-end files that users will see
- /includes - contains PHP files which handle backend functionality
- /config - contains configuration files for the database
- /assets - stores resources used by the web application, such as images, front-end scripts and stylesheets