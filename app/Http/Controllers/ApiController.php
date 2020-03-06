<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\App;

class ApiController extends Controller
{
    public function all()
    {
        return response()->json(App::getFormattedApps());
    }

    public function details(Request $request, App $app)
    {
    	return response()->json($app->getDetails());
    }

    public function download(Request $request, App $app)
    {
    	return response()->json([
            'app_id' => $app->id,
            'download_url' => 'itms-services://?action=download-manifest&url=' . route('app.download', ['app' => $app])
        ]);
    }
}
