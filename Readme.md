# wild_circus

Requirements:
•

The site must be responsive
•

Data is stored in a database
•

Follow best practices (tests are a big plus)
•

The project must be available on your personal Github account
•

Do not forget your favorite acronyms: KISS, DRY and RTFM!

## Tools

Symfony 5, SwiftMailer, MySql, Bootstrap 4.

After having clone or download the project, you have to make some command lines:
- composer install
- yarn install
- yarn encore dev



## Data to fill in in the .env file

Create a database to communicate with forms and fill in user, password and databasename:

```python
###> doctrine/doctrine-bundle ###

DATABASE_URL=mysql://user:password@127.0.0.1:3306/databasename

```

You also have to configure the email address :

```python
###> symfony/swiftmailer-bundle ###

# For a generic SMTP server, use: "smtp://localhost:25?encryption=&auth_mode="

```
And that's all, enjoy!
