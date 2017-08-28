DROP TABLE IF EXISTS passwordresets;
CREATE TABLE passwordresets (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER NOT NULL,
  token CHAR(64),
  expiration DATE,
  FOREIGN KEY (user_id) REFERENCES users(id)
);
