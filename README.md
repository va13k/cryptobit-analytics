# cryptobit-analytics
My very first commercial web project built by me and my younger brother @Levelion.
It was developed in 2021 for a team of cryptocurrency analysts specializing in investigating illegal activities, audits, and consulting for other companies or individuals.

## How to add this repository on your machine

```
git clone https://github.com/<YOUR_GITHUB_USERNAME>/cryptobitanalytics.git
cd cryptobitanalytics
```

## How to Set Up the Database

1. Install MAMP: https://www.mamp.info/en
2. Launch the MAMP
3. Open phpMyAdmin http://localhost:8888/phpMyAdmin
4. Create a database named `cryptobitanalytics`
5. Import the database:
    - Click on Import in phpMyAdmin
    - Choose cryptobitanalytics.sql from the main project folder `cryptobitanalytics`
    - Click Go
6. Update your `.env` file (if necessary):

```
DB_HOST=localhost
DB_NAME=cryptobitanalytics
DB_USER=root
DB_PASS=root
```
7. Open the project in a browser:

```
http://localhost:8888/cryptobitanalytics/
```