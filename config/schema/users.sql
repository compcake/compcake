DROP TABLE IF EXISTS users;
CREATE TABLE users (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  email CHAR(80) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  first_name CHAR(80),
  last_name CHAR(80),
  address1 CHAR(80),
  address2 CHAR(80),
  address3 CHAR(80),
  city CHAR(80),
  province CHAR(80),
  country CHAR(80),
  postcode CHAR(80),
  aha_number CHAR(10),
  club CHAR(80),
  bjcp CHAR(10),
  judge BOOLEAN,
  steward BOOLEAN,
  staff BOOLEAN
);
INSERT INTO "users" VALUES(2,'testadmin@test.com','$2y$10$/SJXsjLNJmezznjex.YAOehQm12mtddK0Nx2.upygdrV0WyNEPux2','Test','Admin','101 Test Drive','Building 21','Room 314','Austin','TX','United States','78727','', NULL, NULL, NULL, NULL);
CREATE INDEX users_email ON users (email);
