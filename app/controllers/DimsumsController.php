<?php

class DimsumsController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $dimsums = dimsum::paginate(15);

        if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) // Check if is user browsing
            return View::make('dimsum.index', compact($dimsums))->with('dimsums', $dimsums);
        else
            return Response::json(array(dimsum::all()));  // Return JSON for AJAX call
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) // Check if is user browsing
            return View::make('dimsum.create');
        else
            return Response::make('Error: Action "create" should not be called from external.', 403);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'dishtype'   => 'required',
            'picture'    => 'required',
            'stocks'     => 'required|numeric',
            'price'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails())
            return Redirect::to('dimsum/create')->withErrors($validator)->withInput();
        else {
            // store
            $dimsum = new dimsum;
            $dimsum->name       = Input::get('name');
            $dimsum->dishtype   = Input::get('dishtype');

            $dimsum_pic = Input::file('picture');
            $imgfn = $dimsum_pic->getClientOriginalName();
            if(Image::make($dimsum_pic->getRealPath())
                                      ->resize(320, null, function($constraint){$constraint->aspectRatio();$constraint->upsize();})
                                      ->save(public_path('imgs/'.$imgfn)))
              $dimsum->pic_path = 'imgs/'.$imgfn;
            else
              return Redirect::to('dimsum/create')->withErrors('Invalid Picture uploaded.')->withInput();

            $dimsum->stocks     = Input::get('stocks');
            $dimsum->price      = Input::get('price');
            $dimsum->save();

            // redirect
            Session::flash('message', 'Successfully created a new dish!');
            if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']))
                return Redirect::to('dimsum');
            else
                return 'Succeed: Created a new dish!';
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $dimsum = dimsum::find($id);

        if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) // Check if is user browsing
            return View::make('dimsum.show')->with('dimsum', $dimsum);
        else
            return Response::json(array($dimsum));  // Return JSON for AJAX call
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $dimsum = dimsum::find($id);

        if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) // Check if is user browsing
            return View::make('dimsum.edit')->with('dimsum', $dimsum);
        else
            return Response::make('Error: Action "edit" should not be called from external.', 403);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'dishtype'   => 'required',
            'stocks'     => 'required|numeric',
            'price'      => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails())
            return Redirect::to('dimsum/create')->withErrors($validator)->withInput();
        else {
            // store
            $dimsum = dimsum::find($id);
            $dimsum->name       = Input::get('name');
            $dimsum->dishtype   = Input::get('dishtype');

            if(Input::file('picture')){
                $dimsum_pic = Input::file('picture');
                $imgfn = $dimsum_pic->getClientOriginalName();
                if(Image::make($dimsum_pic->getRealPath())
                                          ->resize(320, null, function($constraint){$constraint->aspectRatio();$constraint->upsize();})
                                          ->save(public_path('imgs/'.$imgfn)))
                  $dimsum->pic_path = 'imgs/'.$imgfn;
                else
                  return Redirect::to('dimsum/create')->withErrors('Invalid Picture uploaded.')->withInput();
            }

            $dimsum->stocks     = Input::get('stocks');
            $dimsum->price      = Input::get('price');
            $dimsum->save();

            // redirect
            Session::flash('message', 'Successfully edited a new dish!');
            if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']))
                return Redirect::to('dimsum');
            else
                return 'Succeed: Edited a new dish!';
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $dimsum = dimsum::find($id);
        $dimsum->delete();

        // redirect
        Session::flash('message', 'Successfully deleted a new dish!');
        if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']))
            return Redirect::to('dimsum');
        else
            return 'Succeed: Deleted a new dish!';
    }


}
