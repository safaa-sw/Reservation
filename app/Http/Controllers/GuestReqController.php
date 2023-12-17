<?php

namespace App\Http\Controllers;

use App\Models\GuestReq;
use App\Models\Guest;
use App\Models\Country;
use App\Models\PassportInfo;
use App\Models\FileInfo;
use App\Models\AccommodationInfo;
use App\Models\CompanionInfo;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class GuestReqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $guestreqs = GuestReq::with('guest')->paginate(8);
        return view('guestreqs.index', compact('guestreqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "true";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GuestReq  $guestReq
     * @return \Illuminate\Http\Response
     */
    public function show($guestReqId)
    {
        $guestreq = GuestReq::find($guestReqId);
        $guestId = Guest::where('id', $guestreq->guest_id)->first();
        $passportInfo = PassportInfo::where('guest_req_id', $guestreq->id)->first();

        $guestReqData = [
            'mobile' => $guestreq->mobile,
            'status' => $guestreq->status,
            'firstname' => $passportInfo->firstname,
            'lastname' => $passportInfo->lastname,
            'birthdate' => $passportInfo->birthdate,
            'passport_no' => $passportInfo->passport_no,
            'issue_date' => $passportInfo->issue_date,
            'expiry_date' => $passportInfo->expiry_date,
            'arrival_date' => $passportInfo->arrival_date,
            'profession' => $passportInfo->profession,
            'organization' => $passportInfo->organization,
            'visa_duration' => $passportInfo->visa_duration,
        ];

        ////gender
        $guestReqData['gender'] = ($passportInfo->gender == 0) ? 'Male' : 'Female';

        ////birth_place
        $country = Country::find($passportInfo->birth_place);
        $guestReqData['birth_place'] = $country->name;

        ////residency_country
        $country = Country::find($passportInfo->residency_country);
        $guestReqData['residency_country'] = $country->name;

        ////issue_place
        $country = Country::find($passportInfo->issue_place);
        $guestReqData['issue_place'] = $country->name;

        ////visa_status
        $guestReqData['visa_status'] = ($passportInfo->visa_status == 0) ? 'Multiple' : 'Single';

        ////companion
        $companionInfo = CompanionInfo::where('guest_req_id', $guestreq->id)->first();
        $guestReqData['companion'] = ($companionInfo != null) ? 1 : 0;

        ////accommodation info
        $accommodationInfos = AccommodationInfo::where('guest_req_id', $guestreq->id)->get();
        foreach ($accommodationInfos as $item) {
            if ($item->type == 1) {
                $guestReqData['eligible-checkin'] = $item->checkin;
                $guestReqData['eligible-checkout'] = $item->checkout;
                //roomtype
                $guestReqData['eligible-roomtype'] = ($item->roomtype == 0) ? 'King Bed' : 'Twin Bed';
            } else {
                $guestReqData['extra-checkin'] = $item->checkin;
                $guestReqData['extra-checkout'] = $item->checkout;
                //roomtype
                $guestReqData['extra-roomtype'] = ($item->roomtype == 0) ? 'King Bed' : 'Twin Bed';
            }
        }

        ////Picture and Passport Picture
        $fileInfos = FileInfo::where('guest_req_id', $guestreq->id)->get();
        foreach ($fileInfos as $item) {
            if ($item->filetype == 1) {
                $guestReqData['passport-picture'] = $item->file;
            }
            if ($item->filetype == 2) {
                $guestReqData['personal-picture'] = $item->file;
            }
        }

        return view('guestreqs.show', compact('guestReqData', 'guestReqId', 'guestId'));
    }

    /**Companion Show */
    public function companionShow($guestReqId)
    {

        $guestreq = GuestReq::find($guestReqId);
        $companionInfo = CompanionInfo::where('guest_req_id', $guestreq->id)->first();

        $companionData = [
            'firstname' => $companionInfo->firstname,
            'lastname' => $companionInfo->lastname,
            'birthdate' => $companionInfo->birthdate,
            'passport_no' => $companionInfo->passport_no,
            'issue_date' => $companionInfo->issue_date,
            'expiry_date' => $companionInfo->expiry_date,
            'arrival_date' => $companionInfo->arrival_date,
            'profession' => $companionInfo->profession,
            'organization' => $companionInfo->organization,
            'visa_duration' => $companionInfo->visa_duration,
        ];

        ////gender
        $companionData['gender'] = ($companionInfo->gender == 0) ? 'Male' : 'Female';

        ////birth_place
        $country = Country::find($companionInfo->birth_place);
        $companionData['birth_place'] = $country->name;

        ////residency_country
        $country = Country::find($companionInfo->residency_country);
        $companionData['residency_country'] = $country->name;

        ////issue_place
        $country = Country::find($companionInfo->issue_place);
        $companionData['issue_place'] = $country->name;

        ////visa_status
        $companionData['visa_status'] = ($companionInfo->visa_status == 0) ? 'Multiple' : 'Single';

        ////Picture and Passport Picture
        $fileInfos = FileInfo::where('guest_req_id', $guestreq->id)->get();
        foreach ($fileInfos as $item) {
            if ($item->filetype == 3) {
                $companionData['passport-picture'] = $item->file;
            }
            if ($item->filetype == 4) {
                $companionData['personal-picture'] = $item->file;
            }
        }

        return view('guestreqs.companionShow', compact('companionData', 'guestReqId'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GuestReq  $guestReq
     * @return \Illuminate\Http\Response
     */
    public function edit(GuestReq $guestReq)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\GuestReq  $guestReq
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuestReq $guestReq)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GuestReq  $guestReq
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuestReq $guestReq)
    {
        //
    }

    //////////////////// Function For Guest Request Info/////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////////////////////////////

    public function welcomeGuest($id)
    {
        $guest = Guest::findOrFail($id);

        return view('guestreqs.welcomeGuest', compact('guest'));
    }

    public function finalGuest()
    {
        return view('guestreqs.finalGuest');
    }

    public function mobileInfo($guestId)
    {
        $guest = Guest::findOrFail($guestId);
        $countries = Country::all();
        return view('guestreqs.mobileInfo', compact('guest', 'countries'));
    }

    public function addMobileInfo(Request $request, $guestId)
    {
        $guestReq = new GuestReq();
        $guestReq->guest_id = $guestId;
        $countryId = $request->countryCode;
        $country = Country::find($countryId);
        $countryCode = (string) $country->phonecode;
        $mobile = $request->mobile;
        $mobileNo = '+' . $countryCode . $mobile;
        $guestReq->mobile = $mobileNo;
        //$guestReq->otpcode = $request->otpCode;

        if ($guestReq->save()) {
            Alert::success('Success', 'Your Mobile Infos added Successfully');
            $guestReqId = $guestReq->id;
            return redirect()->route('guestreqs.passportInfo', ['guestReqId' => $guestReqId]);
        } else {
            Alert::error('Error', 'Problem While Saving, Please Try Again');
            return redirect()->back();
        }
    }

    /////////////////////////////////////////////////////////////////
    public function passportInfo($guestReqId)
    {
        $countries = Country::all();
        return view('guestreqs.passportInfo', compact('guestReqId', 'countries'));
    }

    public function addPassportInfo(Request $request, $guestReqId)
    {
        $passportInfo = PassportInfo::where('guest_req_id', $guestReqId)->first();
        if ($passportInfo == null)
            $passportInfo = new PassportInfo();
        $passportInfo->guest_req_id = $guestReqId;
        $passportInfo->firstname = $request->firstname;
        $passportInfo->lastname = $request->lastname;
        $passportInfo->birthdate = $request->birthdate;
        $passportInfo->gender = $request->gender;
        $passportInfo->birth_place = $request->birth_place;
        $passportInfo->residency_country = $request->residency_country;
        $passportInfo->passport_no = $request->passport_no;
        $passportInfo->issue_date = $request->issue_date;
        $passportInfo->expiry_date = $request->expiry_date;
        $passportInfo->issue_place = $request->issue_place;
        $passportInfo->arrival_date = $request->arrival_date;
        $passportInfo->profession = $request->profession;
        $passportInfo->organization = $request->organization;
        $passportInfo->visa_duration = $request->visa_duration;
        $passportInfo->visa_status = $request->visa_status;

        //For Passport Picture
        $filePassport = FileInfo::where('guest_req_id', $guestReqId)->where('filetype', '=', 1)->first();
        if ($filePassport == null)
            $filePassport = new FileInfo();
        $filePassport->guest_req_id = $guestReqId;
        $filePassport->filetype = 1; //filetype = 1 for passport picture
        $passportPhoto = $request->passportPic;
        $newPassPhoto = time() . $passportPhoto->getClientOriginalName();
        $passportPhoto->move('passportImages', $newPassPhoto);
        $filePassport->file = 'passportImages/' . $newPassPhoto;

        //For Personal Picture
        $filePersonal = FileInfo::where('guest_req_id', $guestReqId)->where('filetype', '=', 2)->first();
        if ($filePersonal == null)
            $filePersonal = new FileInfo();
        $filePersonal->guest_req_id = $guestReqId;
        $filePersonal->filetype = 2; //filetype = 2 for personal picture
        $personalPhoto = $request->personalPic;
        $newPersPhoto = time() . $personalPhoto->getClientOriginalName();
        $personalPhoto->move('personalImages', $newPersPhoto);
        $filePersonal->file = 'personalImages/' . $newPersPhoto;

        if (($passportInfo->save()) && ($filePassport->save()) && ($filePersonal->save())) {
            Alert::success('Success', 'Your Passport Infos added Successfully');
            if ($request->withcompanion == 0) {
                return redirect()->route('guestreqs.accommodationInfo', ['guestReqId' => $guestReqId]);
            } else {
                return redirect()->route('guestreqs.companionInfo', ['guestReqId' => $guestReqId]);
            }
        } else {
            Alert::error('Error', 'Problem While Saving, Please Try Again');
            return redirect()->back();
        }
    }
    /////////////////////////////////////////////////////////////////

    public function accommodationInfo($guestReqId)
    {
        return view('guestreqs.accommodationInfo', compact('guestReqId'));
    }

    public function addAccommodationInfo(Request $request, $guestReqId)
    {
        $accommodationInfo = AccommodationInfo::where('guest_req_id', $guestReqId)->where('type', '=', 1)->first();
        if ($accommodationInfo == null)
            $accommodationInfo = new AccommodationInfo();
        $accommodationInfo->guest_req_id = $guestReqId;
        $accommodationInfo->type = 1; // type=1 for Eligible Night
        $accommodationInfo->checkin = $request->checkin;
        $accommodationInfo->checkout = $request->checkout;
        $accommodationInfo->roomtype = $request->roomtype;

        if ($request->checkinExtra) {
            $accommodationExtra = AccommodationInfo::where('guest_req_id', $guestReqId)->where('type', '=', 2)->first();
            if ($accommodationExtra == null)
                $accommodationExtra = new AccommodationInfo();
            $accommodationExtra->guest_req_id = $guestReqId;
            $accommodationExtra->type = 2; // type=2 for Extra Night
            $accommodationExtra->checkin = $request->checkinExtra;
            $accommodationExtra->checkout = $request->checkoutExtra;
            $accommodationExtra->roomtype = $request->roomtypeExtra;

            if (($accommodationInfo->save()) && ($accommodationExtra->save())) {
                Alert::success('Success', 'Your Accommodation Infos added Successfully');
                return redirect()->route('finalGuest');
            } else {
                Alert::error('Error', 'Problem While Saving, Please Try Again');
                return redirect()->back();
            }
        } else {
            if ($accommodationInfo->save()) {
                Alert::success('Success', 'Your Accommodation Infos added Successfully');
                return redirect()->route('finalGuest');
            } else {
                Alert::error('Error', 'Problem While Saving, Please Try Again');
                return redirect()->back();
            }
        }
    }

    /////////////////////////////////////////////////////////////////////
    public function companionInfo($guestReqId)
    {
        $countries = Country::all();
        return view('guestreqs.companionInfo', compact('guestReqId', 'countries'));
    }

    public function addCompanionInfo(Request $request, $guestReqId)
    {
        $companionInfo = CompanionInfo::where('guest_req_id', $guestReqId)->first();
        if ($companionInfo == null)
            $companionInfo = new CompanionInfo();
        $companionInfo->guest_req_id = $guestReqId;
        $companionInfo->firstname = $request->firstname;
        $companionInfo->lastname = $request->lastname;
        $companionInfo->birthdate = $request->birthdate;
        $companionInfo->gender = $request->gender;
        $companionInfo->birth_place = $request->birth_place;
        $companionInfo->residency_country = $request->residency_country;
        $companionInfo->passport_no = $request->passport_no;
        $companionInfo->issue_date = $request->issue_date;
        $companionInfo->expiry_date = $request->expiry_date;
        $companionInfo->issue_place = $request->issue_place;
        $companionInfo->arrival_date = $request->arrival_date;
        $companionInfo->profession = $request->profession;
        $companionInfo->organization = $request->organization;
        $companionInfo->visa_duration = $request->visa_duration;
        $companionInfo->visa_status = $request->visa_status;

        //For Companion Passport Picture
        $filePassport = FileInfo::where('guest_req_id', $guestReqId)->where('filetype', '=', 3)->first();
        if ($filePassport == null)
            $filePassport = new FileInfo();
        $filePassport->guest_req_id = $guestReqId;
        $filePassport->filetype = 3; //filetype = 3 for companion passport picture
        $passportPhoto = $request->passportPic;
        $newPassPhoto = time() . $passportPhoto->getClientOriginalName();
        $passportPhoto->move('passportImages', $newPassPhoto);
        $filePassport->file = 'passportImages/' . $newPassPhoto;

        //For Companion Personal Picture
        $filePersonal = FileInfo::where('guest_req_id', $guestReqId)->where('filetype', '=', 4)->first();
        if ($filePersonal == null)
            $filePersonal = new FileInfo();
        $filePersonal->guest_req_id = $guestReqId;
        $filePersonal->filetype = 4; //filetype = 4 for companion personal picture
        $personalPhoto = $request->personalPic;
        $newPersPhoto = time() . $personalPhoto->getClientOriginalName();
        $personalPhoto->move('personalImages', $newPersPhoto);
        $filePersonal->file = 'personalImages/' . $newPersPhoto;

        if (($companionInfo->save()) && ($filePassport->save()) && ($filePersonal->save())) {
            Alert::success('Success', 'Companion Infos added Successfully');
            return redirect()->route('guestreqs.accommodationInfo', ['guestReqId' => $guestReqId]);
        } else {
            Alert::error('Error', 'Problem While Saving, Please Try Again');
            return redirect()->back();
        }
    }
}
