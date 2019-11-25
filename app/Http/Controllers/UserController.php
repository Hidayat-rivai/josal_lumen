<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Pelanggan;

class UserController extends Controller
{
     /**
     * Instantiate a new UserController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Get the authenticated User.
     *
     * @return Response
     */
    public function pelanggan_profile()
    {   
        $arrUser = array();
        if(auth::user()->role == 1){
            $user = Auth::user();
            $arrPelanggan = array();
            $arrPerusahaan = array();
            
            $arrUser['id'] = $user->id;
            $arrUser['username'] = $user->username;
            $arrUser['email'] = $user->email;
            $arrUser['nomor_hp'] = $user->nomor_hp;
            $arrUser['status'] = $user->status;
            $arrUser['status_text'] = $user->getStatus();
            $arrUser['role'] = $user->role;
            $arrUser['role_text'] = $user->getRole();
            
            $pelanggan = Pelanggan::where('id_user',$user->id)->first();
            if($pelanggan){
                $arrPelanggan['id'] = $pelanggan->id;
                $arrPelanggan['nama_depan'] = $pelanggan->nama_depan;
                $arrPelanggan['nama_belakang'] = $pelanggan->nama_belakang;
            }
            return response()->json(['profile' => $arrUser], 200);
        } else {
            return response()->json(['profile' => $arrUser], 403);
        }

    }
    /**
     * Get all User.
     *
     * @return Response
     */
    public function allUsers()
    {
         return response()->json(['users' =>  User::all()], 200);
    }
    /**
     * Get one user.
     *
     * @return Response
     */
    public function singleUser($id)
    {
        try {
            $user = User::findOrFail($id);
            return response()->json(['user' => $user], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'user not found!'], 404);
        }
    }
}