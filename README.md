Разворачивание проекта
-------

1. `docker-compose build`
2. `docker-compose up`

Сайт становится доступен по адресу 0.0.0.0:80

Миграции
-------
`docker-compose exec php php /var/www/yii migrate`

Заполнение расписания случайными данными
-------
`docker-compose exec php php /var/www/yii schedule/generate`
