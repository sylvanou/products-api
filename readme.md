Run migrations for tables
- Run "php artisan migrate"

Seed DB with 5 users each with 10 products in inventory
- Run "php artisan db:seed"

To View al products go to:
- GET request to 'localhost/products-api/api/products

To view individual products:
- GET request to 'localhost/products-api/api/product/{id}

To create product:
- POST request to 'localhost/products-api/api/product/'
  with data: {
    "name": "name",
    "size": "size",
    "color": "color",
    "brand": "brand"
  }

To delete product:
- DELETE request to 'localhost/products-api/api/product/{id}