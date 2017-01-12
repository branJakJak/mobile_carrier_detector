<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 1/12/17
 * Time: 12:26 AM
 */

namespace app\models;


use yii\base\Model;
use yii\web\UploadedFile;

class UploadMobileNumbersForm extends Model{
    const NEW_MOBILE_UPLOAD = 'NEW_MOBILE_UPLOAD';
    /**
     * @var $rawFile UploadedFile
     */
    public $rawFile;

    public function attributeLabels()
    {
        return [
            'rawFile'=>'file'
        ];
    }
    public function rules(){
        return [
            ['rawFile', 'required'],
            [['rawFile'], 'file', 'extensions' => 'csv'],
        ];
    }

    /**
     * @return string
     */
    public function save()
    {
        $groupName = $this->rawFile->name;
        /*create outputfile*/
        $outputFile = \Yii::getAlias("@app/uploaded/") . $groupName . '-' . uniqid() . '.'.$this->rawFile->extension;
        $uploadedFileRes = fopen($this->rawFile->tempName, 'r+');
        while (!feof($uploadedFileRes)) {
            $currentLine = fgets($uploadedFileRes);
            $urlTemplate = \Yii::$app->params['urlTemplate'];
            $outputLine = sprintf($urlTemplate, $groupName, $currentLine);
            file_put_contents($outputFile, $outputLine, FILE_APPEND);
        }
        fclose($uploadedFileRes);
        return $outputFile;
    }
}