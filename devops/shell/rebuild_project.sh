# Delete the vendor data
sudo rm -rf vendor

# Stop the container
docker container stop challenge

# Delete the image and container
docker image rm -f localhost/challenge && docker container rm challenge

# Run the build command
sh ./devops/shell/run_project.sh