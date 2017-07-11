DROP TABLE IF EXISTS flights;
CREATE TABLE flights (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  session_id INTEGER NOT NULL,
  steward_id INTEGER,
  round INTEGER NOT NULL,
  FOREIGN KEY (session_id) REFERENCES sessions(id),
  FOREIGN KEY (steward_id) REFERENCES stewards(id)
);
