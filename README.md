# SimpleRedirectionPhp

[![Version 1.1](https://img.shields.io/badge/Version-1.0-green.svg )](https://github.com/CeriseGoutPelican/SimpleRedirectionPhp) [![Maintenance](https://img.shields.io/badge/Maintained%3F-yes-green.svg)](https://github.com/CeriseGoutPelican/SimpleRedirectionPhpgraphs/commit-activity) ![Maintaner](https://img.shields.io/badge/Maintainer-Grégoire-blue) [![made-with-php](https://img.shields.io/badge/Made%20with-Php-1f425f.svg)](https://www.php.net/) [![made-with-php](https://img.shields.io/badge/Made%20with-Tailwind-1f425f.svg)](https://tailwindcss.com/)

## Screenshots
[![1](https://user-images.githubusercontent.com/26883777/110021727-65ce0b80-7d2b-11eb-9b51-c470bbd7e6dd.png)](https://user-images.githubusercontent.com/26883777/110021609-41722f00-7d2b-11eb-99ce-0f1090ab15e9.png) [![2](https://user-images.githubusercontent.com/26883777/110021729-6666a200-7d2b-11eb-979d-073b95489467.png)](https://user-images.githubusercontent.com/26883777/110021612-420ac580-7d2b-11eb-92fe-1d1dda7634da.png) [![3](https://user-images.githubusercontent.com/26883777/110021732-66ff3880-7d2b-11eb-8edc-807bd97a8609.png)](https://user-images.githubusercontent.com/26883777/110021613-420ac580-7d2b-11eb-88d6-a73590988fda.png) [![4](https://user-images.githubusercontent.com/26883777/141678805-ab48ce7c-08e9-4744-bdc7-81bfa9fd3100.png)](https://user-images.githubusercontent.com/26883777/141678776-c525bf71-acf8-4746-8a6c-e07996829a59.png)

## Setup
### Installation
There are no dependencies or databases. To start, you just have to clone this repository!

```bash
$ https://github.com/CeriseGoutPelican/SimpleRedirectionPhp.git
$ git@github.com:CeriseGoutPelican/SimpleRedirectionPhp.git
```

### Configuration
First, from the `./data/` folder, you need to edit the `logins.php.default` and `redirections.json.default` files by removing the `.default'.

In the `logins.php` file, you need to edit the login by adding yours. By default, the admin login is `admin@admin.com` and `passsword`.

> ℹ️ The password needs to by hashed with SHA-256.

```php
$logins = [
	'admin@admin.com' 
		=> '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8',
];
```

### Serveur adress
Your domain name must not point to the root of the project but to the `./public` folder.

## Licence
Creative Commons Attribution 4.0 [![licensebuttons by](https://licensebuttons.net/l/by/3.0/88x31.png)](https://creativecommons.org/licenses/by/4.0)

## Versions
### Changes

**Version 1.1**
 * Tracking clicks by IP address
 * Chart of the number of clicks over the last 30 days
 * Improvement of the mobile version

### Next improvements
 * Cleaning Tailwind to improve performance
 * Adding a menu of options to enable or disable ip tracking
