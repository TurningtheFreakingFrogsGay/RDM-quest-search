# RDM-quest-search
A simple php page to execute an SQL query on an RDM DB and report back special quest info.

## How to use
Import the index.php file or git clone the repo. For easier access put on a subdomain.

Make sure to update your own server password, within the php file, and direct the php page to your RDM database.

### Virtual Geofence

If a person wants to, you can make a virtual, quadrilateral, geofence, using the `<` and `>` operators in combination with the `lat` and `lon` coordinates in the database. This can be done to restrict results to a given area.
