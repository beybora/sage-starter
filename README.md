# Sage Starter Theme by Bora Bey Sarikaya

Note: This project uses [Lando](https://lando.dev) for local development. If you don't want to use Lando, you can still set up WordPress manually with your own local server stack.

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
composer install
```

### 3. Install JS dependencies and build assets

```bash
npm install
npm run build
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

| Tool     | Purpose                               | Command            |
| -------- | ------------------------------------- | ------------------ |
| Composer | Handles PHP dependencies like Acorn   | `composer install` |
| npm      | Handles JavaScript packages and build | `npm install`      |
| Vite     | Fast build tool for assets (JS/CSS)   | `npm run build`    |

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
│   ├── plugins
│   │   └── custom-gutenberg-blocks
│   └── uploads/.gitkeep
├── .lando.yml
├── .gitignore
├── .deployignore
└── README.md
```

---

## Custom Gutenberg Blocks

This theme includes support for custom Gutenberg blocks via a plugin (`wp-content/plugins/custom-gutenberg-blocks`). Each block is structured as follows:

```text
custom-gutenberg-blocks/
├── blocks/
│   └── my-block/
│       ├── block.json
│       ├── index.js
│       ├── edit.js
│       ├── render.php
│       └── styles.css
```

### Build the blocks

Blocks must be compiled before deployment:

```bash
cd wp-content/plugins/custom-gutenberg-blocks
npm install
npm run build
```

Include this step in your deploy workflow if needed.

---

## Custom Post Types (CPT)

This theme supports custom post types (registered in `app/PostTypes/`). Example: `press_release`.

```php
register_post_type('press_release', [
    'labels' => [
        'name' => 'Press Releases',
        'singular_name' => 'Press Release',
    ],
    'public' => true,
    'has_archive' => true,
    'supports' => ['title', 'editor', 'thumbnail'],
    'show_in_rest' => true,
]);
```

---

## Deployment Strategy

I recommend deploying only your `wp-content/` folder via rsync/GitHub Actions and leaving core WordPress files on the server. This avoids overwriting settings, plugins or uploads.

Use a `.deployignore` file to control what gets deployed. You can safely exclude files like:

```text
node_modules/
public/build/
vendor/
*.log
*.map
*.asset.php
```

Your GitHub Action should install Composer + npm dependencies in the theme folder, build assets, and deploy using rsync.
See `/.github/workflows/deploy.yml` for a working example.

---

## License & Credits

Forked and inspired by the Roots stack (https://roots.io/sage/)

You’re free to use this as a base for your own theme.

Built and maintained by Bora Bey Sarikaya
