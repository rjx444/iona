# Iona
IONA Test Project

This is the plugin that I created for Iona Test Excercise.

Upon activation of the plugin, it will replace the default homepage to the custom homepage made by the plugin which is the Cat Browser.

## Built & run

### Building commands

In order to build it use these steps:

```
First you need to have docker desktop installed in your machine. Visit this page for guide: https://docs.docker.com/desktop/
After installing docker, clone this git repository: git clone ^this_repo^
Or you can use any git gui to clone the repo
Then after installing the repo, navigate the directory where you cloned the repository and then navigate wordpress/wp-content directory using terminal
then run "docker-compose up -d"
```

### Run and deploy
You can now access the wordpress installation through the browser: http://localhost:8000/

After installing, you can access wordpress admin through: http://localhost:8000/wp-admin
Just login using the username/email and password you provided upon installation.

Then after that, navigate to wordpress plugin page and activate "IONA Plugin".

Lastly, navigate the homepage. Then you can now test the Cat Browser.