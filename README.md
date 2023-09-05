# Git clone

Database migration and seeding with 10 users(you can change the count in [DatabaseSeeder.php](database/seeders/DatabaseSeeder.php))
```console
php artisan migrate --seed
```

# Api routes

### Get all users without transactions.

```http
GET /api/v1/users
```

##### Responses

```javascript
[
    {
        "id": 10,
        "name": "Bernardo Ryan",
        "email": "kweber@example.com",
        "user_account": {
            "id": 10,
            "balance": 417
        }
    }
]
```

### Show user's account and transactions.

```http
GET /api/v1/users/{userAccountId}
```

##### Parameters
| Parameter       | Type  | Description |
|:----------------|:------|:------------|
| `userAccountId` | `int` | Id          |

##### Responses

```javascript
[
    {
        "id": 2,
        "user": {
            "id": 2,
            "name": "Dr. Fernando O'Hara",
            "email": "natalie.cartwright@example.net"
        },
        "transactions": [
            {
                "id": 20,
                "user_account_id": 1,
                "amount": 150,
                "type": "Charge off balance",
                "transaction_id": "EVVtTTQhmqr6vjsRqWobX7YzrRc01g7F",
                "created_at": "09/05/2023"
            },
        ],
        "balance": 649
    }
]
```

### Create payment.

```http
POST /api/v1/payments
```

##### Parameters
| Parameter | Type       | Description                              |
|:----------|:-----------|:-----------------------------------------|
| `amount`  | `required` |                                          |
| `type`    | `required` | 1(credit balance), 2(charge off balance) |
| `user_account_id`  | `required` |                                          |

