import requests
from bs4 import BeautifulSoup as bs
from urllib.parse import urljoin

# URL of the web page you want to extract
url = "http://books.toscrape.com"

# initialize a session
session = requests.Session()
# set the User-agent as a regular browser
session.headers["User-Agent"] = "Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/44.0.2403.157 Safari/537.36"

