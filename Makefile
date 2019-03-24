.PHONY: build install qa run clean

ifndef PHPVERSION
PHPVERSION=7.2
endif

IMAGE := apixu/apixu-php:php$(PHPVERSION)

all: qa

build:
	docker build --build-arg PHPVERSION=$(PHPVERSION) . -f dev/Dockerfile -t $(IMAGE)

install:
	docker run -ti --rm -v $(CURDIR):/src $(IMAGE) composer install

qa:
	docker run -ti --rm -v $(CURDIR):/src $(IMAGE) ./dev/qa.sh

run:
	docker run -ti --rm -v $(CURDIR):/src $(IMAGE) sh

clean:
	docker rmi $(IMAGE)
