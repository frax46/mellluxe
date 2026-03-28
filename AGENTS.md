# Mell Luxe WordPress Theme

## Overview

Custom WordPress/WooCommerce theme for a luxury vegan beauty/skincare e-commerce store. No build tools, no Node.js, no package manager — pure PHP, CSS, and JS.

## Cursor Cloud specific instructions

### Services

| Service | How to start |
|---|---|
| MariaDB | `sudo service mariadb start` |
| Apache | `sudo service apache2 start` |

Both must be running before the site works at `http://localhost/`.

### WordPress setup

- WordPress is installed at `/var/www/html/`.
- The theme is symlinked: `/var/www/html/wp-content/themes/mellluxe` → `/workspace`.
- WP admin: `http://localhost/wp-admin/` — user `admin`, password `admin123`.
- WooCommerce is installed and activated with "coming soon" mode disabled.
- Three sample products exist (Lavender Bath Bomb, Rose Facial Oil, Gift Set Collection).

### Linting

Run PHP syntax checks on all theme files:

```sh
cd /workspace && find . -name "*.php" -exec php -l {} \;
```

There is no automated test suite in this repository.

### Key gotchas

- **WooCommerce "coming soon" mode**: WooCommerce may default to "coming soon" on fresh installs. Disable with: `wp option update woocommerce_coming_soon no --allow-root --path=/var/www/html`.
- **`.htaccess`**: Pretty permalinks require a valid `.htaccess` at `/var/www/html/.htaccess` with `mod_rewrite` enabled. If the shop 404s, check this file exists.
- **`content-product.php` line 71**: There is a stray `?>` that causes a harmless extra closing tag in the HTML. Do not remove it unless fixing is the explicit task (existing code).
- **ACF / WPForms plugins**: Not installed by default. The home page and footer degrade gracefully without them (empty ACF fields, shortcode shown as text).
- **Theme changes are live**: Since the theme directory is symlinked from `/workspace`, any PHP/CSS/JS edits are immediately reflected on page reload — no build step needed.
