## How to instal and run
-   Configure the database on /config
-   `php artisan migrate --seed` to apply migrations and seeds
-   `php artisan passport:install` to add Passport keys
-   `php artisan serve` to start the server
- Add on client header: `Content-Type: application/json` and `X-Requested-With: XMLHttpRequest`
-   Access the endpoints below

## API Endpoints
| Route                         | Method | Auth? | Description                                            |
| ----------------------------- | ------ | ----- | ------------------------------------------------------ |
| /, /api              | GET   | No    | This documentation, but in HTML |
| /api/auth/signup              | POST   | No    | User sign up. Fields: 'name', 'email', 'password', 'password_confirmation'                                           |
| /api/auth/login               | POST   | No    | User login, returns Bearer token. Fields: 'email', 'password'                       |
| /api/auth/logout              | GET    | **Yes**   | User logout                                            |
| /api/auth/user                | GET    | **Yes**   | Returns user data                                      |
| /api/characters               | GET    | No    | Returns list of characters                             |
| /api/characters/{id}          | GET    | No    | Returns a chosen character                             |
| /api/characters               | POST   | **Yes**   | Inserts a new character. Fields: 'name', 'description', 'url'                                |
| /api/characters/{id}          | PUT    | **Yes**   | Edits the chosen character. Fields: 'name', 'description', 'url'                             |
| /api/characters/{id}          | DELETE | **Yes**   | Delete the chosen character                            |
| /api/characters/{id}/creators | GET    | No    | Returns the creators of a chosen character             |
| /api/characters/{id}/stories  | GET    | No    | Returns the stories which the chosen character appears |
| /api/characters/{id}/comics   | GET    | No    | Returns the comics which the chosen character appears  |
| /api/characters/{id}/series   | GET    | No    | Returns the series which the chosen character appears  |
| /api/characters/{id}/events   | GET    | No    | Returns the events which the chosen character appears |
| /api/creators                 | GET    | No    | Returns all creators                                   |
| /api/creators{id}             | GET    | No    | Returns the chosen creator                             |
| /api/creators                 | POST   | **Yes**   | Inserts a new creator. Fields: 'first_name', 'middle_name', 'last_name', 'url'                                  |
| /api/creators/{id}            | PUT    | **Yes**   | Edits the chosen creator. Fields: 'first_name', 'middle_name', 'last_name', 'url'                               |
| /api/creators/{id}            | DELETE | **Yes**   | Deletes the chosen creator                             |
| /api/events                   | GET    | No    | Returns all events                                     |
| /api/events/{id}              | GET    | No    | Returns the chosen event                               |
| /api/events                   | POST   | **Yes**   | Inserts a new event. Fields: 'name'                                    |
| /api/events/{id}              | PUT    | **Yes**   | Edits the chosen event. Fields: 'name'                                  |
| /api/events/{id}              | DELETE | **Yes**   | Deletes the chosen event                               |
| /api/series                   | GET    | No    | Returns all series                                     |
| /api/series/{id}              | GET    | No    | Returns the chosen series                              |
| /api/series/{id}/comics      | GET    | **Yes**   | Returns the comics of the chosen series                |
| /api/series                   | POST   | **Yes**   | Inserts a new series. Fields: 'name'                                    |
| /api/series/{id}              | PUT    | **Yes**   | Edits the chosen series. Fields: 'name'                                 |
| /api/series/{id}              | DELETE | **Yes**   | Delete the chosen series                               |
| /api/comics                   | GET    | No    | Returns all comics                                     |
| /api/comics/{id}              | GET    | No    | Returns the chosen comic                               |
| /api/comics/{id}/stories      | GET    | **Yes**   | Returns the stories of the chosen comic                |
| /api/comics                   | POST   | **Yes**   | Inserts a new comic. Fields: 'name', 'series_id'                                     |
| /api/comics/{id}              | PUT    | **Yes**   | Edits the chosen comic. Fields: 'name', 'series_id'                                 |
| /api/comics/{id}              | DELETE | **Yes**   | Delete the chosen comic                                |
| /api/stories                  | GET    | No    | Returns all stories                                    |
| /api/stories/{id}             | GET    | No    | Returns the chosen story                               |
| /api/stories                  | POST   | **Yes**   | Inserts a new story. Fields: 'name', 'comic_id'                                    |
| /api/stories/{id}             | PUT    | **Yes**   | Edits the chosen story. Fields: 'name', 'comic_id'                                 |
| /api/stories/{id}             | DELETE | **Yes**   | Deletes the chosen story                               |
| /api/character_creator | GET | **Yes** | Returns all character-creator relationships |
| /api/character_creator/{id} | GET | **Yes** | Returns the chosen character-creator relationship |
| /api/character_creator | POST | **Yes** | Inserts a new character-creator relationship |
| /api/character_creator/{id} | DELETE | **Yes** | Deletes the chosen character-creator relationship |
| /api/character_story | GET | **Yes** | Returns all character-story relationships |
| /api/character_story/{id} | GET | **Yes** | Returns the chosen character-story relationship |
| /api/character_story | POST | **Yes** | Inserts a new character-story relationship |
| /api/character_story/{id} | DELETE | **Yes** | Deletes the chosen character-story relationship |
| /api/creator_story | GET | **Yes** | Returns all creator-story relationships |
| /api/creator_story/{id} | GET | **Yes** | Returns the chosen creator-story relationship |
| /api/creator_story | POST | **Yes** | Inserts a new creator-story relationship |
| /api/creator_story/{id} | DELETE | **Yes** | Deletes the chosen creator-story relationship |
| /api/event_story | GET | **Yes** | Returns all event-story relationships |
| /api/event_story/{id} | GET | **Yes** | Returns the chosen event-story relationship |
| /api/event_story | POST | **Yes** | Inserts a new event-story relationship |
| /api/event_story/{id} | DELETE | **Yes** | Deletes the chosen event-story relationship |
