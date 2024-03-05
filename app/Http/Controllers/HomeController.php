<?php

namespace App\Http\Controllers;

use App\Models\banner;
use App\Models\cart;
use App\Models\contact;
use App\Models\Custaddresss;
use App\Models\customer;
use App\Models\disease;
use App\Models\disease_category;
use App\Models\disgallary;
use App\Models\disvideo;
use App\Models\order;
use App\Models\ordereditem;
use App\Models\product;
use App\Models\product_category;
use App\Models\productdis;
use App\Models\unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function signin()
    {
        return view('homeweb.signin');
    }


    public function signUp()
    {
        return view('homeweb.signup');
    }

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'mobile' => 'required|numeric|max_digits:10|min_digits:10',
            'email' => 'required|unique:customers,email',
            'password' => 'required|confirmed|min:8',
            'password_confirmation' => 'required'
        ]);

        $user = customer::create([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);


        if ($user) {
            return redirect()->route('signin');
        } else {
            return back()->with('fail', 'something went wrong');
        }
    }

    public function check(Request $req)
    {
        $req->validate([
            'mobile' => 'required|required|numeric|max_digits:10|min_digits:10',
            'password' => 'required|min:8'
        ]);
        if (auth()->attempt([
            'mobile' => $req->mobile,
            'password' => $req->password,
        ])) {
            return redirect()->route('index');
        } else {
            return back()->with('fail', 'You have to Signup');
        }
    }

    public function UserLogout()
    {
        auth()->logout();
        return redirect()->route('signin');
    }


    public function index()
    {
        $banners = banner::where('status', 'active')->get();
        $diseasecat = disease_category::where('status', 'active')->orderBy('dis_order','asc')->get();
        $featdiseasecat = disease_category::where('status', 'active')->where('featured',1)->orderBy('dis_order','asc')->get();


        $trendproducts = product_category::where('trending', '1')->where('status', 'active')->orderBy('dis_order','asc')->latest()->paginate(8);
        $featuredproducts = product_category::where('featured', '1')->where('status', 'active')->orderBy('dis_order','asc')->latest()->paginate(8);

        return view('homeweb.index', compact('banners', 'diseasecat', 'trendproducts', 'featuredproducts','featdiseasecat'));
    }





    public function disease()
    {
        $diseases = disease::where('status', 'active')->get();
        return view('homeweb.disease', compact('diseases',));
    }

    public function disSingle($id)
    {
        $dis = disease::find($id);
        $productdis = productdis::where('dis_id', $id)->where('status', 'active')->get();
        $disgallary=disgallary::where('dis_id',$id)->where('status','active')->get();
        $disvideo=disvideo::where('dis_id',$id)->where('status','active')->get();
        return view('homeweb.diseasesingle', compact('dis', 'productdis','disgallary','disvideo'));
    }





    public function diseasecat($id)
    {
        $discat = disease_category::find($id);
        $diseases = disease::where('disease_category', $id)->where('status', 'active')->get();
        return view('homeweb.discatsingle', compact('discat', 'diseases'));
    }






    public function product()
    {
        $products = product::where('status', 'active')->get();
        return view('homeweb.products', compact('products'));
    }

    public function trndproduct()
    {
        $trendingprods = product_category::where('trending', '1')->where('status', 'active')->get();
        return view('homeweb.trndproduct', compact('trendingprods'));
    }
    public function featrdproduct()
    {
        $featrdprods = product_category::where('featured', '1')->where('status', 'active')->get();
        return view('homeweb.featrdproduct', compact('featrdprods'));
    }

    public function prodSingle($id)
    {
        $prod = product::find($id);
        $productdis = productdis::where('prod_id', $id)->where('status', 'active')->get();

        $defaultunit = unit::where('prod_id', $id)->where('default', '1')->first();     //////     default unitt    ////////

        $relatedprod = product::where('product_category', $prod->product_category)->where('id', '!=', $id)
            ->where('status', 'active')->get();

        $units = unit::where('prod_id', $id)->where('status', 'active')->get();


        return view('homeweb.productsingle', compact('prod', 'productdis', 'relatedprod', 'units', 'defaultunit'));
    }

    public function prodCatSingle($id)
    {
        $pcsingle = product_category::find($id);
        $pc_products = product::where('product_category', $id)->get();
        return view('homeweb.prodcatsingle', compact('pcsingle', 'pc_products'));
    }


    public function profile()
    {
        $cust_addresses = Custaddresss::where('cust_id', auth()->user()->id)->where('status', 'active')->orderBy('default','DESC')->latest()->get();
        $profile = customer::where('id', auth()->user()->id)->first();
        $orders=order::where('customer_id',auth()->user()->id)->get();
        return view('homeweb.profile', compact('profile', 'cust_addresses','orders'));
    }



    public function UpdateProf(Request $request)
    {
        $user = customer::where('id',auth()->user()->id)->update([
            'name' => $request->name,
            'mobile' => $request->mobile,
            'email' => $request->email,
        ]);

        if ($user) {
            $data['success']= 'success';
        }else {
            $data['error']= 'error';
        }
        echo json_encode($data);
    }



    public function about()
    {
        return view('homeweb.about');
    }
    public function contact()
    {
        return view('homeweb.contact');
    }
    public function SaveContact(Request $req)
    {
        $contactus=contact::create([
            'name'=> $req->name,
            'mobile'=> $req->mobile,
            'subject'=> $req->subject,
            'message'=> $req->message,
        ]);

        if ($contactus) {
            $data['success']= 'success';
        }else {
            $data['error']= 'error';
        }
        echo json_encode($data);
    }




    public function getprice(Request $request)
    {
        $uid = $request->unit_id;
        $output = '';

        $unit_det = unit::where('id', $uid)->first();

        $output .= '
                    <h4 class="mb-0 single-orgnl-price">₹' . $unit_det->offer_price . '</h4>
						<h4 class="mb-0 single-dcnt-price">₹ ' . $unit_det->price . '</h4>';


        echo $output;
    }



    public function ProdSearch(Request $request)
    {
        $Pid = $request->pid;

        $output = '';

        $products = Product::where('status', 'active')
            ->where(function($q) use ($Pid) {
                $q->where('name_english', 'LIKE', '%' . $Pid . '%')
                    ->orWhere('name_english', 'LIKE', '%' . $Pid . '%')
                    ->orWhere('description_eng', 'LIKE', '%' . $Pid . '%');
            })->get();

        if ($products->isNotEmpty()) {
            foreach ($products as $product) {
                $output .= '
                    <div class="img-with-name">
                        <a href="' . route('product.single', $product->id) . '">
                            <img class="p-img-search" src="' . asset($product->image1) . '" alt="">
                            <h5 class="mb-0 sub-option">' . $product->name_english . '</h5>
                        </a>
                    </div>
                ';
            }
        } else {
            $output .= '
                <h5 style="display: table; margin: 0 auto; font-weight: 600; font-size: 22px;">No Products Found</h5>
            ';
        }

        return $output;
    }


}
