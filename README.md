# PHPEvolution
## What's?
Is an open source php default project which can use and integrate javascript elements.
It's very simple to use, use only require to make the page more speed. 

## Features
There are some interesting features like javascript component for frontend and many php functions to use file send_email().

## Structure
In this repository you have 2 folder, first is empty and clear, it has only css and js for js elements. 
Then in every folder you must start server on public folder and it will works, try to use:
```
php -S localhost:8080
```

## PHP functions
**send_email():** allow you to send email, one time sets variables in .env file.
```
send_email($email_to_send, $email_object, $email_message)
```

**isnum():** checks if the varible passed is a number.
```
isnum($var)
```

**isempty():** checks if the varible passed is empty or if there are only space.
```
isempty($var)
```

**contains():** checks if the first variable contains the second like a filter. (for searchbar you can use the js-element *searchbar*, visit [GIthub-jselements](https://github.com/lorenzorizzolo/js-elements))
```
contains($var, $filter)
```

## Js elements
Here there are some Javascript element that you can use.

*for more info visit [GIthub-jselements](https://github.com/lorenzorizzolo/js-elements)*

**apple checkbox, android checkbox, input, motion, searchbar static, searchbar motion, change title page, page loading, footer basic, footer toolbar, card motion.**


