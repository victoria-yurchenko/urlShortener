# URL Shortener Project

## Overview

This project is a URL shortener service built using Laravel (PHP) and Vue.js. It allows users to shorten URLs and manage them through a web interface. The system generates short, unique URLs and handles redirection to the original URLs.

## Table of Contents

- [Features](#features)
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [API Endpoints](#api-endpoints)
- [Testing](#testing)
- [Contributing](#contributing)

## Features

- Shorten URLs to a 6-symbol alphanumeric hash
- Recognize and handle duplicate URLs by returning the existing short URL
- Redirect users to the original URL upon opening the short URL
- Can work from a folder (e.g., example.com/something/[hash])
- RESTful API for URL management
- Docker support for easy setup

## Requirements

- Node.js v14.x or later
- PHP 8.0 or later
- Composer
- MySQL

## Installation

### Local Development

1. **Clone the repository:**

    ```sh
    git clone https://github.com/your-repo/url-shortener.git
    cd url-shortener
    ```

2. **Install PHP dependencies:**

    ```sh
    composer install
    ```

3. **Install Node.js dependencies:**

    ```sh
    npm install
    ```

4. **Set up environment variables:**

    Copy the `.env.example` to `.env` and update the necessary values.

    ```sh
    cp .env.example .env
    ```

5. **Generate application key:**

    ```sh
    php artisan key:generate
    ```

6. **Run database migrations:**

    ```sh
    php artisan migrate
    ```

### Web Interface

1. **Open the web interface:**

    Navigate to `http://localhost:8080` in your web browser.

2. **Shorten a URL:**

    - Enter the URL you wish to shorten in the form.
    - Click the "Shorten URL" button.
    - The system will generate a short URL in the format `example.com/[hash]`.

3. **Access the short URL:**

    - Open the generated short URL in your browser.
    - You will be redirected to the original URL.

### API Endpoints

- **Shorten URL:**
  - `POST /api/shorten`
  - Body: `{ "url": "http://example.com" }`
  - Response: `{ "short_url": "http://example.com/[hash]" }`

- **Redirect to Original URL:**
  - `GET /[hash]`
  - Redirects to the original URL.

## Testing

1. **Run PHP tests:**

    ```sh
    php artisan test
    ```

2. **Run JavaScript tests:**

    ```sh
    npm run test
    ```

## Contributing

Contributions are welcome! Please submit a pull request or open an issue to discuss your ideas.

## MySQL Dump

The MySQL dump of the database is provided in the file `url_shortener.sql`.

## Source Code

The source code for the project is included in this repository. To get started, follow the [Installation](#installation) instructions.

---

**Author:** Victoria Yurchenko
**Contact:** vika010501@gmail.com
