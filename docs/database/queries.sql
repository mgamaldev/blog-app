-- 1. Insert seed rows for authors, categories, posts, comments, and tags.
INSERT INTO authors (name, email) VALUES 
('Ahmed', 'ahmed@example.com'),
('Mohamed', 'mohamed@example.com');

INSERT INTO categories (name) VALUES 
('Databases'),
('JS'),
('PHP');

INSERT INTO posts (title, body, published, author_id, category_id) VALUES 
('Intro to SQL', 'Hello world, this is SQL.', true, 1, 1),
('SQL', 'More content about SQL.', true, 1, 1),
('JS Arrays', 'content about arrays.', false, 2, 2),
('PHP', 'content about PHP.', true, 2, 3);

INSERT INTO comments (author_id, post_id, body) VALUES 
(2, 1, 'Great article!'),
(1, 1, 'Thanks for reading!'),
(2, 2, 'Very clear explanation'),
(1, 4, 'Congrats');

INSERT INTO tags (name) VALUES 
('SQL'),
('Backend');

INSERT INTO post_tag (post_id, tag_id) VALUES 
(1, 1),
(1, 2),
(2, 1);


-- 2. Select all published posts with their author name using a JOIN.
SELECT posts.title, authors.name AS author_name 
FROM posts
INNER JOIN authors ON posts.author_id = authors.id
WHERE posts.published = true;


-- 3. Select one post together with its comment count using GROUP BY.
SELECT posts.id, posts.title, COUNT(comments.id) AS total_comments
FROM posts
LEFT JOIN comments ON posts.id = comments.post_id
WHERE posts.id = 1
GROUP BY posts.id, posts.title;


-- 4. Select every post that carries a given tag, going through the post_tag pivot.
SELECT posts.title 
FROM posts
INNER JOIN post_tag ON posts.id = post_tag.post_id
INNER JOIN tags ON post_tag.tag_id = tags.id
WHERE tags.name = 'SQL';


-- 5. Update a single post's title by its id.
UPDATE posts 
SET title = 'Advanced SQL Introduction' 
WHERE id = 1;


-- 6. Delete a single comment by its id.
DELETE FROM comments 
WHERE id = 2;

-- 6. Delete a single author by its id.
DELETE FROM authors 
WHERE id = 1;