<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserData;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserDataController extends Controller
{
    public function index()
    {
        $users = UserData::all();

        return view('user_data.index', compact('users'));
    }

    public function create()
    {
        $countries = [
            'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antigua and Barbuda', 'Argentina', 'Armenia',
            'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus',
            'Belgium', 'Belize', 'Benin', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil',
            'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia', 'Cameroon', 'Canada',
            'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo (Congo-Brazzaville)',
            'Costa Rica', 'Croatia', 'Cuba', 'Cyprus', 'Czechia (Czech Republic)', 'Denmark', 'Djibouti',
            'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea',
            'Estonia', 'Eswatini (fmr. "Swaziland")', 'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon', 'Gambia',
            'Georgia', 'Germany', 'Ghana', 'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana',
            'Haiti', 'Holy See', 'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland',
            'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Korea (North)',
            'Korea (South)', 'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia',
            'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives',
            'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius', 'Mexico', 'Micronesia', 'Moldova',
            'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar (Burma)', 'Namibia', 'Nauru',
            'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'North Macedonia', 'Norway',
            'Oman', 'Pakistan', 'Palau', 'Palestine State', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru',
            'Philippines', 'Poland', 'Portugal', 'Qatar', 'Romania', 'Russia', 'Rwanda', 'Saint Kitts and Nevis',
            'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe',
            'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia',
            'Solomon Islands', 'Somalia', 'South Africa', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname',
            'Sweden', 'Switzerland', 'Syria', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste', 'Togo', 'Tonga',
            'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates',
            'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Venezuela', 'Vietnam', 'Yemen',
            'Zambia', 'Zimbabwe',
        ];

        return view('user_data.create', compact('countries'));
    }

    public function edit($id)
    {
        $countries = [
            'Afghanistan', 'Albania', 'Algeria', 'Andorra', 'Angola', 'Antigua and Barbuda', 'Argentina', 'Armenia',
            'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus',
            'Belgium', 'Belize', 'Benin', 'Bhutan', 'Bolivia', 'Bosnia and Herzegovina', 'Botswana', 'Brazil',
            'Brunei', 'Bulgaria', 'Burkina Faso', 'Burundi', 'Cabo Verde', 'Cambodia', 'Cameroon', 'Canada',
            'Central African Republic', 'Chad', 'Chile', 'China', 'Colombia', 'Comoros', 'Congo (Congo-Brazzaville)',
            'Costa Rica', 'Croatia', 'Cuba', 'Cyprus', 'Czechia (Czech Republic)', 'Denmark', 'Djibouti',
            'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea', 'Eritrea',
            'Estonia', 'Eswatini (fmr. "Swaziland")', 'Ethiopia', 'Fiji', 'Finland', 'France', 'Gabon', 'Gambia',
            'Georgia', 'Germany', 'Ghana', 'Greece', 'Grenada', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana',
            'Haiti', 'Holy See', 'Honduras', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland',
            'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Korea (North)',
            'Korea (South)', 'Kosovo', 'Kuwait', 'Kyrgyzstan', 'Laos', 'Latvia', 'Lebanon', 'Lesotho', 'Liberia',
            'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives',
            'Mali', 'Malta', 'Marshall Islands', 'Mauritania', 'Mauritius', 'Mexico', 'Micronesia', 'Moldova',
            'Monaco', 'Mongolia', 'Montenegro', 'Morocco', 'Mozambique', 'Myanmar (Burma)', 'Namibia', 'Nauru',
            'Nepal', 'Netherlands', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'North Macedonia', 'Norway',
            'Oman', 'Pakistan', 'Palau', 'Palestine State', 'Panama', 'Papua New Guinea', 'Paraguay', 'Peru',
            'Philippines', 'Poland', 'Portugal', 'Qatar', 'Romania', 'Russia', 'Rwanda', 'Saint Kitts and Nevis',
            'Saint Lucia', 'Saint Vincent and the Grenadines', 'Samoa', 'San Marino', 'Sao Tome and Principe',
            'Saudi Arabia', 'Senegal', 'Serbia', 'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia',
            'Solomon Islands', 'Somalia', 'South Africa', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname',
            'Sweden', 'Switzerland', 'Syria', 'Tajikistan', 'Tanzania', 'Thailand', 'Timor-Leste', 'Togo', 'Tonga',
            'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates',
            'United Kingdom', 'United States', 'Uruguay', 'Uzbekistan', 'Vanuatu', 'Venezuela', 'Vietnam', 'Yemen',
            'Zambia', 'Zimbabwe',
        ];

        $user = UserData::with('user')->findOrFail($id);

        return view('user_data.edit', compact('user', 'countries'));
    }

    public function show($id)
    {
        $user = UserData::findOrFail($id);

        return view('user_data.show', compact('user'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'password' => 'required|string|min:8|confirmed',
                'email' => 'required|email|unique:users,email',
                'phone' => 'required',
                'referral_contact' => 'required',
                'position' => 'required',
                'country' => 'required|string|max:255',
                'parent_id' => 'required',
            ]);

            $positions = UserData::where('parent_id', $request->parent_id)
                ->pluck('position')->toArray();

            if (in_array('left', $positions) && in_array('right', $positions)) {

                return redirect()->back()->with('error', 'Both position "left" and "right" already exist for this parent. Please change the parent_id.');
            }

            if (in_array($request->position, $positions)) {
                return redirect()->back()->with('error', 'Position "'.$request->position.'" already taken for this parent. Please choose a different position.');
            }

            $user = User::create([
                'name' => $request->name,
                'password' => Hash::make($request->password),
                'email' => $request->email,
            ]);

            $user->assignRole('student');

            UserData::create([
                'uuid' => $request->uuid,
                'phone' => $request->phone,
                'referral_contact' => $request->referral_contact,
                'position' => $request->position,
                'country' => $request->country,
                'parent_id' => $request->parent_id,
                'user_id' => $user->id,
            ]);

            return redirect()->route('users.data.index')->with('success', 'User created successfully');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while creating the user: '.$e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate the request
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'uuid' => 'required|string|max:255',
                'phone' => 'nullable|string|max:20',
                'referral_contact' => 'nullable|string|max:255',
                'parent_id' => 'nullable|string|max:255',
                'country' => 'nullable|string|max:255',
                'position' => 'nullable|string|max:255',
                'password' => 'nullable|confirmed|min:8', // Confirmed password validation
            ]);

            // Find the user by ID
            $user = UserData::findOrFail($id);

            // Check if the email has changed and validate its uniqueness
            if ($user->user->email !== $request->email) {
                $emailExists = User::where('email', $request->email)
                    ->where('id', '!=', $user->user->id)
                    ->exists();

                if ($emailExists) {
                    return redirect()->back()->withInput()->with('error', 'This Email is already in use by another user');
                }
                $user->user->email = $request->email;
            }

            // Check if the parent_id already has both positions ('left' and 'right')
            $positions = UserData::where('parent_id', $request->parent_id)
                ->pluck('position')->toArray();

            if (in_array('left', $positions) && in_array('right', $positions)) {
                // If both positions exist, ask user to change parent_id
                return redirect()->back()->withInput()->with('error', 'Both position "left" and "right" already exist for this parent_id. Please change the parent_id.');
            }

            // Check if the parent_id exists with the same position
            if (in_array($request->position, $positions)) {
                // If the position already exists for the given parent_id, ask to change position
                return redirect()->back()->withInput()->with('error', 'Position "'.$request->position.'" already taken for this parent_id. Please choose a different position.');
            }

            // Update the user's details
            $user->user->update([
                'name' => $request->name,
                'password' => $request->password ? Hash::make($request->password) : $user->user->password,
            ]);

            // Update the associated UserData (Student) model
            $user->update([
                'uuid' => $request->uuid,
                'phone' => $request->phone,
                'referral_contact' => $request->referral_contact,
                'position' => $request->position,
                'country' => $request->country,
                'parent_id' => $request->parent_id,
            ]);

            // Redirect with success message
            return redirect()->route('users.data.index')->with('success', 'User updated successfully');

        } catch (\Exception $e) {
            // Catch any exception and provide feedback
            return redirect()->back()->with('error', 'An error occurred while updating the user: '.$e->getMessage());
        }
    }

    public function delete($id)
    {
        $users = UserData::findOrFail($id);
        $use = User::findOrFail($users->user_id);
        $use->delete();

        return redirect()->back()->with('success', 'Data deleted');
    }
}
