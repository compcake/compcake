DROP TABLE IF EXISTS payments;
CREATE TABLE payments (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER,
  qty INTEGER,
  total REAL,
  paymentid INTEGER,
  FOREIGN KEY(user_id) REFERENCES users(id)
);
