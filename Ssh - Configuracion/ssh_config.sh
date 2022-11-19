#!/bin/bash

clear

echo Port 2666 >> /etc/ssh/sshd_config
echo PermitRootLogin yes >> /etc/ssh/sshd_config

ssh-keygen -t rsa

s /root/.ssh/

systemctl restart ssh
systemctl restart sshd
