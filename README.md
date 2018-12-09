# Commando Poulet

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/0df64f6663304345b88569ba8711b572)](https://app.codacy.com/app/codacy_alexandre-mace/commando_poulet?utm_source=github.com&utm_medium=referral&utm_content=alexandre-mace/commando_poulet&utm_campaign=Badge_Grade_Dashboard)

Turn-based strategy game made with Symfony 4 flex for fun

## Requirements 
*   [MySQL](https://www.mysql.com/fr/)
*   [PHP](http://php.net/manual/fr/intro-whatis.php)
*   [Apache](https://www.apache.org/)

## Installation 
*   Clone the repository and open it.

		$ git clone https://github.com/alexandre-mace/commando_poulet.git
		$ cd commando_poulet

*   Install dependencies.
		
		$ composer install

## Configuration
*   Customize the .env file

```
DATABASE_URL="mysql://db_user:db_password@127.0.0.1:3306/db_name"
```

*   Create database 

		$ php bin/console doctrine:database:create

*   Get tables 

		$ php bin/console doctrine:schema:update --force

*   Get data

		$ php bin/console hautelook:fixtures:load

## Play

* run a web server and go to the indicated address

		$ php bin/console server:run
		
* have fun ! :)
