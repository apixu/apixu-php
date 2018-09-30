#!/usr/bin/env sh

VENDOR=/qa/vendor

${VENDOR}/phpunit/phpunit/phpunit -c dev/phpunit.xml
${VENDOR}/phpstan/phpstan/bin/phpstan analyse --level 7 src
${VENDOR}/overtrue/phplint/bin/phplint -c dev/phplint.yml
${VENDOR}/squizlabs/php_codesniffer/bin/phpcs --standard=PSR2 src
${VENDOR}/squizlabs/php_codesniffer/bin/phpcbf --standard=PSR2 src
${VENDOR}/phpmd/phpmd/src/bin/phpmd src text dev/phpmd.xml
