#!/bin/bash

debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'

apt-get update
apt-get install -y apache2 php5 php5-xdebug php5-mysql mysql-server mysql-client npm
npm install -g less

# So 'node' is available
update-alternatives --install /usr/bin/node node /usr/bin/nodejs 10

cp /vagrant/files/apache2.conf /etc/apache2/apache2.conf
cp /vagrant/files/envvars /etc/apache2/envvars
cp /vagrant/files/default.conf /etc/apache2/sites-available/000-default.conf
cp /vagrant/files/xdebug.ini /etc/php5/mods-available/xdebug.ini

# Reload configuration
service apache2 restart

# Had some issues if this didn't exist. Could turn off DB support
# but was easier to just add this to get it working.
mysql -uroot -proot -e 'CREATE DATABASE IF NOT EXISTS symfony;'
