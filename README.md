yii2-slider
=================

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

> NOTE: This extension depends on the [kartik-v/yii2-widgets](https://github.com/kartik-v/yii2-widgets) extension which in turn depends on the 
[yiisoft/yii2-bootstrap](https://github.com/yiisoft/yii2/tree/master/extensions/bootstrap) extension. Check the 
[composer.json](https://github.com/kartik-v/yii2-slider/blob/master/composer.json) for this extension's requirements and dependencies. 
Note: Yii 2 framework is still in active development, and until a fully stable Yii2 release, your core yii2-bootstrap packages (and its dependencies) 
may be updated when you install or update this extension. You may need to lock your composer package versions for your specific app, and test 
for extension break if you do not wish to auto update dependencies.

### Demo
You can see detailed [documentation](http://demos.krajee.com/slider) on usage of the extension.

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

> Note: You must set the `minimum-stability` to `dev` in the **composer.json** file in your application root folder before installation of this extension.

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