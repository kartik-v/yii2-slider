<?php

/**
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2013
 * @package yii2-slider
 * @version 1.0.0
 */

namespace kartik\slider;

/**
 * Slider bundle for \kartik\slider\Slider
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @since 1.0
 */
class DropdownXAsset extends \kartik\widgets\AssetBundle
{

    public function init()
    {
        $this->setSourcePath(__DIR__ . '/../assets');
        $this->setupAssets('css', ['css/bootstrap-slider']);
        $this->setupAssets('js', ['js/bootstrap-slider']);
        parent::init();
    }

}