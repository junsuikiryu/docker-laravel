directory tree
```
.
├── README.md
├── docker
│   ├── mysql
│   │   └── Dockerfile
│   │   └── my.cnf
│   ├── nginx
│   │   └── default.conf # nginxの設定ファイル
│   └── php
│       ├── Dockerfile
│       └── php.ini
├── docker-compose.yml
├── logs
│   ├── access.log       # nginxのアクセスログ
│   ├── error.log        # nginxのエラーログ
│   ├── mysql-error.log
│   ├── mysql-query.log
│   ├── mysql-slow.log
│   └── php-error.log
└── src # Laravelをインストールするディレクトリ
```
