This is a simple PHP project with some PHPUnit test. The project uses composer for install PHPUnit. 

- How was installed composer localy ( [https://getcomposer.org/download/](https://getcomposer.org/download/) )

```
cd [PROJECT ROOT]
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
mkdir bin
php composer-setup.php --install-dir=bin --filename=composer
```

- How was installed PHPUnit ( [https://phpunit.de/getting-started/phpunit-5.html](https://phpunit.de/getting-started/phpunit-5.html) )

```
cd [PROJECT ROOT]
composer require --dev phpunit/phpunit ^5
./vendor/bin/phpunit --version
```

- How to execute manual tests

```
cd [PROJECT ROOT]
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/EmailTest
```

- How to execute automated test in Jenkins DashBoard (require xUnit plugin)
	- New job
	- Name as "simple-php-composer-app" and select "Pipeline"
	- On Pileline section
		- Select "Pipeline script ... SCM"
		- Select git
			- Reposiroty URL "https://github.com/Malinoski/simple-php-composer-app.git"
	- Save
	- Open Open Blue Ocean and run
			







