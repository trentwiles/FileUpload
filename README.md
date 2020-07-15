# Basic File Upload
A simple file upload system in PHP based off of the W3schools PHP file upload.
https://www.w3schools.com/php/php_file_upload.asp

# Why this file upload system is better:

- You can upload files with the same name.
- It is password protected.
- It creates a new directory everytime a file is uploaded.
- The file is shown and linked once it is uploaded.


# Getting Started

For this to work, you *should* be running the Apache Web Sever.
<br>
Add this to your `.htaccess` file to prevent people from viewing uploads.
```
Options -Indexes
```
Make sure write privlages are not restricted to just the root user.
```
sudo chown username folder
```

Enter the uploads.php file and change the $password variable to what you want to password to be (leave it blank if you want public uploads).

<br>
Thats it! Have fun and make sure to keep the password a secret!
