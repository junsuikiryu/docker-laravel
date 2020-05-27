create database board;
use board;
create table thread (
  id int(4) auto_increment not null,
  title varchar(60) not null,
  posts int(4) not null,
  primary key (id)
);
create table comment (
  id int(7) auto_increment not null,
  thread_id int(4) not null,
  post_id int(7) not null,
  sentence text not null,
  name varchar(20) default 'Anonymous',
  time_posted datetime not null,
  primary key (id)
);
