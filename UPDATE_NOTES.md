# AIRE site update — what changed and what you still need to do

## TL;DR

Two of your four requests are **fully done in the theme code** (no further action).
The other two are **per-program content that lives in the WordPress database**, not in
theme files — so the theme now *supports* them, but you have to set the actual values
in **wp-admin → Programs**. Details below.

---

## ✅ Done in code (just deploy the theme)

### 1. Removed "Before You Apply — Important to know" section
Deleted the entire `.disclosures` section from `front-page.php`. The three disclosure
cards (Bachelor's degree required / BPPE-approved / No job placement) no longer render
on the homepage. (The `aire_get_disclosures()` helper is left in place in
`inc/template-tags.php` in case you want those statements elsewhere — it's just no
longer called.)

### 3. Updated the hero tagline
Now reads: **"Online certificate programs in AI, Robotics and EV in 10 weeks, taught by
PhD and Masters faculty. Approved to operate by the California BPPE."**
I kept the faculty + BPPE clause because the BPPE approval line is a compliance
statement. If you want *only* "Online certificate programs in AI, Robotics and EV in 10
weeks" with nothing after it, say so and I'll trim it.

---

## ⚠️ Needs your action in wp-admin (theme now supports it, values live in the DB)

Your programs are stored as **Program posts** (custom post type), not in the theme.
The files you sent me contained an older 4-program version (Electric Vehicle, Autonomous
Driving, ML&AI, Advanced Robotics), but the **live site has 6 programs**:

1. AI & Machine Learning Developer
2. Data Center Technician
3. EV & Clean Energy Technician
4. EV Charger Certification (EVITP-Level 2 Aligned)
5. EV Technician Program
6. Robotics & Automation Machine Operator

Because of that, I can't set per-program values from theme files alone. Here's what I
added and what you do:

### 2. Enrolling Now vs. Coming Soon

**New in code:** a per-program **"Enrollment status"** dropdown (Enrolling now / Coming
soon) in the *Program details* meta box. It now drives:
- A badge on each homepage program card.
- A status pill + gated "Add to cart" button on each single-program page (Coming Soon
  programs show a disabled "Coming soon" button and a "Get notified" link instead of a
  buyable cart button).
- A status label on the `/programs/` archive rows.

**What you do — for each program, edit the post and set the dropdown:**
- AI & Machine Learning Developer → **Enrolling now**
- EV Technician Program → **Enrolling now**
- Robotics & Automation Machine Operator → **Enrolling now**
- Data Center Technician → **Coming soon**
- EV & Clean Energy Technician → **Coming soon**
- EV Charger Certification → **Coming soon**

> Default if unset: "Enrolling now". So you only strictly *need* to flip the three
> Coming Soon programs — but set all six to be safe.

### 4. Tuition prices

**Why the cards currently show $0:** tuition is a per-program field (`_aire_tuition`),
and the 6 live program posts don't have it filled in.

**What you do — edit each program, set "Tuition (USD)" in the Program details meta box:**
- AI & Machine Learning Developer → **8500**
- Robotics & Automation Machine Operator → **8000**
- EV Technician Program → **12000**

(Enter the number only, no `$` or comma — the theme formats it as `$8,500` etc.)

The other three are Coming Soon, so tuition is optional for them.

---

## After you make the wp-admin changes

If anything doesn't show up, go to **Settings → Permalinks** and click **Save Changes**
once to flush rewrite rules.

---

## A heads-up on the Catalog page (`page-catalog.php`)

The BPPE catalog page has a **hardcoded** tuition table and program descriptions still
listing the *old* 4 programs (Advanced Robotics, Autonomous Driving, Electric Vehicle,
ML&AI). The dollar amounts there already happen to match your numbers
($8,000 / $12,000 / $8,500), but the **program names and module tables are out of date**
relative to the live 6-program lineup. I did **not** rewrite that page, because it's
compliance-sensitive BPPE catalog copy and rewriting six full program descriptions
wasn't part of this request. Let me know if you want me to bring the catalog in line with
the current programs.

---

## Files changed
- `front-page.php` — removed disclosures section; new tagline; status badges on cards;
  show all programs (was capped at 4); softened "four programs" copy.
- `single-aire_program.php` — status pill; gated cart button for Coming Soon.
- `archive-aire_program.php` — status label on each row.
- `inc/post-types.php` — new "Enrollment status" meta field (UI + save).
- `inc/template-tags.php` — `aire_get_status()`, `aire_is_enrolling()`,
  `aire_status_label()` helpers.
- `assets/css/main.css` — badge/pill styles for enrolling vs. coming soon.
