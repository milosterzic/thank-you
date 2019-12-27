<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhilanthropist;
use App\Managers\PhilanthropistsManager;
use App\Models\Philanthropist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PhilanthropistsController extends Controller
{
    protected $philanthropistsManager;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(PhilanthropistsManager $philanthropistsManager)
    {
        $this->philanthropistsManager = $philanthropistsManager;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('philanthropists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  StorePhilanthropist  $request
     * @return Response
     */
    public function store(StorePhilanthropist $request)
    {
        $philantropist = $this->philanthropistsManager->store($request->all());

        return view('dashboard', [
            'company' => $philantropist->company->name
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Philanthropist  $philanthropist
     * @return Response
     */
    public function edit(Philanthropist $philanthropist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Philanthropist  $philanthropist
     * @return Response
     */
    public function update(Request $request, Philanthropist $philanthropist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Philanthropist  $philanthropist
     * @return Response
     */
    public function destroy(Philanthropist $philanthropist)
    {
        //
    }
}
