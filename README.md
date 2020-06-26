
## movies API
Laravel movies API

## Fill database with sample data
Execute

` php artisan db:seed `

Please use integer values for genres & countries :  from 1 to 3

Available endpoints:

`GET / movies` - download movie list,

`POST / movies` - adding a movie,

`PUT / movies / id` - overwrites a specific movie,

`DELETE / movies / id` - deletes the selected movie,

for the search endpoint :

`GET / movies / search/?q` - search for a movie by title,

The paramater `q` receive the search query string.

