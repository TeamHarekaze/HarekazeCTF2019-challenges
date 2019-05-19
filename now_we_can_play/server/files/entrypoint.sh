#!/usr/bin/env bash

socat -v TCP-LISTEN:1025,reuseaddr,nodelay,fork EXEC:"/opt/app/src/now_we_can_play.py"