<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014
 * @package yii2-slider
 * @version 1.0.0
 */

namespace kartik\slider;
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
class Slider extends \kartik\widgets\InputWidget
{
    /**
     * Initializes the widget
     */
    public function init()
    {
        parent::init();
        echo $this->getInput('textInput');
        $this->registerAssets();
    }
    
    /**
     * Registers the needed assets
     */
    public function registerAssets()
    {
        $view = $this->getView();
        SliderAsset::register($view);
        $id = "$('#" . $this->options['id'] . "')";
        $this->registerPlugin('slider');
    }
}