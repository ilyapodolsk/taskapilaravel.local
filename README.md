# REST API для управления списком задач

### Структура методов API

- Создание задачи  
  POST /api/tasks  
  Описание: Создает новую задачу.  
  Тело запроса:  
  
```json
{
    "title": "Задача1",
    "description": "Задача1 описание",
    "due_date": "2025-11-22 13:38:44",
    "created_at": "2025-11-22 13:38:44",
    "priority": "Высокий",
    "category": "Работа",
    "status": "Не выполнена"
}
```
  
  Ответ:  
  
```json
{
    "id": 1,
    "message": "Task created successfully"
}
```
<hr>

- Получение списка задач  
  GET /api/tasks  
  Описание: Возвращает список задач с возможностью поиска и сортировки.  
  Параметры запроса (опционально):
  - search: поиск по названию.
  - sort: due_date, created_at.
  - per_page: количество задач на странице.
  - page: номер страницы.

  Примеры запросов:  
  /api/tasks?search=Задача1&sort=due_date  

  Ответ:  
  
```json
  [
    {
      "id": 1,
      "title": "Задача1",
      "description": "Задача1 описание",
      "due_date": "2025-11-22 13:38:44",
      "created_at": "2025-11-22 13:38:44",
      "status": "Не выполнено",
      "priority": "Высокий",
      "category": "Работа",
    }
  ]
```
  /api/tasks?per_page=2&page=2 

  Ответ:  
  
```json
{
    "data": [
        {
            "id": 6,
            "title": "Тест3",
            "description": "Тест3 описание",
            "due_date": "2025-08-28 14:37:17",
            "created_at": "2025-03-02T14:05:03.000000Z",
            "status": "Не выполнено",
            "priority": "Высокий",
            "category": "Личное"
        },
        {
            "id": 7,
            "title": "Тест4",
            "description": "Тест4 описание",
            "due_date": "2025-11-22 13:38:44",
            "created_at": "2025-03-03T10:04:44.000000Z",
            "status": "Не выполнено",
            "priority": "Высокий",
            "category": "Детский сад"
        }
    ],
    "links": {
        "first": "http://taskapilaravel.local/api/tasks?page=1",
        "last": "http://taskapilaravel.local/api/tasks?page=2",
        "prev": "http://taskapilaravel.local/api/tasks?page=1",
        "next": null
    },
    "meta": {
        "current_page": 2,
        "from": 3,
        "last_page": 2,
        "links": [
            {
                "url": "http://taskapilaravel.local/api/tasks?page=1",
                "label": "&laquo; Previous",
                "active": false
            },
            {
                "url": "http://taskapilaravel.local/api/tasks?page=1",
                "label": "1",
                "active": false
            },
            {
                "url": "http://taskapilaravel.local/api/tasks?page=2",
                "label": "2",
                "active": true
            },
            {
                "url": null,
                "label": "Next &raquo;",
                "active": false
            }
        ],
        "path": "http://taskapilaravel.local/api/tasks",
        "per_page": 2,
        "to": 4,
        "total": 4
    }
}
```
<hr>

- Получение конкретной задачи  
  GET /api/tasks/{id}  
  Описание: Возвращает задачу по её ID.  
  Ответ:  
  
```json
{
    "id": 1,
    "title": "Задача1",
    "description": "Задача1 описание",
    "due_date": "2025-11-22 13:38:44",
    "created_at": "2025-11-22 13:38:44",
    "status": "Не выполнено",
    "priority": "Высокий",
    "category": "Работа"
}
```
<hr>

- Обновление задачи  
  PUT /api/tasks/{id}  
  Описание: Обновляет информацию о задаче.  
  Тело запроса:  
  
```json
{
    "title": "Задача2",
    "description": "Задача2 описание обновленное",
    "due_date": "2025-11-22 13:38:44",
    "status": "Выполнена",
    "priority": "Низкий",
    "category": "Работа"
}
```
  
  
  Ответ:  
  
```json
{
    "message": "Task updated successfully"
}
```
<hr>

- Удаление задачи  
  DELETE /api/tasks/{id}  
  Описание: Удаляет задачу по её ID.  
  Ответ:  
  
```json
  {
    "message": "Task deleted successfully"
  }
```
<hr>

### Правила валидации

| Поле          | Правила валидации (Добавление)                    | Правила валидации (Редактирование)                    | Описание                                    |
|---------------|---------------------------------------------------|-------------------------------------------------------|---------------------------------------------|
| `title`       | `required\|string\|max:255`                       | `sometimes\|required\|string\|max:255`                | Заголовок задачи                            |
| `description` | `required\|string`                                | `sometimes\|required\|string`                         | Описание задачи                             |
| `due_date`    | `required\|date`                                  | `sometimes\|required\|date`                           | Дата выполнения задачи                      |
| `status`      | `required\|in:Выполнено,Не выполнено`             | `sometimes\|required\|in:Выполнено,Не выполнено`      | Статус задачи (Выполнено или Не выполнено)  |
| `priority`    | `required\|in:Низкий,Средний,Высокий`             | `sometimes\|required\|in:Низкий,Средний,Высокий`      | Приоритет задачи (Низкий, Средний, Высокий) |
| `category`    | `nullable\|string\|max:50`                        | `nullable\|string\|max:50`                            | Категория задачи                            |
<hr>

### Тестирование
- Тестирование функционала проводилось в программе Postman. Скриншоты с примерами запросов и результатами находятся в директории <b>/ScreenTests/</b>
    <hr>
### Файлы с реализацией
- /taskapilaravel.local/routes/api.php
- /taskapilaravel.local/app/Models/Task.php
- /taskapilaravel.local/app/Http/Requests/TaskStoreRequest.php
- /taskapilaravel.local/app/Http/Requests/TaskUpdateRequest.php
- /taskapilaravel.local/app/Http/Resources/TaskResource.php
- /taskapilaravel.local/app/Http/Controllers/TaskController.php
- /taskapilaravel.local/database/migrations/2025_02_28_185637_create_tasks_table.php
- /taskapilaravel.local/database/factories/TaskFactory.php
- /taskapilaravel.local/database/seeders/TaskSeeder.php