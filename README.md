#commentor
is a simple but powerful PHP **comment system** with **spam protection** that **does not require MySQL**.

## Installation
1. After downloading and unpacking the files copy the "commentor" directory (containing "index.php" etc.) into the root folder of your website so that it is accessible via `http://yourwebsite.com/commentor`.

2. You can now embed the comment system by adding the following code to your pages.
```html
<iframe src="/commentor/index.php" frameBorder="0"
width="100%" height="400" name="commentpostsection">
</iframe>
```

## Administration
By default all comments are stored in the `/commentor/data` directory as text files which can be edited with any standard editor.
Howewer, navigating to `http://yourwebsite.com/commentor/admin` allows you to get an overview of all comments posted as well as to delete them quickly.
The admin interface is password protected.

Default login data:
Username: `admin`
Password: `commentor`

It's strongly recommended that you change username and password as fast as possible by editing the first lines of `/comentor/admin/index.php`.

## Demo
Click [here](http://demo.julianibus.de/commentor/test.html "commentor client demo") to try out the standard client comment interface and visit [this link](http://demo.julianibus.de/commentor/admin "commentor admin demo") for a first impression of the admin interface.
