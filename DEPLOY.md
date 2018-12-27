Free Publishing House Project v0.1
===========================

This application project run on a docker contenair based on a Linux Debian 8 (Jessie) distribution.

**Deployment instructions**

Firstly, you could make sure having a safety doker environment like this:

Stopping docker daemon
~~~
$ systemctl stop docker
~~~

Removing docker library
~~~
$ rm -fR /var/lib/docker
~~~

Starting docker daemon
~~~
$ systemctl start docker
~~~

You can now deploy the container, like this:
~~~
$ docker build --file fph.docker .
~~~

It contains a:
. Linux Debian 8 (jessie) distribution
. Apache2 server
. Php 7.2 
. Mysql 5.5
. Composer 1.8.0
. clone of the git directory of Fph-project based on symfony 4.2

After this, you should tagging your container, like this:
. get the image id
~~~
$ docker images
REPOSITORY          TAG                 IMAGE ID            CREATED             SIZE
<none>              <none>              yourimageId         27 minutes ago      536MB
debian              jessie              39db55273026        5 weeks ago         127MB
~~~
. define a tag
~~~
$ docker tag yourimageID fph-project
~~~

If you need a local development space, you should connect your workspace to the container deployment directory as follows:
~~~
$ docker -d -p 80:80 -v /path-to/your/workspace:/var/www/fph-project fph-project:latest
~~~




https://docs.docker.com/engine/
