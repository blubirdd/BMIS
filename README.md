# BMIS

BMIS is web application designed to streamline the management of barangays within a designated region. 

## Screenshots 
<div>
  <img src="https://i.ibb.co/GC9jBpv/brm2.jpg" width="400">
  <img src="https://i.ibb.co/DMGQjxw/brm4.jpg" width="400">
</div>

## Features
- User-friendly dashboard that provides a quick overview of barangay information.
- Store and manage essential information about each barangay
- Maintain database of residents

## Development
- Bootstrap -  Front-end framework for responsive, mobile-friendly design
- Laravel - PHP web application framework
- MySQL - Relational database management system for efficient data storage and retrieval.
- Docker - Platform for containerized application development
  
## Installation
The following prerequisites needs to be installed on your machine
- Docker
- Composer

### Clone this repository
```
https://github.com/blubirdd/BMIS.git
```

### Install Dependencies
```
composer install
```

### Set Up Environment Variables
```
cp .env.example .env
```

### Run Laravel Sail
```
./vendor/bin/sail up -d
```

### Run Database Migrations
```
./vendor/bin/sail artisan migrate
```



  
