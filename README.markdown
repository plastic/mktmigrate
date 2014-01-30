[![Latest Stable Version](https://poser.pugx.org/plastic/mktmigrate/v/stable.png)](https://packagist.org/packages/plastic/mktmigrate) [![Total Downloads](https://poser.pugx.org/plastic/mktmigrate/downloads.png)](https://packagist.org/packages/plastic/mktmigrate) [![Latest Unstable Version](https://poser.pugx.org/plastic/mktmigrate/v/unstable.png)](https://packagist.org/packages/plastic/mktmigrate) [![License](https://poser.pugx.org/plastic/mktmigrate/license.png)](https://packagist.org/packages/plastic/mktmigrate)

mktmigrate
==========

dump schema interface

## Requirements

* CakePHP 2.x
* PHP>=5.3

## Installation

app/Config/bootstrap.php
``` php
CakePlugin::load('MktMigrate', array('bootstrap' => true, 'routes' => false));
```

ou

``` json
{
   "require": {
       "plastic/mktmigrate": "dev-master"
   }
}
```

## Starting

/app/Plugin/MktMigrate/Config/bootstrap.php alter credentials
``` php
Configure::write('MktMigrate.login', 'migrate');
Configure::write('MktMigrate.pass', 'migrate');
```