run app:
 - `sail up -d`
 - or `docker-compose up -d`


requests:
- {POST} api/sensor-readings ['sensor_uuid', 'temperature']
- {GET} api/sensor-readings/get-average 
  
  `['filtering': ['sensor_uuid', 'created_at_from', 'created_at_to]]`
    
  date format example: "2023-03-16T05:07:17.000000Z"

