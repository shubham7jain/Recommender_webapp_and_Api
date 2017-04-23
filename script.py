import json
from collections import defaultdict
import pymongo
from pymongo import Connection

uri = 'mongodb://admin:password@ds115411.mlab.com:15411/meetup_data' 
client = pymongo.MongoClient(uri)
db = client.get_default_database()

def get_all_event_details_by_user_id(user_id):

    row = db.member_events.find({"member_id":user_id})
    event_ids = []
    for r in row:
        event_ids = r["event_ids"]

    events_info_map = dict()
    event_rows = db.events_info.find({"event_id": {"$in":event_ids}})
    for er in event_rows:
        events_info_map[er["event_id"]] = {"description":er["description"], "lon" : er["lon"], "time" : er["time"], "lat" : er["lat"]}
    return events_info_map
