## News parser
Author: Artem Kachan - https://www.instagram.com/jacka4an/
Instruments:
* PHP 7.4;
* Laravel 8;
* Parsing library RSS - https://packagist.org/packages/nicolus/picofeed;
* MySQL;
* OpenServer.

## Description
    Every ten minutes will start artisan command for parsing, parsing command add to queues (tables `jobs` in database), after this you will need to turn something queue:work and check result on homepage.
