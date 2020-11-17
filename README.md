# TODO Task Manager
Test task
Created by Tatyana
Задача:
Создать примитивный интерфейс для организации списка личных задач с возможностью их создания, редактирования и добавления комментариев для каждой из них. Реализовать возможность получения списка задач посредством API.
Требования:
Админка:
Страница со списком должна иметь 3 колонки: TODO, DOING, DONE. В каждой из них выводятся задачи, имеющие соответствующий статус и отсортированные по дате создания.
На странице со списком должна быть кнопка "Создать задачу", при клике на которую отображается форма для добавления новой задачи. Необходимые поля: имя, описание, статус (TODO/DOING/DONE). После создания задача должна попасть в соответствующую её статусу колонку.
Каждая задача должна иметь ссылку на редактирование, где можно изменить её статус.
Механизм перетаскивания задачи в другую колонку реализовывать НЕ нужно.
При редактировании задачи необходимо иметь возможность добавлять комментарии и увидеть список ранее созданных.
Для каждой задачи на странице списка должно выводиться количество комментариев.


API:
реализовать возможность получения списка задач в формате JSON посредством HTTP GET запроса
Требования к инструментам и стеку технологий:
язык, используемый на серверной части - PHP
сервер баз данных - MySQL
стек, используемый на клиентской части - HTML/CSS/Javascript

Примечания:
К внешнему виду никаких требований не предъявляется. Форма организации интерфейса - свободная. Единственное пожелание - минимизировать переходы по страницам используя вместо этого Ajax.


