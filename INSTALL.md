# AIRE Theme — Installation & Setup

A custom WordPress theme for AI Roboto Edu. No page builder dependency. Edit in VS Code, push to the server, refresh.

## What's in this theme

```
aire-theme/
├── style.css                         WordPress-required theme header
├── functions.php                     Theme bootstrap, asset loading
├── header.php                        Site header (every page)
├── footer.php                        Site footer (every page)
├── front-page.php                    Homepage
├── single-aire_program.php           One program (e.g. /programs/electric-vehicle/)
├── archive-aire_program.php          /programs/ listing page
├── page.php                          Generic pages (About, Admissions, etc.)
├── index.php                         Required fallback template
├── inc/
│   ├── post-types.php                "Program" custom post type + admin meta box
│   └── template-tags.php             Helpers (shield logo, faculty data, formatters)
└── assets/
    ├── css/main.css                  All site styling (CSS variables for colors)
    └── images/                       (Empty — drop logo, OG images, favicons here)
```

## Installation

### Option A — FTP / cPanel upload

1. Zip this folder so you have `aire-theme.zip` containing the `aire-theme/` directory.
2. Log into the AIRE site host (whoever's managing the WP install).
3. Upload `aire-theme.zip` to `/wp-content/themes/` and extract there. You should end up with `/wp-content/themes/aire-theme/` containing all the PHP files.
4. In `wp-admin` go to Appearance → Themes. The "AIRE" theme should now appear.
5. Click Activate.

### Option B — Upload through wp-admin

1. Zip the folder as above.
2. In `wp-admin` go to Appearance → Themes → Add New → Upload Theme.
3. Choose `aire-theme.zip`, click Install Now, then Activate.

## First-time setup (do this once after activating)

### 1. Permalinks

Go to Settings → Permalinks and click Save. This regenerates the URL rewrite rules for the new "Program" post type so `/programs/electric-vehicle/` actually resolves.

### 2. Reading settings

Go to Settings → Reading. Set "Your homepage displays" to "A static page" and pick the page you want as the homepage. The theme uses `front-page.php` automatically.

### 3. Add the four programs

Go to Programs → Add New in the sidebar. Create one post per program using the data in `SEED_DATA.md`. The admin form has fields for short code, hours, weeks, tuition, SOC code, accent color, and tagline.

### 4. Set up the navigation menus (optional but recommended)

Appearance → Menus. Create four menus:
- **Primary** (header): Course List, Catalog
- **Footer — Programs**: links to all four programs
- **Footer — School**: Course List, Catalog, Admissions, Faculty
- **Footer — Required**: Disclaimer, BPPE (https://www.bppe.ca.gov), Fact Sheet, STRF

Assign each to its corresponding theme location.

If you skip this step, the theme uses sensible fallback links so nothing will be broken — it'll just be slightly less editable from the admin.

### 5. Site logo

Appearance → Customize → Site Identity → Logo. Upload the AIRE shield. The header currently uses an inline SVG so the logo upload is optional — but Customizer logo support is wired up if you want to swap to a custom image.

### 6. Catalog PDF

Upload the latest BPPE-filed catalog PDF to Media. Then edit `front-page.php` and `header.php` and replace the `href="#"` on "View catalog" / "Catalog" links with the media URL.

## Local development

If you want to preview locally before pushing to the live site:

1. Install [Local](https://localwp.com) (free WP development tool).
2. Create a new site.
3. Drop this `aire-theme/` folder into `app/public/wp-content/themes/`.
4. Activate it in wp-admin.
5. Edit files in VS Code, refresh browser to see changes.

## Editing styles

All CSS is in `assets/css/main.css`. Color tokens are at the top:

```css
:root {
  --blue: #1556B0;     /* primary action color */
  --red: #A92A2A;      /* secondary accent */
  --ink: #0a0a0a;      /* dark surfaces */
  --paper: #f7f7f5;    /* soft section backgrounds */
}
```

Change a token and every instance updates. Section styles are organized by template — search for the section name in the comments at the top of the file to find what you're looking for.

## Editing templates

Each PHP file is self-contained and heavily commented. The pattern across templates:

```php
get_header();    // loads header.php
// Page content here
get_footer();    // loads footer.php
```

Helper functions live in `inc/template-tags.php`. The shield logo, faculty data, disclosures, and price formatter are all there.

## What's NOT included

- **Apply form** — the homepage links `/apply/` but no template exists yet. You'll want to either build a custom page in `page.php` with a form plugin (Gravity Forms, WPForms, Fluent Forms) or write `page-apply.php` for a custom layout.
- **Performance fact sheets page** — links to `/performance/` from the footer but no template. Either create a WP page with the fact sheet PDFs linked, or write `page-performance.php`.
- **Newsletter integration** — the form on the homepage POSTs to `#`. Wire it to Mailchimp / ConvertKit / your provider in `front-page.php`.
- **WooCommerce compatibility** — the existing AIRE site has a placeholder shop and cart. This theme doesn't style WooCommerce templates. If you want to keep the shop functional, either add WooCommerce support later or remove the cart icon from `header.php` (line ~31).

## Three things to confirm before going live

These came up during the design and need a leadership decision:

1. **Government partnership wording** — current text only claims curriculum *alignment*, which is defensible from the catalog. If AIRE has documented federal agreements (DOL apprenticeship sponsor number, DOE grant, etc.), update `front-page.php` lines ~95–115 to be specific.

2. **Apprenticeship box** — currently labeled "Coming soon" since apprenticeships aren't in the BPPE catalog. If they're actually filed and approved, change `Now enrolling` and update the body copy in `front-page.php` around line ~52.

3. **Industries pill list in hero** — trimmed from the current site's six industries to AIRE's four real programs. If leadership wants the broader list back, edit the `.industries-row` block in `front-page.php` around line ~25.
