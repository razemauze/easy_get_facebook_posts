# SO, HOW DO I USE THIS?!

Use the following code to get the Facebook Posts:


```php
$fields = array(
	FIELDS YOU NEED
);

$fb_posts = json_decode(file_get_contents('https://laybackcph.dk/fb.php?p=PAGENAME&fields='.implode(',', $fields)), true);
```

You can also send an extra parameter in the file_get_contents above. The parameter is: type
This can be used to pull out Events, a certain page has created (parameter: &type=events). Events has other fields than the below described. These fields can be found here: https://developers.facebook.com/docs/graph-api/reference/event


In the $fields-array, enter each field you want to get. This can make the call easier, if you only need the image and url from the post, and not all likes, shares etc.
Enter the name of the page (facebook.com/PAGENAME/) where it says PAGENAME in the url. The pagename should also be inserted in the $pages-array in this file.

Description of fields:
* id
	* Gets the Facebook-id of the post.
* created_time
	* Gets the date of the post.
* full_picture
	* Gets the full-size image of the post.
* message
	* Gets the message of the post.
* link
	* Gets the link the post links to (fx. youtube video or website).
* permalink_url
	* Gets the url for the post on Facebook.
* shares
	* Gets the amount of shares the post have.
* type
	* Gets what type the post is. Fx. "video" or "link".
* likes.summary(true)
	* Gets all LIKE-reactions of the post.
* reactions.type(LOVE).summary(true)
	*Gets all LOVE-reactions of the post. "LOVE" can be exchanged with WOW, SAD, LIKE, ANGRY.