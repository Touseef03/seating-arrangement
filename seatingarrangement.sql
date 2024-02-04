-- NOTE: room table will automatically be created. Other tables are here:

-- Create users table
CREATE TABLE users (
    username CHAR(25),
    password CHAR(25),
    email CHAR(25)
);

-- Create student table
CREATE TABLE student (
    ROLL_NO INT,
    ROOM_NO CHAR(5)
);

-- Create faculty table
CREATE TABLE faculty (
    INVIGILATOR_NAME CHAR(25),
    ROOM_NO CHAR(5),
    TIMING CHAR(25)
);
