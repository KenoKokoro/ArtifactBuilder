#!/bin/bash

php $(dirname $(readlink -f $0))/entry.php $@
