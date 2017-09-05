#!/bin/bash
#mysql -h localhost -u root -p --execute "create database teknis"
echo "WARNING !!! This will remove your current data in localteknis database (if exists)"
echo "The data replaced cannot be Undo"
echo ""
while true; do
read -p "Are you sure ?" yn
case $yn in 
	[Yy]* ) mysql -h localhost -u root -p <doquery.sql ;echo "Database has successfully created";exit;;
	[Nn]* ) echo "You did not restore database";exit;;
	* ) echo "Please answer yes or no";;
esac
done

