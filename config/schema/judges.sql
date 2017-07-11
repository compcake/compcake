DROP TABLE IF EXISTS judges;
CREATE TABLE judges (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER NOT NULL,
  session_id INTEGER NOT NULL,
  role CHAR(10),
  FOREIGN KEY (user_id) REFERENCES users(id)
  FOREIGN KEY (session_id) REFERENCES sessions(id)
);
