CREATE TABLE users(id BIGSERIAL PRIMARY KEY, firstname varchar(30) not null, lastname varchar(30) not null,
mobile_number VARCHAR(20), not null, ide_number varchar(15) null, adress TEXT(50) NULL,birthday date null,email varchar 
(200) not null unique,password text(50) not null, status boolean not null default true,
 created_at timestamptz not null default now(),update_at timestamptz not null default now(), deleted_at timestamptz null


inser into users (firstname, lastname,mobile_number,ide_number,email,password)
values('Julieth','bastidas','3017903227','sparks24@gmail.com','123456');