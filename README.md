# PHP Engineer Console Script

**console script**

Jenkins (http://jenkins-ci.org/) is a open source continuous integration server.

Create a script, in PHP, that uses Jenkins' API to get a list of  jobs and their status from a given jenkins instance.  The status for each job should be stored in an sqlite  database along with the time for when it was checked.

**Usage/Installation**

```
# clone repository
$ git clone https://github.com/Khadreal/console.git

# change directory
$ cd console-script

# run script with default server "https://builds.apache.org"
$ php index.php


