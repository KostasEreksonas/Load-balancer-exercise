FROM httpd:2.4
COPY ./app/ /usr/local/apache2/htdocs/
RUN apt update -y
RUN apt upgrade -y
RUN apt install php libapache2-mod-php -y
RUN sed -i 's,LoadModule mpm_event_module modules/mod_mpm_event.so,#LoadModule mpm_event_module modules/mod_mpm_event.so,g' /usr/local/apache2/conf/httpd.conf
RUN sed -i 's,#LoadModule mpm_prefork_module modules/mod_mpm_prefork.so,LoadModule mpm_prefork_module modules/mod_mpm_prefork.so,g' /usr/local/apache2/conf/httpd.conf
