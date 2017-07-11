DROP TABLE IF EXISTS entries_flights;
CREATE TABLE entries_flights (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  entry_id INTEGER NOT NULL,
  flight_id INTEGER NOT NULL,
  FOREIGN KEY (entry_id) REFERENCES entries(id),
  FOREIGN KEY (flight_id) REFERENCES flights(id)
);
