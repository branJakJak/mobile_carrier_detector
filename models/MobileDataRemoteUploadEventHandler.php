<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/12/17
 * Time: 1:20 AM
 */

namespace app\models;


use yii\base\Event;

class MobileDataRemoteUploadEventHandler {
    /**
     * @param $event
     * @return bool
     */
    public function handle($event){
        $fileoutput = $event->data;
        echo "$fileoutput";
//        `cat $fileoutput | xargs -n1 curl -s  &`;
        echo "Done";
        die();
        return true;
    }
}