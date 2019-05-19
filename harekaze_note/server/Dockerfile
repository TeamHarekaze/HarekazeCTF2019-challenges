FROM ubuntu:19.04
MAINTAINER h_noson
RUN apt-get update && apt-get install -y xinetd \
    && useradd -m note \
    && chown -R root:root /home/note

ADD note /home/note/
ADD flag /home/note/
ADD xinetd.conf /etc/xinetd.d/note

RUN chmod 644 /home/note/flag \
    && chmod 755 /home/note/note \
    && chmod 644 /etc/xinetd.d/note

EXPOSE 56789

CMD ["/usr/sbin/xinetd", "-dontfork"]
