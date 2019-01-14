<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
use Session;
class ItemController extends Controller
{
    public function itemCategory()
    {
    	return view('admin.add_category');
    }

    public function saveCategory(Request $request)
    {
    	// return $request->all();
    	DB::table('tbl_category')
    			->insertGetId([
    				'category_name' => $request->category_name
    			]);

    	Session::put('message','Category added Succesfully');
    	return view('admin.add_category');		
    }

    public function allCategory()
    {
    	$Allcategory = DB::table('tbl_category')->get();
    	return view('admin.all_category',compact('Allcategory'));
    }

    public function addBrand()
    {
    	return view('admin.add_brand');
    }

     public function saveBrand(Request $request)
    {
    	// return $request->all();
    	DB::table('tbl_brand')
    			->insertGetId([
    				'brand_name' => $request->brand_name
    			]);

    	Session::put('message','Brand added Succesfully');
    	return view('admin.add_brand');		
    }

    public function allBrand()
    {
    	$Allbrand = DB::table('tbl_brand')->get();
    	return view('admin.all_brand',compact('Allbrand'));
    }

    public function editBrand()
    {
        return view('admin.edit_brand');
    }

     public function addSupplier()
    {
    	return view('admin.add_supplier');
    }

     public function saveSupplier(Request $request)
    {
    	// return $request->all();
    	DB::table('tbl_supplier')
    			->insertGetId([
    				'supplier_name' => $request->supplier_name
    			]);

    	Session::put('message','Supplier added Succesfully');
    	return view('admin.add_supplier');		
    }

    public function allSupplier()
    {
    	$Allsupplier = DB::table('tbl_supplier')->get();
    	return view('admin.all_supplier',compact('Allsupplier'));
    }

     public function addItem()
    {
    	return view('admin.add_item');
    }

 	public function saveItem(Request $request)
 	{
					
			$insert = DB::table('tbl_iteminfo')
					->insertGetId([
						'item_name' => $request->item_name,
						'category_id' => $request->category_id,
						'brand_id' => $request->brand_id,
                        'supplier_id' => $request->supplier_id,
						'item_quantity' => $request->item_quantity,
						'item_description' => $request->item_description,
						'item_price' => $request->item_price
					]);	

                if ($insert) {
                    $imageName = date('ymdhis').'-'.rand(200,2000).'-'.$insert.'.jpg';
                    $destination = 'public/images/'.$imageName;
                    move_uploaded_file($request->item_image,$destination);
                    $this->imageResize($destination);
                    DB::table('tbl_iteminfo')
                            ->where('item_id',$insert)
                            ->update([
                                'item_image' =>$imageName
                            ]);
                    }
                    Session::put('message','Item data insert successfully');
                    return redirect('add-item');
    }

     public function imageResize($file_name)
            {
                $fileName = $file_name;
                $destination = $file_name;
                list($width, $height) = getimagesize($fileName);
                $newwidth = '100';
                $newheight = '100';

                // Load
                $thumb = imagecreatetruecolor($newwidth, $newheight);
                $source = imagecreatefromjpeg($fileName);

                // Resize
                imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

                // Output
                imagejpeg($thumb,$destination);
                imagedestroy($thumb);
                return;
            } 
    public function allItem()
    {
       $allItem =  DB::table('tbl_iteminfo')
        ->join('tbl_category','tbl_category.category_id','=','tbl_iteminfo.category_id')
        ->join('tbl_brand','tbl_brand.brand_id','=','tbl_iteminfo.brand_id')
        ->join('tbl_supplier','tbl_supplier.supplier_id','=','tbl_iteminfo.supplier_id')
        ->select('tbl_iteminfo.*','tbl_category.category_name','tbl_brand.brand_name','tbl_supplier.supplier_name')
        ->get();

        return view('admin.all_item',compact('allItem'));
    }  
    
    public function itemSale($id)
    {

        $allItem =  DB::table('tbl_iteminfo')
            ->where('item_id',$id)
            ->first();
        // echo '<pre>';
        // print_r($allItem);
        // exit();
          $itemInfo = [];
                $itemInfo['item_id'] = $allItem->item_id;
                $itemInfo['item_name'] = $allItem->item_name;
                $itemInfo['item_quantity'] = $allItem->item_quantity;
                $itemInfo['sale_quantity'] = 1;
                $itemInfo['item_price'] = $allItem->item_price;
                $itemInfo['total'] = $itemInfo['sale_quantity'] * $itemInfo['item_price'];
                $itemInfo = (object) $itemInfo;
                // echo '<pre>';
                // print_r($itemInfo);
                // exit();
                Session::put("itemInfo.$allItem->item_id",$itemInfo);
                return view('admin.item_sale');
    }

    public function updateSale(Request $request,$id)
    {
        
         $allItem =  DB::table('tbl_iteminfo')
            ->where('item_id',$id)
            ->first();
          $itemInfo = [];
                $itemInfo['item_id'] = $allItem->item_id;
                $itemInfo['item_name'] = $allItem->item_name;
                $itemInfo['item_quantity'] = $allItem->item_quantity;
                $itemInfo['sale_quantity'] = $request->update_quantity;
                if ($itemInfo['sale_quantity'] > $itemInfo['item_quantity']) {
                    $itemInfo['sale_quantity'] = $itemInfo['item_quantity'];
                }
                $itemInfo['item_price'] = $allItem->item_price;
                $itemInfo['total'] = $itemInfo['sale_quantity'] * $itemInfo['item_price'];
                $itemInfo = (object) $itemInfo;

                Session::put("itemInfo.$allItem->item_id",$itemInfo);
                
                 return view('admin.item_sale');
    }

    // public function saveSale()
    // {

    //      $itemInfo= Session::get("itemInfo");
    //      // echo '<pre>';
    //      // print_r($itemInfo);
    //      $totalAmount = 0;
    //      foreach ($itemInfo as $item) {
    //          $totalAmount+= $item->total;
    //      }
    //      // echo $totalAmount;

    //      // DB::table('tbl_sale')
    //      //        ->insertGet([
    //      //            'amount' => $totalAmount,
    //      //            'paid' => $totalAmount,
    //      //            'due' => 0,
    //      //        ]);
    // }

    public function completeSale(Request $request)
    {
    
        $payMent=$request->payment;
        $discount=$request->discount;

         $itemInfo= Session::get("itemInfo");
         // echo '<pre>';
         // print_r($itemInfo);
         // exit;

         $totalAmount = 0;
         foreach ($itemInfo as $item) {
             $totalAmount+= $item->total;
         }
         // echo $totalAmount;
         $itemSale = [];

         if($discount>0){   
         $itemSale['amount'] = $totalAmount;
         $itemSale['discount'] = $discount;
         $itemSale['paid'] = $payMent;
         $itemSale['due'] = $totalAmount-($discount+$payMent);
         }
         else{
         $itemSale['amount'] = $totalAmount;
         $itemSale['discount'] = $discount;
         $itemSale['paid'] = $payMent;
         $itemSale['due'] = $totalAmount-$payMent;
         }

         $Id=DB::table('tbl_sale')->insertGetId($itemSale);

         foreach ($itemInfo as $item) {
         DB::table('tbl_iteminfo')
         ->where('item_id',$item->item_id)
         ->update([
            'item_quantity'=>$item->item_quantity-$item->sale_quantity
         ]);
         
         }

         $saleInvoicId=DB::table('tbl_sale')
         ->where('sale_id',$Id)
         ->first();

          $invoiceId=DB::table('tbl_invoice')
         ->insertGetId([
            'sale_id'=>$saleInvoicId->sale_id
         ]);

         foreach ($itemInfo as $item) {
             $tblSaleId=DB::table('tbl_sale_details')
                ->insertGetId([
                    'item_id' => $item->item_id,
                    'sale_item_quantity' =>$item->sale_quantity,        
                    'price' => $item->item_price,
                    'discount' => $saleInvoicId->discount,
                    'sale_id' => $saleInvoicId->sale_id,
                    'invoice_id' =>$invoiceId,
                    //'due'=>$saleInvoicId->due,
                    'total_amount' => $saleInvoicId->amount
            ]);
         }

         foreach ($itemInfo as $item) {
          $saleInvoice=DB::table('tbl_sale_details')
         ->join('tbl_sale','tbl_sale.sale_id','=','tbl_sale_details.sale_id')
         ->join('tbl_iteminfo','tbl_iteminfo.item_id','=','tbl_sale_details.item_id')
         ->join('tbl_invoice','tbl_invoice.sale_id','=','tbl_sale.sale_id')
         ->where('tbl_sale_details.sale_id',$saleInvoicId->sale_id)
         ->select([
            'tbl_sale_details.*',
            'tbl_sale.paid','tbl_sale.discount',
            'tbl_sale.due',
            'tbl_iteminfo.item_name',
            'tbl_invoice.*'
            ])
            ->get();
            session::flush($itemInfo);
         return view('invoice',['saleInvoice'=>$saleInvoice,'invoiceId'=>$invoiceId]);
         
     } 

    }

    public function InvoiceSearch()
    {
        return view('invoiceSearch');
    }
    public function invoiceSearchById(Request $request)
    {
        $invId=$request->search;
        $invoiceSearchById=DB::table('tbl_invoice')
        ->where('id',$request->search)
        ->first();
        // echo '<pre>';
        // print_r($invoiceSearchById);
        // exit;
        if(!$invoiceSearchById){
            Session::flash('message','Data Not Found.');
            return redirect()->back();
        }

     $saleInvoiceSearch = DB::table('tbl_sale_details')
        ->join('tbl_sale','tbl_sale.sale_id','=','tbl_sale_details.sale_id')
        ->join('tbl_iteminfo','tbl_iteminfo.item_id','=','tbl_sale_details.item_id')
        ->join('tbl_invoice','tbl_invoice.sale_id','=','tbl_sale.sale_id')
         ->where('tbl_invoice.id',$invoiceSearchById->id)
        ->select([
            'tbl_sale_details.*',
            'tbl_sale.paid','tbl_sale.discount',
            'tbl_sale.due','tbl_iteminfo.item_name',
            'tbl_invoice.*'
        ])
        ->get();
      return view('admin.invoiceSearchPost',compact('saleInvoiceSearch','invId'));
    }

    public function itemPurchase($id)
    {
        //Session::forget('itemInfo');
        $allItem =  DB::table('tbl_iteminfo')
            ->where('item_id',$id)
            ->first();
        // echo '<pre>';
        // print_r($allItem);
        // exit();
          $itemInfo = [];
                $itemInfo['item_id'] = $allItem->item_id;
                $itemInfo['item_name'] = $allItem->item_name;
                $itemInfo['item_quantity'] = $allItem->item_quantity;
                $itemInfo['purchase_quantity'] = 1;
                $itemInfo['item_price'] = $allItem->item_price;
                $itemInfo['total'] = $itemInfo['purchase_quantity'] * $itemInfo['item_price'];
                $itemInfo = (object) $itemInfo;
                // echo '<pre>';
                // print_r($itemInfo);
                // exit();
                Session::put("itemInfo.$allItem->item_id",$itemInfo);
                return view('admin.item_purchase');
    }

        public function updatePurchase(Request $request,$id)
    {
        
         $allItem =  DB::table('tbl_iteminfo')
            ->where('item_id',$id)
            ->first();
          // echo '<pre>';
          // print_r($allItem);
          // exit;

          $itemInfo = [];
                 $itemInfo['item_id'] = $allItem->item_id;
                $itemInfo['item_name'] = $allItem->item_name;
                $itemInfo['item_quantity'] = $allItem->item_quantity;
                $itemInfo['purchase_quantity'] = $request->update_purchase_quantity;
                $itemInfo['item_price'] = $allItem->item_price;
                $itemInfo['total'] = $itemInfo['purchase_quantity'] * $itemInfo['item_price'];
                $itemInfo = (object) $itemInfo;
                 Session::put("itemInfo.$allItem->item_id",$itemInfo);
                 return view('admin.item_purchase');
    }

    public function completePurchase(Request $request)
    {
        $itemInfo = Session::get('itemInfo');
        // echo '<pre>';
        // print_r($itemInfo);
        // exit;
        $totalAmount = 0;
        foreach ($itemInfo as $item) {
            $totalAmount+=$item->total;
        }
           $discount = $request->discount; 
           $payment = $request->payment; 
           $itemPurchase = [];
           if ($discount > 0) {
               $itemPurchase['amount'] = $totalAmount;
               $itemPurchase['discount'] = $discount;
               $itemPurchase['paid'] = $payment;
               $itemPurchase['due'] = $totalAmount-($discount+$payment);
           }else{
                $itemPurchase['amount'] = $totalAmount;
               $itemPurchase['discount'] = $discount;
               $itemPurchase['paid'] = $payment;
               $itemPurchase['due'] = $totalAmount-$payment;
           }
               $itemPurchase['date'] = date('Y-m-d');
           
             $Id = DB::table('tbl_purchaseinvoice')
                     ->insertGetId($itemPurchase);

          foreach ($itemInfo as $item) {
         DB::table('tbl_iteminfo')
         ->where('item_id',$item->item_id)
         ->update([
            'item_quantity'=>$item->item_quantity+$item->purchase_quantity
         ]);
         
         }

         $purchaseInvoicId=DB::table('tbl_purchaseinvoice')
         ->where('purchase_invoice_id',$Id)
         ->first();

         $PurchaseinvoiceId = DB::table('tbl_purchase_invoice_number')
                ->insertGetId([
                    'purchase_invoice_id' => $purchaseInvoicId->purchase_invoice_id
                ]);

         foreach ($itemInfo as $item) {
             $purchaseDetails=DB::table('tbl_purchase_invoice_details')
                ->insertGetId([
                    'purchase_invoice_id' => $purchaseInvoicId->purchase_invoice_id,
                    'item_id' => $item->item_id,
                    'purchase_invoice_number_id' => $PurchaseinvoiceId,
                    'price' => $item->item_price,
                    'quantity' =>$item->purchase_quantity,
                    'discount' => $purchaseInvoicId->discount,
                    'amount' => $purchaseInvoicId->amount
            ]);

         }
         //ekhane ektu pvlm ace???
         foreach ($itemInfo as $item) {
             $purchaseDetails =  DB::table('tbl_purchase_invoice_details')
        ->join('tbl_purchaseinvoice','tbl_purchaseinvoice.purchase_invoice_id','=','tbl_purchase_invoice_details.purchase_invoice_id')
        ->join('tbl_iteminfo','tbl_iteminfo.item_id','=','tbl_purchase_invoice_details.item_id')

        ->join('tbl_purchase_invoice_number','tbl_purchase_invoice_number.purchase_invoice_id','=','tbl_purchaseinvoice.purchase_invoice_id')
        ->where('tbl_purchase_invoice_details.purchase_invoice_id',$purchaseInvoicId->purchase_invoice_id)

        ->select([
            'tbl_purchase_invoice_details.*',
            'tbl_iteminfo.item_name',
            'tbl_purchaseinvoice.paid',
            'tbl_purchaseinvoice.due',
            'tbl_purchase_invoice_number.*'
        ])
        //->groupby('tbl_iteminfo.item_name')
        ->get();

         }
        //    echo '<pre>';
        // print_r($purchaseDetails);
        // exit(); 
         Session::flush($itemInfo);
        return view('admin.purchaseInvoice',compact('purchaseDetails','PurchaseinvoiceId'));      
    }

    public function PurchaseinvoiceSearch()
    {
        return view('admin.purchaseInvoiceSearch');
    }
    public function PurchaseinvoiceSearchById(Request $request)
    {
        //return $request->all();
        $searchId = $request->search;
       $InvoiceSearchId = DB::table('tbl_purchase_invoice_number')
                ->where('purchase_invoice_number_id', $searchId)
                 ->first();

        if (!$InvoiceSearchId) {
            Session::flash('message',"Data Not found");
            return redirect()->back();         
                 }         
            //ekhane ektu pvlm ace???

             $purchaseDetails =  DB::table('tbl_purchase_invoice_details')
        ->join('tbl_purchaseinvoice','tbl_purchaseinvoice.purchase_invoice_id','=','tbl_purchase_invoice_details.purchase_invoice_id')
        ->join('tbl_iteminfo','tbl_iteminfo.item_id','=','tbl_purchase_invoice_details.item_id')

        ->join('tbl_purchase_invoice_number','tbl_purchase_invoice_number.purchase_invoice_id','=','tbl_purchaseinvoice.purchase_invoice_id')
        ->where('tbl_purchase_invoice_details.purchase_invoice_id',$InvoiceSearchId->purchase_invoice_id)

        ->select([
            'tbl_purchase_invoice_details.*',
            'tbl_iteminfo.item_name',
            'tbl_purchaseinvoice.paid',
            'tbl_purchaseinvoice.due',
            'tbl_purchase_invoice_number.*'
        ])
        //->groupby('tbl_iteminfo.item_name')
        ->get(); 
        return view('admin.PurchaseinvoiceSearchDetails',compact('purchaseDetails','searchId'));       

    }


}

?>
