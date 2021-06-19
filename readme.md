![image](https://store-images.s-microsoft.com/image/apps.25752.9007199266579178.af0d2350-1c29-4348-a2d3-d358deee403e.f7f33e5a-ca7c-49ff-bf9d-98d03e2df1ad?mode=scale&q=90&h=300&w=300)

# windsurf437/fotkapl

FotkaPl is nothing more than a little help in handling API queries provided by the https://fotka.pl/ portal. The class is in an early stage of development.

---

## It's legal ?
Yes! fotkapl use official fotka.pl API in secound version.

##  Requiment

* composer
* php 7.4 or greater
* php 7.4-json
* php 7.4-mbstring

## How install

```bash
git clone https://github.com/windsurf437/fotkapl.git FotkaPl
cd FotkaPl
composer install
```

## Example

```php
<?php

use Windsurf437\FotkaPL\Fotka;
use Windsurf437\FotkaPL\Response;

require __DIR__ . '/vendor/autoload.php';

$fotka = new Fotka();
$response = new Response(null);

$fotka->login("login","password");
$fotka->getOnlineUsers(Fotka::$GENDER_FEMALE,16,20,10,$response);

foreach ($response->getObject()->online->users as $user){
    echo $user->login.PHP_EOL;
    echo $user->id.PHP_EOL;
    echo "----".PHP_EOL;
}


return 0;
```

## Available methods

|Method|Status|
|---|-----|
|/user/login|Done|
|/user/online|Done|
|/user/about|in progress|
|/user/vote/photo/|in progress|
|/user/photos/|in progress|
