# Meleton.ru - тестовое задание

## Дано

```
Project
-title string
-description text

ProjectArticle

-title string
-content text


ProjectUser
-headline string
-first_name string


ProjectHasContent
-project_id
- ? 
```

**Отношения между объектами:** 

- ONE Project HAS MANY ProjectArticle
- ONE Project HAS MANY ProjectUser

## Задание

- Написать actions для добавление файлов для ProjectArticle и ProjectUser используя библиотеку https://github.com/spatie/laravel-medialibrary
- Написать добавление ProjectUser и ProjectArticle для Project используя полиморфные связи и промежуточную таблицу ProjectHasContent
- Написать экшн для получения Project по :id вместе со всеми его ProjectArticle и ProjectUser, экшн должен возвращаться JSON и должен использоватьтрасформеры Laravel (Illuminate\Http\Resources\Json\JsonResource класс)
