FROM mysql:8.0.2
RUN mkdir /var/log/mysql
ADD ./logs /var/log/mysql
RUN chown mysql:mysql /var/log/mysql
ADD ./my.cnf /etc/mysql/my.cnf
RUN chmod 644 /etc/mysql/my.cnf
