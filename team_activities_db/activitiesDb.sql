-------------------- TEAM ACTIVITY 4 ----------------------

CREATE TABLE users (
id SERIAL,
username VARCHAR(255),
PRIMARY KEY (id)
);

CREATE TABLE notes (
id SERIAL,
userId INT NOT NULL,
note TEXT,
talkId INT NOT NULL,
PRIMARY KEY (id),
FOREIGN KEY (userId) REFERENCES users (id),
FOREIGN KEY (talkId) REFERENCES talks (id)
);

CREATE TABLE talks (
id SERIAL,
userId INT NOT NULL,
talkname VARCHAR(255),
speaker VARCHAR(255),
conference VARCHAR(255),
PRIMARY KEY (id)
);

ALTER TABLE talks DROP COLUMN userid;

INSERT INTO users (username) VALUES ('Pavel');
INSERT INTO users (username) VALUES ('Yulia');

INSERT INTO notes (userid, note, talkid) VALUES (1, 'inspiration from reading the scriptures', 2);

INSERT INTO talks (talkname, speaker, conference) VALUES ('The scriptures', 'Ronald', 'April 2009');

SELECT * FROM users;
SELECT * FROM notes;
SELECT * FROM talks;

ALTER TABLE talks DROP COLUMN conference;

ALTER TABLE talks ADD COLUMN session varchar(255);

INSERT INTO talks (session) VALUES ('Saturday Morning 2009');

DELETE FROM talks WHERE id = 3;

UPDATE talks SET session = 'Saturday Morning 2009' WHERE id = 2;

INSERT INTO talks (talkname, speaker, session) VALUES ('Missionary Work: Sharing What Is in Your Heart', 'Dieter F. Uchtdorf', 'Saturday Morning 2019');
INSERT INTO talks (talkname, speaker, session) VALUES ('Answers to Prayer', 'Brook P. Hales', 'Saturday Morning 2019');
INSERT INTO talks (talkname, speaker, session) VALUES ('We Can Do Better and Be Better', 'Russell M. Nelson', 'General Priesthood 2019');

INSERT INTO notes (userid, note, talkid) VALUES (1, 'There Is Much to Do', 4);
INSERT INTO notes (userid, note, talkid) VALUES (1, 'share what is in your heart', 4);

INSERT INTO notes (userid, note, talkid) VALUES (1, 'Sometimes you have to wait.', 5);
INSERT INTO notes (userid, note, talkid) VALUES (2, 'He is with me all the time', 5);

INSERT INTO notes (userid, note, talkid) VALUES (1, 'prayerfully seek to understand what stands in the way of your repentance.', 6);
INSERT INTO notes (userid, note, talkid) VALUES (2, 'All of us can do better and be better than ever before', 6);

SELECT notes.note, talks.talkname, talks.speaker FROM notes INNER JOIN talks ON notes.talkid = talks.id WHERE talkid = 5;
-----------------------------------------------------------------------------------------------------------------------------------------

Users table
UserId UserName

Notes table
NoteId  UserId  NoteText  TalkId 

Talks table
TalkId  TalkName Speaker Conference

Talks table 2nd version
TalkId TalkName  Speaker Session

------------------------------- TEAM ACTIVITY 5 ----------------------------------------------------

CREATE TABLE Scriptures (
id SERIAL PRIMARY KEY,
book VARCHAR(100),
chapter INT NOT NULL,
verse INT NOT NULL,
content TEXT
);

INSERT INTO Scriptures (book, chapter, verse, content) VALUES ('John', 1, 5, 'And the light shineth in darkness; and the darkness comprehended it not.');
INSERT INTO Scriptures (book, chapter, verse, content) VALUES ('Doctrine and Covenants', 88, 49, 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');
INSERT INTO Scriptures (book, chapter, verse, content) VALUES ('Doctrine and Covenants', 93, 28, 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');
INSERT INTO Scriptures (book, chapter, verse, content) VALUES ('Mosiah', 16, 9, 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');
