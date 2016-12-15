# Slackword
Dictionary in your slack....additionally, you can get random words.

# How it works (for now)
* **Add Slash Command Integration** to your team on slack
* Use **/slackword** as the slash command
* Use **http://larikraun.me/slack-random-word/index.php** as the url
* Set method to **GET**
* Save the settings
* You can now use the slash command from your slack team. (See the list of commands below)

# How to use
* Star the repo :P
* Clone the repo
* Get an API KEY from [Word API] (https://www.wordsapi.com/)
* Put the key into your .env file
* Integrate **slackword** into your slack team

# Tasks
- [x] Fetch word definitions
- [x] Fetch random words and definitions
- [ ] Configure the frequency of random words suggestions and definitions
- [ ] Automate integration to slack

# List of commands
Command  | Description
------------- | -------------
/slackword  | Fetches a random word and definition
/slackword {word} e.g /randomword orchid  | Fetches the meaning of {word}
/slackword (help) | Shows list of all commands
/slackword (configure) | configures the frequency of random words suggestions

# For Contributions or issues
Send me a mail at **omolara.adejuwon@gmail.com**

# Credit
[Word API] (https://www.wordsapi.com/)
