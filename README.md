



# ![ReviewMe](https://icon-library.com/images/review-icon/review-icon-20.jpg) ReviewME

A product reviewing web based solution where customers go and review products.


## Tools

This project was built using  [Laravel 8](https://laravel.com) with [Livewire](https://laravel-livewire.com) components. When you download ReviewMe, dont forget to run npm so that all the project requirement can be installed in your computer.
```bash
  npm install 
```
 Also run a migartion after creating an empty database. The admin user, roles and product types have been seeded.

```bash  
  php artisan migrate --seed
```

## Feautures

The application has 2 roles an admin and a customer.
 The Customer can register on the application. Only the admin can create products. There are 2 types of products : home and business.
The home page displays the products and when you click on the product you will see reviews and ratings associated with that product. This where a customer can add a review (only logged in)
Any role(even unauthenticated visitors) can see products and reviews. 
