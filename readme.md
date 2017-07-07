Ссылка на задание  https://docs.google.com/document/d/1Zxsw6WPHPQb6fZaJUgd8qkLkqtxQKHBq07BfzmVJOQQ/edit

**1. Дамп базы для первой задачи testSqlOne.sql**
Есть два варианта задачи.<br>
1.1 Таблица user_friends<br>
Запрос 1:
<br><code>
SELECT user_name, COUNT(user_friends) 
FROM user_friends 
GROUP BY user_name 
HAVING COUNT(user_friends) > 5
</code><br>
Запрос 2:
<br><code>
SELECT t1.* 
FROM user_friends t1 
INNER JOIN user_friends t2 ON t1.user_name = t2.user_friends AND t1.user_friends = t2.user_name 
GROUP BY LEAST(t1.id, t2.id), GREATEST(t1.id, t2.id)
</code><br>
1.2 Таблицы user и user_friends_relation<br>
Запрос 1:
<br><code>
SELECT `user`.`name`, COUNT(user_friends_id) 
FROM user_friends_relation 
LEFT JOIN `user` ON `user`.`id` = `user_friends_relation`.`user_id` 
GROUP BY user_id 
HAVING COUNT(user_friends_id) > 5
</code><br>
Запрос 2:
<br><code>
SELECT t1.* 
FROM user_friends_relation t1 
INNER JOIN user_friends_relation t2 ON t1.user_id = t2.user_friends_id AND t1.user_friends_id = t2.user_id 
GROUP BY LEAST(t1.id, t2.id), GREATEST(t1.id, t2.id)
</code><br>

**2. Файл array_swap.php<br>**

**3. Реализовать парсер HTML тегов.**
<br>index.php вывод в виде массива.
<br>xml.php в виде XML документа
<br>json.php в виде JSON

parser/Parser.php - основные методы парсера.
parser/Html/php - методы для парсинга html страниц.
parser/tags - директория для файлов расширений работы с тегами
