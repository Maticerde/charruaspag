#!/bin/bash

clear

sudo apt install ufw
sudo ufw enable


sudo ufw allow OpenSSH
sudo ufw allow ssh


sudo ufw logging on

sudo ufw allow 2666

sudo ufw allow 80
sudo ufw allow http
sudo ufw allow 80/tcp

