---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://test.local/docs/collection.json)

<!-- END_INFO -->

#Attendance management


<!-- START_9ae23d9501cf189191c42c7a11186348 -->
## Get Attendance

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/get-attendance/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/get-attendance/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 4,
        "user_id": 1,
        "business_id": 1,
        "clock_in_time": "2020-09-12 13:13:00",
        "clock_out_time": "2020-09-12 13:15:00",
        "essentials_shift_id": 3,
        "ip_address": null,
        "clock_in_note": "test clock in from api",
        "clock_out_note": "test clock out from api",
        "created_at": "2020-09-12 13:14:39",
        "updated_at": "2020-09-12 13:15:39"
    }
}
```

### HTTP Request
`GET connector/api/get-attendance/{user_id}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `user_id` |  required  | id of the user

<!-- END_9ae23d9501cf189191c42c7a11186348 -->

<!-- START_86034849f2363a6ed4cbb02ef6ad64c9 -->
## Clock In

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://test.local/connector/api/clock-in" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"user_id":1,"clock_in_time":"2000-06-13 13:13:00","clock_in_note":"delectus","ip_address":"nemo","latitude":"labore","longitude":"ipsum"}'

```

```javascript
const url = new URL(
    "http://test.local/connector/api/clock-in"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "user_id": 1,
    "clock_in_time": "2000-06-13 13:13:00",
    "clock_in_note": "delectus",
    "ip_address": "nemo",
    "latitude": "labore",
    "longitude": "ipsum"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "msg": "Clocked In successfully",
    "type": "clock_in"
}
```

### HTTP Request
`POST connector/api/clock-in`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_id` | integer |  required  | id of the user
        `clock_in_time` | string |  optional  | Clock in time.If not given current date time will be used Fromat: Y-m-d H:i:s
        `clock_in_note` | string |  optional  | Clock in note.
        `ip_address` | string |  optional  | IP address.
        `latitude` | string |  optional  | Latitude of the clock in location.
        `longitude` | string |  optional  | Longitude of the clock in location.
    
<!-- END_86034849f2363a6ed4cbb02ef6ad64c9 -->

<!-- START_ef6b9e3a21e12aef21cc7ca8267097a1 -->
## Clock Out

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://test.local/connector/api/clock-out" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"user_id":1,"clock_out_time":"2000-06-13 13:13:00","clock_out_note":"ipsam","latitude":"quam","longitude":"impedit"}'

```

```javascript
const url = new URL(
    "http://test.local/connector/api/clock-out"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "user_id": 1,
    "clock_out_time": "2000-06-13 13:13:00",
    "clock_out_note": "ipsam",
    "latitude": "quam",
    "longitude": "impedit"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": true,
    "msg": "Clocked Out successfully",
    "type": "clock_out"
}
```

### HTTP Request
`POST connector/api/clock-out`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `user_id` | integer |  required  | id of the user
        `clock_out_time` | string |  optional  | Clock out time.If not given current date time will be used Fromat: Y-m-d H:i:s
        `clock_out_note` | string |  optional  | Clock out note.
        `latitude` | string |  optional  | Latitude of the clock out location.
        `longitude` | string |  optional  | Longitude of the clock out location.
    
<!-- END_ef6b9e3a21e12aef21cc7ca8267097a1 -->

<!-- START_eeb42bc2e93c8f36f4bb83992f9334f9 -->
## List Holidays

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/holidays?location_id=sint&start_date=2020-06-25&end_date=2020-06-25" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/holidays"
);

let params = {
    "location_id": "sint",
    "start_date": "2020-06-25",
    "end_date": "2020-06-25",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 2,
            "name": "Independence Day",
            "start_date": "2020-08-15",
            "end_date": "2020-09-15",
            "business_id": 1,
            "location_id": null,
            "note": "test holiday",
            "created_at": "2020-09-15 11:25:56",
            "updated_at": "2020-09-15 11:25:56"
        }
    ]
}
```

### HTTP Request
`GET connector/api/holidays`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `location_id` |  optional  | id of the location
    `start_date` |  optional  | format:Y-m-d
    `end_date` |  optional  | format:Y-m-d

<!-- END_eeb42bc2e93c8f36f4bb83992f9334f9 -->

#Brand management


<!-- START_86f2ea444a3e2e0add4c92cf461b2468 -->
## List brands

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/brand" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/brand"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "business_id": 1,
            "name": "Levis",
            "description": null,
            "created_by": 1,
            "deleted_at": null,
            "created_at": "2018-01-03 21:19:47",
            "updated_at": "2018-01-03 21:19:47"
        },
        {
            "id": 2,
            "business_id": 1,
            "name": "Espirit",
            "description": null,
            "created_by": 1,
            "deleted_at": null,
            "created_at": "2018-01-03 21:19:58",
            "updated_at": "2018-01-03 21:19:58"
        }
    ]
}
```

### HTTP Request
`GET connector/api/brand`


<!-- END_86f2ea444a3e2e0add4c92cf461b2468 -->

<!-- START_d1614880df4d370cfc4ed7ec60bcf52c -->
## Get the specified brand

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/brand/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/brand/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "business_id": 1,
            "name": "Levis",
            "description": null,
            "created_by": 1,
            "deleted_at": null,
            "created_at": "2018-01-03 21:19:47",
            "updated_at": "2018-01-03 21:19:47"
        }
    ]
}
```

### HTTP Request
`GET connector/api/brand/{brand}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `brand` |  required  | comma separated ids of the brands

<!-- END_d1614880df4d370cfc4ed7ec60bcf52c -->

#Business Location management


<!-- START_c072951d4602fe0a03aff23281064400 -->
## List business locations

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/business-location" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/business-location"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "business_id": 1,
            "location_id": null,
            "name": "Awesome Shop",
            "landmark": "Linking Street",
            "country": "USA",
            "state": "Arizona",
            "city": "Phoenix",
            "zip_code": "85001",
            "invoice_scheme_id": 1,
            "invoice_layout_id": 1,
            "selling_price_group_id": null,
            "print_receipt_on_invoice": 1,
            "receipt_printer_type": "browser",
            "printer_id": null,
            "mobile": null,
            "alternate_number": null,
            "email": null,
            "website": null,
            "featured_products": [
                "5",
                "71"
            ],
            "is_active": 1,
            "payment_methods": [
                {
                    "name": "cash",
                    "label": "Cash",
                    "account_id": "1"
                },
                {
                    "name": "card",
                    "label": "Card",
                    "account_id": null
                },
                {
                    "name": "cheque",
                    "label": "Cheque",
                    "account_id": null
                },
                {
                    "name": "bank_transfer",
                    "label": "Bank Transfer",
                    "account_id": null
                },
                {
                    "name": "other",
                    "label": "Other",
                    "account_id": null
                },
                {
                    "name": "custom_pay_1",
                    "label": "Custom Payment 1",
                    "account_id": null
                },
                {
                    "name": "custom_pay_2",
                    "label": "Custom Payment 2",
                    "account_id": null
                },
                {
                    "name": "custom_pay_3",
                    "label": "Custom Payment 3",
                    "account_id": null
                }
            ],
            "custom_field1": null,
            "custom_field2": null,
            "custom_field3": null,
            "custom_field4": null,
            "deleted_at": null,
            "created_at": "2018-01-04 02:15:20",
            "updated_at": "2020-06-05 00:56:54"
        }
    ]
}
```

### HTTP Request
`GET connector/api/business-location`


<!-- END_c072951d4602fe0a03aff23281064400 -->

<!-- START_9104e27d4bc4c1062e9f47ae0f6c6b4e -->
## Get the specified business location

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/business-location/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/business-location/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "business_id": 1,
            "location_id": null,
            "name": "Awesome Shop",
            "landmark": "Linking Street",
            "country": "USA",
            "state": "Arizona",
            "city": "Phoenix",
            "zip_code": "85001",
            "invoice_scheme_id": 1,
            "invoice_layout_id": 1,
            "selling_price_group_id": null,
            "print_receipt_on_invoice": 1,
            "receipt_printer_type": "browser",
            "printer_id": null,
            "mobile": null,
            "alternate_number": null,
            "email": null,
            "website": null,
            "featured_products": [
                "5",
                "71"
            ],
            "is_active": 1,
            "payment_methods": [
                {
                    "name": "cash",
                    "label": "Cash",
                    "account_id": "1"
                },
                {
                    "name": "card",
                    "label": "Card",
                    "account_id": null
                },
                {
                    "name": "cheque",
                    "label": "Cheque",
                    "account_id": null
                },
                {
                    "name": "bank_transfer",
                    "label": "Bank Transfer",
                    "account_id": null
                },
                {
                    "name": "other",
                    "label": "Other",
                    "account_id": null
                },
                {
                    "name": "custom_pay_1",
                    "label": "Custom Payment 1",
                    "account_id": null
                },
                {
                    "name": "custom_pay_2",
                    "label": "Custom Payment 2",
                    "account_id": null
                },
                {
                    "name": "custom_pay_3",
                    "label": "Custom Payment 3",
                    "account_id": null
                }
            ],
            "custom_field1": null,
            "custom_field2": null,
            "custom_field3": null,
            "custom_field4": null,
            "deleted_at": null,
            "created_at": "2018-01-04 02:15:20",
            "updated_at": "2020-06-05 00:56:54"
        }
    ]
}
```

### HTTP Request
`GET connector/api/business-location/{business_location}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `location` |  required  | comma separated ids of the business location

<!-- END_9104e27d4bc4c1062e9f47ae0f6c6b4e -->

#CRM


<!-- START_769942ab71bff81917e9ac7df7b234d8 -->
## List Follow ups

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/crm/follow-ups?start_date=2020-12-16&end_date=2020-12-16&status=asperiores&follow_up_type=ut&order_by=start_datetime&direction=desc&per_page=10" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/crm/follow-ups"
);

let params = {
    "start_date": "2020-12-16",
    "end_date": "2020-12-16",
    "status": "asperiores",
    "follow_up_type": "ut",
    "order_by": "start_datetime",
    "direction": "desc",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "business_id": 1,
            "contact_id": 50,
            "title": "Test Follow up",
            "status": "scheduled",
            "start_datetime": "2020-12-16 15:15:00",
            "end_datetime": "2020-12-16 15:15:00",
            "description": "<p>tst<\/p>",
            "schedule_type": "call",
            "allow_notification": 0,
            "notify_via": {
                "sms": 0,
                "mail": 1
            },
            "notify_before": null,
            "notify_type": "minute",
            "created_by": 1,
            "followup_additional_info": null,
            "created_at": "2020-12-16 03:15:23",
            "updated_at": "2020-12-16 15:46:34",
            "customer": {
                "id": 50,
                "business_id": 1,
                "type": "lead",
                "supplier_business_name": null,
                "name": " Lead 4  ",
                "prefix": null,
                "first_name": "Lead 4",
                "middle_name": null,
                "last_name": null,
                "email": null,
                "contact_id": "CO0011",
                "contact_status": "active",
                "tax_number": null,
                "city": null,
                "state": null,
                "country": null,
                "address_line_1": null,
                "address_line_2": null,
                "zip_code": null,
                "dob": null,
                "mobile": "234567",
                "landline": null,
                "alternate_number": null,
                "pay_term_number": null,
                "pay_term_type": null,
                "credit_limit": null,
                "created_by": 1,
                "balance": "0.0000",
                "total_rp": 0,
                "total_rp_used": 0,
                "total_rp_expired": 0,
                "is_default": 0,
                "shipping_address": null,
                "position": null,
                "customer_group_id": null,
                "crm_source": "55",
                "crm_life_stage": "62",
                "custom_field1": null,
                "custom_field2": null,
                "custom_field3": null,
                "custom_field4": null,
                "custom_field5": null,
                "custom_field6": null,
                "custom_field7": null,
                "custom_field8": null,
                "custom_field9": null,
                "custom_field10": null,
                "deleted_at": null,
                "created_at": "2020-12-15 23:14:48",
                "updated_at": "2021-01-07 15:32:52",
                "remember_token": null,
                "password": null
            }
        },
        {
            "id": 2,
            "business_id": 1,
            "contact_id": 50,
            "title": "Test Follow up 1",
            "status": "completed",
            "start_datetime": "2020-12-16 15:46:00",
            "end_datetime": "2020-12-16 15:46:00",
            "description": "<p>Test Follow up<\/p>",
            "schedule_type": "call",
            "allow_notification": 0,
            "notify_via": {
                "sms": 0,
                "mail": 1
            },
            "notify_before": null,
            "notify_type": "minute",
            "created_by": 1,
            "followup_additional_info": null,
            "created_at": "2020-12-16 15:46:57",
            "updated_at": "2020-12-17 10:24:11",
            "customer": {
                "id": 50,
                "business_id": 1,
                "type": "lead",
                "supplier_business_name": null,
                "name": " Lead 4  ",
                "prefix": null,
                "first_name": "Lead 4",
                "middle_name": null,
                "last_name": null,
                "email": null,
                "contact_id": "CO0011",
                "contact_status": "active",
                "tax_number": null,
                "city": null,
                "state": null,
                "country": null,
                "address_line_1": null,
                "address_line_2": null,
                "zip_code": null,
                "dob": null,
                "mobile": "234567",
                "landline": null,
                "alternate_number": null,
                "pay_term_number": null,
                "pay_term_type": null,
                "credit_limit": null,
                "created_by": 1,
                "balance": "0.0000",
                "total_rp": 0,
                "total_rp_used": 0,
                "total_rp_expired": 0,
                "is_default": 0,
                "shipping_address": null,
                "position": null,
                "customer_group_id": null,
                "crm_source": "55",
                "crm_life_stage": "62",
                "custom_field1": null,
                "custom_field2": null,
                "custom_field3": null,
                "custom_field4": null,
                "custom_field5": null,
                "custom_field6": null,
                "custom_field7": null,
                "custom_field8": null,
                "custom_field9": null,
                "custom_field10": null,
                "deleted_at": null,
                "created_at": "2020-12-15 23:14:48",
                "updated_at": "2021-01-07 15:32:52",
                "remember_token": null,
                "password": null
            }
        }
    ],
    "links": {
        "first": "http:\/\/local.pos.com\/connector\/api\/crm\/follow-ups?page=1",
        "last": "http:\/\/local.pos.com\/connector\/api\/crm\/follow-ups?page=21",
        "prev": null,
        "next": "http:\/\/local.pos.com\/connector\/api\/crm\/follow-ups?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 21,
        "path": "http:\/\/local.pos.com\/connector\/api\/crm\/follow-ups",
        "per_page": "2",
        "to": 2,
        "total": 42
    }
}
```

### HTTP Request
`GET connector/api/crm/follow-ups`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `start_date` |  optional  | format: Y-m-d (Ex: 2020-12-16)
    `end_date` |  optional  | format: Y-m-d (Ex: 2020-12-16)
    `status` |  optional  | filter the result through status, get status from getFollowUpResources->statuses
    `follow_up_type` |  optional  | filter the result through follow_up_type, get follow_up_type from getFollowUpResources->follow_up_types
    `order_by` |  optional  | Column name to sort the result, Column: start_datetime
    `direction` |  optional  | Direction to sort the result, Required if using 'order_by', direction: desc, asc
    `per_page` |  optional  | Total records per page. default: 10, Set -1 for no pagination

<!-- END_769942ab71bff81917e9ac7df7b234d8 -->

<!-- START_bd9693a0666e19abef8cc5b2a6ef4c9a -->
## Add follow up

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://test.local/connector/api/crm/follow-ups" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"title":"Meeting with client","contact_id":2,"description":"aspernatur","schedule_type":"error","user_id":"[2,3,5]","notify_before":5,"notify_type":"minute","status":"open","notify_via":"['sms' => 0 ,'mail' => 1]","start_datetime":"2021-01-06 13:05:00","end_datetime":"2021-01-06 13:05:00","followup_additional_info":"['call duration' => '1 hour']","allow_notification":true}'

```

```javascript
const url = new URL(
    "http://test.local/connector/api/crm/follow-ups"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "title": "Meeting with client",
    "contact_id": 2,
    "description": "aspernatur",
    "schedule_type": "error",
    "user_id": "[2,3,5]",
    "notify_before": 5,
    "notify_type": "minute",
    "status": "open",
    "notify_via": "['sms' => 0 ,'mail' => 1]",
    "start_datetime": "2021-01-06 13:05:00",
    "end_datetime": "2021-01-06 13:05:00",
    "followup_additional_info": "['call duration' => '1 hour']",
    "allow_notification": true
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "title": "test",
        "contact_id": "1",
        "description": null,
        "schedule_type": "call",
        "notify_before": null,
        "status": null,
        "start_datetime": "2021-01-06 15:27:00",
        "end_datetime": "2021-01-06 15:27:00",
        "allow_notification": 0,
        "notify_via": {
            "sms": 1,
            "mail": 1
        },
        "notify_type": "hour",
        "business_id": 1,
        "created_by": 1,
        "updated_at": "2021-01-06 17:04:54",
        "created_at": "2021-01-06 17:04:54",
        "id": 20
    }
}
```

### HTTP Request
`POST connector/api/crm/follow-ups`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | string |  required  | Follow up title
        `contact_id` | integer |  required  | Contact to be followed up
        `description` | text |  optional  | Follow up description
        `schedule_type` | string |  required  | Follow up type default get from getFollowUpResources->follow_up_types
        `user_id` | array |  required  | Integer ID; Follow up to be assigned Ex: [2,3,8]
        `notify_before` | integer |  optional  | Integer value will be used to send auto notification before follow up starts.
        `notify_type` | string |  optional  | Notify type Ex: 'minute', 'hour', 'day'. default is hour
        `status` | string |  optional  | Follow up status
        `notify_via` | array |  optional  | Will be used to send notification Ex: ['sms' => 0 ,'mail' => 1]
        `start_datetime` | datetime |  required  | Follow up start datetime format: Y-m-d H:i:s Ex: 2020-12-16 03:15:23
        `end_datetime` | datetime |  required  | Follow up end datetime format: Y-m-d H:i:s Ex: 2020-12-16 03:15:23
        `followup_additional_info` | array |  optional  | Follow up additional info Ex: ['call duration' => '1 hour']
        `allow_notification` | boolean |  optional  | 0/1 : If notification will be send before follow up starts. default is 1(true)
    
<!-- END_bd9693a0666e19abef8cc5b2a6ef4c9a -->

<!-- START_a0bd3915b449b6f8282908c9b166ce42 -->
## Get the specified followup

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/crm/follow-ups/1,2" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/crm/follow-ups/1,2"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 20,
            "business_id": 1,
            "contact_id": 1,
            "title": "Meeting with client",
            "status": null,
            "start_datetime": "2021-01-06 15:27:00",
            "end_datetime": "2021-01-06 15:27:00",
            "description": null,
            "schedule_type": "call",
            "allow_notification": 0,
            "notify_via": {
                "sms": 1,
                "mail": 1
            },
            "notify_before": null,
            "notify_type": "hour",
            "created_by": 1,
            "created_at": "2021-01-06 17:04:54",
            "updated_at": "2021-01-06 17:04:54",
            "customer": {
                "id": 1,
                "business_id": 1,
                "type": "customer",
                "supplier_business_name": null,
                "name": "Walk-In Customer",
                "prefix": null,
                "first_name": "Walk-In Customer",
                "middle_name": null,
                "last_name": null,
                "email": null,
                "contact_id": "CO0005",
                "contact_status": "active",
                "tax_number": null,
                "city": "Phoenix",
                "state": "Arizona",
                "country": "USA",
                "address_line_1": "Linking Street",
                "address_line_2": null,
                "zip_code": null,
                "dob": null,
                "mobile": "(378) 400-1234",
                "landline": null,
                "alternate_number": null,
                "pay_term_number": null,
                "pay_term_type": null,
                "credit_limit": null,
                "created_by": 1,
                "balance": "0.0000",
                "total_rp": 0,
                "total_rp_used": 0,
                "total_rp_expired": 0,
                "is_default": 1,
                "shipping_address": null,
                "position": null,
                "customer_group_id": null,
                "crm_source": null,
                "crm_life_stage": null,
                "custom_field1": null,
                "custom_field2": null,
                "custom_field3": null,
                "custom_field4": null,
                "custom_field5": null,
                "custom_field6": null,
                "custom_field7": null,
                "custom_field8": null,
                "custom_field9": null,
                "custom_field10": null,
                "deleted_at": null,
                "created_at": "2018-01-03 20:45:20",
                "updated_at": "2018-06-11 22:22:05",
                "remember_token": null,
                "password": null
            },
            "users": [
                {
                    "id": 2,
                    "user_type": "user",
                    "surname": "Mr",
                    "first_name": "Demo",
                    "last_name": "Cashier",
                    "username": "cashier",
                    "email": "cashier@example.com",
                    "language": "en",
                    "contact_no": null,
                    "address": null,
                    "business_id": 1,
                    "max_sales_discount_percent": null,
                    "allow_login": 1,
                    "essentials_department_id": null,
                    "essentials_designation_id": null,
                    "status": "active",
                    "crm_contact_id": null,
                    "is_cmmsn_agnt": 0,
                    "cmmsn_percent": "0.00",
                    "selected_contacts": 0,
                    "dob": null,
                    "gender": null,
                    "marital_status": null,
                    "blood_group": null,
                    "contact_number": null,
                    "fb_link": null,
                    "twitter_link": null,
                    "social_media_1": null,
                    "social_media_2": null,
                    "permanent_address": null,
                    "current_address": null,
                    "guardian_name": null,
                    "custom_field_1": null,
                    "custom_field_2": null,
                    "custom_field_3": null,
                    "custom_field_4": null,
                    "bank_details": null,
                    "id_proof_name": null,
                    "id_proof_number": null,
                    "deleted_at": null,
                    "created_at": "2018-01-04 02:20:58",
                    "updated_at": "2018-01-04 02:20:58",
                    "pivot": {
                        "schedule_id": 20,
                        "user_id": 2
                    }
                }
            ]
        }
    ]
}
```

### HTTP Request
`GET connector/api/crm/follow-ups/{follow_up}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `follow_up` |  required  | comma separated ids of the follow_ups

<!-- END_a0bd3915b449b6f8282908c9b166ce42 -->

<!-- START_7088929a24a9e343737f77f8c947a410 -->
## Update follow up

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://test.local/connector/api/crm/follow-ups/20" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"title":"Meeting with client","contact_id":2,"description":"quo","schedule_type":"officiis","user_id":"[2,3,5]","notify_before":5,"notify_type":"minute","status":"open","notify_via":"['sms' => 0 ,'mail' => 1]","followup_additional_info":"['call duration' => '1 hour']","start_datetime":"2021-01-06 13:05:00","end_datetime":"2021-01-06 13:05:00","allow_notification":true}'

```

```javascript
const url = new URL(
    "http://test.local/connector/api/crm/follow-ups/20"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "title": "Meeting with client",
    "contact_id": 2,
    "description": "quo",
    "schedule_type": "officiis",
    "user_id": "[2,3,5]",
    "notify_before": 5,
    "notify_type": "minute",
    "status": "open",
    "notify_via": "['sms' => 0 ,'mail' => 1]",
    "followup_additional_info": "['call duration' => '1 hour']",
    "start_datetime": "2021-01-06 13:05:00",
    "end_datetime": "2021-01-06 13:05:00",
    "allow_notification": true
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 20,
        "business_id": 1,
        "contact_id": "1",
        "title": "Meeting with client",
        "status": null,
        "start_datetime": "2021-01-06 15:27:00",
        "end_datetime": "2021-01-06 15:27:00",
        "description": null,
        "schedule_type": "call",
        "allow_notification": 0,
        "notify_via": {
            "sms": 1,
            "mail": 0
        },
        "notify_before": null,
        "notify_type": "hour",
        "created_by": 1,
        "created_at": "2021-01-06 17:04:54",
        "updated_at": "2021-01-06 18:22:21"
    }
}
```

### HTTP Request
`PUT connector/api/crm/follow-ups/{follow_up}`

`PATCH connector/api/crm/follow-ups/{follow_up}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `follow_up` |  required  | id of the follow up to be updated
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `title` | string |  required  | Follow up title
        `contact_id` | integer |  required  | Contact to be followed up
        `description` | text |  optional  | Follow up description
        `schedule_type` | string |  required  | Follow up type default get from getFollowUpResources->follow_up_types
        `user_id` | array |  required  | Integer ID; Follow up to be assigned Ex: [2,3,8]
        `notify_before` | integer |  optional  | Integer value will be used to send auto notification before follow up starts.
        `notify_type` | string |  optional  | Notify type Ex: 'minute', 'hour', 'day'. default is hour
        `status` | string |  optional  | Follow up status
        `notify_via` | array |  optional  | Will be used to send notification Ex: ['sms' => 0 ,'mail' => 1]
        `followup_additional_info` | array |  optional  | Follow up additional info Ex: ['call duration' => '1 hour']
        `start_datetime` | datetime |  required  | Follow up start datetime format: Y-m-d H:i:s Ex: 2020-12-16 03:15:23
        `end_datetime` | datetime |  required  | Follow up end datetime format: Y-m-d H:i:s Ex: 2020-12-16 03:15:23
        `allow_notification` | boolean |  optional  | 0/1 : If notification will be send before follow up starts. default is 1(true)
    
<!-- END_7088929a24a9e343737f77f8c947a410 -->

<!-- START_1f14240a2d5b4c33d8c3659050d659c6 -->
## Get follow up resources

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/crm/follow-up-resources" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/crm/follow-up-resources"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "statuses": {
            "scheduled": "Scheduled",
            "open": "Open",
            "canceled": "Cancelled",
            "completed": "Completed"
        },
        "follow_up_types": {
            "call": "Call",
            "sms": "Sms",
            "meeting": "Meeting",
            "email": "Email"
        },
        "notify_type": {
            "minute": "Minute",
            "hour": "Hour",
            "day": "Day"
        },
        "notify_via": {
            "sms": "Sms",
            "mail": "Email"
        }
    }
}
```

### HTTP Request
`GET connector/api/crm/follow-up-resources`


<!-- END_1f14240a2d5b4c33d8c3659050d659c6 -->

<!-- START_1130c94d8503bf4189f9b516f11714b8 -->
## List lead

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/crm/leads?assigned_to=1%2C2%2C3&name=beatae&biz_name=voluptatem&mobile_num=14&contact_id=fugiat&order_by=nam&direction=desc&per_page=10" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/crm/leads"
);

let params = {
    "assigned_to": "1,2,3",
    "name": "beatae",
    "biz_name": "voluptatem",
    "mobile_num": "14",
    "contact_id": "fugiat",
    "order_by": "nam",
    "direction": "desc",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "contact_id": "CO0010",
            "name": "mr Lead 3 kr kr 2",
            "supplier_business_name": "POS",
            "email": null,
            "mobile": "9437638555",
            "tax_number": null,
            "created_at": "2020-12-15 23:14:30",
            "custom_field1": null,
            "custom_field2": null,
            "custom_field3": null,
            "custom_field4": null,
            "custom_field5": null,
            "custom_field6": null,
            "alternate_number": null,
            "landline": null,
            "dob": null,
            "contact_status": "active",
            "type": "lead",
            "custom_field7": null,
            "custom_field8": null,
            "custom_field9": null,
            "custom_field10": null,
            "id": 49,
            "business_id": 1,
            "crm_source": "55",
            "crm_life_stage": "60",
            "address_line_1": null,
            "address_line_2": null,
            "city": null,
            "state": null,
            "country": null,
            "zip_code": null,
            "last_follow_up_id": 18,
            "upcoming_follow_up_id": null,
            "last_follow_up": "2021-01-07 10:26:00",
            "upcoming_follow_up": null,
            "last_follow_up_additional_info": "{\"test\":\"test done\",\"call_duration\":\"1.5 Hour\",\"rand\":1}",
            "upcoming_follow_up_additional_info": null,
            "source": {
                "id": 55,
                "name": "Facebook",
                "business_id": 1,
                "short_code": null,
                "parent_id": 0,
                "created_by": 1,
                "category_type": "source",
                "description": "Facebook",
                "slug": null,
                "woocommerce_cat_id": null,
                "deleted_at": null,
                "created_at": "2020-12-15 23:07:53",
                "updated_at": "2020-12-15 23:07:53"
            },
            "life_stage": {
                "id": 60,
                "name": "Open Deal",
                "business_id": 1,
                "short_code": null,
                "parent_id": 0,
                "created_by": 1,
                "category_type": "life_stage",
                "description": "Open Deal",
                "slug": null,
                "woocommerce_cat_id": null,
                "deleted_at": null,
                "created_at": "2020-12-15 23:11:05",
                "updated_at": "2020-12-15 23:11:05"
            },
            "lead_users": [
                {
                    "id": 10,
                    "user_type": "user",
                    "surname": "Mr.",
                    "first_name": "WooCommerce",
                    "last_name": "User",
                    "username": "woocommerce_user",
                    "email": "woo@example.com",
                    "language": "en",
                    "contact_no": null,
                    "address": null,
                    "business_id": 1,
                    "max_sales_discount_percent": null,
                    "allow_login": 1,
                    "essentials_department_id": null,
                    "essentials_designation_id": null,
                    "status": "active",
                    "crm_contact_id": null,
                    "is_cmmsn_agnt": 0,
                    "cmmsn_percent": "0.00",
                    "selected_contacts": 0,
                    "dob": null,
                    "gender": null,
                    "marital_status": null,
                    "blood_group": null,
                    "contact_number": null,
                    "fb_link": null,
                    "twitter_link": null,
                    "social_media_1": null,
                    "social_media_2": null,
                    "permanent_address": null,
                    "current_address": null,
                    "guardian_name": null,
                    "custom_field_1": null,
                    "custom_field_2": null,
                    "custom_field_3": null,
                    "custom_field_4": null,
                    "bank_details": null,
                    "id_proof_name": null,
                    "id_proof_number": null,
                    "deleted_at": null,
                    "created_at": "2018-08-02 04:05:55",
                    "updated_at": "2018-08-02 04:05:55",
                    "pivot": {
                        "contact_id": 49,
                        "user_id": 10
                    }
                }
            ]
        },
        {
            "contact_id": "CO0011",
            "name": " Lead 4  ",
            "supplier_business_name": null,
            "email": null,
            "mobile": "234567",
            "tax_number": null,
            "created_at": "2020-12-15 23:14:48",
            "custom_field1": null,
            "custom_field2": null,
            "custom_field3": null,
            "custom_field4": null,
            "custom_field5": null,
            "custom_field6": null,
            "alternate_number": null,
            "landline": null,
            "dob": null,
            "contact_status": "active",
            "type": "lead",
            "custom_field7": null,
            "custom_field8": null,
            "custom_field9": null,
            "custom_field10": null,
            "id": 50,
            "business_id": 1,
            "crm_source": "55",
            "crm_life_stage": "62",
            "address_line_1": null,
            "address_line_2": null,
            "city": null,
            "state": null,
            "country": null,
            "zip_code": null,
            "last_follow_up_id": 32,
            "upcoming_follow_up_id": null,
            "last_follow_up": "2021-01-08 16:06:00",
            "upcoming_follow_up": null,
            "last_follow_up_additional_info": "{\"call_durartion\":\"5 hour\"}",
            "upcoming_follow_up_additional_info": null,
            "source": {
                "id": 55,
                "name": "Facebook",
                "business_id": 1,
                "short_code": null,
                "parent_id": 0,
                "created_by": 1,
                "category_type": "source",
                "description": "Facebook",
                "slug": null,
                "woocommerce_cat_id": null,
                "deleted_at": null,
                "created_at": "2020-12-15 23:07:53",
                "updated_at": "2020-12-15 23:07:53"
            },
            "life_stage": {
                "id": 62,
                "name": "New",
                "business_id": 1,
                "short_code": null,
                "parent_id": 0,
                "created_by": 1,
                "category_type": "life_stage",
                "description": "New",
                "slug": null,
                "woocommerce_cat_id": null,
                "deleted_at": null,
                "created_at": "2020-12-15 23:11:26",
                "updated_at": "2020-12-15 23:11:26"
            },
            "lead_users": [
                {
                    "id": 11,
                    "user_type": "user",
                    "surname": "Mr",
                    "first_name": "Admin Essential",
                    "last_name": null,
                    "username": "admin-essentials",
                    "email": "admin_essentials@example.com",
                    "language": "en",
                    "contact_no": null,
                    "address": null,
                    "business_id": 1,
                    "max_sales_discount_percent": null,
                    "allow_login": 1,
                    "essentials_department_id": null,
                    "essentials_designation_id": null,
                    "status": "active",
                    "crm_contact_id": null,
                    "is_cmmsn_agnt": 0,
                    "cmmsn_percent": "0.00",
                    "selected_contacts": 0,
                    "dob": null,
                    "gender": null,
                    "marital_status": null,
                    "blood_group": null,
                    "contact_number": null,
                    "fb_link": null,
                    "twitter_link": null,
                    "social_media_1": null,
                    "social_media_2": null,
                    "permanent_address": null,
                    "current_address": null,
                    "guardian_name": null,
                    "custom_field_1": null,
                    "custom_field_2": null,
                    "custom_field_3": null,
                    "custom_field_4": null,
                    "bank_details": null,
                    "id_proof_name": null,
                    "id_proof_number": null,
                    "deleted_at": null,
                    "created_at": "2018-01-04 02:15:19",
                    "updated_at": "2018-01-04 02:15:19",
                    "pivot": {
                        "contact_id": 50,
                        "user_id": 11
                    }
                }
            ]
        },
        {
            "contact_id": "CO0015",
            "name": " Lead kr  ",
            "supplier_business_name": null,
            "email": null,
            "mobile": "9437638555",
            "tax_number": null,
            "created_at": "2021-01-07 18:31:08",
            "custom_field1": null,
            "custom_field2": null,
            "custom_field3": null,
            "custom_field4": null,
            "custom_field5": null,
            "custom_field6": null,
            "alternate_number": null,
            "landline": null,
            "dob": "2021-01-07",
            "contact_status": "active",
            "type": "lead",
            "custom_field7": null,
            "custom_field8": null,
            "custom_field9": null,
            "custom_field10": null,
            "id": 82,
            "business_id": 1,
            "crm_source": null,
            "crm_life_stage": null,
            "address_line_1": null,
            "address_line_2": null,
            "city": null,
            "state": null,
            "country": null,
            "zip_code": null,
            "last_follow_up_id": 36,
            "upcoming_follow_up_id": null,
            "last_follow_up": "2021-01-07 18:31:08",
            "upcoming_follow_up": null,
            "last_follow_up_additional_info": "{\"call duration\":\"1 hour\",\"call descr\":\"talked to him and all okay\"}",
            "upcoming_follow_up_additional_info": null,
            "source": null,
            "life_stage": null,
            "lead_users": [
                {
                    "id": 11,
                    "user_type": "user",
                    "surname": "Mr",
                    "first_name": "Admin Essential",
                    "last_name": null,
                    "username": "admin-essentials",
                    "email": "admin_essentials@example.com",
                    "language": "en",
                    "contact_no": null,
                    "address": null,
                    "business_id": 1,
                    "max_sales_discount_percent": null,
                    "allow_login": 1,
                    "essentials_department_id": null,
                    "essentials_designation_id": null,
                    "status": "active",
                    "crm_contact_id": null,
                    "is_cmmsn_agnt": 0,
                    "cmmsn_percent": "0.00",
                    "selected_contacts": 0,
                    "dob": null,
                    "gender": null,
                    "marital_status": null,
                    "blood_group": null,
                    "contact_number": null,
                    "fb_link": null,
                    "twitter_link": null,
                    "social_media_1": null,
                    "social_media_2": null,
                    "permanent_address": null,
                    "current_address": null,
                    "guardian_name": null,
                    "custom_field_1": null,
                    "custom_field_2": null,
                    "custom_field_3": null,
                    "custom_field_4": null,
                    "bank_details": null,
                    "id_proof_name": null,
                    "id_proof_number": null,
                    "deleted_at": null,
                    "created_at": "2018-01-04 02:15:19",
                    "updated_at": "2018-01-04 02:15:19",
                    "pivot": {
                        "contact_id": 82,
                        "user_id": 11
                    }
                }
            ]
        }
    ],
    "links": {
        "first": "http:\/\/local.pos.com\/connector\/api\/crm\/leads?page=1",
        "last": "http:\/\/local.pos.com\/connector\/api\/crm\/leads?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/local.pos.com\/connector\/api\/crm\/leads",
        "per_page": "10",
        "to": 3,
        "total": 3
    }
}
```

### HTTP Request
`GET connector/api/crm/leads`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `assigned_to` |  optional  | comma separated ids of users to whom lead is assigned (Ex: 1,2,3)
    `name` |  optional  | Search term for lead name
    `biz_name` |  optional  | Search term for lead's business name
    `mobile_num` |  optional  | Search term for lead's mobile number
    `contact_id` |  optional  | Search term for lead's contact_id. Ex(CO0005)
    `order_by` |  optional  | Column name to sort the result, Column: name, supplier_business_name
    `direction` |  optional  | Direction to sort the result, Required if using 'order_by', direction: desc, asc
    `per_page` |  optional  | Total records per page. default: 10, Set -1 for no pagination

<!-- END_1130c94d8503bf4189f9b516f11714b8 -->

<!-- START_da92fa7a02594a4309d0ad9614b1bc1b -->
## Save Call Logs

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://test.local/connector/api/crm/call-logs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"call_logs":[{"mobile_number":"quia","mobile_name":"aut","call_type":"call","start_time":"repudiandae","end_time":"explicabo","duration":"pariatur"}]}'

```

```javascript
const url = new URL(
    "http://test.local/connector/api/crm/call-logs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "call_logs": [
        {
            "mobile_number": "quia",
            "mobile_name": "aut",
            "call_type": "call",
            "start_time": "repudiandae",
            "end_time": "explicabo",
            "duration": "pariatur"
        }
    ]
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST connector/api/crm/call-logs`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `call_logs.*.mobile_number` | string |  required  | Mobile number of the customer or user
        `call_logs.*.mobile_name` | string |  optional  | Name of the contact saved in the mobile
        `call_logs.*.call_type` | string |  optional  | Call type (call, sms)
        `call_logs.*.start_time` | string |  optional  | Start datetime of the call in "Y-m-d H:i:s" format
        `call_logs.*.end_time` | string |  optional  | End datetime of the call in "Y-m-d H:i:s" format
        `call_logs.*.duration` | string |  optional  | Duration of the call in seconds
    
<!-- END_da92fa7a02594a4309d0ad9614b1bc1b -->

#Cash register management


<!-- START_a50604bed9adc4013802a310b95b65d4 -->
## List Cash Registers

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/cash-register?status=open&user_id=10&start_date=2018-06-25&end_date=2018-06-25&location_id=dolores&per_page=15" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/cash-register"
);

let params = {
    "status": "open",
    "user_id": "10",
    "start_date": "2018-06-25",
    "end_date": "2018-06-25",
    "location_id": "dolores",
    "per_page": "15",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "business_id": 1,
            "location_id": 1,
            "user_id": 9,
            "status": "open",
            "closed_at": null,
            "closing_amount": "0.0000",
            "total_card_slips": 0,
            "total_cheques": 0,
            "closing_note": null,
            "created_at": "2020-07-02 12:03:00",
            "updated_at": "2020-07-02 12:03:19",
            "cash_register_transactions": [
                {
                    "id": 1,
                    "cash_register_id": 1,
                    "amount": "0.0000",
                    "pay_method": "cash",
                    "type": "credit",
                    "transaction_type": "initial",
                    "transaction_id": null,
                    "created_at": "2018-07-13 07:39:34",
                    "updated_at": "2018-07-13 07:39:34"
                },
                {
                    "id": 2,
                    "cash_register_id": 1,
                    "amount": "42.5000",
                    "pay_method": "cash",
                    "type": "credit",
                    "transaction_type": "sell",
                    "transaction_id": 41,
                    "created_at": "2018-07-13 07:44:40",
                    "updated_at": "2018-07-13 07:44:40"
                }
            ]
        },
        {
            "id": 2,
            "business_id": 1,
            "location_id": 1,
            "user_id": 1,
            "status": "",
            "closed_at": "2020-07-02 12:03:00",
            "closing_amount": "0.0000",
            "total_card_slips": 0,
            "total_cheques": 0,
            "closing_note": null,
            "created_at": "2020-07-06 15:38:23",
            "updated_at": "2020-07-06 15:38:23",
            "cash_register_transactions": [
                {
                    "id": 19,
                    "cash_register_id": 2,
                    "amount": "10.0000",
                    "pay_method": "cash",
                    "type": "credit",
                    "transaction_type": "initial",
                    "transaction_id": null,
                    "created_at": "2020-07-06 15:38:23",
                    "updated_at": "2020-07-06 15:38:23"
                }
            ]
        }
    ],
    "links": {
        "first": "http:\/\/local.pos.com\/connector\/api\/cash-register?page=1",
        "last": null,
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "path": "http:\/\/local.pos.com\/connector\/api\/cash-register",
        "per_page": 10,
        "to": 2
    }
}
```

### HTTP Request
`GET connector/api/cash-register`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `status` |  optional  | status of the register (open, close)
    `user_id` |  optional  | id of the user
    `start_date` |  optional  | format:Y-m-d
    `end_date` |  optional  | format:Y-m-d
    `location_id` |  optional  | id of the location
    `per_page` |  optional  | Total records per page. default: 10, Set -1 for no pagination

<!-- END_a50604bed9adc4013802a310b95b65d4 -->

<!-- START_8f89eda7862467cd40d78804ce26224f -->
## Create Cash Register

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://test.local/connector/api/cash-register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"location_id":14,"initial_amount":95.84581989,"created_at":"2020-5-7 15:20:22","closed_at":"2020-5-7 15:20:22","status":"close","closing_amount":1718,"total_card_slips":5,"total_cheques":9,"closing_note":"sunt","transaction_ids":"1,2,3"}'

```

```javascript
const url = new URL(
    "http://test.local/connector/api/cash-register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "location_id": 14,
    "initial_amount": 95.84581989,
    "created_at": "2020-5-7 15:20:22",
    "closed_at": "2020-5-7 15:20:22",
    "status": "close",
    "closing_amount": 1718,
    "total_card_slips": 5,
    "total_cheques": 9,
    "closing_note": "sunt",
    "transaction_ids": "1,2,3"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST connector/api/cash-register`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `location_id` | integer |  required  | id of the business location
        `initial_amount` | float |  optional  | Initial amount
        `created_at` | string |  optional  | Register open datetime format:Y-m-d H:i:s,
        `closed_at` | string |  optional  | Register closed datetime format:Y-m-d H:i:s,
        `status` | register |  optional  | status (open, close)
        `closing_amount` | float |  optional  | Closing amount
        `total_card_slips` | integer |  optional  | total number of card slips
        `total_cheques` | integer |  optional  | total number of checks
        `closing_note` | string |  optional  | Closing note
        `transaction_ids` | string |  optional  | Comma separated ids of sells associated with the register
    
<!-- END_8f89eda7862467cd40d78804ce26224f -->

<!-- START_a2687684d95719fe11a4febbba5369ba -->
## Get the specified Register

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/cash-register/59" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/cash-register/59"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "business_id": 1,
            "location_id": 1,
            "user_id": 9,
            "status": "open",
            "closed_at": null,
            "closing_amount": "0.0000",
            "total_card_slips": 0,
            "total_cheques": 0,
            "closing_note": null,
            "created_at": "2020-07-02 12:03:00",
            "updated_at": "2020-07-02 12:03:19",
            "cash_register_transactions": [
                {
                    "id": 1,
                    "cash_register_id": 1,
                    "amount": "0.0000",
                    "pay_method": "cash",
                    "type": "credit",
                    "transaction_type": "initial",
                    "transaction_id": null,
                    "created_at": "2018-07-13 07:39:34",
                    "updated_at": "2018-07-13 07:39:34"
                },
                {
                    "id": 2,
                    "cash_register_id": 1,
                    "amount": "42.5000",
                    "pay_method": "cash",
                    "type": "credit",
                    "transaction_type": "sell",
                    "transaction_id": 41,
                    "created_at": "2018-07-13 07:44:40",
                    "updated_at": "2018-07-13 07:44:40"
                }
            ]
        }
    ]
}
```

### HTTP Request
`GET connector/api/cash-register/{cash_register}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `cash_register` |  required  | comma separated ids of the cash registers

<!-- END_a2687684d95719fe11a4febbba5369ba -->

#Contact management


<!-- START_07c0ddff380ea6d14e20347286efae96 -->
## List contact

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/contactapi?type=reprehenderit&name=deserunt&biz_name=doloremque&mobile_num=4&contact_id=eum&order_by=aut&direction=asperiores&per_page=10" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/contactapi"
);

let params = {
    "type": "reprehenderit",
    "name": "deserunt",
    "biz_name": "doloremque",
    "mobile_num": "4",
    "contact_id": "eum",
    "order_by": "aut",
    "direction": "asperiores",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 2,
            "business_id": 1,
            "type": "supplier",
            "supplier_business_name": "Alpha Clothings",
            "name": "Michael",
            "prefix": null,
            "first_name": "Michael",
            "middle_name": null,
            "last_name": null,
            "email": null,
            "contact_id": "CO0001",
            "contact_status": "active",
            "tax_number": "4590091535",
            "city": "Phoenix",
            "state": "Arizona",
            "country": "USA",
            "address_line_1": "Linking Street",
            "address_line_2": null,
            "zip_code": null,
            "dob": null,
            "mobile": "(378) 400-1234",
            "landline": null,
            "alternate_number": null,
            "pay_term_number": 15,
            "pay_term_type": "days",
            "credit_limit": null,
            "created_by": 1,
            "balance": "0.0000",
            "total_rp": 0,
            "total_rp_used": 0,
            "total_rp_expired": 0,
            "is_default": 0,
            "shipping_address": null,
            "position": null,
            "customer_group_id": null,
            "crm_source": null,
            "crm_life_stage": null,
            "custom_field1": null,
            "custom_field2": null,
            "custom_field3": null,
            "custom_field4": null,
            "custom_field5": null,
            "custom_field6": null,
            "custom_field7": null,
            "custom_field8": null,
            "custom_field9": null,
            "custom_field10": null,
            "deleted_at": null,
            "created_at": "2018-01-03 20:59:38",
            "updated_at": "2018-06-11 22:21:03",
            "remember_token": null,
            "password": null
        },
        {
            "id": 3,
            "business_id": 1,
            "type": "supplier",
            "supplier_business_name": "Manhattan Clothing Ltd.",
            "name": "Philip",
            "prefix": null,
            "first_name": "Philip",
            "middle_name": null,
            "last_name": null,
            "email": null,
            "contact_id": "CO0003",
            "contact_status": "active",
            "tax_number": "54869310093",
            "city": "Phoenix",
            "state": "Arizona",
            "country": "USA",
            "address_line_1": "Linking Street",
            "address_line_2": null,
            "zip_code": null,
            "dob": null,
            "mobile": "(378) 400-1234",
            "landline": null,
            "alternate_number": null,
            "pay_term_number": 15,
            "pay_term_type": "days",
            "credit_limit": null,
            "created_by": 1,
            "balance": "0.0000",
            "total_rp": 0,
            "total_rp_used": 0,
            "total_rp_expired": 0,
            "is_default": 0,
            "shipping_address": null,
            "position": null,
            "customer_group_id": null,
            "crm_source": null,
            "crm_life_stage": null,
            "custom_field1": null,
            "custom_field2": null,
            "custom_field3": null,
            "custom_field4": null,
            "custom_field5": null,
            "custom_field6": null,
            "custom_field7": null,
            "custom_field8": null,
            "custom_field9": null,
            "custom_field10": null,
            "deleted_at": null,
            "created_at": "2018-01-03 21:00:55",
            "updated_at": "2018-06-11 22:21:36",
            "remember_token": null,
            "password": null
        },
        {
            "id": 5,
            "business_id": 1,
            "type": "supplier",
            "supplier_business_name": "Digital Ocean",
            "name": "Mike McCubbin",
            "prefix": null,
            "first_name": "Mike McCubbin",
            "middle_name": null,
            "last_name": null,
            "email": null,
            "contact_id": "CN0004",
            "contact_status": "active",
            "tax_number": "52965489001",
            "city": "Phoenix",
            "state": "Arizona",
            "country": "USA",
            "address_line_1": "Linking Street",
            "address_line_2": null,
            "zip_code": null,
            "dob": null,
            "mobile": "(378) 400-1234",
            "landline": null,
            "alternate_number": null,
            "pay_term_number": 30,
            "pay_term_type": "days",
            "credit_limit": null,
            "created_by": 1,
            "balance": "0.0000",
            "total_rp": 0,
            "total_rp_used": 0,
            "total_rp_expired": 0,
            "is_default": 0,
            "shipping_address": null,
            "position": null,
            "customer_group_id": null,
            "crm_source": null,
            "crm_life_stage": null,
            "custom_field1": null,
            "custom_field2": null,
            "custom_field3": null,
            "custom_field4": null,
            "custom_field5": null,
            "custom_field6": null,
            "custom_field7": null,
            "custom_field8": null,
            "custom_field9": null,
            "custom_field10": null,
            "deleted_at": null,
            "created_at": "2018-01-06 06:53:22",
            "updated_at": "2018-06-11 22:21:47",
            "remember_token": null,
            "password": null
        },
        {
            "id": 6,
            "business_id": 1,
            "type": "supplier",
            "supplier_business_name": "Univer Suppliers",
            "name": "Jackson Hill",
            "prefix": null,
            "first_name": "Jackson Hill",
            "middle_name": null,
            "last_name": null,
            "email": null,
            "contact_id": "CO0002",
            "contact_status": "active",
            "tax_number": "5459000655",
            "city": "Phoenix",
            "state": "Arizona",
            "country": "USA",
            "address_line_1": "Linking Street",
            "address_line_2": null,
            "zip_code": null,
            "dob": null,
            "mobile": "(378) 400-1234",
            "landline": null,
            "alternate_number": null,
            "pay_term_number": 45,
            "pay_term_type": "days",
            "credit_limit": null,
            "created_by": 1,
            "balance": "0.0000",
            "total_rp": 0,
            "total_rp_used": 0,
            "total_rp_expired": 0,
            "is_default": 0,
            "shipping_address": null,
            "position": null,
            "customer_group_id": null,
            "crm_source": null,
            "crm_life_stage": null,
            "custom_field1": null,
            "custom_field2": null,
            "custom_field3": null,
            "custom_field4": null,
            "custom_field5": null,
            "custom_field6": null,
            "custom_field7": null,
            "custom_field8": null,
            "custom_field9": null,
            "custom_field10": null,
            "deleted_at": null,
            "created_at": "2018-01-06 06:55:09",
            "updated_at": "2018-06-11 22:21:18",
            "remember_token": null,
            "password": null
        }
    ],
    "links": {
        "first": "http:\/\/local.pos.com\/connector\/api\/contactapi?page=1",
        "last": "http:\/\/local.pos.com\/connector\/api\/contactapi?page=1",
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 1,
        "path": "http:\/\/local.pos.com\/connector\/api\/contactapi",
        "per_page": "10",
        "to": 4,
        "total": 4
    }
}
```

### HTTP Request
`GET connector/api/contactapi`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `type` |  required  | Type of contact (supplier, customer)
    `name` |  optional  | Search term for contact name
    `biz_name` |  optional  | Search term for contact's business name
    `mobile_num` |  optional  | Search term for contact's mobile number
    `contact_id` |  optional  | Search term for contact's contact_id. Ex(CO0005)
    `order_by` |  optional  | Column name to sort the result, Column: name, supplier_business_name
    `direction` |  optional  | Direction to sort the result, Direction: desc, asc
    `per_page` |  optional  | Total records per page. default: 10, Set -1 for no pagination

<!-- END_07c0ddff380ea6d14e20347286efae96 -->

<!-- START_f29a42b1a8a0ab58c748a1e2fcdfffff -->
## Create contact

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://test.local/connector/api/contactapi" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"type":"customer","supplier_business_name":"in","prefix":"quos","first_name":"nemo","middle_name":"consectetur","last_name":"ut","tax_number":"8787fefef","pay_term_number":3,"pay_term_type":"months","mobile":"4578691009","landline":"5487-8454-4145","alternate_number":"841847541222","address_line_1":"architecto","address_line_2":"laudantium","city":"ipsam","state":"ad","country":"quis","zip_code":"amet","customer_group_id":"itaque","contact_id":"libero","dob":"2000-06-13","custom_field1":"laudantium","custom_field2":"earum","custom_field3":"quibusdam","custom_field4":"quisquam","email":"perferendis","shipping_address":"dolor","position":"voluptatum","opening_balance":0,"source_id":20,"life_stage_id":12,"assigned_to":[]}'

```

```javascript
const url = new URL(
    "http://test.local/connector/api/contactapi"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "type": "customer",
    "supplier_business_name": "in",
    "prefix": "quos",
    "first_name": "nemo",
    "middle_name": "consectetur",
    "last_name": "ut",
    "tax_number": "8787fefef",
    "pay_term_number": 3,
    "pay_term_type": "months",
    "mobile": "4578691009",
    "landline": "5487-8454-4145",
    "alternate_number": "841847541222",
    "address_line_1": "architecto",
    "address_line_2": "laudantium",
    "city": "ipsam",
    "state": "ad",
    "country": "quis",
    "zip_code": "amet",
    "customer_group_id": "itaque",
    "contact_id": "libero",
    "dob": "2000-06-13",
    "custom_field1": "laudantium",
    "custom_field2": "earum",
    "custom_field3": "quibusdam",
    "custom_field4": "quisquam",
    "email": "perferendis",
    "shipping_address": "dolor",
    "position": "voluptatum",
    "opening_balance": 0,
    "source_id": 20,
    "life_stage_id": 12,
    "assigned_to": []
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "type": "customer",
        "name": "test customer",
        "tax_number": "75879BHF",
        "mobile": "7878825008",
        "business_id": 1,
        "created_by": 9,
        "credit_limit": null,
        "contact_id": "CO0007",
        "updated_at": "2020-06-04 21:59:21",
        "created_at": "2020-06-04 21:59:21",
        "id": 17
    }
}
```

### HTTP Request
`POST connector/api/contactapi`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `type` | string |  required  | Type of contact (supplier, customer, both, lead)
        `supplier_business_name` | string |  required  | Required if type is supplier
        `prefix` | string |  optional  | Prefix for the name of the contact
        `first_name` | string |  required  | Name of the contact
        `middle_name` | string |  optional  | 
        `last_name` | string |  optional  | 
        `tax_number` | string |  optional  | 
        `pay_term_number` | float |  optional  | 
        `pay_term_type` | string |  optional  | (months ,days)
        `mobile` | string |  required  | 
        `landline` | string |  optional  | 
        `alternate_number` | string |  optional  | 
        `address_line_1` | string |  optional  | 
        `address_line_2` | string |  optional  | 
        `city` | string |  optional  | 
        `state` | string |  optional  | 
        `country` | string |  optional  | 
        `zip_code` | string |  optional  | 
        `customer_group_id` | string |  optional  | 
        `contact_id` | string |  optional  | 
        `dob` | string |  optional  | Fromat: Y-m-d
        `custom_field1` | string |  optional  | 
        `custom_field2` | string |  optional  | 
        `custom_field3` | string |  optional  | 
        `custom_field4` | string |  optional  | 
        `email` | string |  optional  | 
        `shipping_address` | string |  optional  | 
        `position` | string |  optional  | 
        `opening_balance` | float |  optional  | 
        `source_id` | integer |  optional  | Id of the source. Applicable only if the type is lead
        `life_stage_id` | integer |  optional  | Id of the Life stage. Applicable only if the type is lead
        `assigned_to` | array |  optional  | Ids of the users the lead is assigned to. Applicable only if the type is lead
    
<!-- END_f29a42b1a8a0ab58c748a1e2fcdfffff -->

<!-- START_881831b2bf43ea3a46b0f31984cdcfd4 -->
## Get the specified contact

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/contactapi/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/contactapi/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "business_id": 1,
            "type": "customer",
            "supplier_business_name": null,
            "name": " Walk-In Customer  ",
            "prefix": null,
            "first_name": "Walk-In Customer",
            "middle_name": null,
            "last_name": null,
            "email": "walkin@test.com",
            "contact_id": "CO0005",
            "contact_status": "active",
            "tax_number": null,
            "city": "Phoenix",
            "state": "Arizona",
            "country": "USA",
            "address_line_1": "Linking Street",
            "address_line_2": null,
            "zip_code": "85001",
            "dob": null,
            "mobile": "(378) 400-1234",
            "landline": null,
            "alternate_number": null,
            "pay_term_number": null,
            "pay_term_type": null,
            "credit_limit": "0.0000",
            "created_by": 1,
            "balance": "0.0000",
            "total_rp": 0,
            "total_rp_used": 0,
            "total_rp_expired": 0,
            "is_default": 1,
            "shipping_address": null,
            "position": null,
            "customer_group_id": null,
            "crm_source": null,
            "crm_life_stage": null,
            "custom_field1": null,
            "custom_field2": null,
            "custom_field3": null,
            "custom_field4": null,
            "deleted_at": null,
            "created_at": "2018-01-03 20:45:20",
            "updated_at": "2020-08-10 10:26:45",
            "remember_token": null,
            "password": null,
            "customer_group": null,
            "opening_balance": "0.0000",
            "opening_balance_paid": "0.0000",
            "total_purchase": "0.0000",
            "purchase_paid": "0.0000",
            "total_purchase_return": "0.0000",
            "purchase_return_paid": "0.0000",
            "total_invoice": "2050.0000",
            "invoice_received": "1987.5000",
            "total_sell_return": "0.0000",
            "sell_return_paid": "0.0000",
            "purchase_due": 0,
            "sell_due": 62.5,
            "purchase_return_due": 0,
            "sell_return_due": 0
        }
    ]
}
```

### HTTP Request
`GET connector/api/contactapi/{contactapi}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `contact` |  required  | comma separated ids of contacts

<!-- END_881831b2bf43ea3a46b0f31984cdcfd4 -->

<!-- START_0864439d4f7d266432221198feef851d -->
## Update contact

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://test.local/connector/api/contactapi/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"type":"customer","supplier_business_name":"reiciendis","prefix":"et","first_name":"numquam","middle_name":"facere","last_name":"id","tax_number":"488744dwd","pay_term_number":3,"pay_term_type":"months","mobile":"8795461009","landline":"65484-848-848","alternate_number":"9898795220","address_line_1":"exercitationem","address_line_2":"earum","city":"quia","state":"beatae","country":"ut","zip_code":"doloribus","customer_group_id":"excepturi","contact_id":"aliquam","dob":"2000-06-13","custom_field1":"velit","custom_field2":"qui","custom_field3":"magni","custom_field4":"quibusdam","email":"labore","shipping_address":"error","position":"est","opening_balance":10.3,"source_id":13,"life_stage_id":14,"assigned_to":[]}'

```

```javascript
const url = new URL(
    "http://test.local/connector/api/contactapi/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "type": "customer",
    "supplier_business_name": "reiciendis",
    "prefix": "et",
    "first_name": "numquam",
    "middle_name": "facere",
    "last_name": "id",
    "tax_number": "488744dwd",
    "pay_term_number": 3,
    "pay_term_type": "months",
    "mobile": "8795461009",
    "landline": "65484-848-848",
    "alternate_number": "9898795220",
    "address_line_1": "exercitationem",
    "address_line_2": "earum",
    "city": "quia",
    "state": "beatae",
    "country": "ut",
    "zip_code": "doloribus",
    "customer_group_id": "excepturi",
    "contact_id": "aliquam",
    "dob": "2000-06-13",
    "custom_field1": "velit",
    "custom_field2": "qui",
    "custom_field3": "magni",
    "custom_field4": "quibusdam",
    "email": "labore",
    "shipping_address": "error",
    "position": "est",
    "opening_balance": 10.3,
    "source_id": 13,
    "life_stage_id": 14,
    "assigned_to": []
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 21,
        "business_id": 1,
        "type": "customer",
        "supplier_business_name": null,
        "name": "created from api",
        "prefix": null,
        "first_name": "created from api",
        "middle_name": null,
        "last_name": null,
        "email": null,
        "contact_id": "CO0009",
        "contact_status": "active",
        "tax_number": null,
        "city": null,
        "state": null,
        "country": null,
        "address_line_1": "test address",
        "address_line_2": null,
        "zip_code": "54878787",
        "dob": "2000-06-13",
        "mobile": "8754154872154",
        "landline": null,
        "alternate_number": null,
        "pay_term_number": null,
        "pay_term_type": null,
        "credit_limit": null,
        "created_by": 1,
        "balance": "0.0000",
        "total_rp": 0,
        "total_rp_used": 0,
        "total_rp_expired": 0,
        "is_default": 0,
        "shipping_address": null,
        "position": null,
        "customer_group_id": null,
        "crm_source": null,
        "crm_life_stage": null,
        "custom_field1": null,
        "custom_field2": null,
        "custom_field3": null,
        "custom_field4": null,
        "deleted_at": null,
        "created_at": "2020-08-10 10:41:42",
        "updated_at": "2020-08-10 10:41:42",
        "remember_token": null,
        "password": null
    }
}
```

### HTTP Request
`PUT connector/api/contactapi/{contactapi}`

`PATCH connector/api/contactapi/{contactapi}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `contact` |  required  | id of the contact to be updated
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `type` | string |  optional  | Type of contact (supplier, customer, both)
        `supplier_business_name` | string |  optional  | required* Required if type is supplier
        `prefix` | string |  optional  | Prefix for the name of the contact
        `first_name` | string |  required  | Name of the contact
        `middle_name` | string |  optional  | 
        `last_name` | string |  optional  | 
        `tax_number` | string |  optional  | 
        `pay_term_number` | float |  optional  | 
        `pay_term_type` | string |  optional  | (months ,days)
        `mobile` | string |  required  | 
        `landline` | string |  optional  | 
        `alternate_number` | string |  optional  | 
        `address_line_1` | string |  optional  | 
        `address_line_2` | string |  optional  | 
        `city` | string |  optional  | 
        `state` | string |  optional  | 
        `country` | string |  optional  | 
        `zip_code` | string |  optional  | 
        `customer_group_id` | string |  optional  | 
        `contact_id` | string |  optional  | 
        `dob` | string |  optional  | Fromat: Y-m-d
        `custom_field1` | string |  optional  | 
        `custom_field2` | string |  optional  | 
        `custom_field3` | string |  optional  | 
        `custom_field4` | string |  optional  | 
        `email` | string |  optional  | 
        `shipping_address` | string |  optional  | 
        `position` | string |  optional  | 
        `opening_balance` | float |  optional  | 
        `source_id` | integer |  optional  | Id of the source. Applicable only if the type is lead
        `life_stage_id` | integer |  optional  | Id of the Life stage. Applicable only if the type is lead
        `assigned_to` | array |  optional  | Ids of the users the lead is assigned to. Applicable only if the type is lead
    
<!-- END_0864439d4f7d266432221198feef851d -->

<!-- START_c00ac6505428393ae74ea7f7419d9de5 -->
## Contact payment

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://test.local/connector/api/contactapi-payment" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"contact_id":17,"amount":453.13,"method":"cash","paid_on":"2020-07-22 15:48:29","account_id":19,"card_number":"quia","card_holder_name":"odit","card_transaction_number":"nesciunt","card_type":"occaecati","card_month":"accusamus","card_year":"sequi","card_security":"perferendis","transaction_no_1":"qui","transaction_no_2":"alias","transaction_no_3":"qui","cheque_number":"quia","bank_account_number":"illum","note":"et"}'

```

```javascript
const url = new URL(
    "http://test.local/connector/api/contactapi-payment"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "contact_id": 17,
    "amount": 453.13,
    "method": "cash",
    "paid_on": "2020-07-22 15:48:29",
    "account_id": 19,
    "card_number": "quia",
    "card_holder_name": "odit",
    "card_transaction_number": "nesciunt",
    "card_type": "occaecati",
    "card_month": "accusamus",
    "card_year": "sequi",
    "card_security": "perferendis",
    "transaction_no_1": "qui",
    "transaction_no_2": "alias",
    "transaction_no_3": "qui",
    "cheque_number": "quia",
    "bank_account_number": "illum",
    "note": "et"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "amount": "20",
        "method": "cash",
        "paid_on": "2020-07-22 15:48:29",
        "created_by": 1,
        "payment_for": "19",
        "business_id": 1,
        "is_advance": 1,
        "payment_ref_no": "SP2020\/0127",
        "document": null,
        "updated_at": "2020-07-22 15:48:29",
        "created_at": "2020-07-22 15:48:29",
        "id": 215
    }
}
```

### HTTP Request
`POST connector/api/contactapi-payment`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `contact_id` | integer |  required  | id of the contact
        `amount` | float |  required  | amount of the payment
        `method` | string |  optional  | payment methods ('cash', 'card', 'cheque', 'bank_transfer', 'other', 'custom_pay_1', 'custom_pay_2', 'custom_pay_3')
        `paid_on` | string |  optional  | transaction date format:Y-m-d H:i:s,
        `account_id` | integer |  optional  | account id
        `card_number` | string |  optional  | 
        `card_holder_name` | string |  optional  | 
        `card_transaction_number` | string |  optional  | 
        `card_type` | string |  optional  | 
        `card_month` | string |  optional  | 
        `card_year` | string |  optional  | 
        `card_security` | string |  optional  | 
        `transaction_no_1` | string |  optional  | 
        `transaction_no_2` | string |  optional  | 
        `transaction_no_3` | string |  optional  | 
        `cheque_number` | string |  optional  | 
        `bank_account_number` | string |  optional  | 
        `note` | string |  optional  | payment note
    
<!-- END_c00ac6505428393ae74ea7f7419d9de5 -->

#Expense management


<!-- START_730bcfb1e5b171a39d96ecb8931567ef -->
## List expenses

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/expense?location_id=omnis&payment_status=paid&start_date=2018-06-25&end_date=2018-06-25&expense_for=et&per_page=15" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/expense"
);

let params = {
    "location_id": "omnis",
    "payment_status": "paid",
    "start_date": "2018-06-25",
    "end_date": "2018-06-25",
    "expense_for": "et",
    "per_page": "15",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 59,
            "business_id": 1,
            "location_id": 1,
            "payment_status": "due",
            "ref_no": "EP2020\/0001",
            "transaction_date": "2020-07-03 12:58:00",
            "total_before_tax": "50.0000",
            "tax_id": null,
            "tax_amount": "0.0000",
            "final_total": "50.0000",
            "expense_category_id": null,
            "document": null,
            "created_by": 9,
            "is_recurring": 0,
            "recur_interval": null,
            "recur_interval_type": null,
            "recur_repetitions": null,
            "recur_stopped_on": null,
            "recur_parent_id": null,
            "created_at": "2020-07-03 12:58:23",
            "updated_at": "2020-07-03 12:58:24",
            "transaction_for": {
                "id": 1,
                "user_type": "user",
                "surname": "Mr",
                "first_name": "Admin",
                "last_name": null,
                "username": "admin",
                "email": "admin@example.com",
                "language": "en",
                "contact_no": null,
                "address": null,
                "business_id": 1,
                "max_sales_discount_percent": null,
                "allow_login": 1,
                "essentials_department_id": null,
                "essentials_designation_id": null,
                "status": "active",
                "crm_contact_id": null,
                "is_cmmsn_agnt": 0,
                "cmmsn_percent": "0.00",
                "selected_contacts": 0,
                "dob": null,
                "gender": null,
                "marital_status": null,
                "blood_group": null,
                "contact_number": null,
                "fb_link": null,
                "twitter_link": null,
                "social_media_1": null,
                "social_media_2": null,
                "permanent_address": null,
                "current_address": null,
                "guardian_name": null,
                "custom_field_1": null,
                "custom_field_2": null,
                "custom_field_3": null,
                "custom_field_4": null,
                "bank_details": null,
                "id_proof_name": null,
                "id_proof_number": null,
                "deleted_at": null,
                "created_at": "2018-01-04 02:15:19",
                "updated_at": "2018-01-04 02:15:19"
            }
        }
    ],
    "links": {
        "first": "http:\/\/local.pos.com\/connector\/api\/expense?page=1",
        "last": null,
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "path": "http:\/\/local.pos.com\/connector\/api\/expense",
        "per_page": 10,
        "to": 1
    }
}
```

### HTTP Request
`GET connector/api/expense`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `location_id` |  optional  | id of the location
    `payment_status` |  optional  | payment status
    `start_date` |  optional  | format:Y-m-d
    `end_date` |  optional  | format:Y-m-d
    `expense_for` |  optional  | id of the user for which expense is created
    `per_page` |  optional  | Total records per page. default: 10, Set -1 for no pagination

<!-- END_730bcfb1e5b171a39d96ecb8931567ef -->

<!-- START_b9605a38c94472a8465c59bff2c0789d -->
## Create expense / expense refund

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://test.local/connector/api/expense" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"location_id":19,"final_total":19,"transaction_date":"2020-5-7 15:20:22","tax_rate_id":19,"expense_for":9,"contact_id":15,"additional_notes":"dolores","is_refund":0,"is_recurring":0,"recur_interval":12,"recur_interval_type":"months","subscription_repeat_on":15,"subscription_no":"eum","recur_repetitions":4,"payment":[{"amount":453.13,"method":"cash","account_id":16,"card_number":"ea","card_holder_name":"nostrum","card_transaction_number":"ipsa","card_type":"voluptatem","card_month":"laboriosam","card_year":"consequuntur","card_security":"fuga","transaction_no_1":"cumque","transaction_no_2":"est","transaction_no_3":"sed","note":"saepe","cheque_number":"aut"}]}'

```

```javascript
const url = new URL(
    "http://test.local/connector/api/expense"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "location_id": 19,
    "final_total": 19,
    "transaction_date": "2020-5-7 15:20:22",
    "tax_rate_id": 19,
    "expense_for": 9,
    "contact_id": 15,
    "additional_notes": "dolores",
    "is_refund": 0,
    "is_recurring": 0,
    "recur_interval": 12,
    "recur_interval_type": "months",
    "subscription_repeat_on": 15,
    "subscription_no": "eum",
    "recur_repetitions": 4,
    "payment": [
        {
            "amount": 453.13,
            "method": "cash",
            "account_id": 16,
            "card_number": "ea",
            "card_holder_name": "nostrum",
            "card_transaction_number": "ipsa",
            "card_type": "voluptatem",
            "card_month": "laboriosam",
            "card_year": "consequuntur",
            "card_security": "fuga",
            "transaction_no_1": "cumque",
            "transaction_no_2": "est",
            "transaction_no_3": "sed",
            "note": "saepe",
            "cheque_number": "aut"
        }
    ]
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 75,
        "business_id": 1,
        "location_id": "1",
        "payment_status": "due",
        "ref_no": "EP2020\/0013",
        "transaction_date": "2020-07-06T05:31:29.480975Z",
        "total_before_tax": "43",
        "tax_id": null,
        "tax_amount": 0,
        "final_total": "43",
        "expense_category_id": null,
        "document": null,
        "created_by": 1,
        "is_recurring": 0,
        "recur_interval": null,
        "recur_interval_type": null,
        "recur_repetitions": null,
        "recur_stopped_on": null,
        "recur_parent_id": null,
        "created_at": "2020-07-06 11:01:29",
        "updated_at": "2020-07-06 11:01:29",
        "expense_for": []
    }
}
```

### HTTP Request
`POST connector/api/expense`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `location_id` | integer |  required  | id of the business location
        `final_total` | float |  required  | Expense amount
        `transaction_date` | string |  optional  | transaction date format:Y-m-d H:i:s,
        `tax_rate_id` | integer |  optional  | id of the tax rate applicable to the expense
        `expense_for` | integer |  optional  | id of the user for which expense is created
        `contact_id` | integer |  optional  | id of the contact(customer or supplier) for which expense is created
        `additional_notes` | string |  optional  | 
        `is_refund` | integer |  optional  | whether expense refund (0, 1)
        `is_recurring` | integer |  optional  | whether expense is recurring (0, 1)
        `recur_interval` | integer |  optional  | value of the interval expense will be regenerated
        `recur_interval_type` | string |  optional  | type of the recur interval ('days', 'months', 'years')
        `subscription_repeat_on` | integer |  optional  | day of the month on which expense will be generated if recur interval type is months (1-30)
        `subscription_no` | string |  optional  | subscription number
        `recur_repetitions` | integer |  optional  | total number of expense to be generated
        `payment` | array |  optional  | payment lines for the expense
        `payment.*.amount` | float |  optional  | amount of the payment
        `payment.*.method` | string |  optional  | payment methods ('cash', 'card', 'cheque', 'bank_transfer', 'other', 'custom_pay_1', 'custom_pay_2', 'custom_pay_3')
        `payment.*.account_id` | integer |  optional  | account id
        `payment.*.card_number` | string |  optional  | 
        `payment.*.card_holder_name` | string |  optional  | 
        `payment.*.card_transaction_number` | string |  optional  | 
        `payment.*.card_type` | string |  optional  | 
        `payment.*.card_month` | string |  optional  | 
        `payment.*.card_year` | string |  optional  | 
        `payment.*.card_security` | string |  optional  | 
        `payment.*.transaction_no_1` | string |  optional  | 
        `payment.*.transaction_no_2` | string |  optional  | 
        `payment.*.transaction_no_3` | string |  optional  | 
        `payment.*.note` | string |  optional  | payment note
        `payment.*.cheque_number` | string |  optional  | 
    
<!-- END_b9605a38c94472a8465c59bff2c0789d -->

<!-- START_080493e04c6fbd231ad5580a2473865c -->
## Get the specified expense / expense refund

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/expense/59" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/expense/59"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 59,
            "business_id": 1,
            "location_id": 1,
            "payment_status": "due",
            "ref_no": "EP2020\/0001",
            "transaction_date": "2020-07-03 12:58:00",
            "total_before_tax": "50.0000",
            "tax_id": null,
            "tax_amount": "0.0000",
            "final_total": "50.0000",
            "expense_category_id": null,
            "document": null,
            "created_by": 9,
            "is_recurring": 0,
            "recur_interval": null,
            "recur_interval_type": null,
            "recur_repetitions": null,
            "recur_stopped_on": null,
            "recur_parent_id": null,
            "created_at": "2020-07-03 12:58:23",
            "updated_at": "2020-07-03 12:58:24",
            "transaction_for": {
                "id": 1,
                "user_type": "user",
                "surname": "Mr",
                "first_name": "Admin",
                "last_name": null,
                "username": "admin",
                "email": "admin@example.com",
                "language": "en",
                "contact_no": null,
                "address": null,
                "business_id": 1,
                "max_sales_discount_percent": null,
                "allow_login": 1,
                "essentials_department_id": null,
                "essentials_designation_id": null,
                "status": "active",
                "crm_contact_id": null,
                "is_cmmsn_agnt": 0,
                "cmmsn_percent": "0.00",
                "selected_contacts": 0,
                "dob": null,
                "gender": null,
                "marital_status": null,
                "blood_group": null,
                "contact_number": null,
                "fb_link": null,
                "twitter_link": null,
                "social_media_1": null,
                "social_media_2": null,
                "permanent_address": null,
                "current_address": null,
                "guardian_name": null,
                "custom_field_1": null,
                "custom_field_2": null,
                "custom_field_3": null,
                "custom_field_4": null,
                "bank_details": null,
                "id_proof_name": null,
                "id_proof_number": null,
                "deleted_at": null,
                "created_at": "2018-01-04 02:15:19",
                "updated_at": "2018-01-04 02:15:19"
            }
        }
    ]
}
```

### HTTP Request
`GET connector/api/expense/{expense}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `expense` |  required  | comma separated ids of the expenses

<!-- END_080493e04c6fbd231ad5580a2473865c -->

<!-- START_c6ce035dd3adbdb5657673678f7ec844 -->
## Update expense / expense refund

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://test.local/connector/api/expense/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"final_total":51740862.448999375,"transaction_date":"2020-5-7 15:20:22","tax_rate_id":18,"expense_for":13,"contact_id":2,"additional_notes":"culpa","is_recurring":0,"recur_interval":15,"recur_interval_type":"months","subscription_repeat_on":15,"subscription_no":"qui","recur_repetitions":3,"payment":[]}'

```

```javascript
const url = new URL(
    "http://test.local/connector/api/expense/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "final_total": 51740862.448999375,
    "transaction_date": "2020-5-7 15:20:22",
    "tax_rate_id": 18,
    "expense_for": 13,
    "contact_id": 2,
    "additional_notes": "culpa",
    "is_recurring": 0,
    "recur_interval": 15,
    "recur_interval_type": "months",
    "subscription_repeat_on": 15,
    "subscription_no": "qui",
    "recur_repetitions": 3,
    "payment": []
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 75,
        "business_id": 1,
        "location_id": "1",
        "payment_status": "due",
        "ref_no": "EP2020\/0013",
        "transaction_date": "2020-07-06T05:31:29.480975Z",
        "total_before_tax": "43",
        "tax_id": null,
        "tax_amount": 0,
        "final_total": "43",
        "expense_category_id": null,
        "document": null,
        "created_by": 1,
        "is_recurring": 0,
        "recur_interval": null,
        "recur_interval_type": null,
        "recur_repetitions": null,
        "recur_stopped_on": null,
        "recur_parent_id": null,
        "created_at": "2020-07-06 11:01:29",
        "updated_at": "2020-07-06 11:01:29",
        "expense_for": []
    }
}
```

### HTTP Request
`PUT connector/api/expense/{expense}`

`PATCH connector/api/expense/{expense}`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `final_total` | float |  optional  | Expense amount
        `transaction_date` | string |  optional  | transaction date format:Y-m-d H:i:s,
        `tax_rate_id` | integer |  optional  | id of the tax rate applicable to the expense
        `expense_for` | integer |  optional  | id of the user for which expense is created
        `contact_id` | integer |  optional  | id of the contact(customer or supplier) for which expense is created
        `additional_notes` | string |  optional  | 
        `is_recurring` | integer |  optional  | whether expense is recurring (0, 1)
        `recur_interval` | integer |  optional  | value of the interval expense will be regenerated
        `recur_interval_type` | string |  optional  | type of the recur interval ('days', 'months', 'years')
        `subscription_repeat_on` | integer |  optional  | day of the month on which expense will be generated if recur interval type is months (1-30)
        `subscription_no` | string |  optional  | subscription number
        `recur_repetitions` | integer |  optional  | total number of expense to be generated
        `payment` | array |  optional  | payment lines for the expense
    
<!-- END_c6ce035dd3adbdb5657673678f7ec844 -->

<!-- START_e1f7f0662d8d007a0f8501170b0d7409 -->
## List expense refunds

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/expense-refund?location_id=quis&payment_status=paid&start_date=2018-06-25&end_date=2018-06-25&expense_for=aliquid&per_page=15" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/expense-refund"
);

let params = {
    "location_id": "quis",
    "payment_status": "paid",
    "start_date": "2018-06-25",
    "end_date": "2018-06-25",
    "expense_for": "aliquid",
    "per_page": "15",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 230,
            "business_id": 1,
            "location_id": 1,
            "payment_status": "partial",
            "ref_no": "refund",
            "transaction_date": "2020-12-15 11:16:00",
            "total_before_tax": "65.0000",
            "tax_id": null,
            "tax_amount": "0.0000",
            "final_total": "65.0000",
            "expense_category_id": null,
            "document": null,
            "created_by": 9,
            "created_at": "2020-12-15 11:46:56",
            "updated_at": "2020-12-15 12:47:30",
            "expense_for": []
        }
    ],
    "links": {
        "first": "http:\/\/local.pos.com\/connector\/api\/expense-refund?page=1",
        "last": null,
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "path": "http:\/\/local.pos.com\/connector\/api\/expense-refund",
        "per_page": 15,
        "to": 1
    }
}
```

### HTTP Request
`GET connector/api/expense-refund`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `location_id` |  optional  | id of the location
    `payment_status` |  optional  | payment status
    `start_date` |  optional  | format:Y-m-d
    `end_date` |  optional  | format:Y-m-d
    `expense_for` |  optional  | id of the user for which expense is created
    `per_page` |  optional  | Total records per page. default: 10, Set -1 for no pagination

<!-- END_e1f7f0662d8d007a0f8501170b0d7409 -->

#Product management


<!-- START_404e69adab4f56eabc2cc3d3cfd9e802 -->
## List products

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/product?brand_id=voluptatibus&category_id=et&sub_category_id=eum&location_id=iusto&selling_price_group=voluptas&name=et&sku=laudantium&per_page=10" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/product"
);

let params = {
    "brand_id": "voluptatibus",
    "category_id": "et",
    "sub_category_id": "eum",
    "location_id": "iusto",
    "selling_price_group": "voluptas",
    "name": "et",
    "sku": "laudantium",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Men's Reverse Fleece Crew",
            "business_id": 1,
            "type": "single",
            "sub_unit_ids": null,
            "enable_stock": 1,
            "alert_quantity": "5.0000",
            "sku": "AS0001",
            "barcode_type": "C128",
            "expiry_period": null,
            "expiry_period_type": null,
            "enable_sr_no": 0,
            "weight": null,
            "product_custom_field1": null,
            "product_custom_field2": null,
            "product_custom_field3": null,
            "product_custom_field4": null,
            "image": null,
            "woocommerce_media_id": null,
            "product_description": null,
            "created_by": 1,
            "warranty_id": null,
            "is_inactive": 0,
            "repair_model_id": null,
            "not_for_selling": 0,
            "ecom_shipping_class_id": null,
            "ecom_active_in_store": 1,
            "woocommerce_product_id": 356,
            "woocommerce_disable_sync": 0,
            "image_url": "http:\/\/local.pos.com\/img\/default.png",
            "product_variations": [
                {
                    "id": 1,
                    "variation_template_id": null,
                    "name": "DUMMY",
                    "product_id": 1,
                    "is_dummy": 1,
                    "created_at": "2018-01-03 21:29:08",
                    "updated_at": "2018-01-03 21:29:08",
                    "variations": [
                        {
                            "id": 1,
                            "name": "DUMMY",
                            "product_id": 1,
                            "sub_sku": "AS0001",
                            "product_variation_id": 1,
                            "woocommerce_variation_id": null,
                            "variation_value_id": null,
                            "default_purchase_price": "130.0000",
                            "dpp_inc_tax": "143.0000",
                            "profit_percent": "0.0000",
                            "default_sell_price": "130.0000",
                            "sell_price_inc_tax": "143.0000",
                            "created_at": "2018-01-03 21:29:08",
                            "updated_at": "2020-06-09 00:23:22",
                            "deleted_at": null,
                            "combo_variations": null,
                            "variation_location_details": [
                                {
                                    "id": 56,
                                    "product_id": 1,
                                    "product_variation_id": 1,
                                    "variation_id": 1,
                                    "location_id": 1,
                                    "qty_available": "20.0000",
                                    "created_at": "2020-06-08 23:46:40",
                                    "updated_at": "2020-06-08 23:46:40"
                                }
                            ],
                            "media": [
                                {
                                    "id": 1,
                                    "business_id": 1,
                                    "file_name": "1591686466_978227300_nn.jpeg",
                                    "description": null,
                                    "uploaded_by": 9,
                                    "model_type": "App\\Variation",
                                    "woocommerce_media_id": null,
                                    "model_id": 1,
                                    "created_at": "2020-06-09 00:07:46",
                                    "updated_at": "2020-06-09 00:07:46",
                                    "display_name": "nn.jpeg",
                                    "display_url": "http:\/\/local.pos.com\/uploads\/media\/1591686466_978227300_nn.jpeg"
                                }
                            ],
                            "selling_price_group": [
                                {
                                    "id": 2,
                                    "variation_id": 1,
                                    "price_group_id": 1,
                                    "price_inc_tax": "140.0000",
                                    "created_at": "2020-06-09 00:23:31",
                                    "updated_at": "2020-06-09 00:23:31"
                                }
                            ]
                        }
                    ]
                }
            ],
            "brand": {
                "id": 1,
                "business_id": 1,
                "name": "Levis",
                "description": null,
                "created_by": 1,
                "deleted_at": null,
                "created_at": "2018-01-03 21:19:47",
                "updated_at": "2018-01-03 21:19:47"
            },
            "unit": {
                "id": 1,
                "business_id": 1,
                "actual_name": "Pieces",
                "short_name": "Pc(s)",
                "allow_decimal": 0,
                "base_unit_id": null,
                "base_unit_multiplier": null,
                "created_by": 1,
                "deleted_at": null,
                "created_at": "2018-01-03 15:15:20",
                "updated_at": "2018-01-03 15:15:20"
            },
            "category": {
                "id": 1,
                "name": "Men's",
                "business_id": 1,
                "short_code": null,
                "parent_id": 0,
                "created_by": 1,
                "category_type": "product",
                "description": null,
                "slug": null,
                "woocommerce_cat_id": null,
                "deleted_at": null,
                "created_at": "2018-01-03 21:06:34",
                "updated_at": "2018-01-03 21:06:34"
            },
            "sub_category": {
                "id": 5,
                "name": "Shirts",
                "business_id": 1,
                "short_code": null,
                "parent_id": 1,
                "created_by": 1,
                "category_type": "product",
                "description": null,
                "slug": null,
                "woocommerce_cat_id": null,
                "deleted_at": null,
                "created_at": "2018-01-03 21:08:18",
                "updated_at": "2018-01-03 21:08:18"
            },
            "product_tax": {
                "id": 1,
                "business_id": 1,
                "name": "VAT@10%",
                "amount": 10,
                "is_tax_group": 0,
                "created_by": 1,
                "woocommerce_tax_rate_id": null,
                "deleted_at": null,
                "created_at": "2018-01-04 02:40:07",
                "updated_at": "2018-01-04 02:40:07"
            },
            "product_locations": [
                {
                    "id": 1,
                    "business_id": 1,
                    "location_id": null,
                    "name": "Awesome Shop",
                    "landmark": "Linking Street",
                    "country": "USA",
                    "state": "Arizona",
                    "city": "Phoenix",
                    "zip_code": "85001",
                    "invoice_scheme_id": 1,
                    "invoice_layout_id": 1,
                    "selling_price_group_id": null,
                    "print_receipt_on_invoice": 1,
                    "receipt_printer_type": "browser",
                    "printer_id": null,
                    "mobile": null,
                    "alternate_number": null,
                    "email": null,
                    "website": null,
                    "featured_products": [
                        "5",
                        "71"
                    ],
                    "is_active": 1,
                    "default_payment_accounts": "{\"cash\":{\"is_enabled\":\"1\",\"account\":\"1\"},\"card\":{\"is_enabled\":\"1\",\"account\":\"3\"},\"cheque\":{\"is_enabled\":\"1\",\"account\":\"2\"},\"bank_transfer\":{\"is_enabled\":\"1\",\"account\":\"1\"},\"other\":{\"is_enabled\":\"1\",\"account\":\"3\"},\"custom_pay_1\":{\"is_enabled\":\"1\",\"account\":\"1\"},\"custom_pay_2\":{\"is_enabled\":\"1\",\"account\":\"2\"},\"custom_pay_3\":{\"is_enabled\":\"1\",\"account\":\"3\"}}",
                    "custom_field1": null,
                    "custom_field2": null,
                    "custom_field3": null,
                    "custom_field4": null,
                    "deleted_at": null,
                    "created_at": "2018-01-04 02:15:20",
                    "updated_at": "2020-06-09 01:07:05",
                    "pivot": {
                        "product_id": 2,
                        "location_id": 1
                    }
                }
            ]
        }
    ],
    "links": {
        "first": "http:\/\/local.pos.com\/connector\/api\/product?page=1",
        "last": "http:\/\/local.pos.com\/connector\/api\/product?page=32",
        "prev": null,
        "next": "http:\/\/local.pos.com\/connector\/api\/product?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "path": "http:\/\/local.pos.com\/connector\/api\/product",
        "per_page": 10,
        "to": 10
    }
}
```

### HTTP Request
`GET connector/api/product`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `brand_id` |  optional  | 
    `category_id` |  optional  | 
    `sub_category_id` |  optional  | 
    `location_id` |  optional  | 
    `selling_price_group` |  optional  | (1, 0)
    `name` |  optional  | Search term for product name
    `sku` |  optional  | Search term for product sku
    `per_page` |  optional  | Total records per page. default: 10, Set -1 for no pagination

<!-- END_404e69adab4f56eabc2cc3d3cfd9e802 -->

<!-- START_3bba79ec6b433bb13818ff41ac1d70e6 -->
## Get the specified product

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/product/1?selling_price_group=ipsum" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/product/1"
);

let params = {
    "selling_price_group": "ipsum",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Men's Reverse Fleece Crew",
            "business_id": 1,
            "type": "single",
            "sub_unit_ids": null,
            "enable_stock": 1,
            "alert_quantity": "5.0000",
            "sku": "AS0001",
            "barcode_type": "C128",
            "expiry_period": null,
            "expiry_period_type": null,
            "enable_sr_no": 0,
            "weight": null,
            "product_custom_field1": null,
            "product_custom_field2": null,
            "product_custom_field3": null,
            "product_custom_field4": null,
            "image": null,
            "woocommerce_media_id": null,
            "product_description": null,
            "created_by": 1,
            "warranty_id": null,
            "is_inactive": 0,
            "repair_model_id": null,
            "not_for_selling": 0,
            "ecom_shipping_class_id": null,
            "ecom_active_in_store": 1,
            "woocommerce_product_id": 356,
            "woocommerce_disable_sync": 0,
            "image_url": "http:\/\/local.pos.com\/img\/default.png",
            "product_variations": [
                {
                    "id": 1,
                    "variation_template_id": null,
                    "name": "DUMMY",
                    "product_id": 1,
                    "is_dummy": 1,
                    "created_at": "2018-01-03 21:29:08",
                    "updated_at": "2018-01-03 21:29:08",
                    "variations": [
                        {
                            "id": 1,
                            "name": "DUMMY",
                            "product_id": 1,
                            "sub_sku": "AS0001",
                            "product_variation_id": 1,
                            "woocommerce_variation_id": null,
                            "variation_value_id": null,
                            "default_purchase_price": "130.0000",
                            "dpp_inc_tax": "143.0000",
                            "profit_percent": "0.0000",
                            "default_sell_price": "130.0000",
                            "sell_price_inc_tax": "143.0000",
                            "created_at": "2018-01-03 21:29:08",
                            "updated_at": "2020-06-09 00:23:22",
                            "deleted_at": null,
                            "combo_variations": null,
                            "variation_location_details": [
                                {
                                    "id": 56,
                                    "product_id": 1,
                                    "product_variation_id": 1,
                                    "variation_id": 1,
                                    "location_id": 1,
                                    "qty_available": "20.0000",
                                    "created_at": "2020-06-08 23:46:40",
                                    "updated_at": "2020-06-08 23:46:40"
                                }
                            ],
                            "media": [
                                {
                                    "id": 1,
                                    "business_id": 1,
                                    "file_name": "1591686466_978227300_nn.jpeg",
                                    "description": null,
                                    "uploaded_by": 9,
                                    "model_type": "App\\Variation",
                                    "woocommerce_media_id": null,
                                    "model_id": 1,
                                    "created_at": "2020-06-09 00:07:46",
                                    "updated_at": "2020-06-09 00:07:46",
                                    "display_name": "nn.jpeg",
                                    "display_url": "http:\/\/local.pos.com\/uploads\/media\/1591686466_978227300_nn.jpeg"
                                }
                            ],
                            "selling_price_group": [
                                {
                                    "id": 2,
                                    "variation_id": 1,
                                    "price_group_id": 1,
                                    "price_inc_tax": "140.0000",
                                    "created_at": "2020-06-09 00:23:31",
                                    "updated_at": "2020-06-09 00:23:31"
                                }
                            ]
                        }
                    ]
                }
            ],
            "brand": {
                "id": 1,
                "business_id": 1,
                "name": "Levis",
                "description": null,
                "created_by": 1,
                "deleted_at": null,
                "created_at": "2018-01-03 21:19:47",
                "updated_at": "2018-01-03 21:19:47"
            },
            "unit": {
                "id": 1,
                "business_id": 1,
                "actual_name": "Pieces",
                "short_name": "Pc(s)",
                "allow_decimal": 0,
                "base_unit_id": null,
                "base_unit_multiplier": null,
                "created_by": 1,
                "deleted_at": null,
                "created_at": "2018-01-03 15:15:20",
                "updated_at": "2018-01-03 15:15:20"
            },
            "category": {
                "id": 1,
                "name": "Men's",
                "business_id": 1,
                "short_code": null,
                "parent_id": 0,
                "created_by": 1,
                "category_type": "product",
                "description": null,
                "slug": null,
                "woocommerce_cat_id": null,
                "deleted_at": null,
                "created_at": "2018-01-03 21:06:34",
                "updated_at": "2018-01-03 21:06:34"
            },
            "sub_category": {
                "id": 5,
                "name": "Shirts",
                "business_id": 1,
                "short_code": null,
                "parent_id": 1,
                "created_by": 1,
                "category_type": "product",
                "description": null,
                "slug": null,
                "woocommerce_cat_id": null,
                "deleted_at": null,
                "created_at": "2018-01-03 21:08:18",
                "updated_at": "2018-01-03 21:08:18"
            },
            "product_tax": {
                "id": 1,
                "business_id": 1,
                "name": "VAT@10%",
                "amount": 10,
                "is_tax_group": 0,
                "created_by": 1,
                "woocommerce_tax_rate_id": null,
                "deleted_at": null,
                "created_at": "2018-01-04 02:40:07",
                "updated_at": "2018-01-04 02:40:07"
            },
            "product_locations": [
                {
                    "id": 1,
                    "business_id": 1,
                    "location_id": null,
                    "name": "Awesome Shop",
                    "landmark": "Linking Street",
                    "country": "USA",
                    "state": "Arizona",
                    "city": "Phoenix",
                    "zip_code": "85001",
                    "invoice_scheme_id": 1,
                    "invoice_layout_id": 1,
                    "selling_price_group_id": null,
                    "print_receipt_on_invoice": 1,
                    "receipt_printer_type": "browser",
                    "printer_id": null,
                    "mobile": null,
                    "alternate_number": null,
                    "email": null,
                    "website": null,
                    "featured_products": [
                        "5",
                        "71"
                    ],
                    "is_active": 1,
                    "default_payment_accounts": "{\"cash\":{\"is_enabled\":\"1\",\"account\":\"1\"},\"card\":{\"is_enabled\":\"1\",\"account\":\"3\"},\"cheque\":{\"is_enabled\":\"1\",\"account\":\"2\"},\"bank_transfer\":{\"is_enabled\":\"1\",\"account\":\"1\"},\"other\":{\"is_enabled\":\"1\",\"account\":\"3\"},\"custom_pay_1\":{\"is_enabled\":\"1\",\"account\":\"1\"},\"custom_pay_2\":{\"is_enabled\":\"1\",\"account\":\"2\"},\"custom_pay_3\":{\"is_enabled\":\"1\",\"account\":\"3\"}}",
                    "custom_field1": null,
                    "custom_field2": null,
                    "custom_field3": null,
                    "custom_field4": null,
                    "deleted_at": null,
                    "created_at": "2018-01-04 02:15:20",
                    "updated_at": "2020-06-09 01:07:05",
                    "pivot": {
                        "product_id": 2,
                        "location_id": 1
                    }
                }
            ]
        }
    ]
}
```

### HTTP Request
`GET connector/api/product/{product}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `product` |  required  | comma separated ids of products
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `selling_price_group` |  optional  | (1, 0)

<!-- END_3bba79ec6b433bb13818ff41ac1d70e6 -->

<!-- START_950940377acf79b12c3e6aa18d408e53 -->
## List Selling Price Group

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/selling-price-group" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/selling-price-group"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Retail",
            "description": null,
            "business_id": 1,
            "is_active": 1,
            "deleted_at": null,
            "created_at": "2020-10-21 04:30:06",
            "updated_at": "2020-11-16 18:23:15"
        },
        {
            "id": 2,
            "name": "Wholesale",
            "description": null,
            "business_id": 1,
            "is_active": 1,
            "deleted_at": null,
            "created_at": "2020-10-21 04:30:21",
            "updated_at": "2020-11-16 18:23:00"
        }
    ]
}
```

### HTTP Request
`GET connector/api/selling-price-group`


<!-- END_950940377acf79b12c3e6aa18d408e53 -->

<!-- START_fa45d1ff85298b2a572b3ac163f32c0a -->
## List Variations

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/variation/?brand_id=quod&category_id=eveniet&sub_category_id=voluptatem&not_for_selling=voluptatem&name=ea&sku=beatae&per_page=10" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/variation/"
);

let params = {
    "brand_id": "quod",
    "category_id": "eveniet",
    "sub_category_id": "voluptatem",
    "not_for_selling": "voluptatem",
    "name": "ea",
    "sku": "beatae",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "variation_id": 1,
            "variation_name": "",
            "sub_sku": "AS0001",
            "product_id": 1,
            "product_name": "Men's Reverse Fleece Crew",
            "sku": "AS0001",
            "type": "single",
            "business_id": 1,
            "barcode_type": "C128",
            "expiry_period": null,
            "expiry_period_type": null,
            "enable_sr_no": 0,
            "weight": null,
            "product_custom_field1": null,
            "product_custom_field2": null,
            "product_custom_field3": null,
            "product_custom_field4": null,
            "product_image": "1528728059_fleece_crew.jpg",
            "product_description": null,
            "warranty_id": null,
            "brand_id": 1,
            "brand_name": "Levis",
            "unit_id": 1,
            "enable_stock": 1,
            "not_for_selling": 0,
            "unit_name": "Pc(s)",
            "unit_allow_decimal": 0,
            "category_id": 1,
            "category": "Men's",
            "sub_category_id": 5,
            "sub_category": "Shirts",
            "tax_id": 1,
            "tax_type": "exclusive",
            "tax_name": "VAT@10%",
            "tax_amount": 10,
            "product_variation_id": 1,
            "default_purchase_price": "130.0000",
            "dpp_inc_tax": "143.0000",
            "profit_percent": "0.0000",
            "default_sell_price": "130.0000",
            "sell_price_inc_tax": "143.0000",
            "product_variation_name": "",
            "variation_location_details": [],
            "media": [],
            "selling_price_group": [],
            "product_image_url": "http:\/\/local.pos.com\/uploads\/img\/1528728059_fleece_crew.jpg",
            "product_locations": [
                {
                    "id": 1,
                    "business_id": 1,
                    "location_id": null,
                    "name": "Awesome Shop",
                    "landmark": "Linking Street",
                    "country": "USA",
                    "state": "Arizona",
                    "city": "Phoenix",
                    "zip_code": "85001",
                    "invoice_scheme_id": 1,
                    "invoice_layout_id": 1,
                    "selling_price_group_id": null,
                    "print_receipt_on_invoice": 1,
                    "receipt_printer_type": "browser",
                    "printer_id": null,
                    "mobile": null,
                    "alternate_number": null,
                    "email": null,
                    "website": null,
                    "featured_products": null,
                    "is_active": 1,
                    "default_payment_accounts": "",
                    "custom_field1": null,
                    "custom_field2": null,
                    "custom_field3": null,
                    "custom_field4": null,
                    "deleted_at": null,
                    "created_at": "2018-01-04 02:15:20",
                    "updated_at": "2019-12-11 04:53:39",
                    "pivot": {
                        "product_id": 1,
                        "location_id": 1
                    }
                }
            ]
        },
        {
            "variation_id": 2,
            "variation_name": "28",
            "sub_sku": "AS0002-1",
            "product_id": 2,
            "product_name": "Levis Men's Slimmy Fit Jeans",
            "sku": "AS0002",
            "type": "variable",
            "business_id": 1,
            "barcode_type": "C128",
            "expiry_period": null,
            "expiry_period_type": null,
            "enable_sr_no": 0,
            "weight": null,
            "product_custom_field1": null,
            "product_custom_field2": null,
            "product_custom_field3": null,
            "product_custom_field4": null,
            "product_image": "1528727964_levis_jeans.jpg",
            "product_description": null,
            "warranty_id": null,
            "brand_id": 1,
            "brand_name": "Levis",
            "unit_id": 1,
            "enable_stock": 1,
            "not_for_selling": 0,
            "unit_name": "Pc(s)",
            "unit_allow_decimal": 0,
            "category_id": 1,
            "category": "Men's",
            "sub_category_id": 4,
            "sub_category": "Jeans",
            "tax_id": 1,
            "tax_type": "exclusive",
            "tax_name": "VAT@10%",
            "tax_amount": 10,
            "product_variation_id": 2,
            "default_purchase_price": "70.0000",
            "dpp_inc_tax": "77.0000",
            "profit_percent": "0.0000",
            "default_sell_price": "70.0000",
            "sell_price_inc_tax": "77.0000",
            "product_variation_name": "Waist Size",
            "variation_location_details": [
                {
                    "id": 1,
                    "product_id": 2,
                    "product_variation_id": 2,
                    "variation_id": 2,
                    "location_id": 1,
                    "qty_available": "50.0000",
                    "created_at": "2018-01-06 06:57:11",
                    "updated_at": "2020-08-04 04:11:27"
                }
            ],
            "media": [
                {
                    "id": 1,
                    "business_id": 1,
                    "file_name": "1596701997_743693452_test.jpg",
                    "description": null,
                    "uploaded_by": 9,
                    "model_type": "App\\Variation",
                    "woocommerce_media_id": null,
                    "model_id": 2,
                    "created_at": "2020-08-06 13:49:57",
                    "updated_at": "2020-08-06 13:49:57",
                    "display_name": "test.jpg",
                    "display_url": "http:\/\/local.pos.com\/uploads\/media\/1596701997_743693452_test.jpg"
                }
            ],
            "selling_price_group": [],
            "product_image_url": "http:\/\/local.pos.com\/uploads\/img\/1528727964_levis_jeans.jpg",
            "product_locations": [
                {
                    "id": 1,
                    "business_id": 1,
                    "location_id": null,
                    "name": "Awesome Shop",
                    "landmark": "Linking Street",
                    "country": "USA",
                    "state": "Arizona",
                    "city": "Phoenix",
                    "zip_code": "85001",
                    "invoice_scheme_id": 1,
                    "invoice_layout_id": 1,
                    "selling_price_group_id": null,
                    "print_receipt_on_invoice": 1,
                    "receipt_printer_type": "browser",
                    "printer_id": null,
                    "mobile": null,
                    "alternate_number": null,
                    "email": null,
                    "website": null,
                    "featured_products": null,
                    "is_active": 1,
                    "default_payment_accounts": "",
                    "custom_field1": null,
                    "custom_field2": null,
                    "custom_field3": null,
                    "custom_field4": null,
                    "deleted_at": null,
                    "created_at": "2018-01-04 02:15:20",
                    "updated_at": "2019-12-11 04:53:39",
                    "pivot": {
                        "product_id": 2,
                        "location_id": 1
                    }
                }
            ]
        }
    ],
    "links": {
        "first": "http:\/\/local.pos.com\/connector\/api\/variation?page=1",
        "last": null,
        "prev": null,
        "next": "http:\/\/local.pos.com\/connector\/api\/variation?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "path": "http:\/\/local.pos.com\/connector\/api\/variation",
        "per_page": "2",
        "to": 2
    }
}
```

### HTTP Request
`GET connector/api/variation/{id?}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `product` |  optional  | comma separated ids of variations
#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `brand_id` |  optional  | 
    `category_id` |  optional  | 
    `sub_category_id` |  optional  | 
    `not_for_selling` |  optional  | Values: 0 or 1
    `name` |  optional  | Search term for product name
    `sku` |  optional  | Search term for product sku
    `per_page` |  optional  | Total records per page. default: 10, Set -1 for no pagination

<!-- END_fa45d1ff85298b2a572b3ac163f32c0a -->

#Sales management


<!-- START_7ff3a37eb4717090fde5a1e26a7e3d4a -->
## List sells

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/sell?location_id=sed&contact_id=et&payment_status=paid&start_date=2018-06-25&end_date=2018-06-25&user_id=aut&service_staff_id=aliquam&shipping_status=ordered&only_subscriptions=excepturi&order_by_date=desc&per_page=10" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/sell"
);

let params = {
    "location_id": "sed",
    "contact_id": "et",
    "payment_status": "paid",
    "start_date": "2018-06-25",
    "end_date": "2018-06-25",
    "user_id": "aut",
    "service_staff_id": "aliquam",
    "shipping_status": "ordered",
    "only_subscriptions": "excepturi",
    "order_by_date": "desc",
    "per_page": "10",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 6,
            "business_id": 1,
            "location_id": 1,
            "res_table_id": null,
            "res_waiter_id": null,
            "res_order_status": null,
            "type": "sell",
            "sub_type": null,
            "status": "final",
            "is_quotation": 0,
            "payment_status": "paid",
            "adjustment_type": null,
            "contact_id": 4,
            "customer_group_id": null,
            "invoice_no": "AS0001",
            "ref_no": "",
            "subscription_no": null,
            "subscription_repeat_on": null,
            "transaction_date": "2018-04-10 13:23:21",
            "total_before_tax": "770.0000",
            "tax_id": null,
            "tax_amount": "0.0000",
            "discount_type": "percentage",
            "discount_amount": "0.0000",
            "rp_redeemed": 0,
            "rp_redeemed_amount": "0.0000",
            "shipping_details": null,
            "shipping_address": null,
            "shipping_status": null,
            "delivered_to": null,
            "shipping_charges": "0.0000",
            "additional_notes": null,
            "staff_note": null,
            "round_off_amount": "0.0000",
            "final_total": "770.0000",
            "expense_category_id": null,
            "expense_for": null,
            "commission_agent": null,
            "document": null,
            "is_direct_sale": 0,
            "is_suspend": 0,
            "exchange_rate": "1.000",
            "total_amount_recovered": null,
            "transfer_parent_id": null,
            "return_parent_id": null,
            "opening_stock_product_id": null,
            "created_by": 1,
            "import_batch": null,
            "import_time": null,
            "types_of_service_id": null,
            "packing_charge": null,
            "packing_charge_type": null,
            "service_custom_field_1": null,
            "service_custom_field_2": null,
            "service_custom_field_3": null,
            "service_custom_field_4": null,
            "mfg_parent_production_purchase_id": null,
            "mfg_wasted_units": null,
            "mfg_production_cost": "0.0000",
            "mfg_is_final": 0,
            "is_created_from_api": 0,
            "essentials_duration": "0.00",
            "essentials_duration_unit": null,
            "essentials_amount_per_unit_duration": "0.0000",
            "essentials_allowances": null,
            "essentials_deductions": null,
            "rp_earned": 0,
            "repair_completed_on": null,
            "repair_warranty_id": null,
            "repair_brand_id": null,
            "repair_status_id": null,
            "repair_model_id": null,
            "repair_defects": null,
            "repair_serial_no": null,
            "repair_updates_email": 0,
            "repair_updates_sms": 0,
            "repair_checklist": null,
            "repair_security_pwd": null,
            "repair_security_pattern": null,
            "repair_due_date": null,
            "repair_device_id": null,
            "order_addresses": null,
            "is_recurring": 0,
            "recur_interval": null,
            "recur_interval_type": null,
            "recur_repetitions": null,
            "recur_stopped_on": null,
            "recur_parent_id": null,
            "invoice_token": null,
            "pay_term_number": null,
            "pay_term_type": null,
            "pjt_project_id": null,
            "pjt_title": null,
            "woocommerce_order_id": null,
            "selling_price_group_id": null,
            "created_at": "2018-01-06 07:06:11",
            "updated_at": "2018-01-06 07:06:11",
            "sell_lines": [
                {
                    "id": 1,
                    "transaction_id": 6,
                    "product_id": 2,
                    "variation_id": 3,
                    "quantity": 10,
                    "mfg_waste_percent": "0.0000",
                    "quantity_returned": "0.0000",
                    "unit_price_before_discount": "70.0000",
                    "unit_price": "70.0000",
                    "line_discount_type": null,
                    "line_discount_amount": "0.0000",
                    "unit_price_inc_tax": "77.0000",
                    "item_tax": "7.0000",
                    "tax_id": 1,
                    "discount_id": null,
                    "lot_no_line_id": null,
                    "sell_line_note": null,
                    "res_service_staff_id": null,
                    "res_line_order_status": null,
                    "woocommerce_line_items_id": null,
                    "parent_sell_line_id": null,
                    "children_type": "",
                    "sub_unit_id": null,
                    "created_at": "2018-01-06 07:06:11",
                    "updated_at": "2018-01-06 07:06:11"
                }
            ],
            "payment_lines": [
                {
                    "id": 1,
                    "transaction_id": 6,
                    "business_id": null,
                    "is_return": 0,
                    "amount": "770.0000",
                    "method": "cash",
                    "transaction_no": null,
                    "card_transaction_number": null,
                    "card_number": null,
                    "card_type": "visa",
                    "card_holder_name": null,
                    "card_month": null,
                    "card_year": null,
                    "card_security": null,
                    "cheque_number": null,
                    "bank_account_number": null,
                    "paid_on": "2018-01-09 17:30:35",
                    "created_by": 1,
                    "payment_for": null,
                    "parent_id": null,
                    "note": null,
                    "document": null,
                    "payment_ref_no": null,
                    "account_id": null,
                    "created_at": "2018-01-06 01:36:11",
                    "updated_at": "2018-01-06 01:36:11"
                }
            ]
        }
    ],
    "links": {
        "first": "http:\/\/local.pos.com\/connector\/api\/sell?page=1",
        "last": "http:\/\/local.pos.com\/connector\/api\/sell?page=6",
        "prev": null,
        "next": "http:\/\/local.pos.com\/connector\/api\/sell?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "path": "http:\/\/local.pos.com\/connector\/api\/sell",
        "per_page": 10,
        "to": 10
    }
}
```

### HTTP Request
`GET connector/api/sell`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `location_id` |  optional  | id of the location
    `contact_id` |  optional  | id of the customer
    `payment_status` |  optional  | payment status
    `start_date` |  optional  | format:Y-m-d
    `end_date` |  optional  | format:Y-m-d
    `user_id` |  optional  | id of the user who created the sale
    `service_staff_id` |  optional  | id of the service staff assigned with the sale
    `shipping_status` |  optional  | Shipping Status of the sale ('ordered', 'packed', 'shipped', 'delivered', 'cancelled')
    `only_subscriptions` |  optional  | Filter only subcription invoices (1, 0)
    `order_by_date` |  optional  | Sort sell list by date ('asc', 'desc')
    `per_page` |  optional  | Total records per page. default: 10, Set -1 for no pagination

<!-- END_7ff3a37eb4717090fde5a1e26a7e3d4a -->

<!-- START_b36ef2e65db4271ba22222f5c5dce2ba -->
## Create sell

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://test.local/connector/api/sell" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"sells":[{"location_id":13,"contact_id":10,"transaction_date":"2020-07-22 15:48:29","invoice_no":"accusamus","status":"final","sub_status":"null","is_quotation":true,"tax_rate_id":14,"discount_amount":10,"discount_type":"fixed","sale_note":"vero","staff_note":"ea","commission_agent":12,"shipping_details":"Express Delivery","shipping_address":"corrupti","shipping_status":"ordered","delivered_to":"'Mr robin'","shipping_charges":10,"packing_charge":10,"exchange_rate":1,"selling_price_group_id":19,"pay_term_number":3,"pay_term_type":"months","is_suspend":false,"is_recurring":0,"recur_interval":10,"recur_interval_type":"months","subscription_repeat_on":15,"subscription_no":"quae","recur_repetitions":18,"rp_redeemed":2,"rp_redeemed_amount":13.5,"types_of_service_id":19,"service_custom_field_1":"eveniet","service_custom_field_2":"accusamus","service_custom_field_3":"incidunt","service_custom_field_4":"eos","round_off_amount":19072,"table_id":3,"service_staff_id":10,"change_return":0,"products":[{"product_id":17,"variation_id":58,"quantity":1,"unit_price":437.5,"tax_rate_id":0,"discount_amount":0,"discount_type":"percentage","sub_unit_id":14,"note":"aut"}],"payments":[{"amount":453.13,"method":"cash","account_id":11,"card_number":"libero","card_holder_name":"qui","card_transaction_number":"iure","card_type":"eos","card_month":"blanditiis","card_year":"deserunt","card_security":"et","transaction_no_1":"dolores","transaction_no_2":"aut","transaction_no_3":"non","bank_account_number":"et","note":"voluptatibus","cheque_number":"quis"}]}]}'

```

```javascript
const url = new URL(
    "http://test.local/connector/api/sell"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "sells": [
        {
            "location_id": 13,
            "contact_id": 10,
            "transaction_date": "2020-07-22 15:48:29",
            "invoice_no": "accusamus",
            "status": "final",
            "sub_status": "null",
            "is_quotation": true,
            "tax_rate_id": 14,
            "discount_amount": 10,
            "discount_type": "fixed",
            "sale_note": "vero",
            "staff_note": "ea",
            "commission_agent": 12,
            "shipping_details": "Express Delivery",
            "shipping_address": "corrupti",
            "shipping_status": "ordered",
            "delivered_to": "'Mr robin'",
            "shipping_charges": 10,
            "packing_charge": 10,
            "exchange_rate": 1,
            "selling_price_group_id": 19,
            "pay_term_number": 3,
            "pay_term_type": "months",
            "is_suspend": false,
            "is_recurring": 0,
            "recur_interval": 10,
            "recur_interval_type": "months",
            "subscription_repeat_on": 15,
            "subscription_no": "quae",
            "recur_repetitions": 18,
            "rp_redeemed": 2,
            "rp_redeemed_amount": 13.5,
            "types_of_service_id": 19,
            "service_custom_field_1": "eveniet",
            "service_custom_field_2": "accusamus",
            "service_custom_field_3": "incidunt",
            "service_custom_field_4": "eos",
            "round_off_amount": 19072,
            "table_id": 3,
            "service_staff_id": 10,
            "change_return": 0,
            "products": [
                {
                    "product_id": 17,
                    "variation_id": 58,
                    "quantity": 1,
                    "unit_price": 437.5,
                    "tax_rate_id": 0,
                    "discount_amount": 0,
                    "discount_type": "percentage",
                    "sub_unit_id": 14,
                    "note": "aut"
                }
            ],
            "payments": [
                {
                    "amount": 453.13,
                    "method": "cash",
                    "account_id": 11,
                    "card_number": "libero",
                    "card_holder_name": "qui",
                    "card_transaction_number": "iure",
                    "card_type": "eos",
                    "card_month": "blanditiis",
                    "card_year": "deserunt",
                    "card_security": "et",
                    "transaction_no_1": "dolores",
                    "transaction_no_2": "aut",
                    "transaction_no_3": "non",
                    "bank_account_number": "et",
                    "note": "voluptatibus",
                    "cheque_number": "quis"
                }
            ]
        }
    ]
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 6,
            "business_id": 1,
            "location_id": 1,
            "res_table_id": null,
            "res_waiter_id": null,
            "res_order_status": null,
            "type": "sell",
            "sub_type": null,
            "status": "final",
            "is_quotation": 0,
            "payment_status": "paid",
            "adjustment_type": null,
            "contact_id": 4,
            "customer_group_id": null,
            "invoice_no": "AS0001",
            "ref_no": "",
            "subscription_no": null,
            "subscription_repeat_on": null,
            "transaction_date": "2018-04-10 13:23:21",
            "total_before_tax": "770.0000",
            "tax_id": null,
            "tax_amount": "0.0000",
            "discount_type": "percentage",
            "discount_amount": "0.0000",
            "rp_redeemed": 0,
            "rp_redeemed_amount": "0.0000",
            "shipping_details": null,
            "shipping_address": null,
            "shipping_status": null,
            "delivered_to": null,
            "shipping_charges": "0.0000",
            "additional_notes": null,
            "staff_note": null,
            "round_off_amount": "0.0000",
            "final_total": "770.0000",
            "expense_category_id": null,
            "expense_for": null,
            "commission_agent": null,
            "document": null,
            "is_direct_sale": 0,
            "is_suspend": 0,
            "exchange_rate": "1.000",
            "total_amount_recovered": null,
            "transfer_parent_id": null,
            "return_parent_id": null,
            "opening_stock_product_id": null,
            "created_by": 1,
            "import_batch": null,
            "import_time": null,
            "types_of_service_id": null,
            "packing_charge": null,
            "packing_charge_type": null,
            "service_custom_field_1": null,
            "service_custom_field_2": null,
            "service_custom_field_3": null,
            "service_custom_field_4": null,
            "mfg_parent_production_purchase_id": null,
            "mfg_wasted_units": null,
            "mfg_production_cost": "0.0000",
            "mfg_is_final": 0,
            "is_created_from_api": 0,
            "essentials_duration": "0.00",
            "essentials_duration_unit": null,
            "essentials_amount_per_unit_duration": "0.0000",
            "essentials_allowances": null,
            "essentials_deductions": null,
            "rp_earned": 0,
            "repair_completed_on": null,
            "repair_warranty_id": null,
            "repair_brand_id": null,
            "repair_status_id": null,
            "repair_model_id": null,
            "repair_defects": null,
            "repair_serial_no": null,
            "repair_updates_email": 0,
            "repair_updates_sms": 0,
            "repair_checklist": null,
            "repair_security_pwd": null,
            "repair_security_pattern": null,
            "repair_due_date": null,
            "repair_device_id": null,
            "order_addresses": null,
            "is_recurring": 0,
            "recur_interval": null,
            "recur_interval_type": null,
            "recur_repetitions": null,
            "recur_stopped_on": null,
            "recur_parent_id": null,
            "invoice_token": null,
            "pay_term_number": null,
            "pay_term_type": null,
            "pjt_project_id": null,
            "pjt_title": null,
            "woocommerce_order_id": null,
            "selling_price_group_id": null,
            "created_at": "2018-01-06 07:06:11",
            "updated_at": "2018-01-06 07:06:11",
            "sell_lines": [
                {
                    "id": 1,
                    "transaction_id": 6,
                    "product_id": 2,
                    "variation_id": 3,
                    "quantity": 10,
                    "mfg_waste_percent": "0.0000",
                    "quantity_returned": "0.0000",
                    "unit_price_before_discount": "70.0000",
                    "unit_price": "70.0000",
                    "line_discount_type": null,
                    "line_discount_amount": "0.0000",
                    "unit_price_inc_tax": "77.0000",
                    "item_tax": "7.0000",
                    "tax_id": 1,
                    "discount_id": null,
                    "lot_no_line_id": null,
                    "sell_line_note": null,
                    "res_service_staff_id": null,
                    "res_line_order_status": null,
                    "woocommerce_line_items_id": null,
                    "parent_sell_line_id": null,
                    "children_type": "",
                    "sub_unit_id": null,
                    "created_at": "2018-01-06 07:06:11",
                    "updated_at": "2018-01-06 07:06:11"
                }
            ],
            "payment_lines": [
                {
                    "id": 1,
                    "transaction_id": 6,
                    "business_id": null,
                    "is_return": 0,
                    "amount": "770.0000",
                    "method": "cash",
                    "transaction_no": null,
                    "card_transaction_number": null,
                    "card_number": null,
                    "card_type": "visa",
                    "card_holder_name": null,
                    "card_month": null,
                    "card_year": null,
                    "card_security": null,
                    "cheque_number": null,
                    "bank_account_number": null,
                    "paid_on": "2018-01-09 17:30:35",
                    "created_by": 1,
                    "payment_for": null,
                    "parent_id": null,
                    "note": null,
                    "document": null,
                    "payment_ref_no": null,
                    "account_id": null,
                    "created_at": "2018-01-06 01:36:11",
                    "updated_at": "2018-01-06 01:36:11"
                }
            ]
        }
    ]
}
```

### HTTP Request
`POST connector/api/sell`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `sells.*.location_id` | integer |  required  | id of the business location
        `sells.*.contact_id` | integer |  required  | id of the customer
        `sells.*.transaction_date` | string |  optional  | transaction date format:Y-m-d H:i:s,
        `sells.*.invoice_no` | string |  optional  | Invoice number
        `sells.*.status` | string |  optional  | sale status (final, draft)
        `sells.*.sub_status` | string |  optional  | sale sub status ("quotation" for quotation and "proforma" for proforma invoice)
        `sells.*.is_quotation` | boolean |  optional  | Is sell quotation (0, 1), If 1 status should be draft
        `sells.*.tax_rate_id` | integer |  optional  | id of the tax rate applicable to the sale
        `sells.*.discount_amount` | float |  optional  | discount amount applicable to the sale
        `sells.*.discount_type` | string |  optional  | type of the discount amount (fixed, percentage)
        `sells.*.sale_note` | string |  optional  | 
        `sells.*.staff_note` | string |  optional  | 
        `sells.*.commission_agent` | integer |  optional  | commission agent id
        `sells.*.shipping_details` | string |  optional  | shipping details
        `sells.*.shipping_address` | string |  optional  | shipping address
        `sells.*.shipping_status` | string |  optional  | ('ordered', 'packed', 'shipped', 'delivered', 'cancelled')
        `sells.*.delivered_to` | string |  optional  | Name of the person recieved the consignment
        `sells.*.shipping_charges` | float |  optional  | shipping amount
        `sells.*.packing_charge` | float |  optional  | packing charge
        `sells.*.exchange_rate` | float |  optional  | exchange rate for the currency used
        `sells.*.selling_price_group_id` | integer |  optional  | id of the selling price group
        `sells.*.pay_term_number` | integer |  optional  | pay term value
        `sells.*.pay_term_type` | string |  optional  | type of the pay term value ('days', 'months')
        `sells.*.is_suspend` | boolean |  optional  | Is suspended sale (0, 1)
        `sells.*.is_recurring` | integer |  optional  | whether the invoice is recurring (0, 1)
        `sells.*.recur_interval` | integer |  optional  | value of the interval invoice will be regenerated
        `sells.*.recur_interval_type` | string |  optional  | type of the recur interval ('days', 'months', 'years')
        `sells.*.subscription_repeat_on` | integer |  optional  | day of the month on which invoice will be generated if recur interval type is months (1-30)
        `sells.*.subscription_no` | string |  optional  | subscription number
        `sells.*.recur_repetitions` | integer |  optional  | total number of invoices to be generated
        `sells.*.rp_redeemed` | integer |  optional  | reward points redeemed
        `sells.*.rp_redeemed_amount` | float |  optional  | reward point redeemed amount after conversion
        `sells.*.types_of_service_id` | integer |  optional  | types of service id
        `sells.*.service_custom_field_1` | string |  optional  | types of service custom field 1
        `sells.*.service_custom_field_2` | string |  optional  | types of service custom field 2
        `sells.*.service_custom_field_3` | string |  optional  | types of service custom field 3
        `sells.*.service_custom_field_4` | string |  optional  | types of service custom field 4
        `sells.*.round_off_amount` | float |  optional  | round off amount on total payable
        `sells.*.table_id` | integer |  optional  | id of the table
        `sells.*.service_staff_id` | integer |  optional  | id of the service staff assigned to the sale
        `sells.*.change_return` | float |  optional  | Excess paid amount
        `sells.*.products` | array |  required  | array of the products for the sale
        `sells.*.payments` | array |  optional  | payment lines for the sale
        `sells.*.products.*.product_id` | integer |  required  | product id
        `sells.*.products.*.variation_id` | integer |  required  | variation id
        `sells.*.products.*.quantity` | float |  required  | quantity
        `sells.*.products.*.unit_price` | float |  optional  | unit selling price
        `sells.*.products.*.tax_rate_id` | integer |  optional  | tax rate id applicable on the product
        `sells.*.products.*.discount_amount` | float |  optional  | discount amount applicable on the product
        `sells.*.products.*.discount_type` | string |  optional  | type of discount amount ('fixed', 'percentage')
        `sells.*.products.*.sub_unit_id` | integer |  optional  | sub unit id
        `sells.*.products.*.note` | string |  optional  | note for the product
        `sells.*.payments.*.amount` | float |  required  | amount of the payment
        `sells.*.payments.*.method` | string |  optional  | payment methods ('cash', 'card', 'cheque', 'bank_transfer', 'other', 'custom_pay_1', 'custom_pay_2', 'custom_pay_3')
        `sells.*.payments.*.account_id` | integer |  optional  | account id
        `sells.*.payments.*.card_number` | string |  optional  | 
        `sells.*.payments.*.card_holder_name` | string |  optional  | 
        `sells.*.payments.*.card_transaction_number` | string |  optional  | 
        `sells.*.payments.*.card_type` | string |  optional  | 
        `sells.*.payments.*.card_month` | string |  optional  | 
        `sells.*.payments.*.card_year` | string |  optional  | 
        `sells.*.payments.*.card_security` | string |  optional  | 
        `sells.*.payments.*.transaction_no_1` | string |  optional  | 
        `sells.*.payments.*.transaction_no_2` | string |  optional  | 
        `sells.*.payments.*.transaction_no_3` | string |  optional  | 
        `sells.*.payments.*.bank_account_number` | string |  optional  | 
        `sells.*.payments.*.note` | string |  optional  | payment note
        `sells.*.payments.*.cheque_number` | string |  optional  | 
    
<!-- END_b36ef2e65db4271ba22222f5c5dce2ba -->

<!-- START_58290524d0f076592088e0a8e43da94c -->
## Get the specified sell

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/sell/55" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/sell/55"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 55,
            "business_id": 1,
            "location_id": 1,
            "res_table_id": 5,
            "res_waiter_id": null,
            "res_order_status": null,
            "type": "sell",
            "sub_type": null,
            "status": "final",
            "is_quotation": 0,
            "payment_status": "paid",
            "adjustment_type": null,
            "contact_id": 1,
            "customer_group_id": null,
            "invoice_no": "AS0007",
            "ref_no": "",
            "subscription_no": null,
            "subscription_repeat_on": null,
            "transaction_date": "2020-06-04 23:29:36",
            "total_before_tax": "437.5000",
            "tax_id": 1,
            "tax_amount": "39.3750",
            "discount_type": "percentage",
            "discount_amount": "10.0000",
            "rp_redeemed": 0,
            "rp_redeemed_amount": "0.0000",
            "shipping_details": "Express Delivery",
            "shipping_address": null,
            "shipping_status": "ordered",
            "delivered_to": "Mr Robin",
            "shipping_charges": "10.0000",
            "additional_notes": null,
            "staff_note": null,
            "round_off_amount": "0.0000",
            "final_total": "453.1300",
            "expense_category_id": null,
            "expense_for": null,
            "commission_agent": null,
            "document": null,
            "is_direct_sale": 0,
            "is_suspend": 0,
            "exchange_rate": "1.000",
            "total_amount_recovered": null,
            "transfer_parent_id": null,
            "return_parent_id": null,
            "opening_stock_product_id": null,
            "created_by": 9,
            "import_batch": null,
            "import_time": null,
            "types_of_service_id": 1,
            "packing_charge": "10.0000",
            "packing_charge_type": "fixed",
            "service_custom_field_1": null,
            "service_custom_field_2": null,
            "service_custom_field_3": null,
            "service_custom_field_4": null,
            "mfg_parent_production_purchase_id": null,
            "mfg_wasted_units": null,
            "mfg_production_cost": "0.0000",
            "mfg_is_final": 0,
            "is_created_from_api": 0,
            "essentials_duration": "0.00",
            "essentials_duration_unit": null,
            "essentials_amount_per_unit_duration": "0.0000",
            "essentials_allowances": null,
            "essentials_deductions": null,
            "rp_earned": 0,
            "repair_completed_on": null,
            "repair_warranty_id": null,
            "repair_brand_id": null,
            "repair_status_id": null,
            "repair_model_id": null,
            "repair_defects": null,
            "repair_serial_no": null,
            "repair_updates_email": 0,
            "repair_updates_sms": 0,
            "repair_checklist": null,
            "repair_security_pwd": null,
            "repair_security_pattern": null,
            "repair_due_date": null,
            "repair_device_id": null,
            "order_addresses": null,
            "is_recurring": 0,
            "recur_interval": null,
            "recur_interval_type": "days",
            "recur_repetitions": 0,
            "recur_stopped_on": null,
            "recur_parent_id": null,
            "invoice_token": null,
            "pay_term_number": null,
            "pay_term_type": null,
            "pjt_project_id": null,
            "pjt_title": null,
            "woocommerce_order_id": null,
            "selling_price_group_id": 0,
            "created_at": "2020-06-04 23:29:36",
            "updated_at": "2020-06-04 23:29:36",
            "sell_lines": [
                {
                    "id": 38,
                    "transaction_id": 55,
                    "product_id": 17,
                    "variation_id": 58,
                    "quantity": 1,
                    "mfg_waste_percent": "0.0000",
                    "quantity_returned": "0.0000",
                    "unit_price_before_discount": "437.5000",
                    "unit_price": "437.5000",
                    "line_discount_type": "fixed",
                    "line_discount_amount": "0.0000",
                    "unit_price_inc_tax": "437.5000",
                    "item_tax": "0.0000",
                    "tax_id": null,
                    "discount_id": null,
                    "lot_no_line_id": null,
                    "sell_line_note": "",
                    "res_service_staff_id": null,
                    "res_line_order_status": null,
                    "woocommerce_line_items_id": null,
                    "parent_sell_line_id": null,
                    "children_type": "",
                    "sub_unit_id": null,
                    "created_at": "2020-06-04 23:29:36",
                    "updated_at": "2020-06-04 23:29:36"
                }
            ],
            "payment_lines": [
                {
                    "id": 37,
                    "transaction_id": 55,
                    "business_id": 1,
                    "is_return": 0,
                    "amount": "453.1300",
                    "method": "cash",
                    "transaction_no": null,
                    "card_transaction_number": null,
                    "card_number": null,
                    "card_type": "credit",
                    "card_holder_name": null,
                    "card_month": null,
                    "card_year": null,
                    "card_security": null,
                    "cheque_number": null,
                    "bank_account_number": null,
                    "paid_on": "2020-06-04 23:29:36",
                    "created_by": 9,
                    "payment_for": 1,
                    "parent_id": null,
                    "note": null,
                    "document": null,
                    "payment_ref_no": "SP2020\/0002",
                    "account_id": null,
                    "created_at": "2020-06-04 23:29:36",
                    "updated_at": "2020-06-04 23:29:36"
                }
            ]
        }
    ]
}
```

### HTTP Request
`GET connector/api/sell/{sell}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `sell` |  required  | comma separated ids of the sells

<!-- END_58290524d0f076592088e0a8e43da94c -->

<!-- START_2a80f06912c7d436a7f8e3deb270d869 -->
## Update sell

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X PUT \
    "http://test.local/connector/api/sell/6" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"contact_id":8,"transaction_date":"2020-5-7 15:20:22","status":"final","sub_status":"null","is_quotation":true,"tax_rate_id":3,"discount_amount":10,"discount_type":"fixed","sale_note":"voluptates","staff_note":"consequatur","sells":[{"is_suspend":false}],"commission_agent":9,"shipping_details":"Express Delivery","shipping_address":"omnis","shipping_status":"ordered","delivered_to":"Mr Robin","shipping_charges":10,"packing_charge":10,"exchange_rate":1,"selling_price_group_id":12,"pay_term_number":2,"pay_term_type":"months","is_recurring":0,"recur_interval":20,"recur_interval_type":"days","subscription_repeat_on":7,"subscription_no":"omnis","recur_repetitions":4,"rp_redeemed":9,"rp_redeemed_amount":13.5,"types_of_service_id":9,"service_custom_field_1":"officiis","service_custom_field_2":"accusamus","service_custom_field_3":"porro","service_custom_field_4":"blanditiis","round_off_amount":12263.1883,"table_id":7,"service_staff_id":3,"change_return":0,"change_return_id":7,"products":[{"sell_line_id":10,"product_id":17,"variation_id":58,"quantity":1,"unit_price":437.5,"tax_rate_id":9,"discount_amount":0,"discount_type":"percentage","sub_unit_id":1,"note":"harum"}],"payments":[{"payment_id":14,"amount":453.13,"method":"cash","account_id":5,"card_number":"dolor","card_holder_name":"rerum","card_transaction_number":"autem","card_type":"deleniti","card_month":"sint","card_year":"ut","card_security":"rerum","transaction_no_1":"sapiente","transaction_no_2":"ab","transaction_no_3":"est","note":"aut","cheque_number":"architecto","bank_account_number":"non"}]}'

```

```javascript
const url = new URL(
    "http://test.local/connector/api/sell/6"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "contact_id": 8,
    "transaction_date": "2020-5-7 15:20:22",
    "status": "final",
    "sub_status": "null",
    "is_quotation": true,
    "tax_rate_id": 3,
    "discount_amount": 10,
    "discount_type": "fixed",
    "sale_note": "voluptates",
    "staff_note": "consequatur",
    "sells": [
        {
            "is_suspend": false
        }
    ],
    "commission_agent": 9,
    "shipping_details": "Express Delivery",
    "shipping_address": "omnis",
    "shipping_status": "ordered",
    "delivered_to": "Mr Robin",
    "shipping_charges": 10,
    "packing_charge": 10,
    "exchange_rate": 1,
    "selling_price_group_id": 12,
    "pay_term_number": 2,
    "pay_term_type": "months",
    "is_recurring": 0,
    "recur_interval": 20,
    "recur_interval_type": "days",
    "subscription_repeat_on": 7,
    "subscription_no": "omnis",
    "recur_repetitions": 4,
    "rp_redeemed": 9,
    "rp_redeemed_amount": 13.5,
    "types_of_service_id": 9,
    "service_custom_field_1": "officiis",
    "service_custom_field_2": "accusamus",
    "service_custom_field_3": "porro",
    "service_custom_field_4": "blanditiis",
    "round_off_amount": 12263.1883,
    "table_id": 7,
    "service_staff_id": 3,
    "change_return": 0,
    "change_return_id": 7,
    "products": [
        {
            "sell_line_id": 10,
            "product_id": 17,
            "variation_id": 58,
            "quantity": 1,
            "unit_price": 437.5,
            "tax_rate_id": 9,
            "discount_amount": 0,
            "discount_type": "percentage",
            "sub_unit_id": 1,
            "note": "harum"
        }
    ],
    "payments": [
        {
            "payment_id": 14,
            "amount": 453.13,
            "method": "cash",
            "account_id": 5,
            "card_number": "dolor",
            "card_holder_name": "rerum",
            "card_transaction_number": "autem",
            "card_type": "deleniti",
            "card_month": "sint",
            "card_year": "ut",
            "card_security": "rerum",
            "transaction_no_1": "sapiente",
            "transaction_no_2": "ab",
            "transaction_no_3": "est",
            "note": "aut",
            "cheque_number": "architecto",
            "bank_account_number": "non"
        }
    ]
}

fetch(url, {
    method: "PUT",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 91,
    "business_id": 1,
    "location_id": 1,
    "res_table_id": null,
    "res_waiter_id": null,
    "res_order_status": null,
    "type": "sell",
    "sub_type": null,
    "status": "final",
    "is_quotation": 0,
    "payment_status": "paid",
    "adjustment_type": null,
    "contact_id": 1,
    "customer_group_id": 1,
    "invoice_no": "AS0020",
    "ref_no": "",
    "subscription_no": null,
    "subscription_repeat_on": null,
    "transaction_date": "25-09-2020 15:22",
    "total_before_tax": 962.5,
    "tax_id": null,
    "tax_amount": 0,
    "discount_type": "fixed",
    "discount_amount": "19.5000",
    "rp_redeemed": 0,
    "rp_redeemed_amount": "0.0000",
    "shipping_details": null,
    "shipping_address": null,
    "shipping_status": null,
    "delivered_to": null,
    "shipping_charges": "0.0000",
    "additional_notes": null,
    "staff_note": null,
    "round_off_amount": "0.0000",
    "final_total": 943,
    "expense_category_id": null,
    "expense_for": null,
    "commission_agent": null,
    "document": null,
    "is_direct_sale": 0,
    "is_suspend": 0,
    "exchange_rate": "1.000",
    "total_amount_recovered": null,
    "transfer_parent_id": null,
    "return_parent_id": null,
    "opening_stock_product_id": null,
    "created_by": 9,
    "import_batch": null,
    "import_time": null,
    "types_of_service_id": null,
    "packing_charge": "0.0000",
    "packing_charge_type": null,
    "service_custom_field_1": null,
    "service_custom_field_2": null,
    "service_custom_field_3": null,
    "service_custom_field_4": null,
    "mfg_parent_production_purchase_id": null,
    "mfg_wasted_units": null,
    "mfg_production_cost": "0.0000",
    "mfg_production_cost_type": "percentage",
    "mfg_is_final": 0,
    "is_created_from_api": 0,
    "essentials_duration": "0.00",
    "essentials_duration_unit": null,
    "essentials_amount_per_unit_duration": "0.0000",
    "essentials_allowances": null,
    "essentials_deductions": null,
    "rp_earned": 0,
    "repair_completed_on": null,
    "repair_warranty_id": null,
    "repair_brand_id": null,
    "repair_status_id": null,
    "repair_model_id": null,
    "repair_job_sheet_id": null,
    "repair_defects": null,
    "repair_serial_no": null,
    "repair_checklist": null,
    "repair_security_pwd": null,
    "repair_security_pattern": null,
    "repair_due_date": null,
    "repair_device_id": null,
    "repair_updates_notif": 0,
    "order_addresses": null,
    "is_recurring": 0,
    "recur_interval": 1,
    "recur_interval_type": "days",
    "recur_repetitions": 0,
    "recur_stopped_on": null,
    "recur_parent_id": null,
    "invoice_token": null,
    "pay_term_number": null,
    "pay_term_type": null,
    "pjt_project_id": null,
    "pjt_title": null,
    "woocommerce_order_id": null,
    "selling_price_group_id": 0,
    "created_at": "2020-09-23 20:16:19",
    "updated_at": "2020-09-25 17:57:08",
    "payment_lines": [
        {
            "id": 55,
            "transaction_id": 91,
            "business_id": 1,
            "is_return": 0,
            "amount": "461.7500",
            "method": "cash",
            "transaction_no": null,
            "card_transaction_number": null,
            "card_number": null,
            "card_type": "credit",
            "card_holder_name": null,
            "card_month": null,
            "card_year": null,
            "card_security": null,
            "cheque_number": null,
            "bank_account_number": null,
            "paid_on": "2020-09-23 20:16:19",
            "created_by": 9,
            "is_advance": 0,
            "payment_for": 1,
            "parent_id": null,
            "note": null,
            "document": null,
            "payment_ref_no": "SP2020\/0018",
            "account_id": null,
            "created_at": "2020-09-23 20:16:19",
            "updated_at": "2020-09-23 20:16:19"
        }
    ]
}
```

### HTTP Request
`PUT connector/api/sell/{sell}`

`PATCH connector/api/sell/{sell}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `sell` |  required  | id of sell to update
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `contact_id` | integer |  optional  | id of the customer
        `transaction_date` | string |  optional  | transaction date format:Y-m-d H:i:s,
        `status` | string |  optional  | sale status (final, draft)
        `sub_status` | string |  optional  | sale sub status ("quotation" for quotation and "proforma" for proforma invoice)
        `is_quotation` | boolean |  optional  | Is sell quotation (0, 1), If 1 status should be draft
        `tax_rate_id` | integer |  optional  | id of the tax rate applicable to the sale
        `discount_amount` | float |  optional  | discount amount applicable to the sale
        `discount_type` | string |  optional  | type of the discount amount (fixed, percentage)
        `sale_note` | string |  optional  | 
        `staff_note` | string |  optional  | 
        `sells.*.is_suspend` | boolean |  optional  | Is suspended sale (0, 1)
        `commission_agent` | integer |  optional  | commission agent id
        `shipping_details` | string |  optional  | shipping details
        `shipping_address` | string |  optional  | shipping address
        `shipping_status` | string |  optional  | ('ordered', 'packed', 'shipped', 'delivered', 'cancelled')
        `delivered_to` | string |  optional  | Name of the person recieved the consignment
        `shipping_charges` | float |  optional  | shipping amount
        `packing_charge` | float |  optional  | packing charge
        `exchange_rate` | float |  optional  | exchange rate for the currency used
        `selling_price_group_id` | integer |  optional  | id of the selling price group
        `pay_term_number` | integer |  optional  | pay term value
        `pay_term_type` | string |  optional  | type of the pay term value ('days', 'months')
        `is_recurring` | integer |  optional  | whether the invoice is recurring (0, 1)
        `recur_interval` | integer |  optional  | value of the interval invoice will be regenerated
        `recur_interval_type` | string |  optional  | type of the recur interval ('days', 'months', 'years')
        `subscription_repeat_on` | integer |  optional  | day of the month on which invoice will be generated if recur interval type is months (1-30)
        `subscription_no` | string |  optional  | subscription number
        `recur_repetitions` | integer |  optional  | total number of invoices to be generated
        `rp_redeemed` | integer |  optional  | reward points redeemed
        `rp_redeemed_amount` | float |  optional  | reward point redeemed amount after conversion
        `types_of_service_id` | integer |  optional  | types of service id
        `service_custom_field_1` | string |  optional  | types of service custom field 1
        `service_custom_field_2` | string |  optional  | types of service custom field 2
        `service_custom_field_3` | string |  optional  | types of service custom field 3
        `service_custom_field_4` | string |  optional  | types of service custom field 4
        `round_off_amount` | float |  optional  | round off amount on total payable
        `table_id` | integer |  optional  | id of the table
        `service_staff_id` | integer |  optional  | id of the service staff assigned to the sale
        `change_return` | float |  optional  | Excess paid amount
        `change_return_id` | integer |  optional  | id of the change return payment if exists
        `products` | array |  required  | array of the products for the sale
        `payments` | array |  optional  | payment lines for the sale
        `products.*.sell_line_id` | integer |  optional  | sell line id for existing item only
        `products.*.product_id` | integer |  optional  | product id
        `products.*.variation_id` | integer |  optional  | variation id
        `products.*.quantity` | float |  optional  | quantity
        `products.*.unit_price` | float |  optional  | unit selling price
        `products.*.tax_rate_id` | integer |  optional  | tax rate id applicable on the product
        `products.*.discount_amount` | float |  optional  | discount amount applicable on the product
        `products.*.discount_type` | string |  optional  | type of discount amount ('fixed', 'percentage')
        `products.*.sub_unit_id` | integer |  optional  | sub unit id
        `products.*.note` | string |  optional  | note for the product
        `payments.*.payment_id` | integer |  optional  | payment id for existing payment line
        `payments.*.amount` | float |  optional  | amount of the payment
        `payments.*.method` | string |  optional  | payment methods ('cash', 'card', 'cheque', 'bank_transfer', 'other', 'custom_pay_1', 'custom_pay_2', 'custom_pay_3')
        `payments.*.account_id` | integer |  optional  | account id
        `payments.*.card_number` | string |  optional  | 
        `payments.*.card_holder_name` | string |  optional  | 
        `payments.*.card_transaction_number` | string |  optional  | 
        `payments.*.card_type` | string |  optional  | 
        `payments.*.card_month` | string |  optional  | 
        `payments.*.card_year` | string |  optional  | 
        `payments.*.card_security` | string |  optional  | 
        `payments.*.transaction_no_1` | string |  optional  | 
        `payments.*.transaction_no_2` | string |  optional  | 
        `payments.*.transaction_no_3` | string |  optional  | 
        `payments.*.note` | string |  optional  | payment note
        `payments.*.cheque_number` | string |  optional  | 
        `payments.*.bank_account_number` | string |  optional  | 
    
<!-- END_2a80f06912c7d436a7f8e3deb270d869 -->

<!-- START_baafa13f7e2b1743b19694175534b085 -->
## Delete Sell

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X DELETE \
    "http://test.local/connector/api/sell/praesentium" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/sell/praesentium"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE connector/api/sell/{sell}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `sell` |  required  | id of the sell to be deleted

<!-- END_baafa13f7e2b1743b19694175534b085 -->

<!-- START_915df593fed3a09da6acc3b2f4cce019 -->
## Add Sell Return

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://test.local/connector/api/sell-return" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"transaction_id":1,"transaction_date":"2020-5-7 15:20:22","invoice_no":"fuga","discount_amount":10,"discount_type":"fixed","products":[{"sell_line_id":13,"quantity":1,"unit_price_inc_tax":437.5}]}'

```

```javascript
const url = new URL(
    "http://test.local/connector/api/sell-return"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "transaction_id": 1,
    "transaction_date": "2020-5-7 15:20:22",
    "invoice_no": "fuga",
    "discount_amount": 10,
    "discount_type": "fixed",
    "products": [
        {
            "sell_line_id": 13,
            "quantity": 1,
            "unit_price_inc_tax": 437.5
        }
    ]
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "id": 159,
    "business_id": 1,
    "location_id": 1,
    "res_table_id": null,
    "res_waiter_id": null,
    "res_order_status": null,
    "type": "sell_return",
    "sub_type": null,
    "status": "final",
    "is_quotation": 0,
    "payment_status": "paid",
    "adjustment_type": null,
    "contact_id": 1,
    "customer_group_id": null,
    "invoice_no": "CN2020\/0005",
    "ref_no": null,
    "subscription_no": null,
    "subscription_repeat_on": null,
    "transaction_date": "2020-11-17 00:00:00",
    "total_before_tax": 3,
    "tax_id": null,
    "tax_amount": 0,
    "discount_type": "percentage",
    "discount_amount": 12,
    "rp_redeemed": 0,
    "rp_redeemed_amount": "0.0000",
    "shipping_details": null,
    "shipping_address": null,
    "shipping_status": null,
    "delivered_to": null,
    "shipping_charges": "0.0000",
    "additional_notes": null,
    "staff_note": null,
    "round_off_amount": "0.0000",
    "final_total": 2.64,
    "expense_category_id": null,
    "expense_for": null,
    "commission_agent": null,
    "document": null,
    "is_direct_sale": 0,
    "is_suspend": 0,
    "exchange_rate": "1.000",
    "total_amount_recovered": null,
    "transfer_parent_id": null,
    "return_parent_id": 157,
    "opening_stock_product_id": null,
    "created_by": 9,
    "import_batch": null,
    "import_time": null,
    "types_of_service_id": null,
    "packing_charge": null,
    "packing_charge_type": null,
    "service_custom_field_1": null,
    "service_custom_field_2": null,
    "service_custom_field_3": null,
    "service_custom_field_4": null,
    "mfg_parent_production_purchase_id": null,
    "mfg_wasted_units": null,
    "mfg_production_cost": "0.0000",
    "mfg_production_cost_type": "percentage",
    "mfg_is_final": 0,
    "is_created_from_api": 0,
    "essentials_duration": "0.00",
    "essentials_duration_unit": null,
    "essentials_amount_per_unit_duration": "0.0000",
    "essentials_allowances": null,
    "essentials_deductions": null,
    "rp_earned": 0,
    "repair_completed_on": null,
    "repair_warranty_id": null,
    "repair_brand_id": null,
    "repair_status_id": null,
    "repair_model_id": null,
    "repair_job_sheet_id": null,
    "repair_defects": null,
    "repair_serial_no": null,
    "repair_checklist": null,
    "repair_security_pwd": null,
    "repair_security_pattern": null,
    "repair_due_date": null,
    "repair_device_id": null,
    "repair_updates_notif": 0,
    "order_addresses": null,
    "is_recurring": 0,
    "recur_interval": null,
    "recur_interval_type": null,
    "recur_repetitions": null,
    "recur_stopped_on": null,
    "recur_parent_id": null,
    "invoice_token": null,
    "pay_term_number": null,
    "pay_term_type": null,
    "pjt_project_id": null,
    "pjt_title": null,
    "woocommerce_order_id": null,
    "selling_price_group_id": null,
    "created_at": "2020-11-17 12:05:11",
    "updated_at": "2020-11-17 13:22:09"
}
```

### HTTP Request
`POST connector/api/sell-return`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `transaction_id` | integer |  required  | Id of the sell
        `transaction_date` | string |  optional  | transaction date format:Y-m-d H:i:s,
        `invoice_no` | string |  optional  | Invoice number of the return
        `discount_amount` | float |  optional  | discount amount applicable to the sale
        `discount_type` | string |  optional  | type of the discount amount (fixed, percentage)
        `products` | array |  required  | array of the products for the sale
        `products.*.sell_line_id` | integer |  required  | sell line id
        `products.*.quantity` | float |  required  | quantity to be returned from the sell line
        `products.*.unit_price_inc_tax` | float |  required  | unit selling price of the returning item
    
<!-- END_915df593fed3a09da6acc3b2f4cce019 -->

<!-- START_65fedd88e348b2b300399869c8a4e299 -->
## List Sell Return

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/list-sell-return" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/list-sell-return"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 159,
            "business_id": 1,
            "location_id": 1,
            "res_table_id": null,
            "res_waiter_id": null,
            "res_order_status": null,
            "type": "sell_return",
            "sub_type": null,
            "status": "final",
            "is_quotation": 0,
            "payment_status": "partial",
            "adjustment_type": null,
            "contact_id": 1,
            "customer_group_id": null,
            "invoice_no": "CN2020\/0005",
            "ref_no": null,
            "subscription_no": null,
            "subscription_repeat_on": null,
            "transaction_date": "2020-11-17 00:00:00",
            "total_before_tax": "3.0000",
            "tax_id": null,
            "tax_amount": "0.0000",
            "discount_type": "percentage",
            "discount_amount": "12.0000",
            "rp_redeemed": 0,
            "rp_redeemed_amount": "0.0000",
            "shipping_details": null,
            "shipping_address": null,
            "shipping_status": null,
            "delivered_to": null,
            "shipping_charges": "0.0000",
            "additional_notes": null,
            "staff_note": null,
            "round_off_amount": "0.0000",
            "final_total": "2.6400",
            "expense_category_id": null,
            "expense_for": null,
            "commission_agent": null,
            "document": null,
            "is_direct_sale": 0,
            "is_suspend": 0,
            "exchange_rate": "1.000",
            "total_amount_recovered": null,
            "transfer_parent_id": null,
            "return_parent_id": 157,
            "opening_stock_product_id": null,
            "created_by": 9,
            "import_batch": null,
            "import_time": null,
            "types_of_service_id": null,
            "packing_charge": null,
            "packing_charge_type": null,
            "service_custom_field_1": null,
            "service_custom_field_2": null,
            "service_custom_field_3": null,
            "service_custom_field_4": null,
            "mfg_parent_production_purchase_id": null,
            "mfg_wasted_units": null,
            "mfg_production_cost": "0.0000",
            "mfg_production_cost_type": "percentage",
            "mfg_is_final": 0,
            "is_created_from_api": 0,
            "essentials_duration": "0.00",
            "essentials_duration_unit": null,
            "essentials_amount_per_unit_duration": "0.0000",
            "essentials_allowances": null,
            "essentials_deductions": null,
            "rp_earned": 0,
            "repair_completed_on": null,
            "repair_warranty_id": null,
            "repair_brand_id": null,
            "repair_status_id": null,
            "repair_model_id": null,
            "repair_job_sheet_id": null,
            "repair_defects": null,
            "repair_serial_no": null,
            "repair_checklist": null,
            "repair_security_pwd": null,
            "repair_security_pattern": null,
            "repair_due_date": null,
            "repair_device_id": null,
            "repair_updates_notif": 0,
            "order_addresses": null,
            "is_recurring": 0,
            "recur_interval": null,
            "recur_interval_type": null,
            "recur_repetitions": null,
            "recur_stopped_on": null,
            "recur_parent_id": null,
            "invoice_token": null,
            "pay_term_number": null,
            "pay_term_type": null,
            "pjt_project_id": null,
            "pjt_title": null,
            "woocommerce_order_id": null,
            "selling_price_group_id": null,
            "created_at": "2020-11-17 12:05:11",
            "updated_at": "2020-11-17 13:22:09",
            "payment_lines": [
                {
                    "id": 126,
                    "transaction_id": 159,
                    "business_id": 1,
                    "is_return": 0,
                    "amount": "1.8000",
                    "method": "cash",
                    "transaction_no": null,
                    "card_transaction_number": null,
                    "card_number": null,
                    "card_type": "credit",
                    "card_holder_name": null,
                    "card_month": null,
                    "card_year": null,
                    "card_security": null,
                    "cheque_number": null,
                    "bank_account_number": null,
                    "paid_on": "2020-11-17 12:05:00",
                    "created_by": 9,
                    "is_advance": 0,
                    "payment_for": 1,
                    "parent_id": null,
                    "note": null,
                    "document": null,
                    "payment_ref_no": "SP2020\/0078",
                    "account_id": null,
                    "created_at": "2020-11-17 12:05:58",
                    "updated_at": "2020-11-17 12:05:58"
                }
            ],
            "return_parent_sell": {
                "id": 157,
                "business_id": 1,
                "location_id": 1,
                "res_table_id": null,
                "res_waiter_id": null,
                "res_order_status": null,
                "type": "sell",
                "sub_type": null,
                "status": "final",
                "is_quotation": 0,
                "payment_status": "paid",
                "adjustment_type": null,
                "contact_id": 1,
                "customer_group_id": null,
                "invoice_no": "AS0073",
                "ref_no": "",
                "subscription_no": null,
                "subscription_repeat_on": null,
                "transaction_date": "2020-11-13 12:42:17",
                "total_before_tax": "6.2500",
                "tax_id": null,
                "tax_amount": "0.0000",
                "discount_type": "percentage",
                "discount_amount": "10.0000",
                "rp_redeemed": 0,
                "rp_redeemed_amount": "0.0000",
                "shipping_details": null,
                "shipping_address": null,
                "shipping_status": null,
                "delivered_to": null,
                "shipping_charges": "0.0000",
                "additional_notes": null,
                "staff_note": null,
                "round_off_amount": "0.0000",
                "final_total": "5.6300",
                "expense_category_id": null,
                "expense_for": null,
                "commission_agent": null,
                "document": null,
                "is_direct_sale": 0,
                "is_suspend": 0,
                "exchange_rate": "1.000",
                "total_amount_recovered": null,
                "transfer_parent_id": null,
                "return_parent_id": null,
                "opening_stock_product_id": null,
                "created_by": 9,
                "import_batch": null,
                "import_time": null,
                "types_of_service_id": null,
                "packing_charge": "0.0000",
                "packing_charge_type": null,
                "service_custom_field_1": null,
                "service_custom_field_2": null,
                "service_custom_field_3": null,
                "service_custom_field_4": null,
                "mfg_parent_production_purchase_id": null,
                "mfg_wasted_units": null,
                "mfg_production_cost": "0.0000",
                "mfg_production_cost_type": "percentage",
                "mfg_is_final": 0,
                "is_created_from_api": 0,
                "essentials_duration": "0.00",
                "essentials_duration_unit": null,
                "essentials_amount_per_unit_duration": "0.0000",
                "essentials_allowances": null,
                "essentials_deductions": null,
                "rp_earned": 0,
                "repair_completed_on": null,
                "repair_warranty_id": null,
                "repair_brand_id": null,
                "repair_status_id": null,
                "repair_model_id": null,
                "repair_job_sheet_id": null,
                "repair_defects": null,
                "repair_serial_no": null,
                "repair_checklist": null,
                "repair_security_pwd": null,
                "repair_security_pattern": null,
                "repair_due_date": null,
                "repair_device_id": null,
                "repair_updates_notif": 0,
                "order_addresses": null,
                "is_recurring": 0,
                "recur_interval": 1,
                "recur_interval_type": "days",
                "recur_repetitions": 0,
                "recur_stopped_on": null,
                "recur_parent_id": null,
                "invoice_token": null,
                "pay_term_number": null,
                "pay_term_type": null,
                "pjt_project_id": null,
                "pjt_title": null,
                "woocommerce_order_id": null,
                "selling_price_group_id": 0,
                "created_at": "2020-11-13 12:42:17",
                "updated_at": "2020-11-13 12:42:18",
                "sell_lines": [
                    {
                        "id": 139,
                        "transaction_id": 157,
                        "product_id": 157,
                        "variation_id": 205,
                        "quantity": 5,
                        "mfg_waste_percent": "0.0000",
                        "quantity_returned": "3.0000",
                        "unit_price_before_discount": "1.2500",
                        "unit_price": "1.2500",
                        "line_discount_type": "fixed",
                        "line_discount_amount": "0.0000",
                        "unit_price_inc_tax": "1.2500",
                        "item_tax": "0.0000",
                        "tax_id": null,
                        "discount_id": null,
                        "lot_no_line_id": null,
                        "sell_line_note": "",
                        "res_service_staff_id": null,
                        "res_line_order_status": null,
                        "woocommerce_line_items_id": null,
                        "parent_sell_line_id": null,
                        "children_type": "",
                        "sub_unit_id": null,
                        "created_at": "2020-11-13 12:42:17",
                        "updated_at": "2020-11-17 13:22:09"
                    }
                ]
            }
        }
    ],
    "links": {
        "first": "http:\/\/local.pos.com\/connector\/api\/list-sell-return?sell_id=157&page=1",
        "last": null,
        "prev": null,
        "next": null
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "path": "http:\/\/local.pos.com\/connector\/api\/list-sell-return",
        "per_page": 10,
        "to": 1
    }
}
```

### HTTP Request
`GET connector/api/list-sell-return`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `sell_id` |  optional  | Id of the sell for which return is added

<!-- END_65fedd88e348b2b300399869c8a4e299 -->

<!-- START_13d1efb0e363abdb0c1d2b6b1b538cfd -->
## Update shipping status

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://test.local/connector/api/update-shipping-status" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"id":2,"shipping_status":"ordered","delivered_to":"officiis"}'

```

```javascript
const url = new URL(
    "http://test.local/connector/api/update-shipping-status"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "id": 2,
    "shipping_status": "ordered",
    "delivered_to": "officiis"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST connector/api/update-shipping-status`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `id` | integer |  required  | id of the sale
        `shipping_status` | string |  optional  | ('ordered', 'packed', 'shipped', 'delivered', 'cancelled')
        `delivered_to` | string |  optional  | Name of the consignee
    
<!-- END_13d1efb0e363abdb0c1d2b6b1b538cfd -->

#Superadmin


<!-- START_9c3766fcfc8903a5407f756fa5d6a6ac -->
## If SaaS installed get active subscription details, else return the enabled modules details in package_details

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/active-subscription" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/active-subscription"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "business_id": 1,
        "package_id": 3,
        "start_date": "2020-09-05 00:00:00",
        "trial_end_date": "2020-09-15",
        "end_date": "2020-10-05 00:00:00",
        "package_price": "599.9900",
        "package_details": {
            "location_count": 0,
            "user_count": 0,
            "product_count": 0,
            "invoice_count": 0,
            "name": "Unlimited",
            "woocommerce_module": 1,
            "essentials_module": 1
        },
        "created_id": 1,
        "paid_via": "stripe",
        "payment_transaction_id": "ch_1CuLdQAhokBpT93LVZNg2At6",
        "status": "approved",
        "deleted_at": null,
        "created_at": "2018-08-01 07:49:09",
        "updated_at": "2018-08-01 07:49:09",
        "locations_created": 1,
        "users_created": 6,
        "products_created": 2,
        "invoices_created": 1
    }
}
```

### HTTP Request
`GET connector/api/active-subscription`


<!-- END_9c3766fcfc8903a5407f756fa5d6a6ac -->

<!-- START_f5b3230edac6232bb97641903e95ef57 -->
## Get Superadmin Package List

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/packages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/packages"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Starter - Free",
            "description": "Give it a test drive...",
            "location_count": 0,
            "user_count": 0,
            "product_count": 0,
            "bookings": 0,
            "kitchen": 0,
            "order_screen": 0,
            "tables": 0,
            "invoice_count": 0,
            "interval": "months",
            "interval_count": 1,
            "trial_days": 10,
            "price": "0.0000",
            "custom_permissions": {
                "assetmanagement_module": "1",
                "connector_module": "1",
                "crm_module": "1",
                "essentials_module": "1",
                "manufacturing_module": "1",
                "productcatalogue_module": "1",
                "project_module": "1",
                "repair_module": "1",
                "woocommerce_module": "1"
            },
            "created_by": 1,
            "sort_order": 0,
            "is_active": 1,
            "is_private": 0,
            "is_one_time": 0,
            "enable_custom_link": 0,
            "custom_link": "",
            "custom_link_text": "",
            "deleted_at": null,
            "created_at": "2020-10-09 16:38:02",
            "updated_at": "2020-11-11 12:19:17"
        },
        {
            "id": 2,
            "name": "Regular",
            "description": "For Small Shops",
            "location_count": 0,
            "user_count": 0,
            "product_count": 0,
            "bookings": 0,
            "kitchen": 0,
            "order_screen": 0,
            "tables": 0,
            "invoice_count": 0,
            "interval": "months",
            "interval_count": 1,
            "trial_days": 10,
            "price": "199.9900",
            "custom_permissions": {
                "repair_module": "1"
            },
            "created_by": 1,
            "sort_order": 1,
            "is_active": 1,
            "is_private": 0,
            "is_one_time": 0,
            "enable_custom_link": 0,
            "custom_link": null,
            "custom_link_text": null,
            "deleted_at": null,
            "created_at": "2020-10-09 16:38:02",
            "updated_at": "2020-10-09 16:38:02"
        },
        {
            "id": 3,
            "name": "Unlimited",
            "description": "For Large Business",
            "location_count": 0,
            "user_count": 0,
            "product_count": 0,
            "bookings": 0,
            "kitchen": 0,
            "order_screen": 0,
            "tables": 0,
            "invoice_count": 0,
            "interval": "months",
            "interval_count": 1,
            "trial_days": 10,
            "price": "599.9900",
            "custom_permissions": {
                "assetmanagement_module": "1",
                "connector_module": "1",
                "crm_module": "1",
                "essentials_module": "1",
                "manufacturing_module": "1",
                "productcatalogue_module": "1",
                "project_module": "1",
                "repair_module": "1",
                "woocommerce_module": "1"
            },
            "created_by": 1,
            "sort_order": 1,
            "is_active": 1,
            "is_private": 0,
            "is_one_time": 0,
            "enable_custom_link": 0,
            "custom_link": "",
            "custom_link_text": "",
            "deleted_at": null,
            "created_at": "2020-10-09 16:38:02",
            "updated_at": "2020-11-02 12:09:19"
        }
    ]
}
```

### HTTP Request
`GET connector/api/packages`


<!-- END_f5b3230edac6232bb97641903e95ef57 -->

#Table management


<!-- START_b0940bb5148ed593b38ecffd6d0524d4 -->
## List tables

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/table?location_id=asperiores" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/table"
);

let params = {
    "location_id": "asperiores",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 5,
            "business_id": 1,
            "location_id": 1,
            "name": "Table 1",
            "description": null,
            "created_by": 9,
            "deleted_at": null,
            "created_at": "2020-06-04 22:36:37",
            "updated_at": "2020-06-04 22:36:37"
        }
    ]
}
```

### HTTP Request
`GET connector/api/table`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `location_id` |  optional  | int id of the location

<!-- END_b0940bb5148ed593b38ecffd6d0524d4 -->

<!-- START_74a747cca362ed29880939bd55a57127 -->
## Show the specified table

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/table/5" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/table/5"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 5,
            "business_id": 1,
            "location_id": 1,
            "name": "Table 1",
            "description": null,
            "created_by": 9,
            "deleted_at": null,
            "created_at": "2020-06-04 22:36:37",
            "updated_at": "2020-06-04 22:36:37"
        }
    ]
}
```

### HTTP Request
`GET connector/api/table/{table}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `table` |  required  | comma separated ids of required tables

<!-- END_74a747cca362ed29880939bd55a57127 -->

#Tax management


<!-- START_f9b364a9748fed0253f02b17a450703d -->
## List taxes

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/tax" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/tax"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "business_id": 1,
            "name": "VAT@10%",
            "amount": 10,
            "is_tax_group": 0,
            "created_by": 1,
            "woocommerce_tax_rate_id": null,
            "deleted_at": null,
            "created_at": "2018-01-04 02:40:07",
            "updated_at": "2018-01-04 02:40:07"
        },
        {
            "id": 2,
            "business_id": 1,
            "name": "CGST@10%",
            "amount": 10,
            "is_tax_group": 0,
            "created_by": 1,
            "woocommerce_tax_rate_id": null,
            "deleted_at": null,
            "created_at": "2018-01-04 02:40:55",
            "updated_at": "2018-01-04 02:40:55"
        },
        {
            "id": 3,
            "business_id": 1,
            "name": "SGST@8%",
            "amount": 8,
            "is_tax_group": 0,
            "created_by": 1,
            "woocommerce_tax_rate_id": null,
            "deleted_at": null,
            "created_at": "2018-01-04 02:41:13",
            "updated_at": "2018-01-04 02:41:13"
        },
        {
            "id": 4,
            "business_id": 1,
            "name": "GST@18%",
            "amount": 18,
            "is_tax_group": 1,
            "created_by": 1,
            "woocommerce_tax_rate_id": null,
            "deleted_at": null,
            "created_at": "2018-01-04 02:42:19",
            "updated_at": "2018-01-04 02:42:19"
        }
    ]
}
```

### HTTP Request
`GET connector/api/tax`


<!-- END_f9b364a9748fed0253f02b17a450703d -->

<!-- START_930b84e999710cdc95d8205b1054a595 -->
## Get the specified tax

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/tax/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/tax/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "business_id": 1,
            "name": "VAT@10%",
            "amount": 10,
            "is_tax_group": 0,
            "created_by": 1,
            "woocommerce_tax_rate_id": null,
            "deleted_at": null,
            "created_at": "2018-01-04 02:40:07",
            "updated_at": "2018-01-04 02:40:07"
        }
    ]
}
```

### HTTP Request
`GET connector/api/tax/{tax}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `tax` |  required  | comma separated ids of required taxes

<!-- END_930b84e999710cdc95d8205b1054a595 -->

#Taxonomy management


<!-- START_f8494c9a746f2982f51e344563b475a8 -->
## List taxonomy

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/taxonomy?type=velit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/taxonomy"
);

let params = {
    "type": "velit",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Men's",
            "business_id": 1,
            "short_code": null,
            "parent_id": 0,
            "created_by": 1,
            "category_type": "product",
            "description": null,
            "slug": null,
            "woocommerce_cat_id": null,
            "deleted_at": null,
            "created_at": "2018-01-03 21:06:34",
            "updated_at": "2018-01-03 21:06:34",
            "sub_categories": [
                {
                    "id": 4,
                    "name": "Jeans",
                    "business_id": 1,
                    "short_code": null,
                    "parent_id": 1,
                    "created_by": 1,
                    "category_type": "product",
                    "description": null,
                    "slug": null,
                    "woocommerce_cat_id": null,
                    "deleted_at": null,
                    "created_at": "2018-01-03 21:07:34",
                    "updated_at": "2018-01-03 21:07:34"
                },
                {
                    "id": 5,
                    "name": "Shirts",
                    "business_id": 1,
                    "short_code": null,
                    "parent_id": 1,
                    "created_by": 1,
                    "category_type": "product",
                    "description": null,
                    "slug": null,
                    "woocommerce_cat_id": null,
                    "deleted_at": null,
                    "created_at": "2018-01-03 21:08:18",
                    "updated_at": "2018-01-03 21:08:18"
                }
            ]
        },
        {
            "id": 21,
            "name": "Food & Grocery",
            "business_id": 1,
            "short_code": null,
            "parent_id": 0,
            "created_by": 1,
            "category_type": "product",
            "description": null,
            "slug": null,
            "woocommerce_cat_id": null,
            "deleted_at": null,
            "created_at": "2018-01-06 05:31:35",
            "updated_at": "2018-01-06 05:31:35",
            "sub_categories": []
        }
    ]
}
```

### HTTP Request
`GET connector/api/taxonomy`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `type` |  optional  | Type of taxonomy (product, device, hrm_department)

<!-- END_f8494c9a746f2982f51e344563b475a8 -->

<!-- START_b928b0227f535bab611da00bc247f60c -->
## Get the specified taxonomy

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/taxonomy/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/taxonomy/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Men's",
            "business_id": 1,
            "short_code": null,
            "parent_id": 0,
            "created_by": 1,
            "category_type": "product",
            "description": null,
            "slug": null,
            "woocommerce_cat_id": null,
            "deleted_at": null,
            "created_at": "2018-01-03 21:06:34",
            "updated_at": "2018-01-03 21:06:34",
            "sub_categories": [
                {
                    "id": 4,
                    "name": "Jeans",
                    "business_id": 1,
                    "short_code": null,
                    "parent_id": 1,
                    "created_by": 1,
                    "category_type": "product",
                    "description": null,
                    "slug": null,
                    "woocommerce_cat_id": null,
                    "deleted_at": null,
                    "created_at": "2018-01-03 21:07:34",
                    "updated_at": "2018-01-03 21:07:34"
                },
                {
                    "id": 5,
                    "name": "Shirts",
                    "business_id": 1,
                    "short_code": null,
                    "parent_id": 1,
                    "created_by": 1,
                    "category_type": "product",
                    "description": null,
                    "slug": null,
                    "woocommerce_cat_id": null,
                    "deleted_at": null,
                    "created_at": "2018-01-03 21:08:18",
                    "updated_at": "2018-01-03 21:08:18"
                }
            ]
        }
    ]
}
```

### HTTP Request
`GET connector/api/taxonomy/{taxonomy}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `taxonomy` |  required  | comma separated ids of product categories

<!-- END_b928b0227f535bab611da00bc247f60c -->

#Types of service management


<!-- START_b7d8e3052b6a47b9bfe5f6ebd5d8fa61 -->
## List types of service

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/types-of-service" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/types-of-service"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Home Delivery",
            "description": null,
            "business_id": 1,
            "location_price_group": {
                "1": "0"
            },
            "packing_charge": "10.0000",
            "packing_charge_type": "fixed",
            "enable_custom_fields": 0,
            "created_at": "2020-06-04 22:41:13",
            "updated_at": "2020-06-04 22:41:13"
        }
    ]
}
```

### HTTP Request
`GET connector/api/types-of-service`


<!-- END_b7d8e3052b6a47b9bfe5f6ebd5d8fa61 -->

<!-- START_d7b9bf97c5de35536625b759853d0fe3 -->
## Get the specified types of service

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/types-of-service/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/types-of-service/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "name": "Home Delivery",
            "description": null,
            "business_id": 1,
            "location_price_group": {
                "1": "0"
            },
            "packing_charge": "10.0000",
            "packing_charge_type": "fixed",
            "enable_custom_fields": 0,
            "created_at": "2020-06-04 22:41:13",
            "updated_at": "2020-06-04 22:41:13"
        }
    ]
}
```

### HTTP Request
`GET connector/api/types-of-service/{types_of_service}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `types_of_service` |  required  | comma separated ids of required types of services

<!-- END_d7b9bf97c5de35536625b759853d0fe3 -->

#Unit management


<!-- START_67d5fa9f69cb75cbecbcab90aa615c1e -->
## List units

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/unit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/unit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "business_id": 1,
            "actual_name": "Pieces",
            "short_name": "Pc(s)",
            "allow_decimal": 0,
            "base_unit_id": null,
            "base_unit_multiplier": null,
            "created_by": 1,
            "deleted_at": null,
            "created_at": "2018-01-03 15:15:20",
            "updated_at": "2018-01-03 15:15:20",
            "base_unit": null
        },
        {
            "id": 2,
            "business_id": 1,
            "actual_name": "Packets",
            "short_name": "packets",
            "allow_decimal": 0,
            "base_unit_id": null,
            "base_unit_multiplier": null,
            "created_by": 1,
            "deleted_at": null,
            "created_at": "2018-01-06 01:07:01",
            "updated_at": "2018-01-06 01:08:36",
            "base_unit": null
        },
        {
            "id": 15,
            "business_id": 1,
            "actual_name": "Dozen",
            "short_name": "dz",
            "allow_decimal": 0,
            "base_unit_id": 1,
            "base_unit_multiplier": "12.0000",
            "created_by": 9,
            "deleted_at": null,
            "created_at": "2020-07-20 13:11:09",
            "updated_at": "2020-07-20 13:11:09",
            "base_unit": {
                "id": 1,
                "business_id": 1,
                "actual_name": "Pieces",
                "short_name": "Pc(s)",
                "allow_decimal": 0,
                "base_unit_id": null,
                "base_unit_multiplier": null,
                "created_by": 1,
                "deleted_at": null,
                "created_at": "2018-01-03 15:15:20",
                "updated_at": "2018-01-03 15:15:20"
            }
        }
    ]
}
```

### HTTP Request
`GET connector/api/unit`


<!-- END_67d5fa9f69cb75cbecbcab90aa615c1e -->

<!-- START_17b54fc5627b3e3dab9d30f80da21dc9 -->
## Get the specified unit

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/unit/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/unit/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "business_id": 1,
            "actual_name": "Pieces",
            "short_name": "Pc(s)",
            "allow_decimal": 0,
            "base_unit_id": null,
            "base_unit_multiplier": null,
            "created_by": 1,
            "deleted_at": null,
            "created_at": "2018-01-03 15:15:20",
            "updated_at": "2018-01-03 15:15:20",
            "base_unit": null
        }
    ]
}
```

### HTTP Request
`GET connector/api/unit/{unit}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `unit` |  required  | comma separated ids of the units

<!-- END_17b54fc5627b3e3dab9d30f80da21dc9 -->

#User management


<!-- START_9d201fa59006772510fc0285886d0b0f -->
## Get the loggedin user details.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/user/loggedin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/user/loggedin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "user_type": "user",
        "surname": "Mr",
        "first_name": "Admin",
        "last_name": null,
        "username": "admin",
        "email": "admin@example.com",
        "language": "en",
        "contact_no": null,
        "address": null,
        "business_id": 1,
        "max_sales_discount_percent": null,
        "allow_login": 1,
        "essentials_department_id": null,
        "essentials_designation_id": null,
        "status": "active",
        "crm_contact_id": null,
        "is_cmmsn_agnt": 0,
        "cmmsn_percent": "0.00",
        "selected_contacts": 0,
        "dob": null,
        "gender": null,
        "marital_status": null,
        "blood_group": null,
        "contact_number": null,
        "fb_link": null,
        "twitter_link": null,
        "social_media_1": null,
        "social_media_2": null,
        "permanent_address": null,
        "current_address": null,
        "guardian_name": null,
        "custom_field_1": null,
        "custom_field_2": null,
        "custom_field_3": null,
        "custom_field_4": null,
        "bank_details": null,
        "id_proof_name": null,
        "id_proof_number": null,
        "deleted_at": null,
        "created_at": "2018-01-04 02:15:19",
        "updated_at": "2018-01-04 02:15:19"
    }
}
```

### HTTP Request
`GET connector/api/user/loggedin`


<!-- END_9d201fa59006772510fc0285886d0b0f -->

<!-- START_3b5f86fc519477d4b2c3b6b7104257c7 -->
## List users

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/user?service_staff=hic" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/user"
);

let params = {
    "service_staff": "hic",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "user_type": "user",
            "surname": "Mr",
            "first_name": "Admin",
            "last_name": null,
            "username": "admin",
            "email": "admin@example.com",
            "language": "en",
            "contact_no": null,
            "address": null,
            "business_id": 1,
            "max_sales_discount_percent": null,
            "allow_login": 1,
            "essentials_department_id": null,
            "essentials_designation_id": null,
            "status": "active",
            "crm_contact_id": null,
            "is_cmmsn_agnt": 0,
            "cmmsn_percent": "0.00",
            "selected_contacts": 0,
            "dob": null,
            "gender": null,
            "marital_status": null,
            "blood_group": null,
            "contact_number": null,
            "fb_link": null,
            "twitter_link": null,
            "social_media_1": null,
            "social_media_2": null,
            "permanent_address": null,
            "current_address": null,
            "guardian_name": null,
            "custom_field_1": null,
            "custom_field_2": null,
            "custom_field_3": null,
            "custom_field_4": null,
            "bank_details": null,
            "id_proof_name": null,
            "id_proof_number": null,
            "deleted_at": null,
            "created_at": "2018-01-04 02:15:19",
            "updated_at": "2018-01-04 02:15:19"
        }
    ]
}
```

### HTTP Request
`GET connector/api/user`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `service_staff` |  optional  | boolean Filter service staffs from users list (0, 1)

<!-- END_3b5f86fc519477d4b2c3b6b7104257c7 -->

<!-- START_5182c01637c8f532fe8cddbeed5f3ca0 -->
## Get the specified user

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "user_type": "user",
            "surname": "Mr",
            "first_name": "Admin",
            "last_name": null,
            "username": "admin",
            "email": "admin@example.com",
            "language": "en",
            "contact_no": null,
            "address": null,
            "business_id": 1,
            "max_sales_discount_percent": null,
            "allow_login": 1,
            "essentials_department_id": null,
            "essentials_designation_id": null,
            "status": "active",
            "crm_contact_id": null,
            "is_cmmsn_agnt": 0,
            "cmmsn_percent": "0.00",
            "selected_contacts": 0,
            "dob": null,
            "gender": null,
            "marital_status": null,
            "blood_group": null,
            "contact_number": null,
            "fb_link": null,
            "twitter_link": null,
            "social_media_1": null,
            "social_media_2": null,
            "permanent_address": null,
            "current_address": null,
            "guardian_name": null,
            "custom_field_1": null,
            "custom_field_2": null,
            "custom_field_3": null,
            "custom_field_4": null,
            "bank_details": null,
            "id_proof_name": null,
            "id_proof_number": null,
            "deleted_at": null,
            "created_at": "2018-01-04 02:15:19",
            "updated_at": "2018-01-04 02:15:19"
        }
    ]
}
```

### HTTP Request
`GET connector/api/user/{user}`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `user` |  required  | comma separated ids of the required users

<!-- END_5182c01637c8f532fe8cddbeed5f3ca0 -->

<!-- START_89e46657027975ac623db673ed8a4d00 -->
## Update user password.

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X POST \
    "http://test.local/connector/api/update-password" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}" \
    -d '{"current_password":"iusto","new_password":"nihil"}'

```

```javascript
const url = new URL(
    "http://test.local/connector/api/update-password"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

let body = {
    "current_password": "iusto",
    "new_password": "nihil"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "success": 1,
    "msg": "Password updated successfully"
}
```

### HTTP Request
`POST connector/api/update-password`

#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `current_password` | string |  required  | Current password of the user
        `new_password` | string |  required  | New password of the user
    
<!-- END_89e46657027975ac623db673ed8a4d00 -->

#general


<!-- START_4291b84958f2fa16d58446f4a4412eae -->
## List payment accounts

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/payment-accounts" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/payment-accounts"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "id": 1,
            "business_id": 1,
            "name": "Test Account",
            "account_number": "8746888847455",
            "account_type_id": 0,
            "note": null,
            "created_by": 9,
            "is_closed": 0,
            "deleted_at": null,
            "created_at": "2020-06-04 21:34:21",
            "updated_at": "2020-06-04 21:34:21"
        }
    ]
}
```

### HTTP Request
`GET connector/api/payment-accounts`


<!-- END_4291b84958f2fa16d58446f4a4412eae -->

<!-- START_ad1145912d113a821c97dbb9e337b960 -->
## List payment methods

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/payment-methods" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/payment-methods"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "cash": "Cash",
    "card": "Card",
    "cheque": "Cheque",
    "bank_transfer": "Bank Transfer",
    "other": "Other",
    "custom_pay_1": "Custom Payment 1",
    "custom_pay_2": "Custom Payment 2",
    "custom_pay_3": "Custom Payment 3"
}
```

### HTTP Request
`GET connector/api/payment-methods`


<!-- END_ad1145912d113a821c97dbb9e337b960 -->

<!-- START_c20326b50073732875acc9a84f706194 -->
## Get business details

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/business-details" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/business-details"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "id": 1,
        "name": "Awesome Shop",
        "currency_id": 2,
        "start_date": "2018-01-01",
        "tax_number_1": "3412569900",
        "tax_label_1": "GSTIN",
        "tax_number_2": null,
        "tax_label_2": null,
        "default_sales_tax": null,
        "default_profit_percent": 25,
        "owner_id": 1,
        "time_zone": "America\/Phoenix",
        "fy_start_month": 1,
        "accounting_method": "fifo",
        "default_sales_discount": "10.00",
        "sell_price_tax": "includes",
        "logo": null,
        "sku_prefix": "AS",
        "enable_product_expiry": 0,
        "expiry_type": "add_expiry",
        "on_product_expiry": "keep_selling",
        "stop_selling_before": 0,
        "enable_tooltip": 1,
        "purchase_in_diff_currency": 0,
        "purchase_currency_id": null,
        "p_exchange_rate": "1.000",
        "transaction_edit_days": 30,
        "stock_expiry_alert_days": 30,
        "keyboard_shortcuts": {
            "pos": {
                "express_checkout": "shift+e",
                "pay_n_ckeckout": "shift+p",
                "draft": "shift+d",
                "cancel": "shift+c",
                "recent_product_quantity": "f2",
                "weighing_scale": null,
                "edit_discount": "shift+i",
                "edit_order_tax": "shift+t",
                "add_payment_row": "shift+r",
                "finalize_payment": "shift+f",
                "add_new_product": "f4"
            }
        },
        "pos_settings": {
            "amount_rounding_method": null,
            "disable_pay_checkout": 0,
            "disable_draft": 0,
            "disable_express_checkout": 0,
            "hide_product_suggestion": 0,
            "hide_recent_trans": 0,
            "disable_discount": 0,
            "disable_order_tax": 0,
            "is_pos_subtotal_editable": 0
        },
        "weighing_scale_setting": {
            "label_prefix": null,
            "product_sku_length": "4",
            "qty_length": "3",
            "qty_length_decimal": "2"
        },
        "manufacturing_settings": null,
        "essentials_settings": null,
        "ecom_settings": null,
        "woocommerce_wh_oc_secret": null,
        "woocommerce_wh_ou_secret": null,
        "woocommerce_wh_od_secret": null,
        "woocommerce_wh_or_secret": null,
        "enable_brand": 1,
        "enable_category": 1,
        "enable_sub_category": 1,
        "enable_price_tax": 1,
        "enable_purchase_status": 1,
        "enable_lot_number": 0,
        "default_unit": null,
        "enable_sub_units": 0,
        "enable_racks": 0,
        "enable_row": 0,
        "enable_position": 0,
        "enable_editing_product_from_purchase": 1,
        "sales_cmsn_agnt": null,
        "item_addition_method": 1,
        "enable_inline_tax": 1,
        "currency_symbol_placement": "before",
        "enabled_modules": [
            "purchases",
            "add_sale",
            "pos_sale",
            "stock_transfers",
            "stock_adjustment",
            "expenses",
            "account",
            "tables",
            "modifiers",
            "service_staff",
            "booking",
            "kitchen",
            "subscription",
            "types_of_service"
        ],
        "date_format": "m\/d\/Y",
        "time_format": "24",
        "ref_no_prefixes": {
            "purchase": "PO",
            "purchase_return": null,
            "stock_transfer": "ST",
            "stock_adjustment": "SA",
            "sell_return": "CN",
            "expense": "EP",
            "contacts": "CO",
            "purchase_payment": "PP",
            "sell_payment": "SP",
            "expense_payment": null,
            "business_location": "BL",
            "username": null,
            "subscription": null
        },
        "theme_color": null,
        "created_by": null,
        "enable_rp": 0,
        "rp_name": null,
        "amount_for_unit_rp": "1.0000",
        "min_order_total_for_rp": "1.0000",
        "max_rp_per_order": null,
        "redeem_amount_per_unit_rp": "1.0000",
        "min_order_total_for_redeem": "1.0000",
        "min_redeem_point": null,
        "max_redeem_point": null,
        "rp_expiry_period": null,
        "rp_expiry_type": "year",
        "repair_settings": null,
        "email_settings": {
            "mail_driver": "smtp",
            "mail_host": null,
            "mail_port": null,
            "mail_username": null,
            "mail_password": null,
            "mail_encryption": null,
            "mail_from_address": null,
            "mail_from_name": null
        },
        "sms_settings": {
            "url": null,
            "send_to_param_name": "to",
            "msg_param_name": "text",
            "request_method": "post",
            "param_1": null,
            "param_val_1": null,
            "param_2": null,
            "param_val_2": null,
            "param_3": null,
            "param_val_3": null,
            "param_4": null,
            "param_val_4": null,
            "param_5": null,
            "param_val_5": null,
            "param_6": null,
            "param_val_6": null,
            "param_7": null,
            "param_val_7": null,
            "param_8": null,
            "param_val_8": null,
            "param_9": null,
            "param_val_9": null,
            "param_10": null,
            "param_val_10": null
        },
        "custom_labels": {
            "payments": {
                "custom_pay_1": null,
                "custom_pay_2": null,
                "custom_pay_3": null
            },
            "contact": {
                "custom_field_1": null,
                "custom_field_2": null,
                "custom_field_3": null,
                "custom_field_4": null
            },
            "product": {
                "custom_field_1": null,
                "custom_field_2": null,
                "custom_field_3": null,
                "custom_field_4": null
            },
            "location": {
                "custom_field_1": null,
                "custom_field_2": null,
                "custom_field_3": null,
                "custom_field_4": null
            },
            "user": {
                "custom_field_1": null,
                "custom_field_2": null,
                "custom_field_3": null,
                "custom_field_4": null
            },
            "purchase": {
                "custom_field_1": null,
                "custom_field_2": null,
                "custom_field_3": null,
                "custom_field_4": null
            },
            "sell": {
                "custom_field_1": null,
                "custom_field_2": null,
                "custom_field_3": null,
                "custom_field_4": null
            },
            "types_of_service": {
                "custom_field_1": null,
                "custom_field_2": null,
                "custom_field_3": null,
                "custom_field_4": null
            }
        },
        "common_settings": {
            "default_datatable_page_entries": "25"
        },
        "is_active": 1,
        "created_at": "2018-01-04 02:15:19",
        "updated_at": "2020-06-04 22:33:01",
        "locations": [
            {
                "id": 1,
                "business_id": 1,
                "location_id": null,
                "name": "Awesome Shop",
                "landmark": "Linking Street",
                "country": "USA",
                "state": "Arizona",
                "city": "Phoenix",
                "zip_code": "85001",
                "invoice_scheme_id": 1,
                "invoice_layout_id": 1,
                "selling_price_group_id": null,
                "print_receipt_on_invoice": 1,
                "receipt_printer_type": "browser",
                "printer_id": null,
                "mobile": null,
                "alternate_number": null,
                "email": null,
                "website": null,
                "featured_products": [
                    "5",
                    "71"
                ],
                "is_active": 1,
                "default_payment_accounts": {
                    "cash": {
                        "is_enabled": "1",
                        "account": null
                    },
                    "card": {
                        "is_enabled": "1",
                        "account": null
                    },
                    "cheque": {
                        "is_enabled": "1",
                        "account": null
                    },
                    "bank_transfer": {
                        "is_enabled": "1",
                        "account": null
                    },
                    "other": {
                        "is_enabled": "1",
                        "account": null
                    },
                    "custom_pay_1": {
                        "is_enabled": "1",
                        "account": null
                    },
                    "custom_pay_2": {
                        "is_enabled": "1",
                        "account": null
                    },
                    "custom_pay_3": {
                        "is_enabled": "1",
                        "account": null
                    }
                },
                "custom_field1": null,
                "custom_field2": null,
                "custom_field3": null,
                "custom_field4": null,
                "deleted_at": null,
                "created_at": "2018-01-04 02:15:20",
                "updated_at": "2020-06-05 00:56:54"
            }
        ],
        "currency": {
            "id": 2,
            "country": "America",
            "currency": "Dollars",
            "code": "USD",
            "symbol": "$",
            "thousand_separator": ",",
            "decimal_separator": ".",
            "created_at": null,
            "updated_at": null
        },
        "printers": []
    }
}
```

### HTTP Request
`GET connector/api/business-details`


<!-- END_c20326b50073732875acc9a84f706194 -->

<!-- START_10f2d454f50aa840a3699d7f1aca1848 -->
## Get profit and loss report

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/profit-loss-report?location_id=deserunt&start_date=2018-06-25&end_date=2018-06-25&user_id=et" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/profit-loss-report"
);

let params = {
    "location_id": "deserunt",
    "start_date": "2018-06-25",
    "end_date": "2018-06-25",
    "user_id": "et",
};
Object.keys(params)
    .forEach(key => url.searchParams.append(key, params[key]));

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": {
        "total_purchase_shipping_charge": 0,
        "total_sell_shipping_charge": 0,
        "total_transfer_shipping_charges": "0.0000",
        "opening_stock": 0,
        "closing_stock": "386859.00000000",
        "total_purchase": 386936,
        "total_purchase_discount": "0.000000000000",
        "total_purchase_return": "0.0000",
        "total_sell": 9764.5,
        "total_sell_discount": "11.550000000000",
        "total_sell_return": "0.0000",
        "total_sell_round_off": "0.0000",
        "total_expense": "0.0000",
        "total_adjustment": "0.0000",
        "total_recovered": "0.0000",
        "total_reward_amount": "0.0000",
        "left_side_module_data": [
            {
                "value": "0.0000",
                "label": "Total Payroll",
                "add_to_net_profit": true
            },
            {
                "value": 0,
                "label": "Total Production Cost",
                "add_to_net_profit": true
            }
        ],
        "right_side_module_data": [],
        "net_profit": 9675.95,
        "gross_profit": -11.55,
        "total_sell_by_subtype": []
    }
}
```

### HTTP Request
`GET connector/api/profit-loss-report`

#### Query Parameters

Parameter | Status | Description
--------- | ------- | ------- | -----------
    `location_id` |  optional  | optional id of the location
    `start_date` |  optional  | optional format:Y-m-d
    `end_date` |  optional  | optional format:Y-m-d
    `user_id` |  optional  | optional id of the user

<!-- END_10f2d454f50aa840a3699d7f1aca1848 -->

<!-- START_3735fc8265b24a44289e78c671b7e198 -->
## Get product current stock

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/product-stock-report" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/product-stock-report"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "total_sold": null,
            "total_transfered": null,
            "total_adjusted": null,
            "stock_price": null,
            "stock": null,
            "sku": "AS0001",
            "product": "Men's Reverse Fleece Crew",
            "type": "single",
            "product_id": 1,
            "unit": "Pc(s)",
            "enable_stock": 1,
            "unit_price": "143.0000",
            "product_variation": "DUMMY",
            "variation_name": "DUMMY",
            "location_name": null,
            "location_id": null,
            "variation_id": 1
        },
        {
            "total_sold": "50.0000",
            "total_transfered": null,
            "total_adjusted": null,
            "stock_price": "3850.00000000",
            "stock": "50.0000",
            "sku": "AS0002-1",
            "product": "Levis Men's Slimmy Fit Jeans",
            "type": "variable",
            "product_id": 2,
            "unit": "Pc(s)",
            "enable_stock": 1,
            "unit_price": "77.0000",
            "product_variation": "Waist Size",
            "variation_name": "28",
            "location_name": "Awesome Shop",
            "location_id": 1,
            "variation_id": 2
        },
        {
            "total_sold": "60.0000",
            "total_transfered": null,
            "total_adjusted": null,
            "stock_price": "6930.00000000",
            "stock": "90.0000",
            "sku": "AS0002-2",
            "product": "Levis Men's Slimmy Fit Jeans",
            "type": "variable",
            "product_id": 2,
            "unit": "Pc(s)",
            "enable_stock": 1,
            "unit_price": "77.0000",
            "product_variation": "Waist Size",
            "variation_name": "30",
            "location_name": "Awesome Shop",
            "location_id": 1,
            "variation_id": 3
        }
    ],
    "links": {
        "first": "http:\/\/local.pos.com\/connector\/api\/product-stock-report?page=1",
        "last": "http:\/\/local.pos.com\/connector\/api\/product-stock-report?page=22",
        "prev": null,
        "next": "http:\/\/local.pos.com\/connector\/api\/product-stock-report?page=2"
    },
    "meta": {
        "current_page": 1,
        "from": 1,
        "last_page": 22,
        "path": "http:\/\/local.pos.com\/connector\/api\/product-stock-report",
        "per_page": 3,
        "to": 3,
        "total": 66
    }
}
```

### HTTP Request
`GET connector/api/product-stock-report`


<!-- END_3735fc8265b24a44289e78c671b7e198 -->

<!-- START_bcba924904cb332c44b32be37a5ae3d6 -->
## Get notifications

<br><small style="padding: 1px 9px 2px;font-weight: bold;white-space: nowrap;color: #ffffff;-webkit-border-radius: 9px;-moz-border-radius: 9px;border-radius: 9px;background-color: #3a87ad;">Requires authentication</small>
> Example request:

```bash
curl -X GET \
    -G "http://test.local/connector/api/notifications" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -H "Authorization: Bearer {token}"
```

```javascript
const url = new URL(
    "http://test.local/connector/api/notifications"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
    "Authorization": "Bearer {token}",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "data": [
        {
            "msg": "Payroll for August\/2020 added by Mr. Super Admin. Reference No. 2020\/0002",
            "icon_class": "fas fa-money-bill-alt bg-green",
            "link": "http:\/\/local.pos.com\/hrm\/payroll",
            "read_at": null,
            "created_at": "3 hours ago"
        }
    ]
}
```

### HTTP Request
`GET connector/api/notifications`


<!-- END_bcba924904cb332c44b32be37a5ae3d6 -->


