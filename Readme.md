# Учебный API

## Быстрый старт
```bash 
docker compose up -d --build запустить и сбилдить все контейнеры
```

## Доступные эндпоинты:

1. `GET /api/learn/hello` - простой пример
2. `POST /api/learn/echo` - возвращает отправленные данные
3. `GET /api/learn/calculate/{a}/{b}` - математические операции

## Как добавить новый endpoint:

1. Создай новый метод в `LearningController`
2. Добавь атрибут `#[Route]` с URL и методами
3. Возвращай результат через `$this->json()`
