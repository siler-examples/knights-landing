create table knight
(
    id int not null auto_increment primary key,
    name varchar(255) not null,
    timestamp timestamp not null default current_timestamp
);
