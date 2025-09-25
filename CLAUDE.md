# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel 12 web application for Techlavate Solutions, a software consulting company. The project includes:

- **Framework**: Laravel 12 (PHP 8.2+)
- **Frontend**: Blade templates with Tailwind CSS, Alpine.js, and Vite
- **Authentication**: Laravel Breeze
- **Testing**: Pest PHP
- **Code Quality**: Laravel Pint for formatting

## Development Commands

### Primary Development
```bash
composer run dev          # Start all development services (server, queue, logs, vite)
php artisan serve        # Start Laravel development server only
npm run dev              # Start Vite development server
```

### Testing and Quality
```bash
composer run test        # Clear config and run Pest tests
php artisan test         # Run tests directly
./vendor/bin/pint        # Format code with Laravel Pint
```

### Database
```bash
php artisan migrate      # Run database migrations
php artisan migrate:fresh --seed  # Fresh migration with seeding
```

### Build and Deploy
```bash
npm run build           # Build assets for production
php artisan config:cache  # Cache configuration for production
php artisan route:cache   # Cache routes for production
```

## Application Architecture

### Core Business Logic
- **QuoteController**: Handles quote request submissions with email notifications
- **ContactController**: Manages contact form submissions
- **NewsletterController**: Handles newsletter subscriptions
- **Mail Classes**: Automated email notifications for admin and users

### Frontend Structure
- **Static Pages**: About, Services, Industries, FAQ, Implementation Strategy
- **Dynamic Forms**: Quote requests, contact forms, newsletter signup
- **Authentication**: Login/register with Laravel Breeze
- **Styling**: Tailwind CSS with Alpine.js for interactivity

### Data Models
- **User**: Standard Laravel authentication model
- **QuoteRequest**: Stores quote submissions with JSON services field
- **Contact/Newsletter**: Form submission models with email notifications

### Email Configuration
Quote and contact submissions trigger dual emails (admin notification + user confirmation). Admin emails go to `limokip07@gmail.com`.

### Route Structure
- Static routes use `Route::view()` for simple page rendering
- POST routes handle form submissions with JSON responses
- Fallback route returns custom 404 page
- Authentication routes via `auth.php`