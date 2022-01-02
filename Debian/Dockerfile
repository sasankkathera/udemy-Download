FROM debian
ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update
RUN apt install openssh-server -y

RUN adduser --disabled-password --gecos "" ssh_user 

CMD chpasswd <<< "ssh_user:sasank"

RUN mkdir /home/ssh_user/.ssh && chmod 700 /home/ssh_user/.ssh 

COPY id_rsa.pub /home/ssh_user/.ssh/authorized_keys

RUN chown ssh_user:ssh_user -R /home/ssh_user/.ssh/ && \
	chmod 600 /home/ssh_user/.ssh/authorized_keys

RUN mkdir -p /run/sshd

RUN ssh-keygen -A

CMD ["/usr/sbin/sshd", "-D"]
