DB=../db

backup:
	echo ".dump" |sqlite3 $(DB) >backup.sql
restore:
	-rm -f $(DB)
	cat backup.sql |sqlite3 $(DB)
users:
	cat users.sql |sqlite3 $(DB)
payments:
	cat payments.sql |sqlite3 $(DB)
sessions:
	cat sessions.sql |sqlite3 $(DB)
locations:
	cat locations.sql |sqlite3 $(DB)
judges:
	cat judges.sql |sqlite3 $(DB)
flights:
	cat flights.sql |sqlite3 $(DB)
judges_flights:
	cat judges_flights.sql |sqlite3 $(DB)
entries:
	cat entries.sql |sqlite3 $(DB)
entries_flights:
	cat entries_flights.sql |sqlite3 $(DB)
roles:
	cat roles.sql |sqlite3 $(DB)
users_roles:
	cat users_roles.sql |sqlite3 $(DB)
passwordresets:
	cat passwordresets.sql |sqlite3 $(DB)

all: users payments sessions locations judges flights judges_flights entries entries_flights roles users_roles passwordresets
