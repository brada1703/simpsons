<p align="center"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/98/The_Simpsons_yellow_logo.svg/2880px-The_Simpsons_yellow_logo.svg.png" width="400" alt="The Simpsons"></p>

## Features

#### Quotes
- View paginated and randomly sorted quotes
- Search for quotes by text
- Get quotes by character

#### Characters
- View particular character
- Upon error, redirect to "characters" page

## Technology
- Laravel 10.13
- Vue 3.2
- Vite 4.3.9
- Tailwind 3.3.2
- Cypress

## Get Started
- Clone project
- Run `composer install` and `npm install` to install dependencies
- Run `php artisan migrate --seed` to create and seed the database
- Run `npm run dev` to start Vite
- Set up [Laravel Valet](https://laravel.com/docs/10.x/valet)
- Open simpsons.test in your browser


## Note
- Cypress supports Node.js versions 14, 16, and 18+

## Test
- Backend: `php artisan test` with PHP Unit
- Frontend: `npx cypress open` with Cypress