<?php

namespace App\Http\Controllers;

use App\Models\Rehber;
use Illuminate\Http\Request;

class RehberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rehber = Rehber::all();
        return view('admin.rehber.index',compact('rehber'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rehber.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'avatar' => 'mimes:png,jpg,jpeg,gif',
            ],
            [
                'avatar.mimes' => 'Yüklenen resim doğru türde değil.',
            ]
        );

        $eklerehber = new Rehber();
        $eklerehber->name = strip_tags(request('name'));
        $eklerehber->phone = strip_tags(request('phone'));
        $eklerehber->email = strip_tags(request('email'));
        $eklerehber->adress = strip_tags(request('adress'));



        if (request()->hasFile('avatar')){
            $this->validate(request(),array(
                'avatar' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096'
            ));

            $avatar = request()->file('avatar');
            $filename = 'avatar'.'-'.time().'.'.$avatar->extension();
            if ($avatar->isValid()){
                $endfolder = 'uploads';
                $file_dir = $filename;
                $avatar->move($endfolder,$filename);
                $eklerehber->avatar = $file_dir;
            }
        }



        $eklerehber->save();

        if($eklerehber){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rehber = Rehber::find($id);
        return view('admin.rehber.edit', compact('rehber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'name' => 'required',
                'phone' => 'required',
                'adress' => 'required',
                'avatar' => 'mimes:png,jpg,jpeg,gif',
            ],
            [
                'name.required' => 'İsim soyisim gereklidir.',
                'phone.required' => 'Telefon girilmesi gereklidir.',
                'adress.required' => 'Adres girilmesi gereklidir.',
                'avatar.mimes' => 'Yüklenen resim doğru türde değil.',
            ]
        );

        $eklerehber = Rehber::find($id);
        $eklerehber->name = strip_tags(request('name'));
        $eklerehber->phone = strip_tags(request('phone'));
        $eklerehber->email = strip_tags(request('email'));
        $eklerehber->adress = strip_tags(request('adress'));



        if (request()->hasFile('avatar')){
            $this->validate(request(),array( 'avatar' => 'sometimes|mimes:png,jpg,jpeg,gif|max:4096' ));

            $avatar = request()->file('avatar');
            $filename = 'avatar.'.$avatar->extension();
            if ($avatar->isValid()){
                $endfolder = 'uploads';
                $file_dir = $filename;
                $avatar->move($endfolder,$filename);
                $eklerehber->avatar = $file_dir;
            }
        }



        $eklerehber->save();

        if($eklerehber){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rehber = Rehber::destroy($id);
        if($rehber){
            alert('Başarılı','İşlem başarılı şekilde tamamlanmıştır.', 'success')->autoClose(1000);
            return back();
        }else {
            alert()->error('Başarısız','İşlem sırasında bir hata meydana gelmiştir.')->autoClose(2000);
            return back();
        }

    }
}
