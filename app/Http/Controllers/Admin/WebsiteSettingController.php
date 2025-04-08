<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Brian2694\Toastr\Facades\Toastr;

class WebsiteSettingController extends Controller
{
    public function websiteSetting(){
        $website_setting = WebsiteSetting::first();
        return view('admin.layouts.pages.website.website_setting', compact('website_setting'));
    }

    public function websiteSettingUpdate(Request $request, $id){

        $website_settings = WebsiteSetting::first();
        $website_settings->update([
            'website_title' => $request->website_title,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'copyright_text' => $request->copyright_text,
        ]);
        Toastr::success('Website settings updated successfully.');
        return redirect()->back();
    }
}
