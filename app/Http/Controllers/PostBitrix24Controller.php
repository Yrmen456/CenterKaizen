<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Crest\src\CRest;

class PostBitrix24Controller extends Controller
{

   public function Submit(Request $request){

      $validated = $request->validate([
         'email' => 'required|email',
         'Телефон' => 'required|min:11|numeric',
         'Имя' =>'required|min:2|max:30',
         'Фамилия' =>'required|min:2|max:30',
         'Отчество' =>'max:30',
         'Комментарий' => 'max:500',
      ]);
      $input = $request->all();

      $email="";
      $mobile_number="";
      $surname ="";
      $name="";
      $patronymic="";
      $comment="";


      $email = ($input['email']);
      $mobile_number =($input['Телефон']);
      $surname = ($input['Фамилия']);
      $name =($input['Имя']);
      $patronymic = ($input['Отчество']);
      $comment = ($input['Комментарий']);

      CRest::call(
      'crm.lead.add',
      [
         "fields" => 
         [
            "TITLE" => "Лид с нашего сайта ".$date = date('Y-m-d H:i:s'),	// название лида
            "MYTESTPOLE" => $surname,		// фамилия ;)
            "LAST_NAME" => $surname,		// фамилия ;)
            "NAME" => $name,			      // имя ;)
            "SECOND_NAME" => $patronymic,	// отчество ;)
            "EMAIL" => array(	// email в Битрикс24 = массив, поэтому даже если передаем 1s email, то передаем его в таком формате
               "n0" => array(
                  "VALUE" =>  $email,	   //email
                  "VALUE_TYPE" => "WORK", // тип EMAIL = рабочий //HOME
               )  
            ),
            "PHONE" => array(	// телефон в Битрикс24 = массив, поэтому даже если передаем 1s номер, то передаем его в таком формате
               "n0" => array(
                  "VALUE" =>  $mobile_number,	// номер
                  "VALUE_TYPE" => "MOBILE",		// тип номера = мобильный // WORK
               ),
            ),
            "WEB" => array(	// WEB в Битрикс24 = массив, поэтому даже если передаем 1s WEB, то передаем его в таком формате
               "n0" => array(
                  "VALUE" =>  "https://laravel.su/docs/8.x/installation",	
                  "VALUE_TYPE" => "WORK",
               ),
            ),
            "UF_CRM_1680763659233" => "Тест", //Мое поле
            "COMMENTS" => $comment,
     
         ]
       
      ]);

      return redirect()->back();
  
   }
   
}