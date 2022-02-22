# Автозагрузчик

Реализуйте автозагрузчик классов согласно следующим правилам:

1. Разделитель пространства имён преобразуется в разделитель папок: / для 
Linux и MacOS или \ для Windows.
<br>
<br>
2. Знак _ в имени класса преобразуется в разделитель папок.
<br>
<br>
3. Файл с кодом класса имеет расширение .php.
---
Примеры:
```php
\Doctrine\Common\ClassLoader ⇒ /some/path/Doctrine/Common/ClassLoader.php.
\my\package\Class_Name ⇒ /some/path/namespace/package/Class/Name.php.
\my\package_name\Class_Name ⇒ /some/path/my/package_name/Class/Name.php.
```
