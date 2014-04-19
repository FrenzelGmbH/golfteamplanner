golfteamplanner
===============

Golf Team Planning Module for yii2 framework. Expects you to have a tbl_user in your database, containing the "id" field... The module includes the following functionalities

* HCP - Management
* Team Tournament Event Management
 - Dates
 - Player commitments
 - Revision

It's published under the GPL v2. If you wanna have support, pls. contact philipp@frenzel.net. You can use the software as is..;)

Installation
============

Install package via composer "frenzelgmbh/golfteamplanner": "dev-master"

Update config file *config/web.php* and *config/db.php*

```php
// app/config/web.php
return [
    'modules' => [
        'golfteamplanner' => [
            'class' => 'frenzelgmbh\golfteamplanner\Module',
            // set custom module properties here ...
        ],
    ],
];
// app/config/db.php
return [
        'class' => 'yii\db\Connection',
        // set up db info
];
```

Run migration file
php yii migrate --migrationPath=@vendor/frenzelgmbh/golfteamplanner/migrations
