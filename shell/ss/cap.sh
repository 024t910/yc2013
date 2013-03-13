#!/bin/bash

/usr/sbin/screencapture -m -C -T0 -x ~/ss/capture.png
sips --resampleWidth 300 ~/ss/capture.png --out ~/ss/capture.png
sips --resampleWidth 490 ~/ss/capture.png --out ~/ss/capture.png
~/ss/send_ss.py
exit;
