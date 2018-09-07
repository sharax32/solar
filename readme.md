
## Формат Rest API

## Инструкция по развертыванию

git clone https://github.com/sharax32/solar
cd solar
composer install

Копируем файл .env.example => .env и изменяем подключения к базе (mysql) на нужные
Запускаем миграции
 php artisan migrate
 
Запускаем наполнение данными
 php artisan db:seed

## Работа с Rest API
желательно использовать rest api client

#Доступ к к дереву комментариев GET
http://solar/public/api/comment

#Доступ к комментарию GET
http://solar/public/api/comment/{commentid}
Пример:GET http://solar/public/api/comment/1

#Добавить комментарий POST
http://solar/public/api/comment
Например POST http://solar/public/api/comment?name=Test&email=test@uk.net&text=Text&parent_id=0

#Изменить комментарий PUT
http://solar/public/api/comment/{commentid}
Пример:PUT http://solar/public/api/comment/1

#Удалить комментарий DELETE
http://solar/public/api/comment/{commentid}
Пример:DELETE http://solar/public/api/comment/1

## Запуск Тестов
php vendor\bin\phpunit
или
vendor\bin\phpunit.bat
В зависимости от окружения

-------------------------------
Kind regards,
Alex
