### Current API

| Route | Method | Auth? | Description |
| --- | --- | --- | --- |
| /api/auth/signup | POST | No | User sign up |
| /api/auth/login | POST | No | User login, returns Bearer token |
| /api/auth/logout | GET | Yes | User logout |
| /api/auth/user | GET | Yes | Returns user data |
| /api/characters | GET | No | Returns list of characters |
| /api/characters/{id} | GET | No | Returns a chosen character |
| /api/characters | POST | No | Inserts a new character |
| /api/characters/{id} | PUT | No | Edits the chosen character |
| /api/characters/{id} | DELETE | No | Delete the chosen character |
| /api/characters/{id}/creators | GET | No | Returns the creators of a chosen character |
| /api/characters/{id}/stories | GET | No | Returns the stories where the chosen character appears |
| /api/characters/{id}/comics | GET | No | Returns the comics where the chosen character appears |
| /api/characters/{id}/series | GET | No | Returns the series where the chosen character appears |
| /api/characters/{id}/events | GET | No | Returns the events where the chosen characters appears |
| /api/creators | GET | No | Returns all creators |
| /api/creators{id} | GET | No | Returns the chosen creator |
| /api/creators | POST | No | Inserts a new creator |
| /api/creators/{id} | PUT | No | Edits the chosen creator |
| /api/creators/{id} | DELETE | No | Deletes the chosen creator |
| /api/events | GET | No  | Returns all events | 
| /api/events/{id} | GET | No | Returns the chosen event |
| /api/events | POST | No | Inserts a new event |
| /api/events/{id} | PUT | No | Edits the chosen event |
| /api/events/{id} | DELETE | No | Deletes the chosen event |
| /api/series | GET | No | Returns all series |
| /api/series/{id} | GET | No | Returns the chosen series |
| /api/series | POST | No | Inserts a new series |
| /api/series/{id} | PUT | No | Edits the chosen series |
| /api/series/{id} | DELETE | No | Delete the chosen series |
| /api/comics | GET | No | Returns all comics |
| /api/comics/{id} | GET | No | Returns the chosen comic |
| /api/comics | POST | No | Inserts a new comic |
| /api/comics/{id} | PUT | No | Edits the chosen comic |
| /api/comics/{id} | DELETE | No | Delete the chosen comic |
| /api/stories | GET | No | Returns all stories |
| /api/stories/{id} | GET | No | Returns the chosen story |
| /api/stories | POST | No | Inserts a new story |
| /api/stories/{id} | PUT | No | Edits the chosen story |
| /api/stories/{id} | DELETE | No | Deletes the chosen story |
