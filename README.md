yii2-slider
=================

[![Latest Stable Version](https://poser.pugx.org/kartik-v/yii2-slider/v/stable)](https://packagist.org/packages/kartik-v/yii2-slider)
[![License](https://poser.pugx.org/kartik-v/yii2-slider/license)](https://packagist.org/packages/kartik-v/yii2-slider)
[![Total Downloads](https://poser.pugx.org/kartik-v/yii2-slider/downloads)](https://packagist.org/packages/kartik-v/yii2-slider)
[![Monthly Downloads](https://poser.pugx.org/kartik-v/yii2-slider/d/monthly)](https://packagist.org/packages/kartik-v/yii2-slider)
[![Daily Downloads](https://poser.pugx.org/kartik-v/yii2-slider/d/daily)](https://packagist.org/packages/kartik-v/yii2-slider)

An advanced slider input for Yii Framework 2 based on [seiyria/bootstrap-slider plugin](https://github.com/seiyria/bootstrap-slider), which is a fork
of the bootstrap-slider by Stefan Petre from eyecon.ru. The slider input offers these advanced features

- vertical or horizontal orientation of slider
- setup your minimum and maximum values
- setup your step increments
- range selector (multiple handles to control the range)
- three shapes for handles
- touch capablity and support for touch devices

Additional enhancements added for this widget (by Krajee):

- allows to configure slider selection and handle colors.
- preselected styles to color your slider and handles.
- automatically trigger change of base field on slider stop to enforce Yii ActiveField validation
- automatically set plugin options based on base field value (parse array input value for range)
- automatically disable slider based on disabled/readonly options.

### Demo
You can see detailed [documentation](http://demos.krajee.com/slider) on usage of the extension.

## Latest Release
>NOTE: The latest version of the module is v1.3.1 released on 05-May-2015. Refer the [CHANGE LOG](https://github.com/kartik-v/yii2-slider/blob/master/CHANGE.md) for details.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

> NOTE: Check the [composer.json](https://github.com/kartik-v/yii2-slider/blob/master/composer.json) for this extension's requirements and dependencies. Read this [web tip /wiki](http://webtips.krajee.com/setting-composer-minimum-stability-application/) on setting the `minimum-stability` settings for your application's composer.json.

Either run

```
$ php composer.phar require kartik-v/yii2-slider "dev-master"
```

or add

```
"kartik-v/yii2-slider": "dev-master"
```

to the ```require``` section of your `composer.json` file.

## Usage

### Slider

```php
use kartik\slider\Slider;
echo Slider::widget([
    'sliderColor' => Slider::TYPE_DANGER,
    'handleColor' => Slider::TYPE_DANGER,
    'pluginOptions' => [
        'orientation' => 'horizontal',
        'handle' => 'round',
        'min' => 0,
        'max' => 255,
        'step' => 1
    ],
]); 
```

## License

**yii2-slider** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.