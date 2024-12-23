DROP TABLE IF EXISTS session;
CREATE TABLE session(
    id integer not null,
	uniqid text not null,
    creation_date date not null,
    primary key("id" AUTOINCREMENT)
);

DROP TABLE IF EXISTS answers;
CREATE TABLE answers(
	id INTEGER not null PRIMARY key AUTOINCREMENT,
    word text not null,
    user_input text not null,
    time_elapsed text,
    total_answers integer,
    session_id integer not null,
    foreign key (session_id) references session(uniqid) on update cascade on delete cascade
);
