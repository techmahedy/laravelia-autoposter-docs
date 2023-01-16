<a name="section-1"></a>
# Installation

- [Installation](#section-1)
- [Step One](#section-2)
- [Step Two](#section-3)
- [Step Three](#section-4)
- [Step Four](#section-5)

<a name="section-1"></a>

> {success} `Laravelia Autoposter` has a few easy step to setup. As this content is premium so we managing this installation with manually. No worries. Just follow this below few steps.

<a name="section-2"></a>

## Step One
In this first step, go to your project root directory and open `your_project/composer.json` file and update it with this below code:
### `project/composer.json`
```
"require": {
    "laravelia/autoposter": "1.0.5"
},
"repositories": [
    { "type": "vcs", "url": "https://github.com/techmahedy/laravel-social-auto-poster" }
],
"require-all": true,
```

<a name="section-3"></a>

## Step Two
In this second step, You need to publish autoposter vendor to get `config/autoposter.php`.

`php artisan vendor:publish --provider='Laravelia\Autoposter\AutoPosterServiceProvider'`

###

This command will generate `config/autoposter.php` file and configure it with your credentials like this 🦊

`your_project/config/autoposter.php`
###
```
<?php

return [
    'facebook' => [
        'APP_ID' => '',
        'APP_SECRET' => '',
        'PAGE_ACCESS_TOKEN' =>'',
        'FACEBOOK_PAGE_ID' => '',
        'ENABLE_FACEBOOK_PAGE_SHARE' => false,
    ],
    'tumblr' => [
        'CONSUMER_KEY' => '',
        'SECRET_KEY' => '',
        'TOKEN' => '',
        'TOKEN_SECRET' => '',
        'BLOG_NAME' => '',
        'ENABLE_TUMBLR_SHARE' => false
    ]
];
```
###
Make sure after adding the credentials, `ENABLE_FACEBOOK_PAGE_SHARE` and `ENABLE_TUMBLR_SHARE` make it false to true. Otherwise it won't work. 

<a name="section-4"></a>

## Step Three
In this third step, now run `composer update` command to install the package🦊 Having run the command, `GIT TOKEN` will be needed to pass the authorization. We will provide this token to you. Contact with us after buying this script.

<a name="section-5"></a>

## Step Four
Now look at that, how you can use this package.
```
<?php

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Laravelia\Autoposter\Services\SocialShareService as SocialShare;

class ExampleController extends Controller
{   
    public function storePost(Request $request, SocialShare $socialShare)
    {   
        $post = Post::create($request->all());

        $data = [
            'link' => $post->permalink, //your content link
            'title' => $post->title, //your content title
            'excerpt' => $post->excerpt, //your content short text
            'tags' => $post->tags, //your contect tags ex: test, test2, test3
            'attachment_url' => $post->attachment //your contect attachment link
        ];

        $socialShare->share($data);

        //continue with your code
    }
}
