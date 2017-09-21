#!/bin/bash

if [[ ${0:0:1} == '/' ]];then
    mydir=`dirname $0`
else
    mydir=`dirname \`pwd\`/$0/`
fi

packcmd="cd /home/www/jiedian &&\
    tar -zcvf Edm.tar.gz Edm \
    --exclude=Logs --exclude=Config \
    --exclude=.git --exclude=reload_dispatcher.sh \
    --exclude=reload_worker.sh"

ssh cdyf@172.20.4.48 "$packcmd"

scp cdyf@172.20.4.48:/home/www/jiedian/Edm.tar.gz $mydir

for ip in `cat ${mydir}/data/web_ips`;
do
    echo $ip
    scp  $mydir/Edm.tar.gz admin@$ip:/home/admin
    ssh admin@$ip "sudo tar -zxvf /home/admin/Edm.tar.gz -C /home/www"
done
