<?php

namespace App\Http\Controllers;

use App\Http\Requests\AspectStoreRequest;
use App\Services\AspectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(private AspectService $aspectService)
    {
    }
    public function index()
    {
        if (!Auth::user()->can('read aspect')) abort(403);

        $aspects = $this->aspectService->findAll();

        return view('aspect.index', ['aspects' => $aspects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('aspect.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AspectStoreRequest $request)
    {
        if (!Auth::user()->can('create aspect')) abort(403);

        try {

            $this->aspectService->insert($request->safe()->except(['_token']));

            return redirect()->route('aspects.index')->with('message', "Berhasil menambahkan aspek");
        } catch (\Exception $th) {
            Log::error($th->getMessage());

            return redirect()->route('aspects.index')->with('error', "Gagal menambahkan aspek");
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
        if (!Auth::user()->can('update aspect')) abort(403);

        $aspect = $this->aspectService->findById($id);

        return view('aspect.edit', ['aspect' => $aspect]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AspectStoreRequest $request, $id)
    {
        if (!Auth::user()->can('update aspect')) abort(403);

        try {

            $this->aspectService->update($request->safe()->except(['_token']), $id);

            return redirect()->route('aspects.index')->with('message', "Berhasil mengubah aspek");
        } catch (\Exception $th) {
            Log::error($th->getMessage());

            return redirect()->route('aspects.index')->with('error', "Gagal mengubah aspek");
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
        //
    }

    public function delete($id)
    {
        if (!Auth::user()->can('delete aspect')) abort(403);

        try {
            if ($this->aspectService->findById($id) == null) {
                throw new \Exception("Aspect not found.");
            }

            $this->aspectService->delete($id);

            return redirect()->route('aspects.index')->with('message', "Berhasil menghapus aspek");
        } catch (\Exception $th) {
            Log::error($th->getMessage(), ["aspects_id" => $id]);

            return redirect()->route('aspects.index')->with('error', "Gagal menghapus aspek");
        }
    }
}
