<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use DB;
use App\User;
use App\Setting;
use App\School;
use App\Session;
use Hash;
use URL;
class Installation extends Controller
{
    public function step0() {
        
        $this->writeEnvironmentFile('APP_URL', URL::to('/'));
        return view('backend.installation.step0');
    }

    public function step1() {
        $permission['curl_enabled']           = function_exists('curl_version');
        $permission['db_file_write_perm']     = is_writable(base_path('.env'));
        $permission['routes_file_write_perm'] = is_writable(base_path('app/Providers/RouteServiceProvider.php'));
        return view('backend.installation.step1', compact('permission'));
    }

    public function step2() {
        return view('backend.installation.step2');
    }

    public function step3($error = "") {

        if($error == ""){
            return view('backend.installation.step3');
        }else {
            return view('backend.installation.step3', compact('error'));
        }
    }

    public function step4() {
        return view('backend.installation.step4');
    }

    public function step5() {
        return view('backend.installation.step5');
    }

    public function step6() {
        return view('backend.installation.step6');
    }

    public function purchase_code(Request $request) {
        $request->session()->put('purchase_code', $request->purchase_code);
        return redirect('step3');
    }


    public function system_settings(Request $request) {
        $settings = new Setting;
        $school   = new School;
        $user     = new User;
        $session  = new Session;

        $school->name = $request->school_name;
        $school->save();

        $session->name      = $request->running_session;
        $session->status    = 1;
        $session->school_id = $school->id;
        $session->save();

        $this->writeEnvironmentFile('APP_NAME', $request->system_name);
        $settings->system_name     = $request->system_name;
        $settings->system_email    = $request->system_email;
        $settings->selected_branch = $school->id;
        $settings->running_session = $session->id;
        $settings->purchase_code   = $request->session()->get('purchase_code');
        $settings->save();

        $user->name     = $request->admin_name;
        $user->email    = $request->admin_email;
        $user->password = Hash::make($request->admin_password);
        $user->role     = 'superadmin';
        $user->save();

        $this->writeEnvironmentFile('TIMEZONE', $request->timezone);

        return redirect('step6');
    }
    public function database_installation(Request $request) {

        if(self::check_database_connection($request->DB_HOST, $request->DB_DATABASE, $request->DB_USERNAME, $request->DB_PASSWORD)) {
            $path = base_path('.env');
            if (file_exists($path)) {
                foreach ($request->types as $type) {
                    file_put_contents($path, str_replace(
                        $type.'='.env($type), $type.'='.$request[$type], file_get_contents($path)
                    ));
                }
                return redirect('step4');
            }else {
                return redirect('step3');
            }
        }else {
            return redirect('step3/database_error');
        }
    }

    public function import_sql() {
        $sql_path = base_path('install.sql');
        DB::unprepared(file_get_contents($sql_path));
        return redirect('step5');
    }

    function check_database_connection($db_host = "", $db_name = "", $db_user = "", $db_pass = "") {

        if(@mysqli_connect($db_host, $db_user, $db_pass, $db_name)) {
            return true;
        }else {
            return false;
        }
    }

    function login() {
        $previousRouteServiceProvier = base_path('app/Providers/RouteServiceProvider.php');
        $newRouteServiceProvier      = base_path('RouteServiceProvider.txt');
        copy($newRouteServiceProvier, $previousRouteServiceProvier);
        sleep(5);
        return redirect('login');
    }

    public function writeEnvironmentFile($type, $val) {
        $val = '"'.trim($val).'"';
        $path = base_path('.env');
            if (file_exists($path)) {
                file_put_contents($path, str_replace(
                    $type.'="'.env($type).'"', $type.'='.$val, file_get_contents($path)
                ));
            }
    }
}
