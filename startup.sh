#!/usr/bin/env bash

if [ ! -f .git/hooks/pre-commit ]; then
    cp example.git-pre-commit .git/hooks/pre-commit
fi

if [ ! -f .git/hooks/commit-msg ]; then
    cp example.git-commit-msg .git/hooks/commit-msg
fi

COMPOSE_FILES="-f docker-compose.yml"

if [[ -f "docker-compose.local.yml" ]]; then
  COMPOSE_FILES="${COMPOSE_FILES} -f docker-compose.local.yml"
fi

echo "Using compose files: ${COMPOSE_FILES}"

docker compose ${COMPOSE_FILES} up -d --force-recreate || exit 1
docker compose ${COMPOSE_FILES} ps || exit 1
docker compose ${COMPOSE_FILES} exec php bash || exit 1
