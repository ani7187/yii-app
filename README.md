<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Club management app with Yii 2 Advanced Project Template</h1>
    <br>
</p>


## Features

- **User Authentication**: Register, log in, and log out.
- **CRUD Operations**: Create, Read, Update, and Delete clubs and clients.

## Setup

### Prerequisites
Ensure you have installed
- **Docker**

## Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/ani7187/yii-app.git
   cd yii-app

## Configuration

### Database and Mail Setup

Edit `common/config/main-local.php`:

```php
<?php

return [
    'components' => [
        'db' => [
            'class' => \yii\db\Connection::class,
            'dsn' => 'mysql:host=mysql;dbname=yii2advanced',
            'username' => 'yii2advanced',
            'password' => 'secret',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'scheme' => 'smtp',
                'host' => 'smtp.example.com',      // e.g., smtp.gmail.com
                'username' => 'your@email.com',
                'password' => 'your_email_password',
                'port' => '587',                  // Typically 465 for SSL, 587 for TLS
                'encryption' => 'tls',             // ssl or tls
            ],
        ],
    ],
];
```    
- **Start the application using Docker:**
    ```bash 
    docker-compose up --build -d
- **Go into container:**
    ```bash
    docker exec -it app-frontend-1 bash
- **Install dependencies:**
    ```bash
    composer install
- **Set up the database:**
    ```bash
    phh yii migrate
- Access the app at http://localhost:20080.

## Contact
For more details or to report bugs, contact at:
- 📧Email: azizyana02@gmail.com

