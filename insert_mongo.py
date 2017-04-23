from glob import iglob
import os.path
import pymongo
import json
import json
from collections import defaultdict
from pymongo import Connection
import time

#uri = 'mongodb://admin:password@ds115411.mlab.com:15411/meetup_data' 
#client = pymongo.MongoClient(uri)
#db = client.get_default_database()
connection = Connection()
db = connection.meetup_data

### Adding Events Info Data
events_json_file = open("data/LCHICAGO/events_info.json")
json_str = events_json_file.read()
events_info = json.loads(json_str)

db.events_info.remove()
time.sleep(10)

for event_id in events_info:
	small_dict = {}
	small_dict["event_id"] = str(event_id)
	small_dict["description"] = events_info[event_id]['description']
	small_dict["lat"] = events_info[event_id]['lat']
	small_dict["lon"] = events_info[event_id]['lon']
	small_dict["time"] = events_info[event_id]['time']
	db.events_info.insert(small_dict)


### Adding RSVP Data
rsvp_json_file = open("data/LCHICAGO/rsvp_events.json")
json_str = rsvp_json_file.read()
event_members_map = json.loads(json_str)

db.member_events.remove()
time.sleep(10)

member_events_map = defaultdict(lambda: [])
for event in event_members_map:
	member_ids = event_members_map[event]
	for member in member_ids:
		member_events_map[member].append(event)

for member_id in member_events_map:
	small_dict = {}
	small_dict['member_id'] = member_id
	small_dict['event_ids'] = member_events_map[member_id]
	db.member_events.insert(small_dict)
