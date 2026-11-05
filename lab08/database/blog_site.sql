CREATE DATABASE IF NOT EXISTS blog_site;
USE blog_site;

CREATE TABLE users (
  user_id   INT AUTO_INCREMENT PRIMARY KEY,
  username  VARCHAR(50)  NOT NULL,
  email     VARCHAR(100) NOT NULL,
  is_active BOOLEAN      NOT NULL DEFAULT TRUE
);

CREATE TABLE posts (
  post_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT          NOT NULL,
  title   VARCHAR(100) NOT NULL,
  content TEXT,
  FOREIGN KEY (user_id) REFERENCES users(user_id)
);

INSERT INTO users (username, email, is_active) VALUES ('alex', 'alex@email.com', true);
INSERT INTO users (username, email, is_active) VALUES ('mia',  'mia@email.com',  false);
INSERT INTO users (username, email, is_active) VALUES ('binh', 'binh@email.com', true);

INSERT INTO posts (user_id, title, content) VALUES (1, 'First Post',  'This is my first blog post.');
INSERT INTO posts (user_id, title, content) VALUES (2, 'Hello World', 'Mia is testing her first post.');
INSERT INTO posts (user_id, title, content) VALUES (3, 'Solar Notes', 'Binh writes about community solar.');
