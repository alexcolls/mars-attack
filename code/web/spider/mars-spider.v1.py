import os, sys
import requests
from urllib.parse import urljoin
from bs4 import BeautifulSoup

def soupfindAllnSave(pagefolder, url, soup, tag2find='img', inner='src', outfolder='out'):
  if not os.path.exists(pagefolder): # create only once
    os.mkdir(pagefolder)
  for res in soup.findAll(tag2find):   # images, css, etc..
    try:
      filename = os.path.basename(res[inner])  
      fileurl = urljoin(url, res.get(inner))
      filepath = os.path.join(pagefolder, filename)
      res[inner] = os.path.join(os.path.basename(pagefolder), filename)
      if not os.path.isfile(filepath): # was not downloaded
        with open(filepath, 'wb') as file:
          filebin = session.get(fileurl)
          file.write(filebin.content)
    except Exception as exc:      
        print(exc, file=sys.stderr)
  return soup

def savePage(response, _pagefilename='page', _outfolder='out'):    
  url = response.url
  soup = BeautifulSoup(response.text)
  pagefolder = _outfolder + '/' + _pagefilename # page contents 
  soup = soupfindAllnSave(pagefolder, url, soup, 'img', inner='src')
  soup = soupfindAllnSave(pagefolder, url, soup, 'link', inner='href')
  soup = soupfindAllnSave(pagefolder, url, soup, 'script', inner='src')    
  with open(_outfolder+'/'+_pagefilename+'.html', 'w') as file:
    file.write(soup.prettify())
  return soup


if __name__ == "__main__":
  print("\nWelcome to *** mars-spider.v1.py ***\n\nA python3 script that allows you to clone any website by inserting just a url. For example: mars-attack.com")
  victim = input("\n > Insert website URL you wanna clone:\n\n >>> ")
  print('\nClonning website... It may take some time...\n')
  session = requests.Session()
  response = session.get('https://'+victim)
  savePage(response, victim.split('.')[0])
