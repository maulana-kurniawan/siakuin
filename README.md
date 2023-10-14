# siakuin
How to run/install?
1. First of all, make sure **PHP** and **Composer** is installed (WAMP stack program is better, like **XAMPP** or **Laragon**).
2. Press `Windows` logo button + `x`, then press `i` button.
3. Type this command:
   - `npm i concurrently -g`
   - `composer i`
   - `php artisan migrate`
   - `concurrently "php artisan serve" "npm run dev"`
4. Open [http://localhost:8000/login](http://localhost:8000/login) or [http://127.0.0.1:8000/login](http://127.0.0.1:8000/login) in your preferred browser.
5. Start coding! 👨‍💻☕
