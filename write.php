<?php
// Запись в файл
file_put_contents("example.txt", "Это текст из PHP!");

// Чтение из файла
$content = file_get_contents("example.txt");
echo "Содержимое файла: $content";
?>
