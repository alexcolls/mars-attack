#!/usr/bin/env python3
import os
import urllib.request
import certifi
import urllib.parse
import ssl
from bs4 import BeautifulSoup

def download_website(url, folder_path):
    # Create the folder if it doesn't exist
    if not os.path.exists(folder_path):
        os.makedirs(folder_path)

    # SSL certificate handling using certifi
    ssl_context = ssl.create_default_context(cafile=certifi.where())

    # Download the index.html file
    req = urllib.request.Request(url, headers={'User-Agent': 'Mozilla/5.0'})
    with urllib.request.urlopen(req, context=ssl_context) as response:
        content = response.read()
        with open(os.path.join(folder_path, 'index.html'), 'wb') as file:
            file.write(content)

    # Parse the HTML to find dependencies
    with open(os.path.join(folder_path, 'index.html'), 'r') as file:
        soup = BeautifulSoup(file, 'html.parser')
        dependencies = soup.find_all(['img', 'script', 'link'])

        # Download each dependency
        for dependency in dependencies:
            if dependency.has_attr('src'):
                dependency_url = urllib.parse.urljoin(url, dependency['src'])
                dependency_url = urllib.parse.quote(dependency_url, safe=':/')
                dependency_file_path = os.path.join(folder_path, urllib.parse.unquote(dependency_url))

                # Create parent directories if they don't exist
                parent_directory = os.path.dirname(dependency_file_path)
                if not os.path.exists(parent_directory):
                    os.makedirs(parent_directory)

                with urllib.request.urlopen(dependency_url, context=ssl_context) as response:
                    content = response.read()
                    with open(dependency_file_path, 'wb') as file:
                        file.write(content)
                print(f"Downloaded: {dependency_file_path}")

# Example usage
website_url = "https://correos.es/es/es/particulares"  # Replace with the website URL you want to download
output_folder = "website"  # Replace with the desired output folder path
download_website(website_url, output_folder)
