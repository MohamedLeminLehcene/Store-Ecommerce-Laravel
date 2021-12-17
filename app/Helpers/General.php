<?php


function get_Language_Active()
{
              return App\Models\Language::Active()->Selection()->get();
}


function get_default_lang()
{
              return Config::get('app.locale');
}


function uploadImage($folder,$image)
{
              $image -> store('/',$folder);
              $file_name = $image -> hashName();
              $path = 'images/' . $folder . '/' . $file_name;
              return $path;
}
