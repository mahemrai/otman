<?php
namespace Otman\Http\Controllers\Entity;

use File;
use Image;
use Input;
use Validator;
use Otman\User;
use Otman\UserProfile;
use Otman\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/**
 * @package Otman
 * @uses    Controller
 * @author  Mahendra Rai
 */
class ProfileController extends Controller
{
    public function __construct()
    {
    }

    /**
     * @param  int
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        if (is_null($user->profile)) {
            return redirect('/profile')->with('user', $user);
        }

        return view('entity.profile.show')->with('user', $user);
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->validate($request, array(
            'salutation' => 'required',
            'firstname'  => 'required',
            'lastname'   => 'required',
            'job_title'  => 'required'
        ));

        $profile = new UserProfile();
        $profile->salutation = $request->salutation;
        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->job_title = $request->job_title;

        $user = Auth::User();

        if ($user->profile()->save($profile)) {
            return redirect('/dashboard')->with('success', 'Your profile was successfully updated.');
        }

        return view('entity.profile.new')->with('fail', 'Your profile could not be saved. Please try again.');
    }

    /**
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, array(
            'salutation' => 'required',
            'firstname'  => 'required',
            'lastname'   => 'required',
            'job_title'  => 'required'
        ));

        $profile = UserProfile::where('user_id', Auth::User()->id)->first();
        $profile->salutation = $request->salutation;
        $profile->firstname = $request->firstname;
        $profile->lastname = $request->lastname;
        $profile->job_title = $request->job_title;

        if ($request->role) {
            $profile->role = $request->role;
        }

        $user = Auth::User();

        if ($user->profile()->save($profile)) {
            return redirect('/dashboard')->with('success', 'Your profile was successfully updated.');
        }

        return view('entity.profile.edit')->with('fail', 'Your profile could not be saved. Please try again.');     
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function newProfile()
    {
        return view('entity.profile.new');
    }

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editProfile($id)
    {
        $user = User::find($id);
        return view('entity.profile.edit')->with('user', $user);
    }

    /**
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function profileImage($id = null)
    {
        if (is_null($id)) {
            return view('entity.profile.image-upload');
        }
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function uploadImage()
    {
        // get user's profile
        $profile = UserProfile::where('user_id', Auth::User()->id)->first();

        // delete the current profile image if user already has one
        if ($profile->profile_image) {
            File::delete('images/profile-image/' . $profile->profile_image);
        }

        // generate a hash using user's firstname, lastname and current date and time
        $hash = crc32(Auth::User()->firstname . Auth::User()->lastname . date('Y-m-d H:i:s'));
        $filename = $hash . '.jpg';
        // directory to save the image
        $filepath = 'images/profile-image/' . $filename;
        // create an image, resize it and save it
        $image = Image::make(Input::file('profile-image'))->resize(400, 400)
                                                          ->save($filepath);

        // add image filename to the user's profile data if the image was saved successfully
        if ($image) {
            $profile->profile_image = $image->basename;

            if ($profile->save()) {
                return redirect('/dashboard')->with('success', 'Your profile image was successfully updated.');
            }
        }

        // delete the image if it could not be saved
        File::delete('images/profile-image/' . $image->basename);
        return view('entity.profile.image-upload')->with('fail', 'Could update your profile image. Try again.');
    }
}