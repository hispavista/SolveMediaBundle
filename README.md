#SolveMediaBundle

## Installation

Installation is quick and easy, 3 steps process

1. Install SolveMediaBundle
2. Enable the bundle
3. Initialize assets

### Step 1: Install SolveMediaBundle

Add the following dependency to your composer.json file:
``` json
{
    "require": {
        "_some_packages": "...",

        "hispavista/solve-media-bundle": "dev-master"

    }
}
```

### Step 2: Enable the bundle

Finally, enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Hispavista\SolveMediaBundle\SolveMediaBundle(),
    );
}
```

### Step 3: Configure the bundle

``` yaml
hispavista_solve_media:
    challenge_key: your_challenge_key
    verification_key: your_verification_key
    autenticathion_key: your authenticacion_key


### Step 4: Use it!!
In your form type

```php
...
$builder->add('captcha', 'hispavista_solvemediacaptcha',array(
    'label' => ' ', /* Label is included in the captcha, put a blank space to hide form label*/
    'mapped' => false,
    'config' => array('theme'=> 'white', 'lang' => 'es')
 ));
...