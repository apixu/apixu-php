# Apixu PHP

PHP library for [Apixu Weather API](https://www.apixu.com/api.aspx)

## Development

* Requirements:
    * Docker
    * Docker Compose

* Run:
    * cd dev
    * Setup env: docker-compose run dev composer install
    * Open env: docker-compose run dev sh
    * Inside env:
        * Tests: ./vendor/phpunit/phpunit/phpunit tests
        * Static analysis: ./vendor/phpstan/phpstan/bin/phpstan analyse --level 7 src
        * Mess detector: ./vendor/phpmd/phpmd/src/bin/phpmd src text cleancode, codesize, controversial, design, naming, unusedcode
        * Lint: ./vendor/overtrue/phplint/bin/phplint src
