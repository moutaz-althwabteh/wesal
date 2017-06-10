<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Logic\Image\ImageNewsRepository;
use App\MyNew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class NewsController  extends Controller
{

    protected $image;
    public function __construct(ImageNewsRepository $imageRepository)
    {

        $this->image = $imageRepository;

    }

    public function index()
    {
        $categories=Categorie::all();
        return view('admin.AddEditNews' ,compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $photo = Input::all();

        $response = $this->image->upload($photo);

        $result=json_decode($response->getContent(), true);
        if(!$result['error']){
            $request['active'] = isset($request['active']) ? 1 : 0;
            $request['main'] = isset($request['main']) ? 1 : 0;
            $myNews=new MyNew();
            $myNews->title=$request->title;
            $myNews->summary=$request->summary;
            $myNews->tags=$request->tags;
            $myNews->details=$request->details;
            $myNews->categorie_id=$request->categorie_id;
            $myNews->active=$request->active;
            $myNews->image=$result['filename'];
            $myNews->main=$request->main;
            $myNews->title=$request->title;

            $myNews->save();
            session()->flash('status', 's');
            session()->flash('msg', 'تم الحفظ بنجاح!');
        }else{
            session()->flash('status', 'd');
            session()->flash('msg', 'فشلت عملية الحفظ!');
        }

        return back();


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\New  $new
     * @return \Illuminate\Http\Response
     */
    public function show(MyNew $new)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\New  $new
     * @return \Illuminate\Http\Response
     */
    public function edit(MyNew $new)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\New  $new
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyNew $new)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\New  $new
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyNew $new)
    {
        //
    }
}
