<?php

namespace App\Http\Controllers;

use App\Enums\statusType;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        try {
            $users = User::orderBy('id', 'DESC')->get();

            return view('users.index', compact('users'));
        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', 'An error occurred while fetching users: '.$e->getMessage());
        }
    }

    public function create()
    {
        try {
            // Retrieve all roles to display in the create user form
            $roles = Role::all();

            return view('users.create', compact('roles'));
        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', 'An error occurred while fetching roles: '.$e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            // Validate the request (only validate roles, since permissions will be inherited by roles)
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email',
                'password' => 'required|string|min:8|confirmed',
                'roles' => 'required|array',  // Ensure roles are selected
                'roles.*' => 'exists:roles,id',  // Ensure role IDs exist
            ]);

            // Create the user
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'student_id' => $request->student_id,
                'phone' => $request->phone,
                'referral_contact' => $request->referral_contact,
                'position' => $request->position,
                'country' => $request->country,
                'parent_id' => $request->parent_id,

            ]);
            // $request->status=statusType::PAID;
            // Ensure all role IDs exist before syncing
            $roles = Role::whereIn('id', $request->roles)->pluck('id')->toArray();

            if (count($roles) !== count($request->roles)) {
                return redirect()->back()->with('error', 'One or more roles are invalid.');
            }

            // Sync roles to the user
            $user->syncRoles($roles);  // Sync roles based on valid role IDs

            return redirect()->route('users.index')->with('success', 'User created successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the user: '.$e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            // Retrieve the user along with their roles
            $user = User::with('roles')->findOrFail($id);

            return view('users.show', compact('user'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', 'An error occurred while fetching user details: '.$e->getMessage());
        }
    }

    public function edit($id)
    {
        try {
            $user = User::findOrFail($id);
            $roles = Role::all();  // Fetch all roles

            return view('users.edit', compact('user', 'roles'));  // Pass roles and user to the view
        } catch (ModelNotFoundException $e) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', 'An error occurred while fetching user details: '.$e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Retrieve the user
            $user = User::findOrFail($id);

            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
                'password' => 'nullable|string|min:8|confirmed',
                'roles' => 'required|array',  // Ensure roles are selected
                'roles.*' => 'exists:roles,id',  // Ensure that all role IDs exist
            ]);

            // Update the user
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request->password) : $user->password,
            ]);

            // Sync roles to the user (Ensure the roles are valid)
            $roles = Role::whereIn('id', $request->roles)->pluck('id')->toArray();

            if (count($roles) !== count($request->roles)) {
                return redirect()->back()->with('error', 'One or more roles are invalid.');
            }

            // Sync roles
            $user->syncRoles($roles);  // Sync the valid role IDs

            return redirect()->route('users.index')->with('success', 'User updated successfully');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('users.index')->with('error', 'User not found.');
        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', 'An error occurred while updating the user: '.$e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            User::destroy($id);

            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        } catch (Exception $e) {
            return redirect()->route('users.index')->with('error', 'An error occurred while deleting the user: '.$e->getMessage());
        }
    }
}
