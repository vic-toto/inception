FROM alpine:latest

RUN apk update && apk add nginx openssl

RUN mkdir -p /etc/ssl/
RUN mkdir -p /etc/ssl/certs/
RUN mkdir -p /etc/ssl/private/

#prova
RUN mkdir -p /usr/share/nginx/html/
COPY conf/index.html /usr/share/nginx/html/index.html
#

RUN rm /etc/nginx/http.d/default.conf
RUN rmdir /etc/nginx/http.d

RUN openssl req -x509 -newkey rsa:2048 -nodes -keyout /etc/ssl/private/key.pem -out /etc/ssl/certs/cert.pem -days 365 -subj "/C=US/ST=California/L=San Francisco/O=MyCompany/CN=localhost"

COPY conf/default.conf /etc/nginx/nginx.conf
COPY conf/ssl.conf /etc/nginx/ssl.conf

ENTRYPOINT ["nginx", "-g", "daemon off;"]
