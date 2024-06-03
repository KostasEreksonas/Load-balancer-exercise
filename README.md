# Load-balancer-exercise
An exercise in load balancing

Table of Contents
=================
* [Description](#Description)
* [Instructions](#Instructions)
* [Testing](#Testing)
* [Grafana](#Grafana)
* [Usage](#Usage)

# Description

A simple PHP application for basic calculations was created.
Multiple instances of this application were started and a load balancer Nginx service was created to distribute the load evenly.
Container load and usage metrics were scraped with cAdvisor and Prometheus. These metrics were visualized using Grafana.
For load testing the application, Apache JMeter was used.

Separate dockerfiles for application server and monitoring server were created.

Application server contains these containers:
1. 5 instances of a PHP calulator app container;
2. Nginx load balancer container;
3. cAdvisor container for collecting running container metrics;
4. node-exporter container for collecting more running container metrics.

Metrics server contains these containers:
1. Prometheus container for scraping container metrics from application server;
2. Grafana container for displaying running container metrics in a dashboard.

While testing, application server and metrics server were put on different Linux virtual machines, and Apache Jemeter was run from a separate computer.

# Instructions

These instructions are for a Linux machine.

***To run application server:***

1. Clone this repository to application server using:
`git clone https://github.com/KostasEreksonas/Load-balancer-exercise.git`

2. Change directory to `Load-balancer-exercise/app`:
`cd Load-balancer-exercise/app`

3. Start the containers:
    - If you want to see the log output, run:
    `docker compose up`
    - If you want to run containers in the background, run:
    `docker compose up -d`

*** To run metrics server:***

1. Clone this repository to application server using:
`git clone https://github.com/KostasEreksonas/Load-balancer-exercise.git`

2. Change directory to `Load-balancer-exercise/metrics`:
`cd Load-balancer-exercise/metrics`

3. Start the containers:
    - If you want to see the log output, run:
    `docker compose up`
    - If you want to run containers in the background, run:
    `docker compose up -d`

# Testing

testing file can be found [here](https://github.com/KostasEreksonas/Load-balancer-exercise/blob/main/testing/Load_test_multiple_requests.jmx)

***Testing instructions:***

1. Download Apache JMeter from [the official webpage](https://jmeter.apache.org/download_jmeter.cgi)

2. Extract the downloaded archive:
`tar zxvf apache-jmeter-5.6.3.tgz`

3. Change directory to `apache-jmeter-5.6.3/bin`:
`cd apache-jmeter-5.6.3/bin`:

4. run JMeter:
`./jmeter`

![JMeter](/images/JMeter.png)

Note: If you're running out of memory when running a test, you need to update the following line in the jmeter file:
`: "${HEAP:="-Xms1g -Xmx1g -XX:MaxMetaspaceSize=256m"}"`
Where `-Xms1g` means min heap size of 1GB and `-Xmx1g` means max heap size of 1GB. Increase the heap size to run larger tests. Sample testing file can be found [here](https://github.com/KostasEreksonas/Load-balancer-exercise/blob/main/testing/Load_test_multiple_requests.jmx).

# Grafana

Default credentials are `admin:admin`.

![Login](/images/Grafana_Login.png)

When starting Grafana for the first time, you need to change the default password.

![Change Password](/images/Grafana_ch_pswd.png)

# Usage

[http://localhost:81/](http://localhost:81/) to open PHP application.<br>
[http://localhost:3000/](http://localhost:3000/) to open Grafana dashboard.<br>
[http://localhost:8080/](http://localhost:8080/) to open cadvisor panel.<br>
[http://localhost:9090/](http://localhost:9090/) to open Prometheus dashboard.<br>
[http://localhost:9100/](http://localhost:9100/) to open Node exporter.
