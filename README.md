# Stock Management 
I created a simple implementation of the Stock Management based on the requirements.

## Installation

1. Clone this project.
2. Create a database named `stock`
3. Create a  .env by copying .env.example and fillout the following:

```php
DB_CONNECTION=mysql
DB_HOST=
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

3. run `composer install`
4. run `php artisan migrate`
5. you may visit the site using the proper `APP_URL` set on .env.

## Adding Products
1. Go to Navigation > Shop > Inventory
2. Click add new and filllout the form.
3. Click Submit

## Updating Products
1. Go to Navigation > Inventory
2. Listed are the products
3. To update, go to the `Action` column and click the icon.
4. Updte the product info and click `Update`

## Creating Orders
1. Go to Home
2. Set Quantity
3. Add to Cart
4. You may add as many items as long as not out of stock
5. On the navigation bar, click the cart icon. You'll be redirected to the list of ordered items.
6. You `may find products` to go back to the list of items;
7. You may click `pay` to fully record the order.

## Viewing Orders
1. Go to navigation bar > Shop > Oders
2. Listed are the created oders.
3. You may view individual records to see the items included.

