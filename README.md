
# REAL-ESTATE-API

# Overview

This is an API for a Real Estate application built using Laravel.
The API allows users to:

- List properties

- View individual properties

- Create new properties

- List agents

- View individual agents
# Relationships

| Source Model | Relationship | Target Model | Description |
|:---|:---|:---|:---|
| Agent | hasMany | Property | An agent can have many properties |
| Property | belongsTo | Agent | A property belongs to one agent |

# Setup Instructions

1. Clone the repository

```bash
 git clone https://github.com/Harshvardhan-Backend/Real_Estate_Api.git
cd Real_Estate_Api

```
2. Install Dependencies
```bash
composer install

```
3 Configure Environment Variables
- Copy `.env.example .env` to `env`
```bash
cp .env.example .env
```
- Set your database configuration inside `.env`:
```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```
4. Generate application key
```bash
php artisan key:generate
```
5. Create Database migrations

Create models and migrations for Agent and Property:
```bash
php artisan make:model Agent -m
php artisan make:model Property -m
```

# Run database migrations and seeders
```bash
php artisan migrate
php artisan migrate --seed
```




# API Endpoints
All API responses are formatted using Laravel API Resources.

## Properties
- GET `/api/properties`

    - List all properties with pagination (10 per page)

    - Query parameters:

        - `sort=price_asc` — Sort by price ascending

        - `sort=price_desc` — Sort by price descending

        - `agent_id={id}` — Filter properties by agent ID

- GET `/api/properties/{id}`

    - View a single property

    - Returns 404 if not found

- POST `/api/properties`

    - Create a new property

    - Required fields:

        - `address` (string, required)

        - `price` (decimal, required)

        - `agent_id` (integer, must exist)

    - Optional fields:

        - `description` (text)

        - `image_urls` (json or comma-separated string)

## Agents
- GET `/api/agents`

    - List all agents with pagination (10 per page)

- GET `/api/agents/{id}`

    - View a single agent

    - Returns 404 if not found


# Testing the API
You can test the endpoints using:

- Postman

- cURL

## Testing with Postman
You can easily test the API endpoints using Postman by following these steps:

1. Open Postman and click on New > Request.

2. Set the request type to:

- `GET`, `POST`, etc., depending on the endpoint.

3. Enter the request URL:
```bash
http://localhost:8000/api/{endpoint}
```
4. For POST requests:

- Go to the header tab in key type `accept` and in value type `application/json`

- Go to the Body tab.

- Select raw and choose JSON format.

- Provide the request body.

5. Send the request and inspect the response!

| Method | URL | Description |
| :--- | :--- | :--- |
| GET | /api/properties | List all properties |
| GET | /api/properties/{id} | View a single property |
| POST | /api/properties | Create a new property |
| GET | /api/agents | List all agents |
| GET | /api/agents/{id} | View a single agent |

**Important**

Make sure your Laravel server is running (`php artisan serve`) and your database is seeded (`php artisan migrate --seed`) before testing.

# Web Form Interface (Blade Views)

In addition to API access, this application provides frontend forms using Laravel Blade templates for adding Agents and Properties.

| Route               | Method | Purpose                         |
|---------------------|--------|---------------------------------|
| `/create-agent`     | GET    | Show form to create an agent    |
| `/create-agent`     | POST   | Submit and store a new agent    |
| `/create-property`  | GET    | Show form to create a property  |
| `/create-property`  | POST   | Submit and store a new property |


# Validation and Error Handling
- Validation errors: return HTTP 422 Unprocessable Entity

- Resource not found: return HTTP 404 Not Found

- Proper error messages are provided for failed operations.

# SUMMARY

This Real Estate API project provides a backend system for managing properties and agents for a real estate application.

It allows users to:

- View a list of available properties.

- View details of a specific property.

- Filter properties by agent and sort them by price.

- Create new property listings with validation checks.

- View a list of agents.

- View details of individual agents.

The API is built using Laravel and uses a PostgreSQL database to store information about properties and agents.
It supports pagination, input validation, error handling (404 for not found, 422 for invalid input), and returns clean JSON responses using API Resources.

This API can be connected easily to any frontend or mobile application to build a complete real estate platform.