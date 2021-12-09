## Emlak Project API
http://www.mehmettepeli.com/emlak-project/meeting can register for appoinments

## Routes

```
# Public

GET   http://www.mehmettepeli.com/emlak-project/api/appoinments/
GET   http://www.mehmettepeli.com/emlak-project/api/appoinments/:id

GET   http://www.mehmettepeli.com/emlak-project/api/contacts/
GET   http://www.mehmettepeli.com/emlak-project/api/contacts/:id

POST  http://www.mehmettepeli.com/emlak-project/api/register
@body: agent, client, name, surname, email, phone, password, password_confirmation

POST   http://www.mehmettepeli.com/emlak-project/api/login
@body: email, password


# Protected

POST   http://www.mehmettepeli.com/emlak-project/api/appoinments/
@body: agent_id, client_id, name, surname, email, phone, from_postcode, to_postcode, distance, meet_date, meet_time, exit_time, return_time

PUT   http://www.mehmettepeli.com/emlak-project/api/appoinments/:id
@body: agent_id, client_id, name, surname, email, phone, from_postcode, to_postcode, distance, meet_date, meet_time, exit_time, return_time

POST   http://www.mehmettepeli.com/emlak-project/api/contacts/
@body: name, surname, email, phone, address, password, password_confirmation

PUT   http://www.mehmettepeli.com/emlak-project/api/appoinments/:id
@body: name, surname, email, phone, address, password, password_confirmation


DELETE  http://www.mehmettepeli.com/emlak-project/api/appoinments/:id

DELETE  http://www.mehmettepeli.com/emlak-project/api/contacts/:id

POST    http://www.mehmettepeli.com/emlak-project/api/logout