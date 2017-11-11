Symfony 3 Cookie Consent bundle

Installation
============

Step 1: Install the bundle
--------------------------

The easiest way to install the bundle is by using composer.

```console
$ composer require fairlane/cookie-consent-bundle"
```

This command requires you to have Composer installed globally, as explained
in the [installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

Step 2: Enable the Bundle
-------------------------

Then, enable the bundle by adding it to the list of registered bundles
in the `app/AppKernel.php` file of your project:

```php
<?php
// app/AppKernel.php

// ...
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            // ...
            new Fairlane\CookieConsentBundle\FairlaneCookieConsentBundle(),
        );

        // ...
    }

    // ...
}
```
Step 3: Configure bundle
------------------------

This bundle has few simple configurations. To see the list configuration options run following command:

```console
$ bin/console config:dump-reference fairlane_cookie_consent
```
You must also expose the `fairlane_cookie_consent.twig` service globally.
```yaml
twig:
    // ...
    globals:
      // ...
      fairlane_cookie_consent: '@fairlane_cookie_consent.twig'
```

Your config should look something like this.

```yaml
# Fairlane Cookie Consent configuration
fairlane_cookie_consent:
    active: true
    use_bootstrap: true
    use_jquery: true
    translate: false
    cookie_lifetime: 365 # days
    twig:
        text_info: 'This site uses cookies for...'
        text_accept_button: 'OK'
        text_additional_info_link: 'Read more about our cookie policy from here'
        url_additional_info: 'https://yourdomain/your-cookie-policy'

twig:
    globals:
      fairlane_cookie_consent: '@fairlane_cookie_consent.twig'
```

Step 4: Style the cookie notification
-------------------------------------
The id of the div `fairlane-cookie-consent`. Feel free to style it as you please. If you set the `use_bootsrap` to true 
the extension will add `navbar navbar-fixed-top` classes to the div and `btn btn-primary` classes to the button.

If you set `use_jquery` to `true` acceptance of cookies is sent via ajax call & the div fades out. Otherwise you need to 
handle calling the `Cookie:accept` (route id: `fairlane_cookie_consent_accept`) by yourself. This route only accepts
POST requests.

ToDo
====
* Improve & enrich the instructions
