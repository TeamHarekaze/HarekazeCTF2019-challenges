FROM ubuntu:16.04
MAINTAINER h_noson
RUN apt-get update && apt-get install -y xinetd \
    && useradd -m babyrop \
    && chown -R root:root /home/babyrop

ADD babyrop /home/babyrop/
ADD flag /home/babyrop/
ADD xinetd.conf /etc/xinetd.d/babyrop

RUN chmod 644 /home/babyrop/flag \
    && chmod 755 /home/babyrop/babyrop \
    && chmod 644 /etc/xinetd.d/babyrop

EXPOSE 34567

CMD ["/usr/sbin/xinetd", "-dontfork"]
