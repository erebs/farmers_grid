<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\product_category;
use App\Models\unit;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function ProdCat()
    {
        $header = "ProdCat";
        $prodcategories = product_category::get();
        return view('productcategory.prcatlist', compact('prodcategories'), ['header' => $header]);
    }
    public function AddProCat()
    {
        $header = "ProdCat";
        return view('productcategory.addprodcat', ['header' => $header]);
    }
    public function SaveProdCat(Request $request)
    {

        $image1 = $request->file('image');
        $new_name = "img/" . time() . '.' . $image1->getClientOriginalExtension();
        $image1->move(public_path('img'), $new_name);


        $prodcatsave = product_category::create([
            'title_eng' => $request->pcengtitle,
            'title_mal' => $request->pcmaltitle,
            'title_eng_mal' => $request->pcengmaltitle,
            'description_eng' => $request->pcdeseng,
            'description_mal' => $request->pcdesmal,
            'image' => $new_name,
            'featured' => $request->pcfeatured,
            'trending' => $request->pctrending,
            'dis_order' => $request->ordpcorderer
        ]);

        if ($prodcatsave) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }
        echo json_encode($data);
    }
    public function EditProdCat($id)
    {
        $header = "ProdCat";
        $productcat = product_category::find($id);
        return view('productcategory.editprocat', compact('productcat'), ['header' => $header]);
    }
    public function updateProdCat(Request $request)
    {

        $prod = product_category::where('id', $request->pcid)->first();
        $image1 = $request->file('Pimg');

        if ($image1 == '') {
            $new_name1 = $prod->image;
        } else {
            $image1 = $request->file('Pimg');
            $new_name1 = "img/" . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('img'), $new_name1);
        }

        $procatupdate = product_category::find($request->pcid)->update([
            'title_eng' => $request->edtitleenglish,
            'title_mal' => $request->edTitleMal,
            'title_eng_mal' => $request->edTitleEngMal,
            'description_eng' => $request->edDesEng,
            'description_mal' => $request->edDesMal,
            'image' => $new_name1,
            'featured' => $request->edFeatrd,
            'trending' => $request->edTrndng,
            'dis_order' => $request->edDisOrder,
            'status' => $request->pcstatus

        ]);
        if ($procatupdate) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }
        echo json_encode($data);
    }



    /////////////// products ///////////////

    public function products()
    {
        $header = "Prod";
        $products = product::get();
        return view('products.productlist', compact('products'), ['header' => $header]);
    }
    public function AddProducts()
    {
        $header = "Prod";
        $prodcategories = product_category::all();
        return view('products.addprod', compact('prodcategories'), ['header' => $header]);
    }
    public function SaveProd(Request $request)
    {

        $image1 = $request->file('image1');
        $new_name1 = "img/img1" . time() . '.' . $image1->getClientOriginalExtension();
        $image1->move(public_path('img'), $new_name1);

        $image2 = $request->file('image2');
        $new_name2 = "img/img2" . time() . '.' . $image2->getClientOriginalExtension();
        $image2->move(public_path('img'), $new_name2);

        $image3 = $request->file('image3');
        $new_name3 = "img/img3" . time() . '.' . $image3->getClientOriginalExtension();
        $image3->move(public_path('img'), $new_name3);

        $image4 = $request->file('image4');
        $new_name4 = "img/img4" . time() . '.' . $image4->getClientOriginalExtension();
        $image4->move(public_path('img'), $new_name4);


        $prodsave = product::create([
            'product_category' => $request->prodcat,
            'name_english' => $request->apenglishname,
            'name_malayalam' => $request->apmalname,
            'name_english_malayalam' => $request->apengmalname,
            'description_eng' => $request->apdeseng,
            'description_mal' => $request->apdesmal,
            'how_to_use_eng' => $request->aphweng,
            'how_to_use_mal' => $request->aphwmal,
            'image1' => $new_name1,
            'image2' => $new_name2,
            'image3' => $new_name3,
            'image4' => $new_name4,
        ]);

        $lastinsertedrow = product::latest()->first();
        $prod_id = $lastinsertedrow->id;
        $unit=unit::create([
            'prod_id'=>$prod_id,
            'name'=>$request->unitname,
            'price'=>$request->unitprice,
            'offer_price'=>$request->unitop,
            'default'=>1,
        ]);
        if ($prodsave) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }
        echo json_encode($data);
    }
    public function EditProd($id)
    {
        $header = "Prod";
        $prodcategories = product_category::all();
        $prod = product::find($id);
        return view('products.editprod', compact('prod', 'prodcategories'), ['header' => $header]);
    }
    public function updateProd(Request $request)
    {
        $prod = product::where('id', $request->prodid)->first();

        $image1 = $request->file('edimg1');

        if ($image1 == '') {
            $new_name1 = $prod->image1;
        } else {
            $image1 = $request->file('edimg1');
            $new_name1 = "img/" . time() . '.' . $image1->getClientOriginalExtension();
            $image1->move(public_path('img'), $new_name1);
        }

        $image2 = $request->file('edimg2');
        if ($image2 == '') {
            $new_name2 = $prod->image2;
        } else {
            $image2 = $request->file('edimg2');
            $new_name2 = "img/" . time() . '.' . $image2->getClientOriginalExtension();
            $image2->move(public_path('img'), $new_name2);
        }

        $image3 = $request->file('edimg3');
        if ($image3 == '') {
            $new_name3 = $prod->image3;
        } else {
            $image3 = $request->file('edimg3');
            $new_name3 = "img/" . time() . '.' . $image3->getClientOriginalExtension();
            $image3->move(public_path('img'), $new_name3);
        }

        $image4 = $request->file('edimg4');
        if ($image4 == '') {
            $new_name4 = $prod->image4;
        } else {
            $image4 = $request->file('edimg4');
            $new_name4 = "img/" . time() . '.' . $image4->getClientOriginalExtension();
            $image4->move(public_path('img'), $new_name4);
        }

        $produpdate = product::find($request->prodid)->update([
            'product_category' => $request->edprodcat,
            'name_english' => $request->epenglishname,
            'name_malayalam' => $request->epmalname,
            'name_english_malayalam' => $request->epengmalname,
            'description_eng' => $request->epdeseng,
            'description_mal' => $request->epdesmal,
            'how_to_use_eng' => $request->ephweng,
            'how_to_use_mal' => $request->ephwmal,
            'image1' => $new_name1,
            'image2' => $new_name2,
            'image3' => $new_name3,
            'image4' => $new_name4,
            'status' => $request->pstatus,
        ]);

        if ($produpdate) {
            $data['success'] = 'success';
        } else {
            $data['error'] = 'error';
        }
        echo json_encode($data);
    }

    //units
    public function units($id)
    {
        $header = "Prod";
        $units = unit::where('prod_id', $id)->get();
        return view('products.units', compact('id', 'units'), ['header' => $header]);
    }
    public function AddUnits($id)
    {
        $header = "Prod";
        return view('products.unitadd', ['header' => $header, 'id' => $id]);
    }
    public function SaveUnit(Request $request)
    {
        if ($request->def_item == 1) {
            if (unit::where('prod_id', $request->id)->where('default', 1)->exists()) {
                unit::where('prod_id', $request->id)->where('default', 1)->update([

                    'default' => 0
                ]);
                $unitsave = unit::create([
                    'prod_id' => $request->id,
                    'name' => $request->unitname,
                    'price' => $request->unitprice,
                    'offer_price' => $request->unitop,
                    'default' => $request->def_item,
                ]);
                $data['success'] = 'success';
            } else {
                $unitsave = unit::create([
                    'prod_id' => $request->id,
                    'name' => $request->unitname,
                    'price' => $request->unitprice,
                    'offer_price' => $request->unitop,
                    'default' => $request->def_item,
                ]);
                $data['success'] = 'success';
            }
        } else {
            $unitsave = unit::create([
                'prod_id' => $request->id,
                'name' => $request->unitname,
                'price' => $request->unitprice,
                'offer_price' => $request->unitop,
                'default' => $request->def_item,
            ]);
            $data['success'] = 'success';
        }
        echo json_encode($data);
    }


    public function EditUnit($id)
    {
        $header = "Prod";
        $uni = unit::find($id);
        return view('products.unitedit', compact('uni'), ['header' => $header]);
    }

    public function updateUnit(Request $request)
    {
        $unit=unit::where('id',$request->unid)->first();
        $defunit=unit::where('prod_id',$unit->prod_id)->where('default',1)->first();
        if($request->def_item==1)
        {
            if($unit->default==1)
            {
                $unitupdate = unit::find($request->unid)->update([
                    'name' => $request->edunitname,
                    'price' => $request->edunitprice,
                    'offer_price' => $request->edunitop,
                    'default' => $request->def_item,
                    'status' => $request->unistatus,
                ]);
            }
            else
            {
                $unitupdate = unit::find($request->unid)->update([
                    'name' => $request->edunitname,
                    'price' => $request->edunitprice,
                    'offer_price' => $request->edunitop,
                    'default' => $request->def_item,
                    'status' => $request->unistatus,
                ]);
                unit::find($defunit->id)->update([

                    'default' => 0,

                ]);
            }
        }
            else
            {
                $unitupdate = unit::find($request->unid)->update([
                    'name' => $request->edunitname,
                    'price' => $request->edunitprice,
                    'offer_price' => $request->edunitop,
                    'default' => $request->def_item,
                    'status' => $request->unistatus,
                ]);
            }





   $data['success'] = 'success';

     echo json_encode($data);

    }

}
