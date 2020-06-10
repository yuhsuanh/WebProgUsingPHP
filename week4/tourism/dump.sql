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

/*
    Create travel types Table
    And insert 5 records
 */
create table travel_type(
    type_name char(20)
);

insert into travel_type
values ('Backpacking') , ('Solo travel'), ('Package trip'), ('Weekend break'), ('Honeymoon');


/*
    Create Hotel Table
    And insert 4 records
 */
create table hotel (
    hotel_name char(50)
);

insert into hotel
values ('Marriott International'), ('Hilton Worldwide'), ('InterContinental Hotels Group'), ('Wyndham Hotel Group');