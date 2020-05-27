Practice of web service system on docker

# Usage
```
$ cd docker-laravel
$ mkdir ./logs docker/mysql/logs
$ docker-compose up -d --build
```
access to "localhost:8000".

# directory tree
```
.
├── README.md
├── docker/
│   ├── mysql/
│   │   └── Dockerfile
│   │   └── my.cnf
│   │   └── logs/
│   │   └── data/	# DB data for mysql.
│   │   └── mysql_init/
│   ├── nginx/
│   │   └── default.conf
│   └── php/
│       ├── Dockerfile
│       └── php.ini
├── docker-compose.yml
├── logs/
└── src/ # directory which laravel is installed.
```
