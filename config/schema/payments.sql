DROP TABLE IF EXISTS payments;
CREATE TABLE payments (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER,
  qty INTEGER,
  total REAL,
  paymentid CHAR(64),
  token CHAR(64),
  payerid CHAR(64),
  executed BOOLEAN,
  FOREIGN KEY(user_id) REFERENCES users(id)
);
