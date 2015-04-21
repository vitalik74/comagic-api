Реализация АПИ для comagic.ru.
========

Документация по [API](http://comagic.ru/support/article/137/#%D0%9F%D0%BE%D0%BB%D1%83%D1%87%D0%B5%D0%BD%D0%B8%D0%B5).

Класс поддерживает Api версии 1.0.

Чтобы запустить тесты надо установить `Codeception`.

Примеры:
=======
```php
$comagic = new Comagic([
    'login' => $config['login'],
    'password' => $config['password']
]);

$comagic->getCdrIn(['customer_id' => $customerId, 'date_from' => date('Y-m-d'), 'date_till' => date('Y-m-d')]); // Получение информации о входящих звонках

$comagic->getCdrOut(['customer_id' => $customerId, 'date_from' => date('Y-m-d'), 'date_till' => date('Y-m-d')]);
```


Особенности
============
Все методы реализованы магическими. Автодополнение прекрасно работает. 