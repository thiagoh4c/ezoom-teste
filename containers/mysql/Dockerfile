FROM mysql:5.7
COPY ./my.cnf /etc/mysql/conf.d/

ENV TZ=America/Sao_Paulo
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN mkdir /home/database
RUN mkdir /home/mysql

COPY ./Database/Project.sql /home/database

RUN service mysql start

EXPOSE 3306