<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    use ValidatesRequests;

    public function index(Request $request): View
    {
        try {
            // Fetch roles with pagination, no need for custom 'i' index
            $roles = Role::orderBy('id', 'DESC')->paginate(5);

            return view('roles.index', compact('roles'));
        } catch (Exception $e) {
            return redirect()->route('roles.index')->with('error', 'An error occurred while fetching roles: '.$e->getMessage());
        }
    }

    public function create(): View
    {
        try {
            // Fetch permissions to display in create view
            $permissions = Permission::all()->sortBy('name');

            return view('roles.create', compact('permissions'));
        } catch (Exception $e) {
            return redirect()->route('roles.index')->with('error', 'An error occurred while fetching permissions: '.$e->getMessage());
        }
    }

    public function store(Request $request): RedirectResponse
    {
        try {
            // Validate the incoming request
            $request->validate([
                'name' => 'required|unique:roles,name',
                'permission' => 'required|array', // Ensure permissions are an array
            ]);

            // Create the new role
            $role = Role::create(['name' => $request->name]);

            // Retrieve permissions by IDs and sync them to the role
            $permissions = Permission::whereIn('id', $request->permission)->get();
            $role->syncPermissions($permissions);

            return redirect()->route('roles.index')->with('success', 'Role created successfully');
        } catch (Exception $e) {
            return redirect()->route('roles.index')->with('error', 'An error occurred while creating the role: '.$e->getMessage());
        }
    }

    public function show($id): View
    {
        try {
            // Display role and its permissions
            $role = Role::findOrFail($id); // Use findOrFail to throw an exception if not found
            $rolePermissions = $role->permissions;

            return view('roles.show', compact('role', 'rolePermissions'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('roles.index')->with('error', 'Role not found.');
        } catch (Exception $e) {
            return redirect()->route('roles.index')->with('error', 'An error occurred while fetching the role: '.$e->getMessage());
        }
    }

    public function edit($id): View
    {
        try {
            // Display role and available permissions for editing
            $role = Role::findOrFail($id); // Use findOrFail to throw an exception if not found
            $permissions = Permission::all()->sortBy('name');
            $rolePermissions = $role->permissions->pluck('id')->toArray();

            return view('roles.edit', compact('role', 'permissions', 'rolePermissions'));
        } catch (ModelNotFoundException $e) {
            return redirect()->route('roles.index')->with('error', 'Role not found.');
        } catch (Exception $e) {
            return redirect()->route('roles.index')->with('error', 'An error occurred while fetching the role for editing: '.$e->getMessage());
        }
    }

    public function update(Request $request, $id): RedirectResponse
    {
        try {
            // Validate and update role with new permissions
            $request->validate([
                'name' => 'required',
                'permission' => 'required|array',
            ]);

            $role = Role::findOrFail($id); // Use findOrFail to throw an exception if not found
            $role->update(['name' => $request->name]);

            // Sync permissions with the correct guard
            $role->syncPermissions(Permission::whereIn('id', $request->permission)->get());

            return redirect()->route('roles.index')->with('success', 'Role updated successfully');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('roles.index')->with('error', 'Role not found.');
        } catch (Exception $e) {
            return redirect()->route('roles.index')->with('error', 'An error occurred while updating the role: '.$e->getMessage());
        }
    }

    public function destroy($id): RedirectResponse
    {
        try {
            // Delete the role
            Role::destroy($id);

            return redirect()->route('roles.index')->with('success', 'Role deleted successfully');
        } catch (Exception $e) {
            return redirect()->route('roles.index')->with('error', 'An error occurred while deleting the role: '.$e->getMessage());
        }
    }
}
