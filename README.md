# Тестовое задание

Создайте 2 разделенных проекта с названиями landing и activity.
landing – это основной сайт
activity – система учета визитов пользователя

При переходе на ЛЮБЫЕ страницы landing вы передаете информацию в проект activity по протоколу json-rpc версии 2.0. Информация должна содержать URL и Дату.
На странице (landing): /admin/activity выведите историю активности с пагинацией сгруппированную по URL.
Поля таблицы: URL, Количество визитов, Последнее посещение. Эту информацию вы запрашиваете в проекте activity (json-rpc запрос).

Все запросы landing должен делать через серверную часть (не использовать Ajax). Проект activity должен быть закрыт от прямого доступа.

## Архитектурные решения

Оба проекта и landing и activity используют для хранения необходимой информации базы данных sqlite, созданные по адресам /database/database.sqlite

В проекте activity для приема данных через JSON RPC 2.0 используется компонент [sajya/server](https://github.com/sajya/server).

Для регистрации переходов по страницам в проекте landing используется созданный middleware SendStat. Для вызова процедур проекта activity через JSON RPC 2.0 используется самописный сервис который формирует запрос и отправляет его через компонент [guzzlehttp/guzzle](https://github.com/guzzle/guzzle).

Статистка переходов по страницам в проекте activity складывается в таблицу stat.

Доступ к статистике /admin/activity есть только у зарегистрированных пользователей.
