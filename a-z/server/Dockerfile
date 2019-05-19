FROM node:11.13.0-alpine
WORKDIR /app

ENV FLAG "HarekazeCTF{sorry_about_last_year's_js_challenge...}"
COPY app/ /app
RUN npm install --no-bin-links

EXPOSE 3000
CMD [ "npm", "start" ]