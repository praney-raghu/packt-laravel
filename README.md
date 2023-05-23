<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"><img src="https://www.metaltoad.com/sites/default/files/styles/large_personal_photo_870x500_/public/2020-05/react-js-blog-header.png?itok=VbfDeSgJ" width="250"></p>

## About Book Store

Book Store is an application about book management CRUD. This application was created using the base Laravel Framework as the backend service and React.js as the frontend.

Laravel is accessible, powerful, and provides tools required for large, robust applications and React is an easy, simple, and lightweight library.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

To run this project, yarn / npm tools and composer are needed and make sure you have imported the book_store.sql database which is already available in this project. Don't forget to setup the ENVIRONTMENT_VARIBALE or .env file.

## Installation And Usage

-   Run this command, to clone the project.

```
git clone https://github.com/praney-raghu/packt-laravel.git
```

-   Run this command, to install dependency for running the application.

```
composer install && npm install

```

-   Run this command, to migrate the database to your local machine.

```
:: Call Action to Migrate Database
php artisan migrate --seed

:: Create Secret Key Laravel App
php artisan key:generate
```

-   Run this command, to running the application, you can running 2 terminal / CMD.

```
:: Command To Build Frontend Service (React)
npm run dev

-- and --

:: Command To Running Backend Service (Laravel)
php artisan serve
```

## ✅ API Documentation

### Authorization API

| Path                      | Method | Description                                  | Data                                                                                             |
| ------------------------- | ------ | -------------------------------------------- | ------------------------------------------------------------------------------------------------ |
| /api/v1/login           | POST   | used for admin login / authentication.        | Body Request :<br>email: string, username: string                                                |
| /api/v1/logout          | POST   | used for logout or destroy the user session. | Header Request :<br>Authorization: string

### Books API

| Path          | Method | Description                                 | Data                                                                                                                                                                                                                        |
| ------------- | ------ | ------------------------------------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| /api/v1/books     | GET    | used for showing list of books from database.  | -                                                                                                                                                                                                                           |
| /api/v1/books/:id | GET    | used for showing detail of book from database. | Params Request :<br>id: integer                                                                                                                                                                                             |
| /api/v1/books     | POST   | used for adding new book into database.     | Header Request :<br>Authorization: string<br><br>Body Request :<br>title: string, genre: string, description: string, isbn: integer, published: date, publisher: string, author: string                                           |
| /api/v1/books/:id | PUT  | used for updating book from database.         | Header Request : <br>Authorization: string <br><br>Params Request :<br>id: integer<br><br>Body Request : <br>title: string, genre: string, description: string, isbn: integer, published: date, publisher: string, author: string |
| /api/v1/books/:id | DELETE | used for deleting book from database.         | Header Request : <br>Authorization: string <br><br>Params Request :<br>id: integer |

## 👤 Author

-   Praney Raghuvanshi

## 📝 License

Copyright © 2023 Praney Raghuvanshi.
This project is MIT licensed.