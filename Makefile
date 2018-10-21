.PHONY: build

IMAGE := apixu/apixu-php

all: qa

build:
	docker build . -f dev/Dockerfile -t $(IMAGE)

install:
	docker run -ti --rm -v $(CURDIR):/src $(IMAGE) composer install

qa:
	docker run -ti --rm -v $(CURDIR):/src $(IMAGE) ./dev/qa.sh

run:
	docker run -ti --rm -v $(CURDIR):/src $(IMAGE) sh

clean:
	docker rmi $(IMAGE)
