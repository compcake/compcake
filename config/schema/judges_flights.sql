DROP TABLE IF EXISTS judges_flights;
CREATE TABLE judges_flights (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  judge_id INTEGER NOT NULL,
  flight_id INTEGER NOT NULL,
  FOREIGN KEY (judge_id) REFERENCES judges(id),
  FOREIGN KEY (flight_id) REFERENCES flights(id)
);
