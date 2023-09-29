# PHPEvolution
## What's that?
It's a php open source default project which can use and integrate javascript elements.
It's very simple to use, use only require to make the page more speed. 

## Start
steps:
1. git clone https://github.com/lorenzorizzolo/phpevolution
2. goto startfolder/
3. rename .env.example to .env, fill the variables with your data. 
4. you need to [install composer](https://getcomposer.org/download/), then use 'composer update'
5. sh start.sh
6. goto "localhost:8000" on your browser

## Features
There are some interesting features like javascript components for frontend and many php functions to use like send_email().

## Structure
In this repository you have 2 folders, the first one, 'skelethon', is empty, so you can start to work on it. 
Then in every folder you must start the server on the public folder and it will work, try to use:
```bash
sh start.sh
```

## PHP functions
**send_email():** allows you to send emails, once the variables are set in the .env file.
```php
send_email($email_to_send, $email_object, $email_message)
```

**isnum():** checks if the varible passed is a number.
```php
isnum($var)
```

**isempty():** checks if the varible passed is empty or if there are only space.
```php
isempty($var)
```

**contains():** checks if the first variable contains the second one, like a filter. (for searchbars you can use the js-element *searchbar*, visit [GIthub-jselements](https://github.com/lorenzorizzolo/js-elements))
```php
contains($var, $filter)
```

## Js elements
Here there are some Javascript elements that you can use.

*for more info visit [GIthub-jselements](https://github.com/lorenzorizzolo/js-elements)*

**apple checkbox, android checkbox, input, motion, searchbar static, searchbar motion, change title page, page loading, footer basic, footer toolbar, card motion.**


## Telegram bot
Into this framework you can also use telegram bot automatically.
You must se BOT_TOKEN with you personal telegram and set webhook to your site like.

>[!IMPORTANT]
>
>Your site must be HTTPS not HTTP

```
https://api.telegram.org/bot{bot_token}/setWebhook?url={tuo sito}/telegram/
```
