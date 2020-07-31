install:
	@echo "Creating docker containers "
	@echo ""
	docker-compose up -d
	@echo ""
	@echo "Created"
	@echo ""
	@echo ""
	@echo "Creating app project"
	cd ezoom-app; npm install
	npm i -D -E @ionic/lab


pull:
	@echo ""
	@echo "Downloading project from git"
	git pull origin master
	@echo "Complete"

database:
	docker-compose up -d
	docker exec -it thiago_mysql service mysql start
	docker exec -it thiago_mysql mysql -u root -p123456  -e "CREATE USER 'ezoom'@'%' IDENTIFIED BY '123456';"
	docker exec -it thiago_mysql mysql -u root -p123456  -e "GRANT ALL PRIVILEGES ON *.* TO 'ezoom'@'%' WITH GRANT OPTION;"
	docker exec -it thiago_mysql mysql -u root -p123456  -e "FLUSH PRIVILEGES"
	docker exec -it thiago_mysql mysql -u root -p123456  -e "SOURCE /home/database/Project.sql"

	
start:
	docker-compose stop
	docker-compose up -d
	docker exec -it thiago_apachephp service apache2 start
	docker exec -it thiago_mysql service mysql start
	cd html/less;  lessc painel.less ../css/painel.css
	cd html/less;  lessc web.less ../css/web.css
	cd ezoom-app; ionic serve -lc &


php:
	docker-compose stop
	docker-compose up -d
	docker exec -it thiago_apachephp service apache2 start
	docker exec -it thiago_mysql service mysql start

restart: 
	docker-compose stop
	docker-compose up -d
	cd ezoom-app; ionic serve -lc &
	cd html; php -S localhost:8000 -t web/
