USE Yu200443723;

DROP TABLE IF EXISTS tourism;

CREATE TABLE tourism (
	country CHAR(100),
	city CHAR(100),
	travel_type CHAR(20),
    hotel CHAR(50),
	days TINYINT UNSIGNED,
	fee DECIMAL(6,2)
);