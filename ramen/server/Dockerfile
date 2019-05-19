FROM ubuntu:18.04
MAINTAINER h_noson
RUN apt-get update && apt-get install -y xinetd \
    && useradd -m ramen \
    && chown -R root:root /home/ramen

ADD ramen /home/ramen/
ADD flag /home/ramen/
ADD xinetd.conf /etc/xinetd.d/ramen

RUN chmod 644 /home/ramen/flag \
    && chmod 755 /home/ramen/ramen \
    && chmod 644 /etc/xinetd.d/ramen

EXPOSE 23456

CMD ["/usr/sbin/xinetd", "-dontfork"]
