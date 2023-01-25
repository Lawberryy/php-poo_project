# PHP-POO project : SPA Administrator Website

## :gear: How it works:

### :unlock: Login page

When you land on the website, the first page you're gonna come 
across is the login page.
There you can create your account (by signing up) if you don't
have one yet, or you can log in if you already have one.

:warning: If you try to log in when you don't have an account yet, it won't
work. <br>
:warning: If you try to log in with the right e-mail address but the wrong
password, you will get an error message telling you that your
password doesn't match with your e-mail address and a CTA button
will suggest you to go back to the login page. <br>
:heavy_check_mark: If both entries match with what's in the database, you will be
landing onto the next page. <br>
A new session will start and that session will remember your 
first & last name, as well as your user ID (the one in the database).
<br>

Now, depending on whether you're an admin or not, the page you arrive on
will change.
* If your role/status is registered as admin in the database, you
  will be considered as one in that session and will be landing onto
  the admin page.
* If your role isn't admin but a regular user, you won't be considered
  as an admin in that session and will be landing onto your profile
  page.
<br>

### :computer: :cat: My account page (or profile page)

On this page, you can add/register all your pets by filling in the
form. When you're done, all your pets will appear in the list below
the form. <br>
If you want to remove one from the list, you can do so by clicking on 
the delete button below their name. You can always register them again.
<br>
There is also a log-out button on the top right of the page for logging
out when you're done. By clicking it, the current session will be destroyed,
and you will be redirected onto the login page where you will have to log in
again.

:warning: If you try to access the login page through the URL when still being logged in
(or let's say before logging out), it won't work, and you will be
redirected on your profile page. <br>
:warning: If you try accessing the admin page when you don't have the
access rights, it also won't work, and you will be redirected on your
profile page.
<br>

### :woman_technologist: :man_technologist: Admin page

As an admin, you have access to this page where you can view
every user's name, and every pet registered in the database, as well as
who's their human (the user associated to them).
<br>
But even though you're an admin, you're still considered as a regular 
user as well, and so you have access to your own profile page too
where you can add pet(s) to your list.

<br>
That's pretty much everything there is to know :slightly_smiling_face:.