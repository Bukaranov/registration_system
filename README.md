Тестовое задание на должность PHP junior Developer
Цель: получить список зарегистрированных пользователей

База данных:

Создание бд хранится в корневой папке проекта название файла - 'db_registrationSystem'

1. Таблица пользователей (name, email, phone, region_id, street_name, home_number, apartment_number)
2. Таблица регионов (name, parent_id, type) - для хранения областей и городов
   Регистрация происходит путем заполнения формы с полями:

•	ФИО (строка)
•	EMAIL (валидаци для email)
•	Номер телефона (валидаци для +380XXXXXXXXX)
•	Область (список)
•	Город (список)
•	Название улицы (строка)
•	№ дома (цифра)
•	№ квартиры (цифра)

Условия:

•	все поля в форме обязательны к заполнения
•	список областей брать из БД
•	список городов зависит от выбранной области (сдлелать связанный выподающий список, использовать https://demos.krajee.com/widget-details/depdrop)
•	предусмотреть валидацию всех полей в зависимости от типа поля
•	для select использовать плагин (https://demos.krajee.com/widget-details/select2)

Результат: вывести таблицу пользователей со всеми данными, а так же возможность удалять и редактировать их.
Таблица должна иметь сортировку по полям, фильтры для поиска и пагинацию (использовать плагин gridview)
