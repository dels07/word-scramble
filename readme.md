# Word Scramble
A simple game of word guessing game with topic as a hint.

## Installation
1. git clone the repo.
2. cd to repo directory (ex: cd word-scramble).
3. type ```composer install``` in command line.
4. copy .env.example to .env file.
5. modify the database access to your local development.
6. type ```php artisan migrate --seed``` in command line.
7. access via browser.

## Additional Notes
- You can use default ```user@demo.com/demo12345``` as email/password.
- You can use default ```admin@demo.com/demo12345``` to view history of users.
- For optimal viewing experience open link on your smartphone browser.
- You can use sqlite for simple development, make database via
```touch database/database.sqlite``` and adjust ```.env``` file.

## Screenshot
![Screenshot 1](public/screenshot/01.png) ![Screenshot 2](public/screenshot/02.png)