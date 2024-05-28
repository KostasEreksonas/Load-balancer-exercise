# Load-balancer-exercise
An exercise in load balancing

Table of Contents
=================
* [Application](#Application)
* [Load_Balancer](#Load-Balancer)
* [Docker_Compose](#Docker-Compose)
* [Setup](#Setup)
* [Load_Testing](#Load-Testing)
* [Usage](#Usage)

# Application

A PHP application for simple math calculations was created and the created application was put in a docker container, dockerfile can be found [here](./docker/php/Dockerfile).

# Load Balancer

Nginx was used for creating the load balancer.
Nginx configuration file can be found [here](./docker/nginx/nginx.conf).
Nginx dockerfile can be found [here](./docker/nginx/Dockerfile).

# Docker Compose

`docker-compose.yml` file creates 5 instances of PHP Docker containers with an application and a load balancer.

# Setup

Use following command to setup the environment:

`docker compose up -d`

# Load Testing

Apache Jmeter will be used for load testing.

# Usage

`localhost:3000` to open Grafana dashboard.
`localhost:8080` to open PHP application.
`localhost:9090` to open Prometheus dashboard.
