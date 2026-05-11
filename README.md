# AIRE Redesign

A custom WordPress theme for **AI Roboto EDU** — a BPPE-approved online certificate school offering programs in artificial intelligence, robotics, autonomous driving, and electric vehicles.

Hand-built, no page builder dependency. Designed to be edited in VS Code and deployed to any WordPress install.

> **Status: work in progress.** The current AI Roboto Edu website is being actively rebuilt with this theme. Expect ongoing changes to templates, content, and styling.

## Preview

The theme includes:

- **Homepage** with hero, career path grid, government partnership cards, BPPE disclosures, and newsletter signup
- **Programs archive** (`/programs/`) listing all certificate programs
- **Single program template** with sidebar, tuition, and module breakdown
- **Course Catalog** — full BPPE-compliant catalog page with sticky TOC, tuition tables, faculty, and required disclosures
- **Cart & Checkout** — client-side fake cart (localStorage) with add-to-cart from program pages, cart page with quantity controls, and a demo checkout form. Not connected to a real payment gateway.
- **Site-wide animations** — hero entrance fade-up, scroll-triggered section reveals via Intersection Observer, hover polish on cards/buttons/pills, gentle hero shield float. Respects `prefers-reduced-motion`.
- **Generic page template** for things like Admissions, About, Privacy Policy

## Requirements

- WordPress 6.0+
- PHP 7.4+
- A modern browser (the theme uses CSS custom properties and grid)

## Quick start

```bash
# Clone into your wp-content/themes folder
cd path/to/wp-content/themes
git clone https://github.com/YOUR-USERNAME/aire-redesign.git
```

Then in WP Admin: **Appearance → Themes → Activate "AIRE"**.

For a full walkthrough including FTP/zip upload, see [`INSTALL.md`](./INSTALL.md).

## Setting up content

The theme is just the presentation layer — WordPress content (programs, pages, menus) lives in the database and needs to be created after activation.

See [`SEED_DATA.md`](./SEED_DATA.md) for the program data, page slugs, meta fields, and menu structure needed to populate a fresh install.

At minimum, you'll want to:

1. Create a **Course Catalog** page in WP Admin (slug: `catalog`, template: "Course Catalog")
2. Create a **Cart** page (slug: `cart`, template: "Cart")
3. Create a **Checkout** page (slug: `checkout`, template: "Checkout")
4. Set **Settings → Reading → Front page** to a static page
5. Create one **Program** post per certificate (Advanced Robotics, Autonomous Driving, Electric Vehicle, ML & AI) with the meta fields from `SEED_DATA.md`
6. Set permalinks to **Post name** under **Settings → Permalinks**

## File structure

```
aire-redesign/
├── style.css                       WordPress-required theme header
├── functions.php                   Theme bootstrap, asset loading, menus
├── header.php                      Site header (every page)
├── footer.php                      Site footer (every page)
├── front-page.php                  Homepage
├── page.php                        Generic page template
├── page-catalog.php                Course Catalog template (BPPE disclosure page)
├── page-cart.php                   Cart page template
├── page-checkout.php               Checkout page template (demo, no payment)
├── single-aire_program.php         Single program (e.g. /programs/electric-vehicle/)
├── archive-aire_program.php        /programs/ listing
├── index.php                       Required fallback
├── inc/
│   ├── post-types.php              "Program" custom post type + admin meta box
│   └── template-tags.php           Helpers (shield logo, faculty list, formatters)
└── assets/
    ├── css/main.css                All site styling
    └── js/
        ├── cart.js                 localStorage cart logic
        └── animations.js           Intersection Observer scroll reveals
```

## Design tokens

Colors and typography are CSS custom properties at the top of `assets/css/main.css`:

```css
:root {
  --ink: #0a0a0a;
  --blue: #1556B0;
  --blue-dark: #0E3F82;
  --red: #A92A2A;
  --paper: #f7f7f5;
  /* ... */
}
```

Edit these to change the site's color palette globally. The typeface is Inter, loaded from Google Fonts in `functions.php`.

## Development

The theme is plain PHP, CSS, and HTML — no build step.

```bash
# Edit a file
code assets/css/main.css

# Refresh the browser to see changes
```

For local development, [Local by Flywheel](https://localwp.com/) is the easiest way to run WordPress on macOS without configuring Apache/MySQL by hand.

## Roadmap

- **WooCommerce integration** — The current cart and checkout are client-side only (localStorage). The live AI Roboto Edu site uses WooCommerce for real transactions, so a future iteration will swap the fake cart for WooCommerce-managed products, cart, checkout, and payment gateways.
- **Mobile nav** — The primary nav currently hides on screens under 768px; a hamburger menu is planned.
- **Real apply/enrollment flow** — Today the Get Started and Apply buttons point to a stub `/apply/` URL. Hook this up to whichever form provider AIRE uses (Gravity Forms, Formidable, etc.).

## License

Proprietary — © AI Roboto Edu LLC. Not for redistribution without permission.