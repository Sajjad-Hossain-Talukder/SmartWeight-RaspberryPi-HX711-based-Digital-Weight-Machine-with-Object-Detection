#!/usr/bin/env python3
import RPi.GPIO as GPIO  # import GPIO
from hx711 import HX711  # import the class HX711

def calibrate():
    GPIO.setmode(GPIO.BCM)
    hx = HX711(dout_pin=21, pd_sck_pin=20)
    err = hx.zero()
    if err:
        return "TareU"
    reading = hx.get_raw_data_mean()
    return reading

if __name__ == "__main__":
    result = calibrate()
    print(result)


