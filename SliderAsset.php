<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2016
 * @package yii2-slider
 * @version 1.3.1
 */

namespace kartik\slider;

use kartik\base\AssetBundle;

/**
 * Slider bundle for \kartik\slider\Slider
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class SliderAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->setSourcePath(__DIR__ . '/assets');
        $this->setupAssets('css', ['css/bootstrap-slider']);
        $this->setupAssets('js', ['js/bootstrap-slider']);
        parent::init();
    }
}
