FROM ubuntu:16.04
MAINTAINER h_noson
RUN apt-get update && apt-get install -y xinetd \
    && useradd -m babyrop2 \
    && chown -R root:root /home/babyrop2

ADD babyrop2 /home/babyrop2/
ADD flag /home/babyrop2/
ADD xinetd.conf /etc/xinetd.d/babyrop2

RUN chmod 644 /home/babyrop2/flag \
    && chmod 755 /home/babyrop2/babyrop2 \
    && chmod 644 /etc/xinetd.d/babyrop2

EXPOSE 45678

CMD ["/usr/sbin/xinetd", "-dontfork"]
