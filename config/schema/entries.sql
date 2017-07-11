DROP TABLE IF EXISTS entries;
CREATE TABLE entries (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER NOT NULL,
  name CHAR(30) NOT NULL,
  description CHAR(50),
  special_ingredients CHAR(255),
  carbonation CHAR(20),
  sweetness CHAR(20),
  honey CHAR(50),
  fruit CHAR(50),
  strength CHAR(20),
  style CHAR(10) NOT NULL,
  payment_id INTEGER,
  paid BOOLEAN NOT NULL,
  score INTEGER,
  pushed BOOLEAN,
  place INTEGER,
  scoresheet CHAR(30),
  judge_number INTEGER,
  bin INTEGER,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (payment_id) REFERENCES payments(id)
);
CREATE INDEX entries_user ON entries (user_id);
