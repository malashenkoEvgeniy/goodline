<?php

namespace App\Http\Controllers\Frontend\Forms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Settings;
use App\Models\Feedback;


class BasicFormController extends Controller
{
    public function sendForm(Request $request){

        Feedback::create(request()->except('_token'));

        $req = $request->except('_token', '_method');

        $settings = Settings::find(1);
        $to = $settings->email_for_forms;


        $title = 'Goodline Форма зворотного зв\'язку';
        $message = '
            <html>
                <head>
                    <title>'.$req['name']. '-' .$req['phone'].'</title>
                    <meta charset="utf8">
                </head>
                <body>
                    <p>Имя:  '.$req['name'].'</p>
                    <p>Email:  '.$req['email'].'</p>
                    <p>Телефон:  '.$req['phone'].'</p>
                    <p>Сообщение:  '.$req['message'].'</p>
                </body>
            </html>
        ';

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf8';
        $headers[] = 'To: Receiver <'.$to.'>';
        $headers[] = 'From: Goodline <goodline@gmail.com>';
        $result = mail($to, $title, $message, implode("\r\n", $headers));
    }


    public function  sendFormProducts(Request $request){

        Feedback::create(request()->except('_token'));

        $req = $request->except('_token', '_method');

        $settings = Settings::find(1);
        $to = $settings->email_for_forms;

        $product = Product::find($req['product_id']);
        $title = 'Goodline Дізнатися вартість товару';
        $message = '
            <html>
                <head>
                    <title>'.$req['name']. '-' .$req['phone'].'</title>
                    <meta charset="utf8">
                </head>
                <body>
                    <p>Iм\'я:  '.$req['name'].'</p>
                    <p>Email:  '.$req['email'].'</p>
                    <p>Телефон:  '.$req['phone'].'</p>
                    <p>Повідомлення:  '.$req['message'].'</p>
                    <p>Продукт:  '. $product->translate()->title .'</p>

                </body>
            </html>
        ';

        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=utf8';
        $headers[] = 'To: Receiver <'.$to.'>';
        $headers[] = 'From: Goodline <goodline@gmail.com>';
        $result = mail($to, $title, $message, implode("\r\n", $headers));
    }



}
