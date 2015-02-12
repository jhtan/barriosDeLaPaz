<?php

class ClaimsController extends \BaseController {

  protected $claim;

  /**
   * Claim Constructor.
   *
   * @param Claim $claim
   */
  public function __construct(Claim $claim) {
    $this->claim = $claim;
  }

  /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $claims = $this->claim->all();
    $categories = ClaimWorkCategory::all();
    $neighborhoods = Neighborhood::all();

    return View::make('claims.index', [
      'claims' => $claims,
      'categories' => $categories,
      'neighborhoods' => $neighborhoods
    ]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    if(Auth::check()) {
      return View::make('claims.create');
    } else {
      return Redirect::to('login');
    }
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    $claim = new Claim();
    $claim->title = Input::get('title');
    $claim->description = Input::get('description');
    $claim->userId = 1;
    $claim->neighborhoodId = 1;
    $claim->claimWorkCategoryId = 1;
    $claim->save();

    return $this->index();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
    $claim = $this->claim->whereId($id)->first();
    return View::make('claims.show', ['claim' => $claim]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}