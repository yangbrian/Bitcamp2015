__author__ = 'Brian Yang'
import time
from bs4 import BeautifulSoup
from urllib.request import urlopen
import re
import urllib.request

file = open("Output.txt", "w")


def getAnalystInfo(url):
    html = urlopen(url).read().decode('utf-8')
    soup = BeautifulSoup(html)

    name = soup.find("h1", class_="full-name")

    totalAmtManaged = soup.find_all(text=re.compile("across"))
    try:
        amt = totalAmtManaged[0].replace(",", "")
        amt = amt[1:amt.index('(')]
        print(name.next_element + "," + amt)
        file.write(name.next_element + "," + amt + "\n")
    except IndexError:
        file.write("\n")

base_url = "https://www.wealthminder.com"

# generate a list of all profile links
def getWealthMinderLinks(url, level):

    # main (0) > state (1) > city (2) > profile (3)
    if level is 3:
        getAnalystInfo(base_url + url)
        return

    html = urllib.request.urlopen(base_url + url).read()
    soup = BeautifulSoup(html)

    # only the span has any useful class, so get the span > a > li
    link = soup.find("span", class_="title").parent.parent
    # print(link)

    if link is None:
        return

    while link is not None:
        link = link.find("a") # get the next link
        next_link = link.get('href')

        getWealthMinderLinks(next_link, level + 1)
        link = link.parent.next_sibling.next_sibling  # find adjacent li element

    if soup.find(text=re.compile("Next >>")) is not None:
        getWealthMinderLinks(soup.find(text=re.compile("Next >>")).previous_element, level)

getWealthMinderLinks('/financial-advisors/', 0)

