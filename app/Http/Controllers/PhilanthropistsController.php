<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePhilanthropist;
use App\Http\Requests\UpdatePhilanthropist;
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

        return redirect(route('dashboard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Philanthropist  $philanthropist
     * @return Response
     */
    public function edit(Philanthropist $philanthropist)
    {
        return view('philanthropists.edit', [
            'philanthropist' => $philanthropist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Philanthropist  $philanthropist
     * @return Response
     */
    public function update(UpdatePhilanthropist $request, Philanthropist $philanthropist)
    {
        $philantropist = $this->philanthropistsManager->update($philanthropist, $request->all());

        return redirect(route('dashboard'));
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
