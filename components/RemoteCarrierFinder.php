<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/12/17
 * Time: 2:08 AM
 */

namespace app\components;


use yii\base\Component;

class RemoteCarrierFinder extends Component
{

    public function find($rawMobile)
    {
        $shellString = "curl -s https://www.mobilephonechecker.co.uk/guides/network-checker/$rawMobile | grep \"We've successfully matched\"";
        $rawOutput = shell_exec($shellString);
        $rawOutput = strip_tags($rawOutput);
        $mobileNumContainer = "";
        $carrierContainer = "";
        sscanf($rawOutput, "We've successfully matched %f to the %[^\t\n]",$mobileNumContainer,$carrierContainer);
        $carrierContainer = substr($carrierContainer,  0,strpos($carrierContainer, "network"));
        $carrierContainer = ltrim($carrierContainer);
        $carrierContainer = rtrim($carrierContainer);
        if (empty($carrierContainer)) {
            $carrierContainer = 'unknown';
        }
        return [
            'mobile'=> '0'.$mobileNumContainer,
            'carrier'=>$carrierContainer
        ];

    }
} 