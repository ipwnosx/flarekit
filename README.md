# flare.0x15f.com

API Usage:

`/api/apps/all`

method returns JSON that's formatted like the following
```json
[
   {
      "id":1,
      "ipa":"https:\/\/flare.0x15f.com\/storage\/341c7b10-dd17-11e8-9ead-bdc602386162",
      "image":"https:\/\/flare.0x15f.com\/storage\/341c77a0-dd17-11e8-870c-0d087257bda0",
      "identifier":"com.tweakbox.Getting Over It!",
      "name":"Getting Over It!",
      "created_at":"2018-10-31 14:13:56",
      "updated_at":"2018-10-31 15:04:10",
      "downloads":7,
      "banner":"https:\/\/flare.0x15f.com\/storage\/341c7b90-dd17-11e8-8ea5-d5d1556c8da5",
      "favorite":false,
      "description":"description"
   }
]
```

`/api/apps/{ id }/details`

method returns JSON that's formatted like the following
```json
{
   "identifier":"com.tweakbox.Getting Over It!",
   "image":"https:\/\/flare.0x15f.com\/storage\/341c77a0-dd17-11e8-870c-0d087257bda0",
   "banner":"https:\/\/flare.0x15f.com\/storage\/341c7b90-dd17-11e8-8ea5-d5d1556c8da5",
   "ipa":"https:\/\/flare.0x15f.com\/storage\/341c7b10-dd17-11e8-9ead-bdc602386162",
   "favorite":false
}
```

`/api/apps/{ id }/download`

method returns JSON that's formatted like the following
```json
{
   "app_id":1,
   "download_url":"itms-services:\/\/?action=download-manifest&url=https:\/\/flare.0x15f.com\/apps\/1\/plist"
}
```
