<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014
 * @package yii2-slider
 * @version 1.3.1
 */

namespace kartik\slider;

use yii\base\InvalidConfigException;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;

/**
 * An extended slider input for Bootstrap 3 based
 * on bootstrap-slider plugin.
 *
 * @see https://github.com/seiyria/bootstrap-slider
 * @see http://www.eyecon.ro/bootstrap-slider/
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class Slider extends \kartik\base\InputWidget
{
    const TYPE_GREY = '#bababa';
    const TYPE_PRIMARY = '#428bca';
    const TYPE_INFO = '#5bc0de';
    const TYPE_SUCCESS = '#5cb85c';
    const TYPE_DANGER = '#d9534f';
    const TYPE_WARNING = '#f0ad4e';

    /**
     * @inherit doc
     */
    protected $_pluginName = 'slider';

    /**
     * @var bool whether another conflicting Slider plugin like JUI slider exists on the
     * same page. If set to `true` the plugin will use a different namespace. If you have 
     * the full jQuery UI assets loaded on the page you should set this to `true`.
     */
    public $pluginConflict = false;

    /**
     * @var string background color for the slider handle
     */
    public $handleColor;

    /**
     * @var string background color for the slider selection
     */
    public $sliderColor;

    /**
     * @var bool whether input is disabled
     */
    private $_isDisabled = false;

    /**
     * Initializes the widget
     */
    public function init()
    {
        parent::init();
        $this->_pluginName = $this->pluginConflict ? 'bootstrapSlider' : 'slider';

        if (!empty($this->value) || $this->value === 0) {
            if (is_array($this->value)) {
                throw new InvalidConfigException("Value cannot be passed as an array. If you wish to setup a range slider, pass the two values together as strings separated with a ',' sign.");
            }
            if (strpos($this->value, ',') > 0) {
                $values = explode(',', $this->value);
                static::validateValue($values[0]);
                static::validateValue($values[1]);
                $this->pluginOptions['value'] = [(float)$values[0], (float)$values[1]];
                $this->pluginOptions['range'] = true;
            } else {
                static::validateValue($this->value);
                $this->pluginOptions['value'] = (float)$this->value;
            }
        } else {
            // initialize value
            $this->pluginOptions['value'] = null;
        }

        Html::addCssClass($this->options, 'form-control');

        // initialize if disabled
        $this->_isDisabled = ((!empty($this->options['disabled']) && $this->options['disabled']) ||
            (!empty($this->options['readonly']) && $this->options['readonly']));
        if ($this->_isDisabled) {
            $this->pluginOptions['enabled'] = false;
        }

        $this->registerAssets();
        echo $this->getInput('textInput');
    }

    /**
     * Validates the input value
     *
     * @param $value
     * @throws \yii\base\InvalidConfigException
     */
    protected static function validateValue($value)
    {
        if (!is_numeric($value)) {
            throw new InvalidConfigException("Invalid value '{$value}' passed. Only numeric values allowed.");
        }
    }

    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        SliderAsset::register($view);

        // register plugin
        $id = "$('#" . $this->options['id'] . "')";
        $this->pluginOptions['id'] = $this->options['id'] . '-slider';
        $this->registerPlugin($this->_pluginName);

        // register CSS styles
        $cssStyle = null;
        if (!empty($this->handleColor) && !$this->_isDisabled) {
            $isTriangle = (!empty($this->pluginOptions['handle']) && $this->pluginOptions['handle'] == 'triangle');
            $cssStyle = $this->getCssColor('handle', $this->handleColor, $isTriangle);
        }
        if (!empty($this->sliderColor) && !$this->_isDisabled) {
            $cssStyle .= $this->getCssColor('selection', $this->sliderColor);
        }
        if ($cssStyle != null && !$this->_isDisabled) {
            $view->registerCss($cssStyle);
        }

        // trigger change event on slider stop, so that client validation
        // is triggered for yii active fields
        $view->registerJs("{$id}.on('slideStop', function(){{$id}.trigger('change')});");
    }

    /**
     * Gets the css background style for a slider element type
     *
     * @param string $type the element type ('handle' or 'selection')
     * @param string $color the hex color string
     * @param bool $isTriangle whether the handle displayed is of triangle shape.
     * @return string
     */
    protected function getCssColor($type, $color, $isTriangle = false)
    {
        $feature = $isTriangle ? 'border-bottom-color' : 'background';
        return "#" . $this->pluginOptions['id'] . " .slider-{$type}{{$feature}:{$color}}";
    }
}
