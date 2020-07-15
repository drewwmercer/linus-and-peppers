# Linus & Pepper's

## About this project
I wanted to practice fundamentals of PHP, and a local restaurant website seemed like a great fit. The pages populate dynamically, and team members and the sandwich shop menu items are managed in an easy-to-read set of arrays. The contact form successfully sends emails, and has validation features. The restaurant's hours also check the current time here in Raleigh, and let you know whether the restaurant is open or closed. 

See it live at: [fast-springs-58263.herokuapp.com](https://fast-springs-58263.herokuapp.com/)

<p align="center">
  <img src="https://github.com/drewwmercer/linus-and-peppers/blob/master/linus-and-peppers-snapshot.png?raw=true" width="350" title="Snapshot of v1 of the hosted site">
</p>

## Implementation
- Developed & tested locally using MAMP (Apache Web Server, PHP v7.3.1) and Visual Studio Code (CLI GitHub and Heroku deployment)
- Hosted on a Free Dyno thanks to [Heroku](https://www.heroku.com/)  
  - **Note:** This app is deployed on a free Heroku dyno. Free dynos will sleep after a half hour of inactivity (if they don’t receive any traffic). This causes a delay of a few seconds for the first request upon waking. Subsequent requests will perform normally.
- Realtime log management via solarwinds papertrail add-on.
