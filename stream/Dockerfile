FROM node:14

# Create app directory
WORKDIR /usr/src/app

# Install app dependencies
# A wildcard is used to ensure both package.json AND package-lock.json are copied
# where available (npm@5+)
COPY stream-server/package*.json ./

RUN npm install

# Bundle app source
COPY stream-server/ .
COPY default.js config/default.js

EXPOSE 8080
CMD [ "node", "server.js" ]
