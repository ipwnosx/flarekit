<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\App;

class AppController extends Controller
{
    public function home()
    {
    	return view('home')->with('apps', App::all());
    }

    public function new(Request $request)
    {
    	$request->validate([
    		'ipa_name' => 'required|string',
    		'ipa_identifier' => 'required|string',
            'ipa_description' => 'required|string',
    		'ipa_image' => 'required|file',
    		'ipa_file' => 'required|file',
            'ipa_banner' => 'required|file',
    	]);

        $image_name = \Uuid::generate()->string;
        $ipa_name = \Uuid::generate()->string;
        $banner_name = \Uuid::generate()->string;

    	App::create([
    		'name' => $request->input('ipa_name'),
    		'identifier' => $request->input('ipa_identifier'),
            'description' => $request->input('ipa_description'),
    		'image' => $image_name,
    		'ipa' => $ipa_name,
            'banner' => $banner_name,
    	]);

    	$request->file('ipa_image')->storeAs('public', $image_name);
        $request->file('ipa_banner')->storeAs('public', $banner_name);
    	$request->file('ipa_file')->storeAs('public', $ipa_name);

    	return redirect()->route('home');
    }

    public function delete(Request $request, App $app)
    {
        $app->delete();

        return redirect()->route('home');
    }

    public function favorite(Request $request, App $app)
    {
        $app->favorite = true;
        $app->save();

        return redirect()->route('home');
    }

    public function unfavorite(Request $request, App $app)
    {
        $app->favorite = false;
        $app->save();

        return redirect()->route('home');
    }
}
