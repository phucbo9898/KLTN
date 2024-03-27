<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Kreait\Firebase\Factory;

class UploadImageToFirebase extends BaseService
{
    protected $fireStore;
    protected $storage;
    public function __construct()
    {
        $factory = (new Factory())->withServiceAccount(__DIR__ . '/upload-image-78c73-firebase-adminsdk-4sz41-71b5cbdd83.json');
        $this->fireStore = $factory->createFirestore();
        $this->storage = $factory->createStorage();
    }
    public function upload($image, $collection)
    {
        try {
            $parts = explode(";base64,", $image);
            $base64 = base64_decode($parts[1]);
            $type_aux = explode("image/", $parts[0]);
            $type = $type_aux[1];
            $uploadImage = $this->fireStore->database()->collection($collection)->document(Str::random(20) . '.' . $type);
            $firebase_storage_path = $collection . '/';
            $name = $uploadImage->id();
            if (!file_exists(public_path('firebase-temp-uploads'))) {
                mkdir(public_path('firebase-temp-uploads'), 0770);
            }
            $localFolder = public_path('firebase-temp-uploads') .'/';
            if (file_put_contents($localFolder . $name, $base64)) {
                $uploadedFile = fopen($localFolder.$name, 'r');
                $bucket = $this->storage->getBucket();
                $bucket->upload($uploadedFile, ['name' => $firebase_storage_path . $name]);
                $imageUrl = $this->storage->getBucket()->object($firebase_storage_path . $name)->signedUrl(strtotime(Carbon::now()->addYear(1000)));
                unlink($localFolder . $name);
                return $imageUrl;
            }
        } catch (\Exception $exception) {
            Log::debug($exception->getMessage());
        }
    }
}
