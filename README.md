# CompCake
CakePHP based BJCP Competition Management Software

## Introduction

The purpose of this software is to make running a BJCP competition, well, a
piece of cake.

If you have run a competition before, you probably still have recurring
nightmares about lost entries, entries not paid, being forced into a particular
way of assigning entries to flights, sorting scoresheets, mailing scoresheets,
labels that won't print in some browsers. I could go on, but I think you
already have the point by now, so if you're still interested, do read on.

CakePHP is the basis this software is built on. I went with CakePHP for
the framework because a competition software program is inherently
data-intensive, and CakePHP has a lot of scaffolding which keeps the code
compact, simple, and easy to understand while being straightforward to
develop. This choice means it won't be JavaScript heavy (almost everything
runs on the server, with the exception of BJCP style guideline string
mappings), and therefore not as pretty and snappy as some Web2.0 applications,
but I'm more concerned about getting the job done, and getting it done well.

**This software is still in active development.** The user experience is
nearly complete (enough to accept entries) but the competition staff and
admin modules are still in development. Since the competitions I am running
will be judging in September you can expect a lot of active development
over the next month and a half as I get those parts done!

## Setup

1. You need a PayPal account to receive payment of entry fees.  We use the new
OAuth-based REST APIs, so you will need to go to developer.paypal.com, sign in
with your PayPal credentials, and generate an "Application" client token and
secret. It does not matter what you name the application in PayPal. The
client token and secret will go into the config. More details are in the
comments in the app.php file.

2. If you want to use reCAPTCHA to avoid bots trying to spam your system
by creating drone login accounts, you will need to set up a reCAPTCHA
site key and secret. The instructions on how to do this are in the app.php
file. ReCAPTCHA is minimially invasive to your users and very effective as
a security feature, so I highly suggest implementing it on your site.

3. Clone the repo on your server where you want it to live:

```
	git clone https://github.com/compcake/compcake.git
```

4. Use composer to fetch all the project dependencies.

```
	cd compcake/
	composer update
```

5. Edit the main configuration file, config/app.php. There are plenty of
comments to guide you. Be careful to follow the PHP syntax as you make changes.
You should only change the configuration before the "DO NOT CHANGE ANYTHING..."
comment. One possible exception is if you want to test PayPal payments without
actually sending real money, you may want to enable the Sandbox to do your
testing, and then switch it back to the main URL once you are satisfied that
things are working.

6. Navigate to the config/schema subdirectory and build the SqlLite database.

```
	cd config/schema
	make all
```

7. Navigate to the website and login as the test admin account. The default
login credentials are: testuser@test.com, password letmein
CHANGE THE PASSWORD. I mean it! You probably also want to update the admin
user details to something better than the default Test Admin.

8. You will probably want to edit the rules, which live at:

```
	src/Template/Pages/Rules.ctp
```

That's it... you should be ready to start accepting entries.

