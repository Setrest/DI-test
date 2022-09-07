FROM nginx:1.19-alpine

WORKDIR /app/public

COPY ./docker_settings/nginx/modern.d/app.conf /etc/nginx/nginx.conf
COPY ./* /var/www/backend/