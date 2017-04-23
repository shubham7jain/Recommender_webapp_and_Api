import json
from collections import defaultdict

train_data_interval = ((364 / 2) * 24 * 60 * 60)
global_member_events = defaultdict(lambda :[])
global_events_info_map = defaultdict(lambda : defaultdict(lambda : defaultdict(lambda: 0.0)))

def initialize(citypath):
    global global_member_events
    global global_events_info_map
    rsvp_json_file = open(citypath + "/rsvp_events.json")
    json_str = rsvp_json_file.read()
    event_members_map = json.loads(json_str)

    global_member_events = defaultdict(lambda: [])
    for event in event_members_map:
        member_ids = event_members_map[event]
        for member in member_ids:
            global_member_events[member].append(event)

    events_json_file = open(citypath + "/events_info.json")
    json_str = events_json_file.read()
    global_events_info_map = json.loads(json_str)

def get_all_event_details_by_user_id(user_id):
    global global_member_events
    global global_events_info_map
    event_to_info_map = {}
    for event in global_member_events[user_id]:
        event_to_info_map[event]  = global_events_info_map[event]
    return event_to_info_map