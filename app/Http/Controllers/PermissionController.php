<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * create a new instance of the class
     *
     * @return void
     */
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!Auth::check()) {
                return redirect('welcome');
            }
            return $next($request);
        });
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:permission-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:permission-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:permission-delete', ['only' => ['destroy']]);
        // $this->middleware('permission:permission-show', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = Permission::orderBy('id', 'DESC')->paginate(15);

        return view('permissions.index', compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name',
        ]);

        Permission::create(['name' => $request->input('name')]);

        return redirect()->route('permissions.index')
            ->with('success', 'Permission created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $permission = Permission::find($id);

        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        $permission = Permission::find($id);

        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $permission = Permission::find($id);
        $permission->name = $request->input('name');
        $permission->save();

        return redirect()->route('permissions.index')
            ->with('success', 'Permission updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Permission::find($id)->delete();

        return redirect()->route('permissions.index')
            ->with('success', 'Permission deleted successfully');
    }

}