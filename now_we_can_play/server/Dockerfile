FROM python:2.7

ENV DEBIAN_FRONTEND "noninteractive"

RUN apt update -y \
    && apt install -y socat \
    && pip install pycryptodome PyCrypto \
    && mkdir -p /opt/app/src

COPY files/now_we_can_play.py /opt/app/src/now_we_can_play.py
RUN chmod +x /opt/app/src/now_we_can_play.py
COPY files/keys.py /opt/app/src/keys.py

COPY files/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

EXPOSE 1025

ENTRYPOINT ["entrypoint.sh"]