<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

Este proyecto forma parte del reto referente a las asignaturas de SISTEMAS DE GESTION EMPRESARIAL(SGE) y DESARROLLO DE INTERFACES(DI), en el cual creamos mediante el framework de Laravel una página de gestión de incidencias. Además se hace uso de una BBDD MySQL con la cual contamos para la gestión de los datos referentes a la página. Ambas estructuras estan construidas sobre un contenedor Docker separado de tal forma que el contendor Laravel se conecta al MySQL y hace las peticiones pertinentes. 

Para ello como se menciona anteriormente se levanta un contedor Laravel con MySQL con uso de Docker de la siguiente manera:
    Instalación de Docker.
        -"sudo apt install docker-compose"
    Instalación de Laravel con MySQL server en un contenedor Docker.
        -"curl -s "https://laravel.build/example-app?with=mysql" | bash" "Donde /example-app será el nombre de la ruta del contenedor MySQL"
    Levantar contenedor.
        -"cd example-app && ./vendor/bin/sail up -d"

En nuestro caso para acceder hacemos uso de una IP estática 10.5.7.206, de esta manera podemos conectarnos desde nuestra máquina anfitriona con Visual Studio Code conectándonos al contenedor en sí.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
