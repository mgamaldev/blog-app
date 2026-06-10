CREATE TABLE authors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    body TEXT NOT NULL,
    published BOOLEAN DEFAULT FALSE,
    author_id INT NOT NULL,
    category_id INT DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    author_id INT NOT NULL,
    post_id INT NOT NULL,
    body TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

CREATE TABLE post_tag (
    post_id INT,
    tag_id INT,
    PRIMARY KEY (post_id, tag_id)
);

-- Foreign Key & On delete case --
ALTER TABLE posts 
    ADD CONSTRAINT fk_posts_author FOREIGN KEY (author_id) REFERENCES authors(id) ON DELETE CASCADE,
    ADD CONSTRAINT fk_posts_category FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL;

ALTER TABLE comments 
    ADD CONSTRAINT fk_comments_author FOREIGN KEY (author_id) REFERENCES authors(id) ON DELETE CASCADE,
    ADD CONSTRAINT fk_comments_post FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE;

ALTER TABLE post_tag 
    ADD CONSTRAINT fk_pivot_post FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    ADD CONSTRAINT fk_pivot_tag FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE;

-- Indexes for search and filters --
CREATE INDEX idx_posts_author ON posts(author_id);
CREATE INDEX idx_posts_category ON posts(category_id);
CREATE INDEX idx_posts_author_published ON posts(author_id, published);

CREATE INDEX idx_comments_author ON comments(author_id);
CREATE INDEX idx_comments_post ON comments(post_id);