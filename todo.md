# NPM
cd /var/www/zotero/stream-server && npm install
cd /var/www/zotero/tinymce-clean-server && npm install

# Start Stream server
cd /var/www/zotero/stream-server && nodejs index.js &

# Start Clean server
cd /var/www/zotero/tinymce-clean-server && nodejs server.js &


