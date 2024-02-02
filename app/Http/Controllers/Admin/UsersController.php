<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\StoreUsersRequest;
use App\Http\Requests\Admin\UpdateUsersRequest;

class UsersController extends Controller
{
    /**
     * Display a listing of User.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Gate::allows('user_access')) {
            return abort(401);
        }


                $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating new User.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (! Gate::allows('user_create')) {
            return abort(401);
        }
        
        $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  \App\Http\Requests\StoreUsersRequest  $request
     * @return \Illuminate\Http\Response
     */



     public function store(StoreUsersRequest $request)
     {
         if (!Gate::allows('user_create')) {
             return abort(401);
         }
     
         // Initialize $imageName with a default value (empty string)
         $imageName = '';
     
         if ($request->hasFile('image')) {
             $image = $request->file('image');
             $imageName = $image->hashName();
     
             // Use the storage facade to store the image with a hashed name
             $path = $image->storeAs('public/images', $imageName);
     
             // Update the request with the correct image path
             $request->merge(['image' => $path]);
         }
     
         // Assuming you have an 'image' column in your users table
         $user = User::create([
             'name' => $request->input('name'),
             'email' => $request->input('email'),
             'password' => bcrypt($request->input('password')),
             'image' => $imageName ? 'images/'.$imageName : null, // Check if $imageName is not empty
             'role_id' => $request->input('role_id'),
         ]);
     
         return redirect()->route('admin.users.index');
     }
     




    /**
     * Show the form for editing User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
        
        $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');

        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update User in storage.
     *
     * @param  \App\Http\Requests\UpdateUsersRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUsersRequest $request, $id)
    {
        if (! Gate::allows('user_edit')) {
            return abort(401);
        }
    
        $user = User::findOrFail($id);
    
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName();
    
            // Use the storage facade to store the image with a hashed name
            $path = $image->storeAs('public/images', $imageName);
    
            // Update the request with the correct image path
            $request->merge(['image' => 'images/'.$imageName]);
    
            // Delete the previous image if it exists
            if ($user->image) {
                Storage::delete('public/'.$user->image);
            }
        }
    
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'image' => $request->input('image', $user->image), // Use the new image path or the existing one
            'role_id' => $request->input('role_id'),
        ]);
    
        return redirect()->route('admin.users.index');
    }    


    /**
     * Display User.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (! Gate::allows('user_view')) {
            return abort(401);
        }
        
        $roles = \App\Role::get()->pluck('title', 'id')->prepend(trans('quickadmin.qa_please_select'), '');$folders = \App\Folder::where('created_by_id', $id)->get();$files = \App\File::where('created_by_id', $id)->get();

        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user', 'folders', 'files'));
    }


    /**
     * Remove User from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

public function destroy($id)
{
    if (!Gate::allows('user_delete')) {
        return abort(401);
    }

    $user = User::findOrFail($id);

    // Delete the associated image if it exists
    if (!is_null($user->image)) {
        // Extract the filename from the image path
        $filename = basename($user->image);

        // Delete the image file from storage
        Storage::delete('public/images/' . $filename);
    }

    // Delete the user record from the database
    $user->delete();

    return redirect()->route('admin.users.index');
}

    /**
     * Delete all selected User at once.
     *
     * @param Request $request
     */
    public function massDestroy(Request $request)
    {
        if (! Gate::allows('user_delete')) {
            return abort(401);
        }
        if ($request->input('ids')) {
            $entries = User::whereIn('id', $request->input('ids'))->get();

            foreach ($entries as $entry) {
                $entry->delete();
            }
        }
    }

}
