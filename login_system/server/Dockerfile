FROM ubuntu:18.04
MAINTAINER h_noson
RUN apt-get update && apt-get install -y xinetd \
    && useradd -m login \
    && chown -R root:root /home/login

ADD login /home/login/
ADD flag /home/login/
ADD xinetd.conf /etc/xinetd.d/login

RUN chmod 644 /home/login/flag \
    && chmod 755 /home/login/login \
    && chmod 644 /etc/xinetd.d/login

EXPOSE 12345

CMD ["/usr/sbin/xinetd", "-dontfork"]
