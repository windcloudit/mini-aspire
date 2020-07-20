FROM nginx:1.17.9-alpine

# expose ssl port
EXPOSE 443

# copy site.conf from local directory to /etc/nginx/conf.d/default.conf
ADD ./sites-enabled/site.conf /etc/nginx/conf.d/default.conf

RUN mkdir -p '/var/www/logs'

WORKDIR /var/www/html
