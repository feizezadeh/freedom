# Agent Guidelines for Doktoryab Clone Project

This document provides guidelines for AI agents working on this PHP-based online medical platform.

## 1. Project Overview

The platform connects patients with healthcare providers, offering doctor search, appointment booking, and insurance integration. We are using PHP, MySQL, AJAX, and Bootstrap.

## 2. Coding Style & Conventions

*   **PHP:**
    *   Follow **PSR-12 (Extended Coding Style Guide)**.
    *   Use namespaces for all classes (e.g., `App\Controllers`, `App\Models`, `App\Core`).
    *   Use type hinting where appropriate (PHP 7.0+ features).
    *   Employ strict types `declare(strict_types=1);` at the beginning of PHP files where appropriate, especially for new classes.
    *   Comments: Use PHPDoc blocks for classes, methods, and properties. Use inline comments for complex logic.
*   **HTML:**
    *   Use semantic HTML5 tags.
    *   Ensure code is well-indented and readable.
    *   Validate HTML where possible.
*   **CSS:**
    *   Use Bootstrap utility classes as much as possible.
    *   For custom styles, create a `public/css/style.css` and link it in the main layout. Keep custom CSS modular and well-commented.
*   **JavaScript:**
    *   Write clean, readable, and maintainable JavaScript.
    *   Use vanilla JS where possible, or jQuery if already included and necessary.
    *   For AJAX calls, create helper functions if making many similar calls.
    *   All custom JS should ideally go into `public/js/main.js` or feature-specific JS files, included in the layout or specific views as needed.
*   **SQL:**
    *   Use uppercase for SQL keywords (SELECT, FROM, WHERE, etc.).
    *   Use backticks for table and column names if they might conflict with reserved words or contain special characters (though try to avoid such names).
    *   Prefer prepared statements (using PDO) for all database interactions to prevent SQL injection.

## 3. Directory Structure

Adhere to the established directory structure:
*   `app/`: Core PHP application logic.
    *   `Core/`: Base classes, router, database connection.
    *   `Controllers/`: Request handling.
    *   `Models/`: Database interaction.
    *   `Views/`: Presentation files (PHP templates).
*   `public/`: Web root, assets (CSS, JS, images), `index.php`.
*   `config/`: Configuration files.
*   `lib/` or `vendor/`: Third-party libraries (if not using Composer).
*   `tests/`: PHPUnit tests.
*   `docs/`: Project documentation.

## 4. Database

*   **Schema Migrations:** Currently, there's no formal migration system. For now:
    *   Any schema changes (CREATE TABLE, ALTER TABLE) should be documented in `docs/database_schema.sql` or a similar file.
    *   Clearly state the changes made when submitting code that involves database schema modifications.
    *   We may implement a basic migration script or use a library like Phinx later.
*   **Data Integrity:** Ensure foreign key constraints are used where appropriate. Validate data before inserting/updating.

## 5. Error Handling and Logging

*   Use try-catch blocks for operations that can fail (e.g., database queries, API calls).
*   In `development` mode (see `config/config.php`), errors can be displayed directly.
*   In `production` mode, errors should be logged to a file (e.g., in a `logs/` directory - ensure it's writable by the web server but not publicly accessible) and a generic error message shown to the user.
*   The `config.php` file controls error display settings.

## 6. Security

*   **SQL Injection:** Always use prepared statements (PDO).
*   **XSS (Cross-Site Scripting):** Sanitize all user output. Use `htmlspecialchars()` or a templating engine that handles this automatically.
*   **CSRF (Cross-Site Request Forgery):** Implement CSRF tokens for all POST, PUT, DELETE requests that modify state. (To be added later)
*   **Data Validation:** Validate all incoming data (from users, APIs) on the server-side.
*   **File Uploads:** Handle file uploads securely (check types, sizes, scan for malware, store outside web root if possible).
*   **Authentication & Authorization:** Implement robust mechanisms. Passwords must be hashed securely (e.g., `password_hash()` and `password_verify()`).

## 7. API Integration (Insurance Providers)

*   This is a critical component.
*   All API interaction logic should be encapsulated in specific classes (e.g., `App\Services\Insurance\ProviderNameAPI.php`).
*   Store API keys and sensitive credentials in `config/config.php` (or environment variables if the deployment setup allows, which is preferred for production). Do NOT commit actual secret keys to the repository if it's public. Use placeholder values in `config.php` and provide real keys in the deployment environment.
*   Handle API errors gracefully (timeouts, invalid responses, rate limits).

## 8. Testing

*   Aim to write unit tests for new classes and methods, especially in Models and Core components.
*   PHPUnit will be the testing framework. Tests go in the `tests/` directory.
*   (Future) Integration tests for critical user flows.

## 9. Version Control (Git)

*   Commit messages should be clear and follow conventional commit style if possible (e.g., `feat: Add user registration`, `fix: Correct login bug`).
*   Create feature branches for new features or significant changes.
*   Ensure the `main` or `master` branch is always stable.

## 10. Bootstrap Usage

*   Utilize Bootstrap 5 classes for UI components and layout as much as possible to maintain consistency.
*   Refer to Bootstrap documentation for components and utilities.
*   Minimize custom CSS unless necessary for unique styling not achievable with Bootstrap.

## 11. AJAX Usage

*   Use AJAX for dynamic content updates where appropriate (e.g., checking appointment availability, real-time insurance validation).
*   Ensure graceful degradation if JavaScript is disabled (where feasible, though this is a web app).
*   Return JSON responses from PHP backend for AJAX requests.

## 12. Task-Specific Instructions

*   Always refer to the user's request and the project plan for specific task details.
*   If a task involves UI changes, describe the changes and how they align with the UX/UI guidelines.
*   If a task involves database changes, update `docs/database_schema.sql` and mention it.

This document will be updated as the project evolves.
