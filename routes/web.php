<?php



Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('kelurahan2/get/{id}','Auth\RegisterController@getKelurahan2');

Route::get('/registerKades', 'adminController@index');
Route::get('kelurahan/get/{id}', 'adminController@getKelurahan');


Route::get('/home', 'HomeController@dashboard')->name('home');

Route::get('/registerKades','adminController@buatKades');
Route::POST('/insertKades','adminController@insertKades');

Route::post('/komenkades/komentar','kadesController@aadkomentar');

// buat ubah ubah profil
Route::get('/profilAdmin/{id}', 'adminController@profil');
Route::post('/updateProfilAdmin/{id}', 'adminController@updateProfilAdmin');

Route::get('/profilKades/{id}', 'kadesController@profil');
Route::post('/updateProfil1/{id}', 'kadesController@updateProfil1');

Route::get('/profilGuest/{id}', 'guestController@profil');
Route::post('/updateProfil/{id}', 'guestController@updateProfil');

Route::get('/dashboardAdmin', 'adminController@home');
Route::get('/dashboardKades', 'kadesController@home');
Route::get('/dashboardGuest', 'guestController@home');

Route::get('/daftarKadesAdmin','adminController@daftarKades');
Route::get('/manageUser','adminController@daftarUser');

Route::get('/daftarKadesGuest/{id}','guestController@daftarKadesGuest');

Route::get('/buatLaporanAdmin/{id}','adminController@buatLaporan');
Route::post('/buatLaporanAdmin/{id}', 'adminController@buatLaporanAdmin');

Route::get('/buatLaporanGuest/{id}','guestController@buatLaporan');
Route::post('/buatLaporanGuest/{id}', 'guestController@buatLaporanGuest');

Route::get('/buatLaporanKades/{id}','kadesController@buatLaporan');
Route::post('/buatLaporanKades/{id}', 'kadesController@buatLaporanKades');

Route::get('/daftarLaporan/{id}','kadesController@daftarLaporan');

Route::get('/tentangDesaKades/{id}','kadesController@tentang');
Route::post('/updateTentang/{id}','kadesController@updateTentang');

Route::get('/rincianBelanjaKades','kadesController@rincianBelanja');

Route::get('/buatBelanja/{id}','kadesController@tampilBelanja');
Route::post('/buatBelanja/{id}','kadesController@buatBelanja');

Route::get('/ubahBelanja/{id}','kadesController@editBelanja');
Route::post('/updateBelanja/{id}','kadesController@updateBelanja');

Route::get('/lihatDesaAdmin/{id}','adminController@kelurahanX');
Route::get('/lihatDesaGuest/{id}','guestController@kelurahan');

Route::get('/laporanSayaGuest/{id}','guestController@laporanSayaGuest');

Route::get('/editLaporanGuest/{id}','guestController@editLaporanTamu');
Route::post('/updateLaporanGuest/{id}','guestController@updateLaporanGuest');

Route::get('/deleteLaporanGuest/{id}','guestController@deleteLaporanGuest');

Route::get('/laporanSayaAdmin/{id}','adminController@laporanSayaAdmin');

Route::get('/editLaporanAdmin/{id}','adminController@editLaporanAdmin');
Route::post('/updateLaporanAdmin/{id}','adminController@updateLaporanAdmin');

Route::get('/deleteLaporanAdmin/{id}','adminController@deleteLaporanAdmin');

Route::get('/deleteUser/{id}','adminController@deleteUser');

Route::get('/laporanSayaKades/{id}','kadesController@laporanSayaKades');

Route::get('/lihatLaporan/{id}','adminController@lihatLaporan');

Route::get('/editLaporanKades/{id}','kadesController@editLaporanKades');
Route::post('/updateLaporanKades/{id}','kadesController@updateLaporanKades');

Route::get('/deleteLaporanKades/{id}','kadesController@deleteLaporanKades');

//message admin
Route::get('/message', 'adminController@message');
Route::get('/message/{id}', 'adminController@showMessage');
Route::get('/message/getMessage/{id}', 'adminController@getMessage');
