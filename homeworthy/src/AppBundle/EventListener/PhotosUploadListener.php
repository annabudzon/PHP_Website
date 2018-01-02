<?php
/**
 * Created by PhpStorm.
 * User: Ania
 * Date: 2017-12-13
 * Time: 09:37
 */

namespace AppBundle\EventListener;

use AppBundle\Entity\FlatRent;
use AppBundle\Entity\FlatSale;
use AppBundle\Entity\Photo;
use AppBundle\Entity\RoomRent;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use AppBundle\Service\FileUploader;

class PhotosUploadListener
{
    private $uploader;

    public function __construct(FileUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    private function uploadFile($entity)
    {

        if($entity instanceof RoomRent) {
            $images = $entity->getRoomPhotos();
        }else if($entity instanceof FlatRent){
            $images = $entity->getFlatPhotos();
        }else if($entity instanceof FlatSale){
            $images = $entity->getFlatPhotos();
        }else{
            return;
        }

        /*foreach($images as $image){
            if($image->getPhoto() instanceof UploadedFile){
                $imageName = $this->uploader->upload($image->getPhoto(), '%kernel.root_dir%/web/uploads/images');

                // to avoid persisting FileObject in DB
                $entity->removePhoto($image);

                $postImage = new Photo();
                $postImage->setPhoto($imageName);

                if($entity instanceof RoomRent) {
                   $postImage->setRoomRental($entity);
                   $entity->addPhoto($postImage);
                }else if($entity instanceof FlatRent){
                    $postImage->setFlatRental($entity);
                    $entity->addPhoto($postImage);
                }else if($entity instanceof FlatSale) {
                    $postImage->setFlatSale($entity);
                    $entity->addFlatPhoto($postImage);
                }
            }
        }*/

    }
}