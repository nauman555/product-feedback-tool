# Product Feedback Tool

## Overview

This web-based Product Feedback Tool is built using Laravel and allows users to submit, view, and vote on product feedback. 
Note:
To access the admin panel:
Manually update the is_admin column in the users table for the desired user(s) to grant admin privileges.

## Features

### User Authentication

- Implemented user authentication and authorization.
- Users can register, log in, and log out.
- Only authenticated users can submit feedback , comment  and vote on existing feedback.

### Feedback Submission

- Created a user-friendly form for submitting feedback.
- Feedback includes a title, description, and a category (e.g., bug report, feature request, improvement, others.).
- Implemented validation to ensure required fields are filled out.

### Feedback Listing

- Display feedback items in a paginated list.
- Each feedback item displays its title, category, vote count, comment count, and the user who submitted it.

### Commenting System

- Registered users can leave comments on feedback items.
- Comments include the user's name, date, and content.

### Admin Panel
	NOTE:    To access the admin panel:
Manually update the is_admin column to (1) in the users table for the desired user(s) to grant admin privileges.


- Created an admin panel with appropriate authentication.
- Admins can delete feedback items and enable / disable comments on Feedback.
- Admins can list and delete users.

## Getting Started

### Prerequisites

- PHP >= 7.3
- Laravel 
- MySQL database
- Composer for package management
- npm or node js 
### Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/yourusername/product-feedback-tool.git

2.	Install PHP dependences:
composer install
3.	Install JavaScript dependencies:
	npm install
4.	Copy the .env.example file to .env and configure your database settings.
5.	Generate application key:
	php artisan key:generate
6.	Run migrations and seed the database:
	php artisan migrate –seed
7.	Compile assets:
	npm run dev
8.	Serve the application:
php artisan serve
Visit http://127.0.0.1:8000 in your browser.
