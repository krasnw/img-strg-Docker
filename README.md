## Image storage 

The project is a simple social media application with the ability to add, delete, and view images. It is written in pure PHP using the Model-View-Controller (MVC) pattern. The application is placed into two Docker containers.

### Start-up preparation

To launch the application, you need a Docker on your local machine. The docker-compose file will launch two containers. First is for the apache server with PHP, and the second is for MySQL database.  
**Note** that apache server using the port `80`. 

### Instalation

1. Dowload the repository
2. Go to root folder with the `Docker-compose.yml`
3. Run the `Docker-compose.yml` file
```
docker-compose up
```
3. Open in your browser `http://localhost/main_project/welcomepage.php`

### Version without Docker

[Image Storage Non-Docker](https://github.com/krasnw/img-strg-Non-Docker)
