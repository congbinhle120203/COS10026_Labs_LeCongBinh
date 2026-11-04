# COS10026 – Week 8 Labs (Le Cong Binh, 106419738)

## Lab 1 – Include files, hidden fields & login with PHP
Put this folder at `C:\xampp\htdocs\lab08`, start **Apache** in XAMPP, then open
http://localhost/lab08/login.php

| File | Task | What it does |
|---|---|---|
| `login.html` | 1 | Plain HTML form, POST to `process.php`, hidden field `token` = B106419738 |
| `process.php` | 2 | `session_start()`, checks username **Binh** / password **106419738**, sets `$_SESSION['user']`, redirects |
| `welcome.php` | 3 | Shows a welcome message if logged in, otherwise sends you back to the login page |
| `header.inc`, `footer.inc` | 4 | Shared page top (DOCTYPE, head, title) and bottom (copyright) |
| `login.php` | 4 | Login form built with `include`, so it must be `.php`, not `.html` |

## Lab 2 – MySQL database `blog_site`
`database/blog_site.sql` creates the database, the `users` and `posts` tables and sample rows.
Run it in phpMyAdmin (http://localhost/phpmyadmin) > SQL tab, then Export the database as `.sql`.
