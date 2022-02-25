# Автозагрузка классов. Composer

## [Урок 1]()

1. Создайте репозиторий с проектом на GitHub.
2. Создайте простые классы:
   * для пользователей: id, имя, фамилия;
   * статей: id, id автора, заголовок, текст;
   * комментариев: id, id автора, id статьи, текст.
   
3. Инициализируйте в проекте composer и настройте автозагрузку PSR-4, код 
   классов положите в папку src.
4. Подключите к проекту пакет [fakerphp/faker](https://packagist.org/packages/fakerphp/faker)
5. Создайте в корневой папке проекта файл cli.php — это будет точка входа в наше пока что только консольное приложение.
6. Реализуете логику:

   * При запуске с аргументом user приложение создаёт объект пользователя с 
   именем и фамилией, сгенерированными библиотекой fakerphp/faker, и печатает его строковое представление в консоль. Используете предопределённую переменную $argv для получения аргументов командной строки. Определите метод __toString в классе пользователя.
   * Повторите это для статей (агрумент post) и комментариев (comment).

Примеры работы приложения:
```
➜  blog git:(master) php cli.php user   
Ivan Nikitin
            
➜  blog git:(master) php cli.php post   
Quod ut earum incidunt quas aut. >>> Rerum similique est saepe architecto eum. Et placeat totam sit.

➜  blog git:(master) php cli.php comment
Officia voluptatum magni ut debitis
```
