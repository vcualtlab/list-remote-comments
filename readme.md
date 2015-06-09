# List Remote Comments

This plugin works with FeedWordPress and Display Posts Shortcode to display comments on the "host" content provider.

## Shortcode

```
[list-remote-comments]
```

When used in conjunction with [Display Posts Shortcode](https://github.com/billerickson/display-posts-shortcode/wiki) the list-remote-comments shortcode will append comments to the post.

### Usage

```
[list-remote-comments]

[display-posts arguments= ... ]
```

**IMPORTANT**
[list-remote-comments] shortcode MUST COME BEFORE [display-posts] shortcode. It will not work otherwise.


## Template Tag

Alternately you can use the template tag ```list_remote_comments()``` to display comments in your templates.

### Usage

```php
list_remote_comments( false, true, true, true, 5, true)
```

| Argument        		 | Default  | Type      | Description   
| ---------------------- | -------- | --------- | ------------- 
| **$comment**           | false    | Boolean   | Output full comment
| **$title**      		 | true     | Boolean   | Output title
| **$date**       		 | true     | Boolean   | Output Date
| **$link**       		 | true     | Boolean   | Wrap title in permalink to post
| **$max_number** 		 | null     | Number    | Set max limit of comments to display
| **$dispay_list_title** | true     | Boolean   | Display "Comments: " before list


#### notes

Based on [Remote Comments](http://wrapping.marthaburtis.net/2014/03/25/remote-comments-plugin-a-fwp-addon/) plugin by Martha Burtis


#### changelog

**v 1.1**

 * added proper cache
 * more aggressive at 3600
 * added more style classes