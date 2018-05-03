- Install composer localy ( [https://getcomposer.org/download/](https://getcomposer.org/download/) )

```
cd [PROJECT ROOT]
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
mkdir bin
php composer-setup.php --install-dir=bin --filename=composer
```

- Install PHPUnit ( [https://phpunit.de/getting-started/phpunit-5.html](https://phpunit.de/getting-started/phpunit-5.html) )

```
cd [PROJECT ROOT]
composer require --dev phpunit/phpunit ^5
./vendor/bin/phpunit --version
```

- Execute tests

```
cd [PROJECT ROOT]
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/EmailTest
```





