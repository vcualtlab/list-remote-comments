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

| Argument        		 | Default  | Type      | Description   
| ---------------------- | -------- | --------- | ------------- 
| **$title**      		 | false    | Boolean   | Outputs title
| **$date**       		 | true     | Boolean   | Outputs Date
| **$link**       		 | true     | Boolean   | Wrap title in permalink to post
| **$max_number** 		 | null     | Number    | Set max limit of comments to display
| **$dispay_list_title** | true     | Boolean   | Display "Comments: " before list