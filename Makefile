COMPOSER := $(shell if [ `which composer` ]; then echo 'composer'; else curl -sS https://getcomposer.org/installer | php > /dev/null 2>&1 ; echo './composer.phar'; fi;)
all: vendor

vendor:
	@echo 'Install dependencies';
	$(COMPOSER) install
test: vendor tests/coverage
	@echo 'Generate Praspel tests';
	vendor/bin/praspel generate -c Praspel\\Example -r .
	@echo 'Run all tests'
	vendor/bin/atoum -d tests
update:
	$(COMPOSER) update
	make test
tests/coverage:
	mkdir -p tests/coverage
clean:
	@echo 'Remove vendor and praspel folders'
	rm -rf vendor
	rm -rf tests/praspel
.PHONY: clean
