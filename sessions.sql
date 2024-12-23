DROP TABLE IF EXISTS session;
CREATE TABLE session(
    session_id integer not null,
    creation_date date not null,
    primary key("session_id" AUTOINCREMENT)
);

DROP TABLE IF EXISTS answers;
CREATE TABLE answers(
    word text not null,
    user_input text not null,
    time_elapsed text,
    total_answers integer,
    session_id integer not null,
    foreign key (session_id) references session(session_id) on update cascade on delete cascade
);
