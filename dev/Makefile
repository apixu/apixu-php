.PHONY: qa

all: qa

test:
	../vendor/phpunit/phpunit/phpunit ../tests

qa: test
	../vendor/phpstan/phpstan/bin/phpstan analyse --level 7 ../src
	../vendor/phpmd/phpmd/src/bin/phpmd ../src text cleancode, codesize, controversial, design, naming, unusedcode
	../vendor/overtrue/phplint/bin/phplint ../src
