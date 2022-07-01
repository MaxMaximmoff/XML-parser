
## Парсер XML-выгрузки

Для запуска в консоли необходимо перейти в корневую папку скрипта.
Парсер запускается через команду:
 
>php add.php filename.xml

где filename.xml - файл выгрузки, который необходимо положить в папку /xml.
В случае отсутствия файла, отсутствия имени, неправильного указания имени данные загружаются из файла data_light.xml

## Файлы и папки:
add.php - скрипт, выполняющий загрузку

/db/DB.class.php - класс для работы с базой mySQL

/db/config.php - настройки базы данных

/dump/xml_parser_bd.sql - дамп базы данных

/lib/Offer.class.php - класс Offer

/lib/Offers.class.php - класс Offers

/lib/ParserXml.class.php - класс для парсинга XML

/xml/ - папка для размещения xml файлов выгрузки




