<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use App\Models\Image;

class EncryptionController extends Controller
{
    //
    protected $key;
    function __construct(){
        $this->key = "p�Vi_@yF]��_�����3�SIr�Bo�";
    }
    public function textEncrypt(Request $request)
    {

        set_time_limit(3000); // Set the maximum execution time to 3000 seconds

        $text = $request->textAreaValue;

        $encryptionKey = config('app.key'); // Use the Laravel app key as the encryption key

        $encryptedText = encrypt($text, $encryptionKey);


        return response()->json($encryptedText);

    }

    public function textDecrypt(Request $request)
    {

        set_time_limit(3000); // تعيين الوقت الأقصى لتنفيذ البرنامج إلى 3000 ثانية

        $encryptionKey = config('app.key'); // Use the Laravel app key as the encryption key

        $text = $request->DectextareaValue;


        $decryptedText = decrypt($text, $encryptionKey, $request->input('way'));



        return response()->json($decryptedText);
    }

    public function encryptImage(Request $request)
    {
        $data = $request->validate([
            'file' => 'required|image'
        ]);
        $image= $request->file('file');
        $key = $this->key;
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $encryptedImage = openssl_encrypt(file_get_contents($image->getRealPath()), 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
        
        $encryptedData = base64_encode($iv . $encryptedImage); 
        $encryptedPath = 'temp' . uniqid() . $image->getClientOriginalName();
        $path = Storage::put("encrypted/$encryptedPath", $encryptedData);
        $downloadLink = Storage::url("encrypted/".$encryptedPath);
        return response()->json([
                'download_link' => $downloadLink
        ]);

    }

    public function decryptImage(Request $request)
    {
        $data = $request->validate([
            'file' => 'required'
        ]);
    
        $key = $this->key;
        $encryptedPath = $request->file('file');
        $encryptedData = file_get_contents($encryptedPath->getRealPath()); 
        $encryptedData = base64_decode($encryptedData); 
        $iv = substr($encryptedData, 0, openssl_cipher_iv_length('aes-256-cbc')); 
        $encryptedImage = substr($encryptedData, openssl_cipher_iv_length('aes-256-cbc'));
        $decryptedImage = openssl_decrypt($encryptedImage, 'aes-256-cbc', $key, OPENSSL_RAW_DATA, $iv);
    
        $decryptedPath = 'decrypted_'. uniqid() . $encryptedPath->getClientOriginalName();
        $path = Storage::put("decrypted/$decryptedPath", $decryptedImage);
        $downloadLink = Storage::url("decrypted/".$decryptedPath);
        $image = Image::create([
            "image"=>$downloadLink,
            "user_id"=>auth()->id()
        ]);
        return response()->json([
            'image' => $downloadLink
        ]);
    }

}