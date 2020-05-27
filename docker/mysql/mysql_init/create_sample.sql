CREATE DATABASE sample;
use sample;

CREATE TABLE users (
    id INT(11) AUTO_INCREMENT NOT NULL,
    name VARCHAR(64) NOT NULL,
    PRIMARY KEY (id)
);

INSERT users VALUES (1, 'hoge'), (2, 'fuga'), (3, 'piyo'), (4, 'foo'), (5, 'bar');	# 初期データ追加
