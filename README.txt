Steps that I have used to create project in my local

1. I have create the project usinng the command "composer create laravel/laravel twubric".
2. Then I have added the .env file and db details in that file and twitter connection deatails.
3. Created a db in my phpmyadmin with name twubric.
4. Then I rann php artisan migrate to add the tables to db.
5. Also created the new migration files to add new table and to create new column in existing table.
6. I have used bootstrap/ui to impliment authentication process.
7. I havve used the laravel/socialite for connecting to twitter and authentication.


Modeling

1.I have used only one extra table the i.e follwers
2. Added twitter_token and twitter_id from twitter to users table.
3.Structure of my follwers table.
+--------------+-----------+
| column_name  | data_type |
+--------------+-----------+
| id           | bigint    |
| uid          | bigint    |
| main_user_id | bigint    |
| username     | varchar   |
| fullname     | varchar   |
| twubric      | varchar   |
| created_at   | timestamp |
| updated_at   | timestamp |
+--------------+-----------+
In above table main_user_id is id of user from users table.

4.Structure of my users table.
+---------------------+-----------+
| column_name         | data_type |
+---------------------+-----------+
| id                  | bigint    |
| name                | varchar   |
| email               | varchar   |
| email_verified_at   | timestamp |
| password            | varchar   |
| remember_token      | varchar   |
| created_at          | timestamp |
| updated_at          | timestamp |
| twitter_token       | varchar   |
| twitter_id          | bigint    |
+---------------------+-----------+