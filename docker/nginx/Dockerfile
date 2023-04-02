FROM nginx

RUN mkdir -p /etc/nginx/unused
RUN mkdir -p /etc/letsencrypt

COPY ./predeploy.conf /etc/nginx/conf.d/default.conf
COPY ./predeploy.conf /etc/nginx/unused/predeploy.conf
COPY ./default.conf /etc/nginx/unused/default.conf

USER root

RUN mkdir -p /vol/static
RUN chmod 755 /vol/static
