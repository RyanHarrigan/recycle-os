<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class ApiController extends AbstractController
{
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
        $bin = base64_decode($file['img']);
        echo sprintf('  <img src="data:image/png;base64, %s" alt="Red dot" />', $bin);
        dd($bin);
       // Load GD resource from binary data
        $im = imageCreateFromString($bin);

        // Make sure that the GD library was able to load the image
        // This is important, because you should not miss corrupted or unsupported images
        if ($im === false) {
            die('Base64 value is not a valid image');
        }

        // Specify the location where you want to save the image
        $img_file = $this->getParameter('kernel.project_dir') . '/public/images/recycle/' . $file['filename'];

        return imagejpeg($im, $img_file, -1);
    }
}
