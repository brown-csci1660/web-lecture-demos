# Lecture examples for web security

This repository contains web application code used in class demos.  

The demo code is packaged as a runnable container image.  However,
Nick hasn't tested this code on multiple platforms--if you encounter
issues, please post on Ed and we'll take a look.  

## Directory structure

The `webroot` directory contains all files hosted by the webserver.
This corresponds to the "root" of the hosted site--ie, the file
`webroot/index.php` is viewable at `http://localhost:9080/index.php`
when the webserver is running.  

See `webroot/index.html` (or http://localhost:9080, when the webserver
is running) for a list of available demos.  

## Working with the container image

This repository contains a `Dockerfile` that closely represents the
one that will be deployed to students, with some changes to allow
editing of the web application code.  You can work with the image
using the `run-container` script:

### Initial setup:  build the container image

```
./run-container setup
```

### Starting the container
```
./run-container start
```
Starting the container will start a webserver and print an URL you can
use to connect to it.  This address is on a
is part of a local network that lives only on your system and is shared by your
docker containers.  

### Getting a shell

Unlike our primary development container, this one just starts the
webserver directly--it doesn't give you a shell.  To get one, open a
new terminal and run:
```
./run-container shell
```

This will start a shell inside your running container.  

(We won't provide this interface to students, and we'll have strong
language in the handout saying it's in their best interest not to do
this.)

### Resetting the container

To restart the container from fresh copy of the image, run:
```
./run-container --clean start
```

This will start a new container from the original image, erasing any
changes made to the container filesystem. 

Note for development:  this doesn't affect the `webroot` directory,
which is shared with your local machine--any changes you make here are
still saved.  To revert these, revert the changes in your git repo.  

### Erasing the container image

If you want to free up space and delete the container image entirely,
run:
```
./run-container clean-image
```

This deletes any containers and the image itself, (hopefully) removing
it completely from your Docker storage.  


## Editing the web application

The directory `webroot` contains the web application source code.
This directory is shared live with the container when it is running.
To edit the code, simply edit the files outside the container with
your favorite editor, and you should see the changes.  

