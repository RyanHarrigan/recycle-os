FROM node:12.14.1

# Create app directory
WORKDIR /usr/src/app

COPY ./code/package*.json ./

RUN npm install

COPY ./code ./

#run express server
CMD [ "npm", "run", "start" ]