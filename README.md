# REST API для управления списком задач

### Структура методов API

- Создание задачи  
  POST /api/tasks  
  Описание: Создает новую задачу.  
  Тело запроса:  
  
  {
    "title": "Задача1",
    "description": "Задача1 описание",
    "due_date": "2025-11-22 13:38:44",
    "created_at": "2025-11-22 13:38:44",
    "priority": "Высокий",
    "category": "Работа",
    "status": "Не выполнена"
  }
  
  
  Ответ:  
  
  {
    "id": 1,
    "message": "Task created successfully"
  }
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

  /api/tasks?per_page=2&page=2 

  Ответ:  
  
{<br>
    "data": [<br>
        {<br>
            "id": 6,<br>
            "title": "Тест3",<br>
            "description": "Тест3 описание",<br>
            "due_date": "2025-08-28 14:37:17",<br>
            "created_at": "2025-03-02T14:05:03.000000Z",<br>
            "status": "Не выполнено",<br>
            "priority": "Высокий",<br>
            "category": "Личное"<br>
        },<br>
        {<br>
            "id": 7,<br>
            "title": "Тест4",<br>
            "description": "Тест4 описание",<br>
            "due_date": "2025-11-22 13:38:44",<br>
            "created_at": "2025-03-03T10:04:44.000000Z",<br>
            "status": "Не выполнено",<br>
            "priority": "Высокий",<br>
            "category": "Детский сад"<br>
        }<br>
    ],<br>
    "links": {<br>
        "first": "http://taskapilaravel.local/api/tasks?page=1",<br>
        "last": "http://taskapilaravel.local/api/tasks?page=2",<br>
        "prev": "http://taskapilaravel.local/api/tasks?page=1",<br>
        "next": null<br>
    },<br>
    "meta": {<br>
        "current_page": 2,<br>
        "from": 3,<br>
        "last_page": 2,<br>
        "links": [<br>
            {<br>
                "url": "http://taskapilaravel.local/api/tasks?page=1",<br>
                "label": "&laquo; Previous",<br>
                "active": false<br>
            },<br>
            {<br>
                "url": "http://taskapilaravel.local/api/tasks?page=1",<br>
                "label": "1",<br>
                "active": false<br>
            },<br>
            {<br>
                "url": "http://taskapilaravel.local/api/tasks?page=2",<br>
                "label": "2",<br>
                "active": true<br>
            },<br>
            {<br>
                "url": null,<br>
                "label": "Next &raquo;",<br>
                "active": false<br>
            }<br>
        ],<br>
        "path": "http://taskapilaravel.local/api/tasks",<br>
        "per_page": 2,<br>
        "to": 4,<br>
        "total": 4<br>
    }<br>
}
    <hr>
- Получение конкретной задачи  
  GET /api/tasks/{id}  
  Описание: Возвращает задачу по её ID.  
  Ответ:  
  
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
    <hr>
- Обновление задачи  
  PUT /api/tasks/{id}  
  Описание: Обновляет информацию о задаче.  
  Тело запроса:  
  
  {
    "title": "Задача2",
    "description": "Задача2 описание обновленное",
    "due_date": "2025-11-22 13:38:44",
    "status": "Выполнена"
    "priority": "Низкий",
    "category": "Работа"
  }
  
  
  Ответ:  
  
  {
    "message": "Task updated successfully"
  }
    <hr>
- Удаление задачи  
  DELETE /api/tasks/{id}  
  Описание: Удаляет задачу по её ID.  
  Ответ:  
  
  {
    "message": "Task deleted successfully"
  }
    <hr>
### Допустимые значения полей "status" и "priority"
- status: 'Выполнено', 'Не выполнено' (по умолчанию "Не выполнено")

- priority: 'Низкий', 'Средний', 'Высокий' (по умолчанию "Средний")
    <hr>
### Тестирование
- Тестирование функционала проводилось в программе Postman. Скриншоты с примерами запросов и результатами находятся в директории <b>taskapilaravel.local/ScreenTests/</b>
    <hr>
### Файлы с реализацией
- /taskapilaravel.local/routes/api.php/
- /taskapilaravel.local/app/Models/Task.php/
- /taskapilaravel.local/app/Http/Requests/TaskStoreRequest.php/
- /taskapilaravel.local/app/Http/Requests/TaskUpdateRequest.php/
- /taskapilaravel.local/app/Http/Resources/TaskResource.php/
- /taskapilaravel.local/app/Http/Controllers/TaskController.php/
- /taskapilaravel.local/database/migrations/2025_02_28_185637_create_tasks_table.php/
- /taskapilaravel.local/database/factories/TaskFactory.php/
- /taskapilaravel.local/database/seeders/TaskSeeder.php/