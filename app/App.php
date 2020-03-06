<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $fillable = [
    	'ipa', 'image', 'identifier', 'name', 'downloads', 'banner', 'favorite', 'description',
    ];

    public function getUrl()
    {
    	return env('APP_URL') . '/storage/' . $this->ipa;
    }

    public function getImageUrl()
    {
        return env('APP_URL') . '/storage/' . $this->image;
    }

    public function getBannerUrl()
    {
        return env('APP_URL') . '/storage/' . $this->banner;
    }

    public function getDetails()
    {
        $app = [];

        $app['identifier'] = $this->identifier . '.' . $this->name;
        $app['image'] = $this->getImageUrl();
        $app['banner'] = $this->getBannerUrl();
        $app['ipa'] = $this->getUrl();
        $app['favorite'] = (bool) $this->favorite;

        return $app;
    }

    public static function getFormattedApps()
    {
        $apps = [];

        foreach(App::all() as $app)
        {
            $app->identifier = $app->identifier . '.' . $app->name;
            $app->image = $app->getImageUrl();
            $app->banner = $app->getBannerUrl();
            $app->ipa = $app->getUrl();
            $app->favorite = (bool) $app->favorite;

            $apps[] = $app;
        }

        return $apps;
    }
}
