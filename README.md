<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# TreeView
## Specyfikacja aplikacji
Aplikacja służy do tworzenia i zarządzania strukturą drzewiastą.

### Funkcjonalności:
  1. Tworzenie węzłów (węzły można dodawać jako korzenie bądź dzieci innych węzłów).
  2. Usuwanie węzłów.
  3. Edycja węzłów.
  4. Przenoszenie węzłów do innej lokalizacji.
  5. Sortowanie węzłów.
  6. Rozwijanie i zwijanie całej struktury.

### Interfejs aplikacji:
  <details>
    <summary>Ekran główny</summary>
    <img width="888" alt="main" src="https://user-images.githubusercontent.com/79647437/173398115-50a5aadd-4c4a-4e49-a634-aaf68babec57.PNG">
  </details>
  
  <details>
    <summary>Okno dodawania węzła</summary>
    <img width="521" alt="add_node" src="https://user-images.githubusercontent.com/79647437/173398840-20c87c79-6096-433b-934b-eb675ac23ce3.PNG">
  </details>
  
  <details>
    <summary>Okno usuwania węzła</summary>
    <img width="461" alt="delete_node" src="https://user-images.githubusercontent.com/79647437/173398907-f3d804b4-4cca-4414-b66b-931e3935201e.PNG">
  </details>
  
  <details>
    <summary>Okno edycji węzła</summary>
    <img width="425" alt="update_node" src="https://user-images.githubusercontent.com/79647437/173399107-7aee84ed-900b-4678-a2b1-5ac62f4055ce.PNG">
  </details>
  
  <details>
    <summary>Okno przenoszenia węzła</summary>
    <img width="440" alt="move_node" src="https://user-images.githubusercontent.com/79647437/173399233-4dfbf9a1-4cf5-450d-a3c2-35dbfd9056c5.PNG">
  </details>
  
  <details>
    <summary>Okno sortowania węzłów</summary>
    <img width="528" alt="sort" src="https://user-images.githubusercontent.com/79647437/173399315-6d65b800-d963-4af2-a32b-dcd5ccba321e.PNG">
  </details>
  
 W oknach zarządzania węzłami zastosowane są pola typu "select" z wyszukiwaniem.

## Wykorzystane technologie
Bootstrap, HTML, CSS, JavaScript, Laravel

## Wykorzystane narzędzia do zarządzania bazą danych
phpMyAdmin

<details>
    <summary>Tabela przechowująca dane na temat węzłów</summary>
    <img width="393" alt="database" src="https://user-images.githubusercontent.com/79647437/173400613-ea361942-705c-48b5-bd76-0db95c1c39b5.PNG">

  </details>
 
## Dane dotyczące bazy danych:
1. host = localhost
2. user = root
3. password = " "
4. database_name = treedatastructure
