Inventory
=========
Welcome to my attempt to an hardware/software inventory script.

The goal is simple:
- hardware inventory
- software inventory / licensing
- linking it all together

Installation
============
- git clone https://github.com/TomCan/inventory.git
- cd inventory
- php /path/to/composer.phar install
--> enter the database and mailer settings when asked for
- php app/console doctrine:database:create (if applicable)
- php app/console doctrine:schema:create
