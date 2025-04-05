# Sage Starter Theme by Bora Bey Sarikaya

Note: This project uses [Lando](https://lando.dev) for local development. If you don't want to use Lando, you can still set up WordPress manually with your own local server stack (e.g. MAMP, XAMPP, Laravel Valet).

A clean and simple WordPress theme setup using classic structure (no Bedrock), with:

- Composer for PHP dependencies
- Lando for local development
- Sage + Acorn (Roots stack) for theming

The goal is to create a reusable and easy-to-start base theme that anyone can use, fork, or extend.

---

## Project Setup (Lando)

### 1. Clone the repo

```bash
git clone https://github.com/your-name/sage-starter-theme.git
cd sage-starter-theme
```

### 2. Start Lando

```bash
lando start
```

### 3. Install WordPress & set up config

```bash
lando wp core download
lando wp config create --dbname=wordpress --dbuser=wordpress --dbpass=wordpress --dbhost=database
lando wp db create
lando wp core install \
  --url=http://sage-starter-theme.lndo.site \
  --title="Sage Starter Theme" \
  --admin_user=admin \
  --admin_password=admin \
  --admin_email=admin@example.com
```

Now you can open: [http://sage-starter-theme.lndo.site] in your browser.

---

## Theme Setup (Sage)

### 1. Go to the theme folder

```bash
cd wp-content/themes/sage-starter-theme
```

### 2. Install Composer dependencies

```bash
lando composer install
```

### 3. Install JS dependencies and build assets

```bash
lando npm install
lando npm run build
```

After building assets, run:

```bash
lando restart
```

This ensures all changes are picked up by the dev server.

Note: This repository does **not** include the default WordPress themes (like TwentyTwentyThree). After installing WordPress, make sure to activate the `sage-starter-theme` manually:

```bash
lando wp theme activate sage-starter-theme
```

---

## What does what? (Composer, npm, Vite)

To clarify the tools this theme uses:

| Tool     | Purpose                               | Command                  |
|----------|----------------------------------------|--------------------------|
| Composer | Handles PHP dependencies like Acorn    | `lando composer install` |
| npm      | Handles JavaScript packages and build  | `lando npm install`      |
| Vite     | Fast build tool for assets (JS/CSS)    | `lando npm run build`    |

You don’t need `yarn` – this setup uses `npm` by default.

---

## Lando Tips

If you make changes to the `.lando.yml` file, run:

```bash
lando rebuild
```

This will apply the new configuration properly.

---

## Folder Structure

```text
├── wp-config.php
├── wp-content
│   ├── themes
│   │   └── sage-starter-theme
│   └── uploads/.gitkeep
├── .lando.yml
├── .gitignore
├── .deployignore
└── README.md
```


