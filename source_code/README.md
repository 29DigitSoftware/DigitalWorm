# Sauap reader

Jai book reader

### Required

Sauap reader uses a number of open source projects to work properly:

* [PHP 7.*] - HTML enhanced for web apps!
* [Composer] - awesome web-based text editor
* [Laravel 7.*] - Markdown parser done right. Fast and easy to extend.
* [Vue.js] - great UI boilerplate for modern web apps

### Installation

```sh
$ git clone git@gitlab.com:abylayomar/sauap_reader.git
$ cd sauap_reader
$ composer install # for install dependencies. Run only 1 time
$ php artisan migrate:fresh --seed #for create migrations 
$ npm run watch 
$ php artisan serve
```

### APIs

   - /api/sections 
      Return the list of sections of main page
   - /api/sections/{id}
      Return list of content of correspondent section
   - /api/book/{id}
      Return the book information

### Types
   # Section types
      - category
      - authors
      - tests
   # Question types
      - choose

   [PHP 7.*]: <https://www.php.net/manual/ru/install.php>
   [Composer]: <https://getcomposer.org/download/>
   [Laravel 7.*]: <https://laravel.com/docs/7.x/installation>
   [Vue.js]: <vuejs.org>
 
