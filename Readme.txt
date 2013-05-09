================================================== =
To Upgrade:-

Upload all of the files contained within the update kit and overwrite if/when prompted 
Set /includes to CHMOD 777 
Backup and then delete /includes/config.php 
Proceed to www.your-site.com, you will then be re-directed to www.your-site.com/install/install.php 
From here, enter your database details (confirmed within the backed up config.php) 
On the next step choose the relevant upgrade option 
The installer will then update your database with the V6.05 changes 
The final step will ask you to complete the site setup details (name, url and admin login details) 
Once complete, set /includes back to CHMOD 755 and delete the /install directory
The cache directory needs to CHMOD 777 for picture uploads to work correctly
================================================== =