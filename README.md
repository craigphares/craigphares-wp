# Craig WordPress Source
This is the source code for craigphares.com. Everything is setup in a local Docker container to keep development simple.

##  Getting started

Install dependencies with `npm install`

Start the Docker container `docker-compose up -d`

The local server will be up and running at `http://localhost:9999`

phpMyAdmin will be up and running at `http://localhost:8080`

View any server logs at `docker logs -f --details craigphares_wordpress_1`

Stop the Docker container anytime with `docker-compose stop`
