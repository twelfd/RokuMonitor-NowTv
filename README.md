MITM Network monitor with Roku API

Start MITM Attack:
sudo ettercap -T -i enp3s0 -M ARP /192.168.2.133// -q

Start Atlantic - start monitoring
python /var/www/html/atlantic/atlantic.py

Monitor realtime network stats:
ifstat -S

Send RCU keypresses:
curl -XPOST 192.168.2.133:8060/keypress/Home

Other buttons:
Select = "OK"
Up
Down
Left
Right
Back

Check currently running app:
curl -i 192.168.2.133:8060/query/active-app

Launch Now TV app:
curl -XPOST 192.168.2.133:8060/launch/26614
