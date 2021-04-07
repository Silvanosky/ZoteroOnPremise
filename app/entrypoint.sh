#!/bin/sh

cd /var/www/zotero/
git apply /url.patch


# Chmod
chmod 777 /var/www/zotero/tmp
