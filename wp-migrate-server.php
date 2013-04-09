hat tip: http://www.jasonbobich.com/web-design/moving-wordpress-to-a-new-server/#comment-2117

We'll be using the Wordpress Safe Search and Replace Tool from interconnect/it. Download it here: http://interconnectit.com/products/search-and-replace-for-wordpress-databases/
To summarize, we copy the database and files from the original location to the new location, and use this script to run a safe search and replace of the new url string within the database in the new server location. It's a quick and simple process, and there is no need to change anything in your original location.

1. export wordpress database as a sql file from the original location, e.g. http://localhost:8888/thiswebsite/

2. on your new server location, e.g. http://thiswebsite.com/, create a new database, and assign a user priviledges to the new db

3. import the exported wordpress database to the new location

4. using your preferred FTP program, copy the entire wordpress directory from the original server to the new server. edit the wp-config.php file to reflect the new database name/user/password. upload the edited wp-config.php file to the new server

5. download the Wordpress Safe Search and Replace Tool from interconnect/it. for security reasons, edit the name of the php file to something-unique.php. upload the php file to the root folder on your new server.

6. visit http://thiswebsite.com/something-unique.php in your browser

7. follow the onscreen instructions. at stage 4, replace http://localhost:8888/thiswebsite/ with http://thiswebsite.com/

8. check http://thiswebsite.com/ to make sure your migration was successful

9. IMPORTANT: delete the something-unique.php file from your server, as this is a security 

10. (troubleshooting) - home page loads but all urls point to your original server location - export the new database as a sql file. search for the previous url. in the table wp_options, I had to manually change the url for the fields 'siteurl' and 'home' - unknown why but it got it fixed!
Note: the reason we don't do find and replace is because of the serialized strings. when you only have to do a couple find and replace, you can (and should) update the string length values as well.
Example: s:5:"hello" becomes s:11:"hello world"

other option: http://wordpress.org/extend/plugins/wp-migrate-db/