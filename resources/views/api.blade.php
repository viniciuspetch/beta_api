<link href="{{ asset('style.css') }}" rel="stylesheet">

<h2 id="how-to-instal-and-run">How to instal and run</h2>
<ul>
    <li>Configure the database on /config</li>
    <li><code>php artisan migrate --seed</code> to apply migrations and seeds</li>
    <li><code>php artisan passport:install</code> to add Passport keys</li>
    <li><code>php artisan serve</code> to start the server</li>
    <li>Access the endpoints below</li>
</ul>
<h2 id="api-endpoints">API Endpoints</h2>
<table>
    <thead>
        <tr>
            <th>Route</th>
            <th>Method</th>
            <th>Auth?</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>/api/auth/signup</td>
            <td>POST</td>
            <td>No</td>
            <td>User sign up</td>
        </tr>
        <tr>
            <td>/api/auth/login</td>
            <td>POST</td>
            <td>No</td>
            <td>User login, returns Bearer token</td>
        </tr>
        <tr>
            <td>/api/auth/logout</td>
            <td>GET</td>
            <td><strong>Yes</strong></td>
            <td>User logout</td>
        </tr>
        <tr>
            <td>/api/auth/user</td>
            <td>GET</td>
            <td><strong>Yes</strong></td>
            <td>Returns user data</td>
        </tr>
        <tr>
            <td>/api/characters</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns list of characters</td>
        </tr>
        <tr>
            <td>/api/characters/{id}</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns a chosen character</td>
        </tr>
        <tr>
            <td>/api/characters</td>
            <td>POST</td>
            <td><strong>Yes</strong></td>
            <td>Inserts a new character</td>
        </tr>
        <tr>
            <td>/api/characters/{id}</td>
            <td>PUT</td>
            <td><strong>Yes</strong></td>
            <td>Edits the chosen character</td>
        </tr>
        <tr>
            <td>/api/characters/{id}</td>
            <td>DELETE</td>
            <td><strong>Yes</strong></td>
            <td>Delete the chosen character</td>
        </tr>
        <tr>
            <td>/api/characters/{id}/creators</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns the creators of a chosen character</td>
        </tr>
        <tr>
            <td>/api/characters/{id}/stories</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns the stories where the chosen character appears</td>
        </tr>
        <tr>
            <td>/api/characters/{id}/comics</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns the comics where the chosen character appears</td>
        </tr>
        <tr>
            <td>/api/characters/{id}/series</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns the series where the chosen character appears</td>
        </tr>
        <tr>
            <td>/api/characters/{id}/events</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns the events where the chosen characters appears</td>
        </tr>
        <tr>
            <td>/api/creators</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns all creators</td>
        </tr>
        <tr>
            <td>/api/creators{id}</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns the chosen creator</td>
        </tr>
        <tr>
            <td>/api/creators</td>
            <td>POST</td>
            <td><strong>Yes</strong></td>
            <td>Inserts a new creator</td>
        </tr>
        <tr>
            <td>/api/creators/{id}</td>
            <td>PUT</td>
            <td><strong>Yes</strong></td>
            <td>Edits the chosen creator</td>
        </tr>
        <tr>
            <td>/api/creators/{id}</td>
            <td>DELETE</td>
            <td><strong>Yes</strong></td>
            <td>Deletes the chosen creator</td>
        </tr>
        <tr>
            <td>/api/events</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns all events</td>
        </tr>
        <tr>
            <td>/api/events/{id}</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns the chosen event</td>
        </tr>
        <tr>
            <td>/api/events</td>
            <td>POST</td>
            <td><strong>Yes</strong></td>
            <td>Inserts a new event</td>
        </tr>
        <tr>
            <td>/api/events/{id}</td>
            <td>PUT</td>
            <td><strong>Yes</strong></td>
            <td>Edits the chosen event</td>
        </tr>
        <tr>
            <td>/api/events/{id}</td>
            <td>DELETE</td>
            <td><strong>Yes</strong></td>
            <td>Deletes the chosen event</td>
        </tr>
        <tr>
            <td>/api/series</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns all series</td>
        </tr>
        <tr>
            <td>/api/series/{id}</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns the chosen series</td>
        </tr>
        <tr>
            <td>/api/series</td>
            <td>POST</td>
            <td><strong>Yes</strong></td>
            <td>Inserts a new series</td>
        </tr>
        <tr>
            <td>/api/series/{id}</td>
            <td>PUT</td>
            <td><strong>Yes</strong></td>
            <td>Edits the chosen series</td>
        </tr>
        <tr>
            <td>/api/series/{id}</td>
            <td>DELETE</td>
            <td><strong>Yes</strong></td>
            <td>Delete the chosen series</td>
        </tr>
        <tr>
            <td>/api/comics</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns all comics</td>
        </tr>
        <tr>
            <td>/api/comics/{id}</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns the chosen comic</td>
        </tr>
        <tr>
            <td>/api/comics/{id}/stories</td>
            <td>GET</td>
            <td><strong>Yes</strong></td>
            <td>Returns the stories of the chosen comic</td>
        </tr>
        <tr>
            <td>/api/comics</td>
            <td>POST</td>
            <td><strong>Yes</strong></td>
            <td>Inserts a new comic</td>
        </tr>
        <tr>
            <td>/api/comics/{id}</td>
            <td>PUT</td>
            <td><strong>Yes</strong></td>
            <td>Edits the chosen comic</td>
        </tr>
        <tr>
            <td>/api/comics/{id}</td>
            <td>DELETE</td>
            <td><strong>Yes</strong></td>
            <td>Delete the chosen comic</td>
        </tr>
        <tr>
            <td>/api/stories</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns all stories</td>
        </tr>
        <tr>
            <td>/api/stories/{id}</td>
            <td>GET</td>
            <td>No</td>
            <td>Returns the chosen story</td>
        </tr>
        <tr>
            <td>/api/stories</td>
            <td>POST</td>
            <td><strong>Yes</strong></td>
            <td>Inserts a new story</td>
        </tr>
        <tr>
            <td>/api/stories/{id}</td>
            <td>PUT</td>
            <td><strong>Yes</strong></td>
            <td>Edits the chosen story</td>
        </tr>
        <tr>
            <td>/api/stories/{id}</td>
            <td>DELETE</td>
            <td><strong>Yes</strong></td>
            <td>Deletes the chosen story</td>
        </tr>
        <tr>
            <td>/api/character_creator</td>
            <td>GET</td>
            <td><strong>Yes</strong></td>
            <td>Returns all character-creator relationships</td>
        </tr>
        <tr>
            <td>/api/character_creator/{id}</td>
            <td>GET</td>
            <td><strong>Yes</strong></td>
            <td>Returns the chosen character-creator relationship</td>
        </tr>
        <tr>
            <td>/api/character_creator</td>
            <td>POST</td>
            <td><strong>Yes</strong></td>
            <td>Inserts a new character-creator relationship</td>
        </tr>
        <tr>
            <td>/api/character_creator/{id}</td>
            <td>DELETE</td>
            <td><strong>Yes</strong></td>
            <td>Deletes the chosen character-creator relationship</td>
        </tr>
        <tr>
            <td>/api/character_story</td>
            <td>GET</td>
            <td><strong>Yes</strong></td>
            <td>Returns all character-story relationships</td>
        </tr>
        <tr>
            <td>/api/character_story/{id}</td>
            <td>GET</td>
            <td><strong>Yes</strong></td>
            <td>Returns the chosen character-story relationship</td>
        </tr>
        <tr>
            <td>/api/character_story</td>
            <td>POST</td>
            <td><strong>Yes</strong></td>
            <td>Inserts a new character-story relationship</td>
        </tr>
        <tr>
            <td>/api/character_story/{id}</td>
            <td>DELETE</td>
            <td><strong>Yes</strong></td>
            <td>Deletes the chosen character-story relationship</td>
        </tr>
        <tr>
            <td>/api/creator_story</td>
            <td>GET</td>
            <td><strong>Yes</strong></td>
            <td>Returns all creator-story relationships</td>
        </tr>
        <tr>
            <td>/api/creator_story/{id}</td>
            <td>GET</td>
            <td><strong>Yes</strong></td>
            <td>Returns the chosen creator-story relationship</td>
        </tr>
        <tr>
            <td>/api/creator_story</td>
            <td>POST</td>
            <td><strong>Yes</strong></td>
            <td>Inserts a new creator-story relationship</td>
        </tr>
        <tr>
            <td>/api/creator_story/{id}</td>
            <td>DELETE</td>
            <td><strong>Yes</strong></td>
            <td>Deletes the chosen creator-story relationship</td>
        </tr>
        <tr>
            <td>/api/event_story</td>
            <td>GET</td>
            <td><strong>Yes</strong></td>
            <td>Returns all event-story relationships</td>
        </tr>
        <tr>
            <td>/api/event_story/{id}</td>
            <td>GET</td>
            <td><strong>Yes</strong></td>
            <td>Returns the chosen event-story relationship</td>
        </tr>
        <tr>
            <td>/api/event_story</td>
            <td>POST</td>
            <td><strong>Yes</strong></td>
            <td>Inserts a new event-story relationship</td>
        </tr>
        <tr>
            <td>/api/event_story/{id}</td>
            <td>DELETE</td>
            <td><strong>Yes</strong></td>
            <td>Deletes the chosen event-story relationship</td>
        </tr>
    </tbody>
</table>