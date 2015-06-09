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

Default Arguments:

**$title**
default: false
Outputs title - Boolean


**$date**
default: true
Outputs Date - Boolean


**$link**
default: true
Wrap title in permalink to post


**$max_number**
default: null
Set max limit of comments to display


**$dispay_list_title**
default: true
Display "Comments: " before list


