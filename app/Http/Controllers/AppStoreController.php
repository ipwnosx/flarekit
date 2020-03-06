<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\App;

class AppStoreController extends Controller
{
    public function home()
    {
    	return view('appstore.home')
    		->with('featured', App::where('favorite', '=', true)->get())
    		->with('newest', App::orderBy('id', 'desc')->take(3)->get())
    		->with('popular', App::orderBy('downloads', 'desc')->take(3)->get());
    }

    public function json()
    {
    	return response()->json(App::getFormattedApps());
    }

    public function plist(Request $request, App $app)
    {
    	$app->downloads = $app->downloads + 1;
    	$app->save();

    	return view('plist')->with('app', $app);
    }

    public function search()
    {
        return view('appstore.search');
    }

    public function handleSearch(Request $request)
    {
        $request->validate([
            'search' => 'required|string',
        ]);

        $apps = App::where('name', 'like', '%' . $request->input('search') . '%')->get();

        $return = [];
        foreach($apps as $app)
        {
            $return[] = [
                'name' => $app->name,
                'image' => $app->getImageUrl(),
                'download_url' => $app->getUrl(),
                'description' => $app->description,
            ];
        }

        return response()->json($return);
    }
}
