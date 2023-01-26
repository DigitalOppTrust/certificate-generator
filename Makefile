.PHONY: up
up:
	./vendor/bin/sail up --build

.PHONY: down
down:
	./vendor/bin/sail down

.PHONY: in
in:
	docker exec -it certificate-generator-1 /bin/bash
