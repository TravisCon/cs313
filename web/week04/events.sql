CREATE DATABASE events;
\c events

CREATE TABLE participants
(
	id SERIAL  PRIMARY KEY,
	username   VARCHAR(100) NOT NULL,
	name       VARCHAR(100) NOT NULL,
	address    VARCHAR(100) NOT NULL
);

\d participants;

CREATE TABLE race
(
    id          SERIAL PRIMARY KEY,
    "date"      DATE NOT NULL,
    distance    VARCHAR(128),
    name        VARCHAR(100) NOT NULL
);

CREAT TABLE enrollment
(
    id              SERIAL PRIMARY KEY,
    participant_id  INT NOT NULL REFERENCES participant(id)
    
)