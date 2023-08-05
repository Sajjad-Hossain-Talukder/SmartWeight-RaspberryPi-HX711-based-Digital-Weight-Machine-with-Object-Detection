<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use PDF;
use Intervention\Image\Facades\Image;

class admin extends Controller
{
    //
    public function home(){
        return view('index');
    }

    public function weight(){
        $fg = DB::table('calibration')->select('status')->where('id',1)->get();
        
        
        $cus = DB::table('customer')->count();
        $cus += 1 ;

        $row = DB::table('sell_details')->select([
            'id','product','weight','price' 
        ])->where('cid',$cus)->get();

        $sz =  DB::table('sell_details')->where('cid',$cus)->count();

        return view('weight',['cal' => $fg[0]->status , 'row'=> $row , 'sz'=>$sz ]);
    }

    public function calib(){
        return view('calib',['suc' => 'first']);
    }

    public function check_calib(Request $req){
        $val = (float) $req->val; 
        //dd(gettype($val));
        $process = new Process(['/usr/bin/python3','/home/shakib/WebApp/SmartWeight/app/python/calib.py']);
        $process->run();
        
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }
        
        $data = $process->getOutput();
        if($data == "TareU\n"){
            $data = 'u';
            return view('calib',['suc' => $data] );
        }
        else {
            $data = trim($data);
            $data = (float) $data ; 
            $ratio  = $data / $val ;
            DB::table('calibration')->where('id', 1)
            ->update([
                'status' => 1 ,
                'ratio' => $ratio
            ]); 
            return view('calib',['suc' => 1 ] );
        }
        
    }

    public function measure(){
        $fg = DB::table('calibration')->select('ratio')->where('id',1)->get();
        $ratio = $fg[0]->ratio ; 

        $process = new Process(['/usr/bin/python3','/home/shakib/WebApp/SmartWeight/app/python/weight.py']);
        $process->run();
        
        if (!$process->isSuccessful()) {
            return view('measurement',['detect' => '0' , 'weight' => $mes ]); 
        }
        
        $weight = $process->getOutput();
        $weight = trim($weight);
        $weight = (float)($weight);

        $mes = $weight / $ratio ; 
        //dd($mes);

        $process = new Process(['/usr/bin/python3','/home/shakib/WebApp/SmartWeight/app/python/detect_object.py']);
        $process->run();

        
        if (!$process->isSuccessful()) {
            //dd('UNS');
            return view('measurement',['detect' => '0' , 'weight' => $mes ]); 
        }
        
        
        $object = $process->getOutput();
        //dd($object);
        $object = trim($object);
        if(($object=='orange'||$object=='banana'||$object=='garlic'||$object=='potato'|| $object=='onion')&& $mes>0){
            return view('measurement',['detect' => $object , 'weight' => $mes ]); 
        }
        else return view('measurement',['detect' => '0' , 'weight' => $mes ]); 
         
    }   

    public function add_to_cart(Request $req){
        $ob = $req->detect; 
        $wt = $req->weight ; 

        $cus = DB::table('customer')->count();
        $cus += 1 ;

        $unitprice = DB::table('products_price_list')
        ->select('product_price')
        ->where('product_name',$ob)
        ->get();
        $unitprice = $unitprice[0]->product_price ; 

        //dd($unitprice);

        $price = $unitprice/1000.0*$wt;

        DB::table('sell_details')->insert([
            'cid' => $cus,
            'product' => $ob,
            'weight' => $wt,
            'price' => $price  
        ]);
        return redirect(url('weight'));
    }

    public function generatePDF(){
        $cus = DB::table('customer')->count();
        $cus += 1 ;


        $row = DB::table('sell_details')->select([
            'product','weight','price' 
        ])->where('cid',$cus)->get();

        $sum = DB::table('sell_details')->sum('price');
        DB::table('customer')->insert([
            'name' => 'X',
        ]);

        $view = view('print',[ 'row'=> $row , 'sum' => $sum ] )->render();
        $pdf = new Dompdf();
        $pdf->loadHtml($view);
        $pdf->setPaper('A4');
        $pdf->render();
        return $pdf->stream('invoice.pdf');
    }

    public function decalibrate(){
        DB::table('calibration')->where('id',1)
        ->update([
            'status' => 0 ,
        ]);
        return redirect(url('/'));
    }

    public function delete($id){
        DB::table('sell_details')->where('id', $id)->delete();
        return redirect('weight');
    }

    public function checkout(){
        $cus = DB::table('customer')->count();
        $cus += 1 ;

        
        $row = DB::table('sell_details')->select([
            'product','weight','price' 
        ])->where('cid',$cus)->get();
        
        $sum = DB::table('sell_details')->where('cid',$cus)->sum('price');
        
        return view('checkout',[ 'row'=> $row , 'sum' => $sum ]);


    }
    public function print(){

        $imagePath = public_path('images/puc.png');

        $image = Image::make($imagePath)->resize(200, null, function ($constraint) {
            $constraint->aspectRatio();
        });

        $cus = DB::table('customer')->count();
        $cus += 1 ;

        //dd($cus);
        $row = DB::table('sell_details')->select([
            'product','weight','price' 
        ])->where('cid',$cus)->get();
        
        $sum = DB::table('sell_details')->where('cid',$cus)->sum('price');
        //dd($sum);
        DB::table('customer')->insert([
           'name' => 'X',
        ]);
    

        $pdf = PDF::loadView('print',[ 'image'=> $image, 'row'=> $row , 'sum' => $sum ] );
        $id = (string)($cus);
        $name = 'Invoice_'.$id.'.pdf';
        return $pdf->download($name);
    }

}

?>
    
