#!/bin/bash

default_ip="localhost"
default_port="8083"

if [ $# -eq 0 ]; then
    ip=$default_ip
    port=$default_port
elif [ $# -eq 1 ]; then
    ip=$1
    port=$default_port
elif [ $# -eq 2 ]; then
    ip=$1
    port=$2
else
    echo "Usage: $0 [ip] [port]"
    exit 1
fi

php -S "$ip:$port" -t public/
