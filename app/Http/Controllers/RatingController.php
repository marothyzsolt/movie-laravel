<?php

namespace App\Http\Controllers;

use App\Rating;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        //Rating::whereUserId(auth()->user()->id)->get();

        // auth()->user()->ratings()->with('movie')->get()

        return view('ratings', [
            'ratings' => auth()->user()->ratings()->withTrashed()->with('movie')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
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
     * @param Request $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Rating $rating
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Rating $rating)
    {
        $rating->delete();
        return redirect()->back();
    }

    public function forceDelete(Rating $rating)
    {
        $rating->forceDelete();
        return redirect()->back();
    }

    public function restore(Rating $rating)
    {
        $rating->restore();
        return redirect()->back();
    }
}
