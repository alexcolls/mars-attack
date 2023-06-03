import os, sys
import requests
from urllib.parse import urljoin
from bs4 import BeautifulSoup

def soupfindAllnSave(pagefolder, url, soup, tag2find='img', inner='src'):
    if not os.path.exists(pagefolder): # create only once
        os.mkdir(pagefolder)
    for res in soup.findAll(tag2find):   # images, css, etc..
        try:
            filename = os.path.basename(res[inner])  
            fileurl = urljoin(url, res.get(inner))
            # rename to saved file path
            # res[inner] # may or may not exist 
            filepath = os.path.join(pagefolder, filename)
            res[inner] = os.path.join(os.path.basename(pagefolder), filename)
            if not os.path.isfile(filepath): # was not downloaded
                with open(filepath, 'wb') as file:
                    filebin = session.get(fileurl)
                    file.write(filebin.content)
        except Exception as exc:      
            print(exc, file=sys.stderr)
    return soup

def savePage(response, pagefilename='page'):    
   url = response.url
   soup = BeautifulSoup(response.text)
   pagefolder = pagefilename+'_files' # page contents 
   soup = soupfindAllnSave(pagefolder, url, soup, 'img', inner='src')
   soup = soupfindAllnSave(pagefolder, url, soup, 'link', inner='href')
   soup = soupfindAllnSave(pagefolder, url, soup, 'script', inner='src')    
   with open(pagefilename+'.html', 'w') as file:
      file.write(soup.prettify())
   return soup

session = requests.Session()
#... whatever requests config you need here
response = session.get('https://www.caixabank.com')
savePage(response, 'caixabank')