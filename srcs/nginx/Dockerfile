FROM alpine:latest
RUN apk update && apk add nginx openssl
RUN openssl req -new -newkey rsa:2048 -nodes -keyout /etc/nginx/ssl/key.pem -out /etc/nginx/ssl/cert.pem -subj "/C=US/ST=California/L=San Francisco/O=MyCompany/CN=localhost"
COPY default.conf /etc/nginx/conf.d/
COPY ssl.conf /etc/nginx/
CMD ["nginx", "-g", "daemon off;"]
