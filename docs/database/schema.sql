CREATE TABLE `authors` (
  `id` integer PRIMARY KEY,
  `name` varchar(255),
  `email` varchar(255) UNIQUE,
  `created_at` timestamp
);

CREATE TABLE `categories` (
  `id` integer PRIMARY KEY,
  `name` varchar(255)
);

CREATE TABLE `posts` (
  `id` integer PRIMARY KEY,
  `title` varchar(255),
  `body` text,
  `published` bool,
  `author_id` integer,
  `category_id` integer,
  `created_at` timestamp
);

CREATE TABLE `comments` (
  `id` integer PRIMARY KEY,
  `author_id` integer,
  `post_id` integer,
  `body` text,
  `created_at` timestamp
);

CREATE TABLE `tags` (
  `id` integer PRIMARY KEY,
  `name` varchar(255)
);

CREATE TABLE `post_tag` (
  `post_id` integer,
  `tag_id` integer,
  PRIMARY KEY (`post_id`, `tag_id`)
);

CREATE INDEX `idx_authors_email` ON `authors` (`email`);

CREATE INDEX `idx_posts_author` ON `posts` (`author_id`);

CREATE INDEX `idx_posts_category` ON `posts` (`category_id`);

CREATE INDEX `idx_posts_author_published` ON `posts` (`author_id`, `published`);

CREATE INDEX `idx_comments_post` ON `comments` (`post_id`);

CREATE INDEX `idx_comments_author` ON `comments` (`author_id`);

ALTER TABLE `posts` ADD FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`);

ALTER TABLE `posts` ADD FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

ALTER TABLE `comments` ADD FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`);

ALTER TABLE `comments` ADD FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

ALTER TABLE `post_tag` ADD FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

ALTER TABLE `post_tag` ADD FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`);
