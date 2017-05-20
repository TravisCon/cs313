CREATE DATABASE recipe;
\c recipe

CREATE TABLE author
(
	id         SERIAL PRIMARY KEY,
	username   VARCHAR(128) NOT NULL,
    pass       VARCHAR(128) NOT NULL,
    name       VARCHAR(128),
	validated  BOOLEAN NOT NULL
);

\d author;

CREATE TABLE recipe
(
    id          SERIAL PRIMARY KEY,
    author_id   INT NOT NULL REFERENCES  author(id),
    name        VARCHAR(128) NOT NULL,
    description VARCHAR(512),
    prep_time   SMALLINT,
    cook_time   SMALLINT,
    total_time  SMALLINT NOT NULL,
    servings    SMALLINT,
    calories    INTEGER,
    my_date     DATE NOT NULL default CURRENT_DATE,
    photo_name  VARCHAR(128)
);

CREATE TABLE ingredient
(
    id          SERIAL PRIMARY KEY,
    recipe_id   INT NOT NULL REFERENCES recipe(id),
    name        VARCHAR(128) NOT NULL,
    quantity    VARCHAR(128) NOT NULL,
    notes       VARCHAR(128),
    brand       VARCHAR(128)
);

CREATE TABLE step
(
    id          SERIAL PRIMARY KEY,
    recipe_id   INT NOT NULL REFERENCES recipe(id),
    step_order  SMALLINT,
    direction   VARCHAR(256)
);


INSERT INTO author(username, pass, name, validated)
VALUES
('test_user', 'secretcode', 'Tester', true);

INSERT INTO recipe(author_id, name, description, total_time, "date", photo_name)
VALUES((SELECT id FROM author WHERE name='Tester'),
      'Apple Cobbler', 'Enjoy this tasty classic with ease!',
       50, current_date, 'apple_cobbler1.jpg');
       
INSERT INTO recipe(author_id, name, description, total_time, my_date, photo_name)
VALUES((SELECT id FROM author WHERE name='Tester'),
      'Toast', 'If you can''t make this, stop trying',
       5, current_date, 'toast.jpg');
       
INSERT INTO ingredient(recipe_id, name, quantity)
VALUES((SELECT id FROM recipe WHERE name='Toast'), 'Bread', '2 Pieces');

INSERT INTO ingredient(recipe_id, name, quantity)
VALUES((SELECT id FROM recipe WHERE name='Toast'), 'Butter', '1/2 Tablespoon');

INSERT INTO step(recipe_id, step_order, direction)
VALUES((SELECT id FROM recipe WHERE name='Toast'), 1,
      'Put bread in toaster');
      
INSERT INTO step(recipe_id, step_order, direction)
VALUES((SELECT id FROM recipe WHERE name='Toast'), 2,
      'When it pops up, butter it');