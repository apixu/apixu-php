.PHONY: build install qa run clean

ifndef PHPVERSION
PHPVERSION=7.2
endif

XDEBUG := xdebug
ifeq ($(PHPVERSION),7.3)
	XDEBUG := xdebug-beta
endif

IMAGE := apixu/apixu-php:php$(PHPVERSION)

all: qa

build:
	docker build --build-arg PHPVERSION=$(PHPVERSION) --build-arg XDEBUG=$(XDEBUG) . -f dev/Dockerfile -t $(IMAGE)

install:
	docker run -ti --rm -v $(CURDIR):/src $(IMAGE) composer install --no-dev

qa:
	docker run -ti --rm -v $(CURDIR):/src $(IMAGE) ./dev/qa.sh

run:
	docker run -ti --rm -v $(CURDIR):/src $(IMAGE) sh

clean:
	docker rmi $(IMAGE)
