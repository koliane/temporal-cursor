# Temporal + PHP + RoadRunner (минимум)

Простейший пример:
- `Temporal Server` и `Temporal UI` через `docker-compose`
- PHP worker на `RoadRunner`
- один `Workflow` + одна `Activity`

## Быстрый старт

```bash
docker compose up --build -d
```

Подождать 10-20 секунд, пока поднимется Temporal.

Запуск workflow:

```bash
docker compose exec worker php client.php
```

Ожидаемый вывод:

```text
Workflow result: Hello, Cursor from Temporal activity!
```

## Полезные адреса

- Temporal UI: http://localhost:8080
- Temporal gRPC: `localhost:7233`

## Остановка

```bash
docker compose down -v
```
