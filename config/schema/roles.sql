DROP TABLE IF EXISTS roles;
CREATE TABLE roles (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  role CHAR(10)
);
INSERT INTO "roles" VALUES(1,'Admin');
INSERT INTO "roles" VALUES(2,'Staff');