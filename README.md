# email-php

Send e-mail with php.

# Config

Change this lines with yours configurations.

```php
$mail->SMTPSecure = 'tls';
$mail->Port = '587';
$mail->Host = 'smtp.domain.com';
$mail->Username = 'username@domain.com';
$mail->Password = 'password';
```

# Usage


```json
POST /email-php/php/email/send/ HTTP/1.1
Host: localhost
Content-Type: application/json
Cache-Control: no-cache
{
    "from": {
        "name": "xxxxx",
        "email": "xxxxx@domain.com"
    },
    "for": [{
        "name": "yyyyy",
        "email": "yyyyy@gmail.com"
    }, {
        "name": "zzzzz",
        "email": "zzzzz@live.com"
    }],
    "title": "Email php",
    "msg": "Hello email php."
}
```

## Result

#### Success

```json
{
    "result": true
}
```

#### Error

```json
{
    "result": "SMTP Error: Could not authenticate."
}
```
