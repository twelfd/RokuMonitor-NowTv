## Download Monitor v0.2 - June 2017

# The URL or path of the script to run
URL = "php /var/www/html/atlantic/atlantic.php"

# Set the interface you wish to monitor, eg: eth0, wlan0, usb0
INTERFACE = "eth0"

# Set the minimum download speed in KB/s that must be achieved.
MINIMUM_SPEED = 150

# Set the number of retries to test for the average minimum speed.
RETRIES = 5

# Set the interval (in seconds), between retries to calculate average speed.
INTERVAL = 1

# Set the interval (in seconds), between recalculating average speed
LONG_INTERVAL = 30
WAIT_INTERVAL = 120

import os, time
from commands import getoutput

def worker ():
    RETRIES_COUNT = 1
    SPEED = 0
    while True:
        # Sum downstream and upstream and add with previous speed value
        # {print $1} use just downstream
        # {print $2} use just upstream
        # {print $1+$2} use sum of downstream and upstream
        SPEED += int(float(getoutput("ifstat -i %s 3 1 | awk '{print $1+$2}' | sed -n '3p'" % INTERFACE)))

        if RETRIES_COUNT > RETRIES:
            # Calculate average speed from all retries
            AVG_SPEED = int(float(SPEED) / float(RETRIES_COUNT))
            print AVG_SPEED

            # If average speed is below minimum speed - suspend
            if AVG_SPEED < MINIMUM_SPEED:
                os.system(URL)
                RETRIES_COUNT = 1
                SPEED = 0
                time.sleep(WAIT_INTERVAL)
            # Else reset calculations and wait for longer to retry calculation
            else:
                RETRIES_COUNT = 1
                SPEED = 0
                time.sleep(LONG_INTERVAL)
        else:
            RETRIES_COUNT += 1
            time.sleep(INTERVAL)

worker()
