<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiController extends AbstractController
{

    private $error;

    /**
     * @Route("/api", name="api")
     */
    public function index()
    {
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    /**
     * @Route("/api/recycle/image/{name}", name="recycle_upload")
     */
    public function img_upload($name, Request $request)
    {
        $fileinfo = $this->extractDataFromFileName($name);
        $target_dir = "uploads/";
        if ($this->saveUpload($fileinfo) !== false) {
                // echo sprintf('<img src="%s" />', '/images/recycle' . $fileinfo['filename']);
        } 

        return $this->json(['uploaded' => $name, 'url' => $this->getParameter('kernel.project_dir') . '/public/recycle/uploads/' . $name]);
    }
    /**
     * @Route("/api/recycle/image/", name="recycle_json_upload")
     */
    public function json_upload(Request $request)
    {
        dd($_FILES);
        if ($request->headers->get('Content-Type') === 'application/json') {
            $data = json_decode($request->getContent());


            dd($data);
            $fileinfo = $this->extractDataFromFileName($data->file);
            $fileinfo['img'] = $data->img;

            if ($this->saveUpload($fileinfo) !== false) {
                echo sprintf('<img src="%s" />', '/images/recycle' . $fileinfo['filename']);
            }
        } 
        else {
            dd('opps');
            /** @var UploadedFile $uploadedFile */
            $uploadedFile = $request->files->get('reference');
        }
        return $this->render('api/index.html.twig', [
            'controller_name' => 'ApiController',
        ]);
    }

    private function extractDataFromFileName(string $filename): ?array {
        $dataFrmName = explode('_', $filename);
        $data = [];
        if ($dataFrmName !== false) {
            $data['id'] = pathinfo($dataFrmName[1], PATHINFO_FILENAME);
            $data['timestamp'] = $dataFrmName[0];
            $data['filename'] = $filename;
        }

        return $data;
    }

    private function saveUpload($file): bool {
        $uploadOk = true;
        $filename = $this->getParameter('kernel.project_dir') . '/public/recycle/uploads/' . $file['filename'];
        $target_file = basename($filename);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if (getimagesize($_FILES["file"]["tmp_name"]) !== false) {
            $uploadOk = true;
        } else {
            $uploadOk = false;
        }
        if (file_exists($filename)) {
            $this->error[] = "Sorry, file already exists.";
            $uploadOk = false;
        }
        // Check file size
        if ($_FILES["file"]["size"] > 500000) {
            $this->error[] = "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            $this->error = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = false;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk !== false) {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $filename)) {
                $uploaded = true;
            } else {
                $uploaded = false;
            }
        }

        return $uploaded;
    }

}
