
## movies API
Laravel movies API

## Fill database with sample data

please execute

` php artisan db:seed `

use integer values for genres & countries :  from 1 to 3

available endpoints:
GET / movies - download movie list,
POST / movies - adding a movie,
PUT / movies / id - overwrites a specific movie,
DELETE / movies / id - deletes the selected movie,
for the search endpoint :
GET / movies / search/?q - search for a movie by title,
the paramater q received the search query.

