# Build the image
docker build -t localhost/challenge -f ./devops/docker/Dockerfile .

# Run the image
docker run -d --name challenge -p "8080:80" -v .:/var/www/html localhost/challenge

docker exec challenge composer install