<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\WebsiteSetting;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Laravel\Facades\Image;

class WebsiteSettingController extends Controller
{
    public function websiteSetting(){
        $website_setting = WebsiteSetting::first();
        return view('admin.layouts.pages.website.website_setting', compact('website_setting'));
    }

    public function websiteSettingUpdate(Request $request){

        $website_settings = WebsiteSetting::first();

        // Website logo upload and delete old website logo
        $newWebsite_logo = $this->websiteLogoUpload($request);
        if ($newWebsite_logo) {
            $oldImagePath = public_path($website_settings->website_logo);
            if ($website_settings->website_logo && file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
            $website_settings->website_logo = $newWebsite_logo;
        }

        // Old Favicon delete and new favicon upload
        $newFavicon = $this->websiteFavIconUpload($request);
        if($newFavicon){
            $oldfaviconPath = public_path($website_settings->website_favicon);
            if ($website_settings->website_favicon && file_exists($oldfaviconPath)) {
                unlink($oldfaviconPath);
            }
            $website_settings->website_favicon = $newFavicon;
        }


        // Old Footer Logo delete and new Footer logo upload
        $newFooterLogo = $this->websiteFooterLogoUpload($request);
        if($newFooterLogo){
            $oldFooterLogo = public_path($website_settings->website_footer_logo);
            if ($website_settings->website_footer_logo && file_exists($oldFooterLogo)) {
                unlink($oldFooterLogo);
            }
            $website_settings->website_footer_logo = $newFooterLogo;
        }


        // Old Footer background image delete and new Footer background image upload
        $newFooterBgLogo = $this->websiteFooterBgUpload($request);
        if($newFooterBgLogo){
            $oldFooterBgLogo = public_path($website_settings->website_footer_bg);
            if ($website_settings->website_footer_bg && file_exists($oldFooterBgLogo)) {
                unlink($oldFooterBgLogo);
            }
            $website_settings->website_footer_bg = $newFooterBgLogo;
        }


        $website_settings->update([
            'website_title' => $request->website_title,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'copyright_text' => $request->copyright_text,
            'website_logo' => $website_settings->website_logo,
            'website_favicon' => $website_settings->website_favicon,
            'website_footer_logo' => $website_settings->website_footer_logo,
            'website_footer_bg' => $website_settings->website_footer_bg,
        ]);
        Toastr::success('Website settings updated successfully.');
        return redirect()->back();
    }


    private function websiteLogoUpload(Request $request){
        if ($request->hasFile('website_logo')) {
            $image = Image::read($request->file('website_logo'));
            $imageName = time() . '-' . $request->file('website_logo')->getClientOriginalName();
            $destinationPath = public_path('uploads/website_settings/');
            $image->save($destinationPath . $imageName);

            return 'uploads/website_settings/' . $imageName;

        }

        return null;
    }


    private function websiteFavIconUpload(Request $request){
        if ($request->hasFile('website_favicon')) {
            $image = Image::read($request->file('website_favicon'));
            $imageName = time() . '-' . $request->file('website_favicon')->getClientOriginalName();
            $destinationPath = public_path('uploads/website_settings/');
            $image->save($destinationPath . $imageName);

            return 'uploads/website_settings/' . $imageName;

        }
        return null;
    }

    private function websiteFooterLogoUpload(Request $request){
        if ($request->hasFile('website_footer_logo')) {
            $image = Image::read($request->file('website_footer_logo'));
            $imageName = time() . '-' . $request->file('website_footer_logo')->getClientOriginalName();
            $destinationPath = public_path('uploads/website_settings/');
            $image->save($destinationPath . $imageName);

            return 'uploads/website_settings/' . $imageName;

        }
        return null;
    }


    private function websiteFooterBgUpload(Request $request){
        if ($request->hasFile('website_footer_bg')) {
            $image = Image::read($request->file('website_footer_bg'));
            $imageName = time() . '-' . $request->file('website_footer_bg')->getClientOriginalName();
            $destinationPath = public_path('uploads/website_settings/');
            $image->save($destinationPath . $imageName);

            return 'uploads/website_settings/' . $imageName;

        }
        return null;
    }


}
