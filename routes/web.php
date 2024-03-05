<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatBotController;
use App\Http\Controllers\DeseaseController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MalayalamController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


///////////////////////////////////////////////////////////////////////////////
////////////////////////////////     ADMIN      //////////////////////////////
/////////////////////////////////////////////////////////////////////////////


Route::get('/adminhome', [AdminController::class, 'home'])->name('admin.home');
Route::post('/AdminLogin', [AdminController::class, 'login'])->name('admin.login');

Route::group(['middleware' => 'admin_auth', 'prevent_back'], function () {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard']);
    Route::get('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::get('/change-password', [AdminController::class, 'change_password'])->name('change.password');
    Route::post('/password-update', [AdminController::class, 'password_update'])->name('password.update');
    Route::get('/admin-profile', [AdminController::class, 'admin_profile'])->name('admin.profile');
    Route::post('/ad-profile-update', [AdminController::class, 'admin_profile_update']);


    //routes for disease category
    Route::get('/disease-category', [DeseaseController::class, 'disease_category']);
    Route::get('/add-disease-category', [DeseaseController::class, 'add_disease_cat']);
    Route::post('/save-disease-category', [DeseaseController::class, 'SaveDisCat']);
    Route::get('/edit-disease-category/{id}', [DeseaseController::class, 'EditDisCat'])->name('edit.discat');
    Route::post('/update-disease-category', [DeseaseController::class, 'updateDisCat']);

    //routes for disease
    Route::get('/disease', [DeseaseController::class, 'disease']);
    Route::get('/add-disease', [DeseaseController::class, 'add_disease']);
    Route::post('/save-disease', [DeseaseController::class, 'SaveDis']);
    Route::get('/edit-disease/{id}', [DeseaseController::class, 'EditDis'])->name('edit.dis');
    Route::post('/update-disease', [DeseaseController::class, 'updateDis']);


    Route::get('/product-disease/{id}', [DeseaseController::class, 'productsdesease'])->name('productsdesease');
    Route::post('/add-dis-prod', [DeseaseController::class, 'adddisprod']);
    Route::get('/delete-dis-prod/{disease_id}/{id}', [DeseaseController::class, 'deleteProd'])->name('delete.prod');


    // routes for disease video
    Route::get('/dis-video/{id}', [DeseaseController::class, 'DisVideo'])->name('dis.video');
    Route::get('/add-disease-video/{id}', [DeseaseController::class, 'AddDiseaseVid']);
    Route::post('/save-disease-vid', [DeseaseController::class, 'SaveDisVid']);
    Route::get('/edit-disease-vid/{id}', [DeseaseController::class, 'EditDisVid'])->name('edit.disvid');
    Route::post('/update-disease-vid', [DeseaseController::class, 'updateDisVid']);


    //routes for disease gallary
    Route::get('/dis-gallery/{id}', [DeseaseController::class, 'DisGallery'])->name('dis.gallery');
    Route::get('/add-disease-gal/{id}', [DeseaseController::class, 'AddDisGal']);
    Route::post('/save-disease-gal', [DeseaseController::class, 'SaveDisGal']);
    Route::get('/edit-disease-gal/{id}', [DeseaseController::class, 'EditDisGal'])->name('edit.disgal');
    Route::post('/update-disease-gal', [DeseaseController::class, 'updateDisGal']);



    ////////////// routes for product category///////////////
    Route::get('/product-category', [ProductController::class, 'ProdCat']);
    Route::get('/add-product-category', [ProductController::class, 'AddProCat']);
    Route::post('/save-product-category', [ProductController::class, 'SaveProdCat']);
    Route::get('/edit-product-category/{id}', [ProductController::class, 'EditProdCat'])->name('edit.prodcat');
    Route::post('/update-product-category', [ProductController::class, 'updateProdCat']);


    // routs for products
    Route::get('/products', [ProductController::class, 'products']);
    Route::get('/add-products', [ProductController::class, 'AddProducts']);
    Route::post('/save-products', [ProductController::class, 'SaveProd']);
    Route::get('/edit-products/{id}', [ProductController::class, 'EditProd'])->name('edit.prod');
    Route::post('/update-products', [ProductController::class, 'updateProd']);
    //routefor units button
    Route::get('/units/{id}', [ProductController::class, 'units'])->name('units');
    Route::get('/add-units/{id}', [ProductController::class, 'AddUnits']);
    Route::post('/save-units', [ProductController::class, 'SaveUnit']);
    Route::get('/edit-units/{id}', [ProductController::class, 'EditUnit'])->name('edit.units');
    Route::post('/update-units', [ProductController::class, 'updateUnit']);



    //details
    Route::get('/dc-details/{id}', [DetailsController::class, 'discat'])->name('dcdetails');
    Route::get('/dis-details/{id}', [DetailsController::class, 'dis'])->name('disdetails');
    Route::get('/disvid-details/{id}', [DetailsController::class, 'disvid'])->name('disvisdetails');
    Route::get('/disgal-details/{id}', [DetailsController::class, 'disgal'])->name('disgaldetails');
    Route::get('/prodcat-details/{id}', [DetailsController::class, 'prodcat'])->name('prodcatdetails');
    Route::get('/products-details/{id}', [DetailsController::class, 'prod'])->name('proddetails');

    // routes for banner
    Route::get('/banner', [DetailsController::class, 'banner'])->name('banner');
    Route::post('/save-banner', [DetailsController::class, 'savebanner']);
    Route::get('/delete-banner/{id}', [DetailsController::class, 'deletebanner'])->name('delete.banner');

    Route::get('/orders', [OrderController::class, 'orders'])->name('orders');
    Route::post('/order-status-up', [OrderController::class, 'OrderStaUpd']);
    Route::post('/payment-status-up', [OrderController::class, 'PaymentStaUpd']);
    Route::get('/view-orders/{id}', [OrderController::class, 'ViewOrders'])->name('view.orders');


    // routes for chat
    Route::get('/chats', [ChatBotController::class, 'chats'])->name('chats');
    Route::get('/chat-single/{id}', [ChatBotController::class, 'chatSingle'])->name('chat.single');


});


/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////     CLIENT SIDE      /////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////


Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('shop-by-disease', [HomeController::class, 'disease'])->name('disease');
Route::get('disease-single/{id}', [HomeController::class, 'disSingle'])->name('disease.single');

Route::get('disease-category-single/{id}', [HomeController::class, 'diseasecat'])->name('diseasecat');


Route::get('shop-by-product', [HomeController::class, 'product'])->name('product');
Route::get('product-single/{id}', [HomeController::class, 'prodSingle'])->name('product.single');
Route::get('product-cat-single/{id}', [HomeController::class, 'prodCatSingle'])->name('prodcat.single');
Route::get('trending-products', [HomeController::class, 'trndproduct'])->name('trend.product');
Route::get('featured-products', [HomeController::class, 'featrdproduct'])->name('feat.product');

Route::get('about', [HomeController::class, 'about'])->name('about');

Route::get('contact', [HomeController::class, 'contact'])->name('contact');
Route::post('save-contact', [HomeController::class, 'SaveContact'])->name('save.contact');

Route::post('get-price', [HomeController::class, 'getprice'])->name('getprice');




Route::post('prod-search', [HomeController::class, 'ProdSearch'])->name('search');


Route::post('add-to-cart', [CartController::class, 'AddtoCart'])->name('addtocart');




Route::get('sign-in', [HomeController::class, 'signin'])->name('signin');
Route::post('do-sign-in', [HomeController::class, 'check'])->name('dosignin');

Route::get('sign-up', [HomeController::class, 'signUp'])->name('signup');
Route::post('register', [HomeController::class, 'register'])->name('register');


Route::group(['middleware' => 'customer_auth'], function () {                               ////// middleware  //////
    Route::get('profile', [HomeController::class, 'profile'])->name('profile');
    Route::post('update-profile', [HomeController::class, 'UpdateProf'])->name('update.profile');
    Route::get('user-logout', [HomeController::class, 'UserLogout'])->name('user.logout');


    Route::get('cart-items', [CartController::class, 'CartItems'])->name('cart');
    Route::post('cart-item-delete', [CartController::class, 'DelCartItem'])->name('delete.cartitem');

    Route::post('add-quantity', [CartController::class, 'AddQuantity'])->name('addqty');
    Route::post('sub-quantity', [CartController::class, 'SubQuantity'])->name('subqty');


    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::get('address', [CartController::class, 'address'])->name('address');
    Route::post('save-address', [CartController::class, 'SaveAddress'])->name('save.address');
    Route::get('edit-address/{id}', [CartController::class, 'EditAddress'])->name('edit.address');
    Route::post('update-address', [CartController::class, 'UpdateAddress'])->name('update.address');
    Route::post('delete-address', [CartController::class, 'DeleteAddress'])->name('delete.address');
    Route::post('address-default', [CartController::class, 'CustAddrsDef'])->name('CustAddrsDef');


    Route::post('place-order', [CartController::class, 'PlaceOrder'])->name('place.order');

    //chats

    Route::post('/save-chats-user', [ChatBotController::class, 'SaveChats'])->name('save.chats');
    Route::post('/save-chats-admin', [ChatBotController::class, 'SaveChatAdmin'])->name('save.chatsadmin');
    Route::post('get-messages', [ChatBotController::class, 'getmsg'])->name('getmsg');
    Route::post('get-messages-admin', [ChatBotController::class, 'getmsgadmin'])->name('getmsg');
});






/////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////     Malayalam sec      /////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////




Route::get('/home', [MalayalamController::class, 'index'])->name('index.mal');

Route::get('shopby-disease', [MalayalamController::class, 'disease'])->name('dis');
Route::get('dis-single/{id}', [MalayalamController::class, 'disSingle'])->name('dis.single');

Route::get('dis-category-single/{id}', [MalayalamController::class, 'diseasecat'])->name('discat');


Route::get('shopby-product', [MalayalamController::class, 'product'])->name('prod');
Route::get('prod-single/{id}', [MalayalamController::class, 'prodSingle'])->name('prod.single');
Route::get('prod-cat-single/{id}', [MalayalamController::class, 'prodCatSingle'])->name('prodcateg.single');
Route::get('trending-product', [MalayalamController::class, 'trndproduct'])->name('trending.product');
Route::get('featured-product', [MalayalamController::class, 'featrdproduct'])->name('featured.product');

Route::get('about-section', [MalayalamController::class, 'about'])->name('about.mal');
Route::get('contact-mal', [MalayalamController::class, 'contact'])->name('contact.mal');
