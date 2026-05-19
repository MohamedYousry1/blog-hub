# Blog Hub

A personal blog web application built with **PHP** and **MySQL**, styled with the [TemplateMo Sixteen Clothing](https://templatemo.com/tm-546-sixteen-clothing) theme. The project provides pages to list, view, add, and edit posts, with a database schema ready for full CRUD and user accounts.

> **Status:** Early development — UI and database schema are in place; backend logic (DB connection, auth, form handling) is still to be implemented.

---

## Features

| Feature | Status |
|---------|--------|
| Post listing (home page) | UI ready (static placeholders) |
| View single post | UI ready (static content) |
| Add new post (title, body, image) | Form UI ready |
| Edit post | Form UI ready |
| Delete post | Link present; handler not implemented |
| User accounts & login | Schema defined; not wired in PHP |
| English / Arabic switch | Nav placeholders only |

---

## Tech Stack

- **PHP** — server-side pages (no framework)
- **MySQL** — `users` and `posts` tables
- **Bootstrap 4** — layout and components
- **jQuery 3** — theme scripts and carousels
- **Font Awesome 4** — icons
- **XAMPP** — local development (Apache + MySQL)

---

## Requirements

- [XAMPP](https://www.apachefriends.org/) (or equivalent: Apache, PHP 7.4+, MySQL/MariaDB)
- A web browser

---

## Installation

1. **Clone or copy** the project into your web root:
   ```
   c:\xampp\htdocs\blog-hub
   ```

2. **Start** Apache and MySQL from the XAMPP Control Panel.

3. **Create the database** (phpMyAdmin or MySQL CLI):
   - Create a database, e.g. `blog_hub`
   - Import `db/queries.sql` to create tables and seed sample data

4. **Open in the browser:**
   ```
   http://localhost/blog-hub/
   ```

5. *(Optional)* Create an `uploads/` folder at the project root with write permissions for future image uploads.

---

## Project Structure

```
blog-hub/
├── index.php          # Home — latest posts
├── viewPost.php       # Single post detail
├── addPost.php        # Create post form
├── editPost.php       # Edit post form
├── about.php          # About page (template)
├── contact.php        # Contact page (template)
├── inc/
│   ├── header.php     # Head, navbar
│   └── footer.php     # Footer, scripts
├── db/
│   └── queries.sql    # Schema + seed data
├── assets/            # CSS, JS, images, fonts
├── vendor/            # Bootstrap, jQuery
└── docs/
    └── full-doc.md    # Detailed codebase reference
```

---

## Pages

| URL | Description |
|-----|-------------|
| `/index.php` | All posts (home) |
| `/viewPost.php` | Post detail |
| `/addPost.php` | Add new post |
| `/editPost.php` | Edit post |
| `/about.php` | About / team (static) |
| `/contact.php` | Contact form (static) |

---

## Database

Import `db/queries.sql` to set up:

- **`users`** — name, email, password (bcrypt), phone
- **`posts`** — title, body, image filename, `user_id`, timestamps

Seed data includes a test user and three sample posts. Use seed credentials **only for local development**.

---

## Development Notes

- Layout uses `require_once` for `inc/header.php` and `inc/footer.php` on each page.
- Planned image storage: `uploads/{filename}` (folder not included yet).
- `deletePost.php` is referenced from the view page but not yet created.
- For architecture, data flow, and implementation details, see **[docs/full-doc.md](docs/full-doc.md)**.

---

## Roadmap

- [ ] Database connection and config
- [ ] Dynamic post listing on `index.php`
- [ ] View / add / edit / delete with MySQL
- [ ] Image upload handling
- [ ] User registration, login, and sessions
- [ ] Language toggle (EN / AR)

---

## Credits

- UI theme: [TemplateMo — Sixteen Clothing](https://templatemo.com/tm-546-sixteen-clothing)
- Fonts: [Google Fonts — Poppins](https://fonts.google.com/)

---

## License

TemplateMo themes are typically free for personal and commercial use with attribution. Check [TemplateMo](https://templatemo.com) for current license terms. Application code: specify your license if distributing.
