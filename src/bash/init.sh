# !/usr/bin/env bash 
FILE=../../cert

if [ ! -d $FILE ]; then
	mkdir $FILE
	chmod -R 777 $FILE
fi

