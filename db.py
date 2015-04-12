__author__ = 'Brian Yang'
import os
import psycopg2
import urllib

urllib.uses_netloc.append("postgres")
url = urllib.parse(os.environ["DATABASE_URL"])

conn = psycopg2.connect(database=url.path[1:],
                        user=url.username,
                        password=url.password,
                        host=url.hostname,
                        port=url.port
                        )
