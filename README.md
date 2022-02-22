## News parser
Author: Artem Kachan

Instruments:
* PHP 7.4;
* Laravel 8;
* Parsing library RSS - https://packagist.org/packages/nicolus/picofeed;
* MySQL;
* OpenServer.

## Description
    News is parsed from added sources, for example (https://tsn.ua/rss), every 10 minutes, after which the data is entered into the database and displayed on the home page.
    
    How to use:
    - Set up cron on 10 minutes. (schedule command in Console\Kernel.php);
    - Turn "php artisan queue:work" for implementation `jobs`;
    - Check result on home page. ('/')
    - For adding new sources - create a new user, and do this in Admin Panel.
