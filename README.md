
## movies API
Laravel movies API

## Fill database with sample data
Execute

` php artisan db:seed `

## Available endpoints

`GET / movies` - download movie list,

`POST / movies` - adding a movie,

| Parameter  | Description |
| ------------- | ------------- |
| `title`  | title  |
| `genres` | film genres : aray of genres ids, you can use integer values : from 1 to 3 |
| `cover`  | cover  : image |
| `description`  | film description : text |
| `country_id`  | country of production : integer id of country, you can use integer values : from 1 to 3|

`PUT / movies / id` - overwrites a specific movie,

| Parameter  | Description |
| ------------- | ------------- |
| `title`  | title  |
| `genres` | film genres : aray of genres ids, you can use integer values : from 1 to 3 |
| `cover`  | cover  : image |
| `description`  | film description : text |
| `country_id`  | country of production : integer id of country, you can use integer values : from 1 to 3|

`DELETE / movies / id` - deletes the selected movie,

For the search endpoint :

`GET / movies / search/?q` - search for a movie by title,

| Parameter  | Description |
| ------------- | ------------- |
| `q`  | search query string  as film title  |

The paramater `q` receive the search query string.

