from flask import Flask , request , jsonify
from bs4 import BeautifulSoup
import requests

app = Flask(__name__)


@app.route('/api/v1/',methods=['GET'])
def API():
    if request.method == 'GET':
        uri = 'http://correos.es'
        query = str(request.args['query'])
        print(query)
        if " " in query:
            query = str(query).replace(" ","+")
        else:
            pass

        search = '/search_results?q=' + query

        ready_uri = uri + search
        print(ready_uri)
        content = requests.get(ready_uri).content
        soup = BeautifulSoup(content, 'html.parser')
        quotes_links = soup.find_all('a', {'class': 'b-qt'})
        l = []
        for i in quotes_links:
            d = {}
            quote_url = uri + i.get('href')
            quote_content = requests.get(quote_url).content
            quote_soup = BeautifulSoup(quote_content, 'html.parser')
            d['quote'] = quote_soup.find('p', {'class': 'b-qt'}).text
            d['author'] = quote_soup.find('p', {'class': 'bq_fq_a'}).text
            l.append(d)

        print(l)
        return jsonify(l)






if __name__ == '__main__':
    app.run()

