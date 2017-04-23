from glob import iglob
import os.path
import pymongo
import json
from pymongo import Connection
import json

connection = Connection()
db = connection.meetup_data
collection = db.events_info

events_json_file = open("data/LCHICAGO/events_info.json")
json_str = events_json_file.read()
events_info = json.loads(json_str)