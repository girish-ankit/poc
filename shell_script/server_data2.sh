#!/bin/sh

#!/bin/env bash
while [ true ]; do
 sleep 1
now="$(date)"
printf "%s, " "$now"
free -m | awk 'NR==2{printf "Memory Usage: %s/%sMB (%.2f%%), ", $3,$2,$3*100/$2 }'
df -h | awk '$NF=="/"{printf "Disk Usage: %d/%dGB (%s), ", $3,$2,$5}'
top -bn1 | grep load | awk '{printf "CPU Load: %.2f, ", $(NF-2)}' 
ps -ylC httpd --sort:rss | awk '{sum+=$8; ++n} END {printf "Apache Thread = "sum"("n"), "; printf "Apache Avg =  "sum/n/1024"MB, "}'
ps -ylC mysqld --sort:rss | awk '{sum+=$8; ++n} END {printf "MYSQL Thread = "sum"("n"), "; printf "MYSQL Avg = "sum/n/1024"MB\n"}'
done



