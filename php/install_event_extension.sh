#!/usr/bin/env bash

#https://pecl.php.net/package/event
#it needs for better performance of https://github.com/walkor/Workerman

#centos
yum install -y php-pecl-event

#ubuntu
apt-get install -y php-pear php-dev libevent-dev
printf "\n\n /usr/lib/x86_64-linux-gnu/\n\n\nno\n\n\n" | pecl install event
echo "extension=event.so" > /etc/php/7.3/cli/conf.d/event.ini
