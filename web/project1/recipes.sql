CREATE USER view_user WITH password 'view_pass' NOCREATEDB;
GRANT SELECT ON scripture TO ta_user;

CREATE ROLE view_user;
ALTER ROLE view_user WITH LOGIN PASSWORD 'view_pass' NOSUPERUSER NOCREATEDB NOCREATEROLE;
CREATE DATABASE database_name OWNER view_user;
REVOKE ALL ON DATABASE database_name FROM PUBLIC;
GRANT CONNECT ON DATABASE database_name TO database_user;
GRANT ALL ON DATABASE database_name TO database_user;

DROP SCHEMA public CASCADE;
CREATE SCHEMA public;

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
    direction   TEXT
);


INSERT INTO author(username, pass, name, validated)
VALUES
('test_user', 'secretcode', 'Admin', true);

INSERT INTO recipe(author_id, name, description, total_time, my_date, photo_name)
VALUES((SELECT id FROM author WHERE name='Admin'),
      'Apple Cobbler', 'Enjoy this tasty classic with ease!',
       50, current_date, 'apple_cobbler1.jpg');
       
INSERT INTO ingredient(recipe_id, name, quantity)
VALUES((SELECT id FROM recipe WHERE name='Apple Cobbler'), 'Green Apples', '4'),
      ((SELECT id FROM recipe WHERE name='Apple Cobbler'), 'Yellow Cake', '1 Box'),
      ((SELECT id FROM recipe WHERE name='Apple Cobbler'), 'Melted Butter', '1/2 cup');
      
INSERT INTO step(recipe_id, step_order, direction)
VALUES((SELECT id FROM recipe WHERE name='Apple Cobbler'), 1,
       'Dice Apples'),
       ((SELECT id FROM recipe WHERE name='Apple Cobbler'), 2,
       'Throw them into a pan'),
       ((SELECT id FROM recipe WHERE name='Apple Cobbler'), 3,
       'Cover with yellow cake powder'),
       ((SELECT id FROM recipe WHERE name='Apple Cobbler'), 4,
       'Pour melted butter over the crust'),
       ((SELECT id FROM recipe WHERE name='Apple Cobbler'), 5,
       'Turn that oven up to 350 and toast it for 40 minutes');

INSERT INTO recipe(author_id, name, description, total_time, my_date, photo_name)
VALUES((SELECT id FROM author WHERE name='Admin'),
      'Toast', 'If you can''t make this, stop trying',
       5, current_date, 'toast.jpg');
       
INSERT INTO ingredient(recipe_id, name, quantity)
VALUES((SELECT id FROM recipe WHERE name='Toast'), 'Bread', '2 Pieces'),
      ((SELECT id FROM recipe WHERE name='Toast'), 'Butter', '1/2 Tablespoon');

INSERT INTO step(recipe_id, step_order, direction)
VALUES((SELECT id FROM recipe WHERE name='Toast'), 1,
      'Put bread in toaster'),
      ((SELECT id FROM recipe WHERE name='Toast'), 2,
      'When it pops up, butter it');
      
INSERT INTO recipe (author_id, name, description, total_time, my_date, photo_name)
VALUES((SELECT id FROM author WHERE name='Admin'),
      'Bowl of Cereal', 'For those times you''re pretty sure you don''t need a healthy meal',
       5, current_date, 'cinnamon_toast_crunch.jpg');
       
INSERT INTO ingredient(recipe_id, name, quantity)
VALUES((SELECT id FROM recipe WHERE name='Bowl of Cereal'), 'Milk', '1 cup'),
      ((SELECT id FROM recipe WHERE name='Bowl of Cereal'), 'Favorite Cereal', '1 cup');
INSERT INTO step(recipe_id, step_order, direction)
VALUES((SELECT id FROM recipe WHERE name='Bowl of Cereal'), 1,
      'Pour cereal into bowl'),
      ((SELECT id FROM recipe WHERE name='Bowl of Cereal'), 2,
      'Pour some milk over and enjoy!');