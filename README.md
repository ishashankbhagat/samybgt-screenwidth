## About Screenwidth

Screenwidth is a php laravel package with easy to use syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Screenwidth takes the pain out of development by easing common tasks used in many web projects, such as:

- Easy to use helper functions.
- Get device type based on width.
- Check for a specific device type.


Screenwidth is accessible, powerful, and acts as a tools required for large, robust applications.

## Using Screenwidth

When using css, the content of the page will update in realtime as the user resizes the window,
whereas this package debounces a network request and updates the page on the next page request.


## Installation
```
composer require samybgt/screenwidth
```


The default settings are based on following breakpoints
```php
return [
  'devices' => [
    'mobile' => [
      'min' => 0,
      'max' => 576
    ],
    'tablet' => [
      'min' => 576,
      'max' => 992
    ],
    'desktop' => [
      'min' => 992,
      'max' => 10000
    ],
  ]
];
```


## Helpers

```php
//To get the width of the client screen.
screenwidth_get()

// To get the device type based on width and breakpoints given in config file
screenwidth_device()

//Check if the device is that type based on parameter and config file
screenwidth_is('desktop')

```


## Middleware

Add this middleware to the route if needed.

```php
screenwidth
```


## On screen resize event

It's important that you place the `@include(screenwidth::screenwidth.reportWindowSize)` at first point of contact with the user, for your application to look its best. I have it in my `app.blade.php` and on the `login`/`register` pages.

```php
@include(screenwidth::screenwidth.reportWindowSize)
```



## Contributing

Thank you for considering contributing to this tool!


## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Samy via [samybgt@gmail.com](mailto:samybgt@gmail.com). All security vulnerabilities will be promptly addressed.

## License

The Screenwidth tool is open-sourced.
