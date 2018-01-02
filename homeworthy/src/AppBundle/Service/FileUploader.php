<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-12-13
 * Time: 09:24
 */

namespace AppBundle\Service;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploader
{
    private $targetDir;

    public function __construct($targetDir)
    {
        $this->targetDir = $targetDir;
    }

    public function upload(UploadedFile $file)
    {


        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        //$file->move($targetDir, $fileName);

        return $fileName;
    }

    public function getTargetDir()
    {
        return $this->targetDir;
    }
}