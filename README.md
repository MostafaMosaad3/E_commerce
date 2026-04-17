# E_commerce

A full-featured e-commerce web application built with **Laravel**. Users can browse products, manage their cart, and complete a smooth checkout flow, while administrators get rich tools to manage catalog, orders, and customers.

## Features

- Multi-guard authentication (customer / admin)
- Social login (Google, Facebook) via Laravel Fortify
- Queued email & notification jobs
- Google Maps integration for address selection and delivery
- 3-language support (English, Arabic, French) with full RTL handling
- Shopping cart, checkout, and order management
- Admin dashboard for products, categories, orders, and users

## Tech Stack

- **Backend:** Laravel, PHP 8.x
- **Database:** MySQL
- **Auth:** Laravel Fortify, Sanctum
- **Queues & Jobs:** Laravel Queues (database / redis driver)
- **Frontend:** Blade, Tailwind / Bootstrap, JavaScript
- **Integrations:** Google Maps API, social OAuth providers

## Requirements

- PHP >= 8.1
- Composer
- MySQL >= 8.0
- Node.js & npm

## Installation

```bash
# 1. Clone the repository
git clone https://github.com/MostafaMosaad3/E_commerce.git
cd E_commerce

# 2. Install dependencies
composer install
npm install && npm run build

# 3. Configure environment
cp .env.example .env
php artisan key:generate

# 4. Set DB credentials and Google / OAuth keys in .env, then:
php artisan migrate --seed
php artisan storage:link

# 5. Run queue worker (in a separate terminal)
php artisan queue:work

# 6. Serve the application
php artisan serve
```

## Languages

Language files live in `lang/`. To switch the default locale, update `APP_LOCALE` in `.env` or use the in-app language switcher.

## License

This project is released under the MIT License.

---

Built by [Mostafa Mosaad](https://github.com/MostafaMosaad3)
