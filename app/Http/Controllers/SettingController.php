<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    public function edit()
    {
        $settingsData = Setting::where("id", 1)->first();
        return view("backoffice.settings", compact("settingsData"));
    }

    public function update(Request $request)
    {
        $updateSettingsData = [
            "notification_text" => $request->update_settings_notification,
            "footer_text" => $request->update_settings_footer,
        ];
        if ($request->update_settings_logo) {
            $imageLogo = $request->file("update_settings_logo");
            $imageLogoName = time() . "-" . $imageLogo->getClientOriginalName();
            $imageLogo->storeAs("settings_img", $imageLogoName, "public");
            $updateSettingsData['logo_img'] = "storage/settings_img/" . $imageLogoName;
        }
        if ($request->update_settings_slider_one_img) {
            $imageSliderOne = $request->file("update_settings_slider_one_img");
            $imageSliderOneName = time() . "-" . $imageSliderOne->getClientOriginalName();
            $imageSliderOne->storeAs("settings_img/", $imageSliderOneName, "public");
            $updateSettingsData["slider_one_img"] = "storage/settings_img/" . $imageSliderOneName;
        }
        if ($request->update_settings_slider_two_img) {
            $imageSliderTwo = $request->file("update_settings_slider_two_img");
            $imageSliderTwoName = time() . "-" . $imageSliderTwo->getClientOriginalName();
            $imageSliderTwo->storeAs("settings_img/", $imageSliderTwoName, "public");
            $updateSettingsData["slider_two_img"] = "storage/settings_img/" . $imageSliderTwoName;
        }
        Setting::where("id", 1)->update(array_filter($updateSettingsData));
        return redirect()->route("settings.edit");
    }
}
