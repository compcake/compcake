DROP TABLE IF EXISTS locations;
CREATE TABLE locations (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name CHAR(80) NOT NULL,
  address1 CHAR(80) NOT NULL,
  address2 CHAR(80),
  city CHAR(80) NOT NULL,
  state CHAR(80) NOT NULL,
  zipcode CHAR(10) NOT NULL,
  url CHAR(255),
  isdropoff BOOLEAN,
  isshipping BOOLEAN
);
