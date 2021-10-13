# Weather API via API Platform that based Symfony

Just another learning challange. With this challange i manage to develop  weather api via [API Platform](https://api-platform.com/) that based [Symfony](https://symfony.com/) without any foreknowledge about api platform except my [full-stack web developer](https://emircanerkul.com/) career within totally a week.

On this project symfony's data fixtures, doctrine migrations, data persisters, custom commands developed and entities generated with maker bundle and customized for api platform integration. For jwt authentication admin user is in memory user, other users are entities.

#### Bulding this project as easy as writing 2 commands thanks to [docker](https://www.docker.com/)

- `docker-compose build`
- `docker-compose up -d`

##### The custom command is for simulating real situations and testing server capacity.

Each minute inserts almost 1000 random weather data.

`*/1 * * * * /usr/bin/docker-compose -f /root/weather-api/docker-compose.yml exec -T php  bin/console  weather:generator`

For short time I deploy this project. You can access it with full authentication.

Swagger: https://api-platform-weather-api.emircanerkul.com/docs
Redoc: https://api-platform-weather-api.emircanerkul.com/docs?ui=re_doc
Admin Panel: https://api-platform-weather-api.emircanerkul.com/admin#/login (need to refresh after logged in)

```yaml
Admin: 
    id: admin@emircanerkul.com
    pw: admin
User:
    id: user@emircanerkul.com
    pw: user
```

#LearningOnTheRoad
