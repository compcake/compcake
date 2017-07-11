DROP TABLE IF EXISTS users_roles;
CREATE TABLE users_roles (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  user_id INTEGER NOT NULL,
  role_id INTEGER NOT NULL,
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (role_id) REFERENCES roles(id)
);
INSERT INTO "users_roles" VALUES(1,2,1);
