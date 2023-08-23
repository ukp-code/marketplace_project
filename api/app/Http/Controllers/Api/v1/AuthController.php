<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    // public $_frontendUrl;
    // public $defaultProfileImage;
    // public $_smsGetway;
    // private $mangopay;

    // public function __construct(MangoPayServiceInterface $mangopay)
    // {
    //     $this->_frontendUrl = env("FRONTEND_URL");
    //     $this->defaultProfileImage = mediaHelper::getAwsFile('/uploads/default-avatar.jpg');
    //     $this->_smsGetway = env("SMS_GETWAY");
    //     $this->mangopay = $mangopay;
    // }


    public function login(LoginRequest $request)
    {
        try {
            $userdata = [
                'email' => trim($request['email']),
                'password' => trim($request['password']),
            ];
            if (Auth::attempt($userdata)) {
                $user = Auth::user();
                // if ($user->status == 'PENDING') {
                //     return response()->json(['success'   => false, 'message'   => 'Invalid email or password']);
                // }
                // return $user;
                $authData = [
                    'role' => $user->role,
                    'name' => $user->name,
                    'email' => $user->email,
                    'profileImage' => $user->avatar,
                    'token' => $user->createToken($user->name)->plainTextToken,
                    'token_type' => 'Bearer',
                ];
                return response()->json(['success'   => true, 'authData' => $authData]);
            } else {
                return response()->json(['success'   => false, 'message'   => 'Invalid email or password']);
            }
        } catch (\Throwable $th) {
            //throw $th;
            /*CREATE ERROR LOGS*/
            // $errorLogData = array(
            //     'user_id' => 0,
            //     'section' => 'Login',
            //     'error_message' => $th->getMessage(),
            //     'category_id' => 0,
            //     'request' => json_encode($requestDecryptData),
            //     'response' => '',
            // );
            // dbHelpers::createErrorLogs($errorLogData);
            return response()->json(['success'   => false, 'message' => $th,]);
        }
        // $requestDecryptData = $request->all();
        // // $requestDecryptData = $request->request_decrypt_data;
        // if (empty($requestDecryptData)) {
        //     return response()->json(['res_code' => 201, 'response' => 'Parameter is missing.'], 200);
        // }

        // $rules = [
        //     'email' => 'required|email',
        //     'password' => 'required|min:6',
        // ];

        // $messages = [
        //     'email.required' => 'Your email address is required.',
        //     'email.email' => 'Your email address is not a valid email.',
        //     'password.required' => 'Password is required.',
        //     'password.min' => 'The password must be at least 6 character',
        // ];
        // $validator = Validator::make($requestDecryptData, $rules, $messages);
        // if ($validator->fails()) {

        //     $validator = $validator->errors();
        //     $email = $validator->first('email');
        //     $password = $validator->first('password');
        //     if (!empty($email)) {
        //         $error = $email;
        //     } else if (!empty($password)) {
        //         $error = $password;
        //     }

        //     return response()->json(['res_code' => 201, 'response' => $error], 200);
        // } else {
        //     try {
        //         $userdata = array(
        //             'email' => trim($requestDecryptData['email']),
        //             'password' => trim($requestDecryptData['password']),
        //         );

        //         if (Auth::attempt($userdata)) {
        //             // return 'hi';

        //             $user = Auth::user();
        //             $status = !empty($user['status']) ? trim($user['status']) : 'Expired';
        //             // return $status;
        //             if ($status == 'Expired') {
        //                 return response()->json(['res_code' => 201, 'response' => 'Your account has expired, please contact Admin at info@altabooking.com'], 200);
        //             }
        //             if ($status == 'Blocked') {
        //                 return response()->json(['res_code' => 201, 'response' => 'Your account has blocked, please contact Admin at info@altabooking.com'], 200);
        //             } else if ($status == 'Inactive' || empty($user['mobile_number_verified'])) {
        //                 $emailFlag = 0;
        //                 $mobileFlag = 0;
        //                 if ($status == 'Inactive') {
        //                     $emailFlag = 1;
        //                 }
        //                 if (empty($user['mobile_number_verified'])) {
        //                     $mobileFlag = 1;
        //                 }

        //                 return response()->json([
        //                     'res_code' => 202,
        //                     'response' => 'Email id/phone no is not verified.',
        //                     'data' => array(
        //                         'mail_flag' => $emailFlag,
        //                         'mobile_flag' => $mobileFlag,
        //                         'email' => !empty($user['email']) ? $user['email'] : '',
        //                         'mobile_code' => !empty($user['mobile_code']) ? $user['mobile_code'] : '0',
        //                         'mobile_number' => !empty($user['mobile_number']) ? $user['mobile_number'] : '',
        //                         'token' => $user->createToken('AltaBooking')->accessToken,
        //                         'token_type' => 'Bearer',
        //                     )
        //                 ], 200);
        //             } else {

        //                 $userId = !empty($user['id']) ? $user['id'] : 0;

        //                 $checkUserData = UserDetail::with('Currency')->where('user_id', $userId)->first();

        //                 // return $checkUserData;

        //                 if (!empty($checkUserData) && !empty($checkUserData->profile_image)) {
        //                     $profileImage = mediaHelper::imageHelper('profile', $checkUserData->profile_image, 'default-avatar.jpg');
        //                 } else if (empty($checkUserData->profile_image)) {
        //                     $profileImage = $this->defaultProfileImage;
        //                 }

        //                 // return 'hi';

        //                 /* SAVE DEVICE INFORMATION */
        //                 $deviceId = !empty($requestDecryptData['device_id']) ? $requestDecryptData['device_id'] : '';
        //                 $deviceType = !empty($requestDecryptData['device_type']) ? $requestDecryptData['device_type'] : '';
        //                 $deviceToken = !empty($requestDecryptData['device_token']) ? $requestDecryptData['device_token'] : '';
        //                 $deviceName = !empty($requestDecryptData['device_name']) ? $requestDecryptData['device_name'] : '';
        //                 $modelName = !empty($requestDecryptData['model_name']) ? $requestDecryptData['model_name'] : '';
        //                 $osVersion = !empty($requestDecryptData['os_version']) ? $requestDecryptData['os_version'] : '';
        //                 if (!empty($deviceType) && !empty($deviceToken)) {
        //                     $deviceData = array(
        //                         'user_id' => $userId,
        //                         'device_id' => $deviceId,
        //                         'device_type' => $deviceType,
        //                         'device_token' => $deviceToken,
        //                         'device_name' => $deviceName,
        //                         'model_name' => $modelName,
        //                         'os_version' => $osVersion,
        //                     );
        //                     // pushNotificationHelpers::deviceTokenInsert($deviceData);
        //                 }
        //                 // return 'hi';

        //                 /* CHECKEMAIL MOBILE VERIFIY */
        //                 $email = !empty($user['email']) ? $user['email'] : '';
        //                 $registrationToken = !empty($user['registration_token']) ? $user['registration_token'] : '';
        //                 $mobileNumber = !empty($user['mobile_number']) ? $user['mobile_number'] : '';
        //                 $mobileNumberVerified = !empty($user['mobile_number_verified']) ? $user['mobile_number_verified'] : '';
        //                 $emailMobileVerify = helpers::checkEmailMobileVerify($email, $registrationToken, $mobileNumber, $mobileNumberVerified);

        //                 // return 'hi';
        //                 $data = array(
        //                     'id' => $userId,
        //                     'title' => !empty($user['title']) ? $user['title'] : '',
        //                     'role_id' => !empty($user['role_id']) ? $user['role_id'] : '',
        //                     'first_name' => !empty($user['first_name']) ? $user['first_name'] : '',
        //                     'last_name' => !empty($user['last_name']) ? $user['last_name'] : '',
        //                     'email' => !empty($user['email']) ? $user['email'] : '',
        //                     'iso' => !empty($user['iso']) ? $user['iso'] : 'ch',
        //                     'mobile_code' => !empty($user['mobile_code']) ? $user['mobile_code'] : '0',
        //                     'mobile_number' => !empty($user['mobile_number']) ? $user['mobile_number'] : '',
        //                     'birthday' => !empty($checkUserData->birthday) ? $checkUserData->birthday : '',
        //                     'nationality_id' => !empty($checkUserData->nationality_id) ? $checkUserData->nationality_id : 0,
        //                     'gender' => !empty($user['gender']) ? $user['gender'] : 'Male',
        //                     'profile_image' => $profileImage,
        //                     'user_link' => !empty($checkUserData->user_link) ? $checkUserData->user_link : '',
        //                     'company_name' => !empty($checkUserData->company_name) ? $checkUserData->company_name : '',
        //                     'token' => $user->createToken('AltaBooking')->accessToken,
        //                     'token_type' => 'Bearer',
        //                     'email_mobile_verify' => $emailMobileVerify,
        //                 );
        //                 // return $data;
        //                 /* USER DETAULT ADDRESS */
        //                 $defaultAddress = array();
        //                 $defaultResult = Address::getDefaultAddress($userId);
        //                 if (!empty($defaultResult)) {
        //                     $defaultAddress = array(
        //                         'address_id' => !empty($defaultResult->id) ? $defaultResult->id : 0,
        //                         'first_name' => !empty($defaultResult->first_name) ? $defaultResult->first_name : '',
        //                         'last_name' => !empty($defaultResult->last_name) ? $defaultResult->last_name : '',
        //                         'email' => !empty($defaultResult->email) ? $defaultResult->email : '',
        //                         'iso' => !empty($defaultResult->iso) ? $defaultResult->iso : 'ch',
        //                         'mobile_code' => !empty($defaultResult->mobile_code) ? $defaultResult->mobile_code : '',
        //                         'mobile_number' => !empty($defaultResult->mobile_number) ? $defaultResult->mobile_number : '',
        //                         'country_id' => !empty($defaultResult->country_id) ? $defaultResult->country_id : '',
        //                         'country_name' => !empty($defaultResult->country_name) ? $defaultResult->country_name : '',
        //                         'state_id' => !empty($defaultResult->state_id) ? $defaultResult->state_id : '',
        //                         'state_name' => !empty($defaultResult->state_name) ? $defaultResult->state_name : '',
        //                         'city' => !empty($defaultResult->city) ? $defaultResult->city : '',
        //                         'post_code' => !empty($defaultResult->post_code) ? $defaultResult->post_code : '',
        //                         'address' => !empty($defaultResult->address) ? $defaultResult->address : '',
        //                         'is_default' => !empty($defaultResult->is_default) ? (int) $defaultResult->is_default : 0,
        //                     );
        //                 }

        //                 /* CURRENCY */
        //                 $currencyId = !empty($checkUserData->currency_id) ? $checkUserData->currency_id : 0;
        //                 $currencyCode = !empty($checkUserData['Currency']->code) ? $checkUserData['Currency']->code : 0;
        //                 $currencySymbol = !empty($checkUserData['Currency']->symbol) ? $checkUserData['Currency']->symbol : 0;
        //                 $currencyInfo = array(
        //                     'currency_id' => $currencyId,
        //                     'currency_code' => $currencyCode,
        //                     'currency_symbol' => $currencySymbol,
        //                 );

        //                 /* USER ACCESS PRIORITY SECTION */
        //                 if (!empty($user['role_id']) && $user['role_id'] == 4) {
        //                     self::userAccessPriority($userId);
        //                 }

        //                 $priorityList = UserAccessPriority::userAccessPriorityList($userId);

        //                 /* WALLET INFORMATION */
        //                 $walletInformation = $this->walletInformationList($userId);

        //                 /* CATEGORY INFORMATION */
        //                 $userCategoryInfo = self::userCategoryList($userId);

        //                 /* Change SMS Notification */
        //                 // $receiverNumber = $data['mobile_code'] . $data['mobile_number'];
        //                 // $smsMessage = "Hello";
        //                 // $searchArr = array();
        //                 // $replaceArr = array();
        //                 // smsHelpers::sendMessageNotification($receiverNumber, $searchArr, $replaceArr, $smsMessage);
        //                 /* End Change SMS Notification */

        //                 // return 'hi';
        //                 /* ARRANGE DATA AFTER SUCCESSFULL LOGIN */
        //                 $responseData = array(
        //                     'profile' => $data,
        //                     "default_customer_info" => !empty($defaultAddress) ? $defaultAddress : (object) $defaultAddress,
        //                     'waller_info' => $walletInformation,
        //                     'currency_info' => $currencyInfo,
        //                     'category_info' => $userCategoryInfo,
        //                     'priority_list' => !empty($priorityList) ? $priorityList : (object) array()
        //                 );
        //                 // return $responseData;
        //                 return response()->json([
        //                     'res_code' => 200,
        //                     'response' => "You have successfully login",
        //                     'data' => $responseData
        //                 ], 200);
        //             }
        //         } else {
        //             return response()->json(['res_code' => 201, 'response' => 'Invalid Email/password.'], 200);
        //         }
        //     } catch (\Exception $ex) {
        //         /*CREATE ERROR LOGS*/
        //         $errorLogData = array(
        //             'user_id' => 0,
        //             'section' => 'Login',
        //             'error_message' => $ex->getMessage(),
        //             'category_id' => 0,
        //             'request' => json_encode($requestDecryptData),
        //             'response' => '',
        //         );
        //         dbHelpers::createErrorLogs($errorLogData);
        //         return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later.", 'server_message' => $ex->getMessage()], 200);
        //     }
        // }
    }


    // public static function userCategoryList($userId)
    // {
    //     $categoryDetails = array(
    //         'parent_category_id' => 0,
    //         'is_limo' => false,
    //         'category_id' => 0,
    //     );
    //     if (empty($userId)) {
    //         return $categoryDetails;
    //     }
    //     $parentCategoryId = 0;
    //     $categoryId = 0;
    //     $isLimo = false;
    //     $isCar = false;
    //     $userMappingCategoryList = MappingCategoriesUserProvider::select('category_id', 'parent_id')->where('user_id', $userId)->get();
    //     if (!empty($userMappingCategoryList) && count($userMappingCategoryList) > 0) {
    //         foreach ($userMappingCategoryList as $categoryList) {
    //             $categoryId = !empty($categoryList['category_id']) ? $categoryList['category_id'] : 0;
    //             $parentId = !empty($categoryList['parent_id']) ? $categoryList['parent_id'] : 0;
    //             if (!empty($categoryId) && empty($parentId)) {
    //                 $parentCategoryId = $categoryId;
    //             }
    //             if ($categoryId == 27) {
    //                 $isLimo = true;
    //             }
    //             if ($categoryId == 60) {
    //                 $isCar = true;
    //             }
    //         }
    //         $categoryDetails = array(
    //             'parent_category_id' => $parentCategoryId,
    //             'is_limo' => $isLimo,
    //             'is_car' => $isCar,
    //             'category_id' => $categoryId,
    //         );
    //     }
    //     return $categoryDetails;
    // }


    // public static function userAccessPriority($userId)
    // {
    //     /* CHECK USER ACCESS PRIORITY */
    //     $checkUserAccessPriority = UserAccessPriority::where('user_id', $userId)->first();
    //     if (empty($checkUserAccessPriority)) {
    //         $userAccessPriority = new UserAccessPriority;
    //         $userAccessPriority->user_id = $userId;
    //         $userAccessPriority->created_by = $userId;
    //         $userAccessPriority->save();
    //     } else {
    //         UserAccessPriority::userAccessPriorityModification($userId);
    //     }
    // }


    // public function walletInformationList($userId)
    // {
    //     $walletInformation = array();
    //     $walletInformation['is_bank_information'] = false;
    //     $walletInformation['is_kyc_information'] = false;
    //     if (empty($userId)) {
    //         return $walletInformation;
    //     }

    //     $mangopayUserList = MangopayUser::select('id', 'mangopay_user_id')
    //         ->where('user_id', $userId)
    //         ->where('account_type', 'Legal')
    //         ->where('status', 'Active')
    //         ->where('account_for', 'Service Provider')
    //         ->first();
    //     if (!empty($mangopayUserList)) {
    //         $mangopayUserId = !empty($mangopayUserList['mangopay_user_id']) ? $mangopayUserList['mangopay_user_id'] : 0;
    //         $mangopayId = !empty($mangopayUserList['id']) ? $mangopayUserList['id'] : 0;
    //         /* BANK ACCOUNT */
    //         $userBankAccountList = MangopayUserBankAccount::select('bank_account_id')
    //             ->where('mangopay_user_id', $mangopayId)
    //             ->where('status', 'Active')->first();
    //         if (!empty($userBankAccountList)) {
    //             $bankAccountId = !empty($userBankAccountList->bank_account_id) ? $userBankAccountList->bank_account_id : 0;
    //             $result = $this->mangopay->viewBankAccount($mangopayUserId, $bankAccountId);
    //             if (!empty($result) && !empty($result->Id) && !empty($result->Active)) {
    //                 $type = !empty($result->Type) ? $result->Type : '';
    //                 $walletInformation['is_bank_information'] = true;
    //             } else {
    //                 $walletInformation['is_bank_information'] = false;
    //             }
    //         } else {
    //             $walletInformation['is_bank_information'] = false;
    //         }
    //         $mangopayUserWalletKycDocumentList = MangopayUserWalletKycDocument::select('document_id')
    //             ->where('mangopay_user_id', $mangopayId)
    //             ->where('status', 'Active')->first();

    //         if (!empty($mangopayUserWalletKycDocumentList)) {
    //             $documentId = !empty($mangopayUserWalletKycDocumentList['document_id']) ? $mangopayUserWalletKycDocumentList['document_id'] : '';
    //             $viewKYCDocumentResult = $this->mangopay->viewKYCDocument($mangopayUserId, $documentId);

    //             if (!empty($viewKYCDocumentResult) && !empty($viewKYCDocumentResult->Id) && !empty($viewKYCDocumentResult->UserId)) {
    //                 $walletInformation['is_kyc_information'] = true;
    //             } else {
    //                 $walletInformation['is_kyc_information'] = false;
    //             }
    //         } else {
    //             $walletInformation['is_kyc_information'] = false;
    //         }
    //     } else {
    //         $walletInformation['is_bank_information'] = false;
    //         $walletInformation['is_kyc_information'] = false;
    //     }
    //     return $walletInformation;
    // }


    // public function logout(Request $request)
    // {

    //     $requestDecryptData = $request->request_decrypt_data;
    //     if (
    //         empty($requestDecryptData['user_id'])
    //     ) {
    //         return response()->json(['res_code' => 201, 'response' => 'Parameter is missing.'], 200);
    //     }

    //     $user = Auth::user();
    //     $authId = !empty($user->id) ? $user->id : 0;
    //     $userId = !empty($requestDecryptData['user_id']) ? $requestDecryptData['user_id'] : 0;

    //     if ($authId == $userId) {
    //         $request->user()->token()->revoke();
    //         return response()->json(['res_code' => 200, 'response' => 'Successfully logged out'], 200);
    //     } else {
    //         return response()->json(['res_code' => 201, 'response' => 'Invalid Parameter.'], 200);
    //     }
    // }


    // public function registration(Request $request)
    // {

    //     $requestDecryptData = $request->request_decrypt_data;
    //     //dev5brevity commit below changes
    //     //$requestDecryptData = $request->all();
    //     // print_r($requestDecryptData);
    //     if (empty($requestDecryptData)) {
    //         return response()->json(['res_code' => 201, 'response' => 'Parameter is missing.'], 200);
    //     }

    //     $rules = [
    //         'title' => 'required',
    //         'first_name' => 'required',
    //         'last_name' => 'required',
    //         'email' => 'required|string|email|unique:users,email|max:255',
    //         'dial_code' => 'required',
    //         'mobile_number' => 'required|string|max:12|min:8',
    //         'password' => 'required|min:6',
    //     ];
    //     $messages = [
    //         'title.required' => 'Title is required.',
    //         'first_name.required' => 'First name is required.',
    //         'last_name.required' => 'Last name is required.',
    //         'email.required' => 'Email id is required.',
    //         'email.email' => 'Please enter valid email id.',
    //         'email.unique' => 'This email is already exists in account.',
    //         'password.required' => 'Password is required.',
    //         'password.min' => 'Password must be at least 6 character',
    //         'dial_code.required' => 'Country code is required.',
    //         'mobile_number.required' => 'Mobile number is required.',
    //         'mobile_number.min' => 'Mobile number is not a valid.',
    //         'mobile_number.max' => 'Mobile number is not a valid.',
    //     ];
    //     $validator = Validator::make($requestDecryptData, $rules, $messages);
    //     if ($validator->fails()) {
    //         $validator = $validator->errors();
    //         $title = $validator->first('title');
    //         $firstName = $validator->first('first_name');
    //         $lastName = $validator->first('last_name');
    //         $email = $validator->first('email');
    //         $password = $validator->first('password');
    //         $dialCode = $validator->first('dial_code');
    //         $mobileNumber = $validator->first('mobile_number');
    //         // $error = [];
    //         if (!empty($title)) {
    //             $error = $title;
    //         } else if (!empty($firstName)) {
    //             $error = $firstName;
    //         } else if (!empty($lastName)) {
    //             $error = $lastName;
    //         } else if (!empty($email)) {
    //             $error = $email;
    //         } else if (!empty($password)) {
    //             $error = $password;
    //         } else if (!empty($dialCode)) {
    //             $error = $dialCode;
    //         } else if (!empty($mobileNumber)) {
    //             $error = $mobileNumber;
    //         }

    //         return response()->json(['res_code' => 201, 'response' => $error], 200);
    //     } else {
    //         try {
    //             $dialCode = !empty($requestDecryptData['dial_code']) ? $requestDecryptData['dial_code'] : '';
    //             $mobileNumber = !empty($requestDecryptData['mobile_number']) ? trim(str_replace("-", "", $requestDecryptData['mobile_number'])) : '';
    //             $userMobileCheck = User::select('id', 'first_name', 'mobile_number_verified')->where('mobile_number', $mobileNumber)->where('mobile_code', $dialCode)->first();
    //             if (!empty($userMobileCheck)) {
    //                 return response()->json(['res_code' => 201, 'response' => 'This mobile number already exists in account.'], 200);
    //             } else {
    //                 DB::beginTransaction();
    //                 $user = new User;
    //                 $userdetails = new UserDetail;

    //                 $firstName = !empty($requestDecryptData['first_name']) ? $requestDecryptData['first_name'] : '';
    //                 $lastName = !empty($requestDecryptData['last_name']) ? $requestDecryptData['last_name'] : '';
    //                 $user->title = !empty($requestDecryptData['title']) ? $requestDecryptData['title'] : '';
    //                 $user->first_name = $firstName;
    //                 $user->last_name = $lastName;
    //                 $user->role_id = 3;
    //                 $user->email = !empty($requestDecryptData['email']) ? $requestDecryptData['email'] : '';
    //                 $user->password = !empty($requestDecryptData['password']) ? Hash::make($requestDecryptData['password']) : '';
    //                 $user->iso = !empty($requestDecryptData['iso']) ? $requestDecryptData['iso'] : '';
    //                 $user->mobile_code = $dialCode;
    //                 $user->mobile_number = $mobileNumber;
    //                 $user->mobile_number_verified = '1';
    //                 $user->status = 'Inactive';
    //                 $user->created_at = date('Y-m-d H:i:s');
    //                 $user->created_by = 0;

    //                 $user->save();

    //                 $userId = $user->id;

    //                 if (!empty($userId)) {
    //                     /* User Details */
    //                     $code = dbHelpers::uniqueCode(8, 'user_details', 'user_code');
    //                     $genetate = $firstName . '-' . $lastName . '-' . $code;
    //                     $link = dbHelpers::generateURL('user_details', 'user_link', $genetate, 0);

    //                     $userdetails->user_id = !empty($userId) ? $userId : '';
    //                     $userdetails->user_link = !empty($link) ? $link : '';
    //                     $userdetails->user_code = !empty($code) ? $code : '';
    //                     $userdetails->created_by = 0;
    //                     $userdetails->currency_id = CURRENCYID;
    //                     $userdetails->created_at = date('Y-m-d H:i:s');
    //                     $userdetails->parent_id = '0';
    //                     $userdetails->updated_by = '0';

    //                     $userdetails->save();

    //                     /* GENERATE VERIFICATION CODE */
    //                     $verificationCode = dbHelpers::uniqueCode(4, 'user_codes', 'code', 'd');

    //                     if (!empty($verificationCode)) {
    //                         $userCode = new UserCode;
    //                         $userCode->user_id = $userId;
    //                         $userCode->type = 'Registration';
    //                         $userCode->code = $verificationCode;
    //                         $userCode->created_at = date('Y-m-d H:i:s');
    //                         $userCode->save();
    //                     }
    //                     /* GENERATE REGISTRATION TOKEN */
    //                     $registrationToken = md5($code . $userId . $verificationCode);
    //                     $fullName = $user->first_name . ' ' . $user->last_name;
    //                     User::where('id', $userId)->update(array('registration_token' => $registrationToken));
    //                     $verificationLink = $this->_frontendUrl . 'customer/account-verification/' . $registrationToken;
    //                     $link = "<a href='" . $verificationLink . "'>Verify Account</a>";
    //                     $searchArr = array('[FULLNAME]', '[NAME]', '[EMAIL]', '[PASSWORD]', '[LINK]', '[VERIFICATIONCODE]', '[SIGNATURE]');
    //                     $replaceArr = array($fullName, $fullName, $user->email, $requestDecryptData['password'], $link, $verificationCode, EMAIL_SIGNATURE);

    //                     $emailData = helpers::emailTemplate("Template 8", $searchArr, $replaceArr);

    //                     if (!empty($emailData)) {
    //                         $toEmail = $user->email;
    //                         $toName = $user->first_name;
    //                         $subject = !empty($emailData['subject']) ? $emailData['subject'] : '';
    //                         $smsMessage = !empty($emailData['sms']) ? $emailData['sms'] : '';

    //                         $isSms = !empty($emailData['isSms']) ? $emailData['isSms'] : '';
    //                         $pushBody = !empty($emailData['pushBody']) ? $emailData['pushBody'] : '';
    //                         $isPush = !empty($emailData['isPush']) ? $emailData['isPush'] : '';

    //                         /* SEND SMS */
    //                         if (!empty($smsMessage) && !empty($isSms) && !empty($mobileNumber)) {
    //                             $receiverNumber = $user->mobile_code . $user->mobile_number;
    //                             $searchArr = array('[VERIFICATIONCODE]');
    //                             $replaceArr = array($verificationCode);
    //                             smsHelpers::sendMessageNotification($receiverNumber, $searchArr, $replaceArr, $smsMessage);
    //                         }
    //                         /* SEND EMAIL */
    //                         emailHelpers::sendEmailNotification($emailData, $toEmail, $toName, $subject);
    //                     }
    //                     /* Temporary Mail */
    //                     $searchArrTemp = array('[FULLNAME]', '[VERIFICATIONCODE]', '[SIGNATURE]');
    //                     $replaceArrTemp = array($fullName, $verificationCode, EMAIL_SIGNATURE);

    //                     $emailDataTemp = helpers::emailTemplate("Template 126", $searchArrTemp, $replaceArrTemp);
    //                     if (!empty($emailDataTemp)) {
    //                         $toEmailTemp = $user->email;
    //                         $toNameTemp = $user->first_name;
    //                         $subjectTemp = !empty($emailDataTemp['subject']) ? $emailDataTemp['subject'] : '';
    //                         emailHelpers::sendEmailNotification($emailDataTemp, $toEmailTemp, $toNameTemp, $subjectTemp);
    //                     }
    //                     DB::commit();

    //                     /* SAVE DEVICE INFORMATION */
    //                     $deviceId = !empty($requestDecryptData['device_id']) ? $requestDecryptData['device_id'] : '';
    //                     $deviceType = !empty($requestDecryptData['device_type']) ? $requestDecryptData['device_type'] : '';
    //                     $deviceToken = !empty($requestDecryptData['device_token']) ? $requestDecryptData['device_token'] : '';
    //                     $deviceName = !empty($requestDecryptData['device_name']) ? $requestDecryptData['device_name'] : '';
    //                     $modelName = !empty($requestDecryptData['model_name']) ? $requestDecryptData['model_name'] : '';
    //                     $osVersion = !empty($requestDecryptData['os_version']) ? $requestDecryptData['os_version'] : '';
    //                     if (!empty($deviceType) && !empty($deviceToken)) {
    //                         $deviceData = array(
    //                             'user_id' => $userId,
    //                             'device_id' => $deviceId,
    //                             'device_type' => $deviceType,
    //                             'device_token' => $deviceToken,
    //                             'device_name' => $deviceName,
    //                             'model_name' => $modelName,
    //                             'os_version' => $osVersion,
    //                         );
    //                         pushNotificationHelpers::deviceTokenInsert($deviceData);
    //                     }

    //                     $data = array(
    //                         'email' => !empty($requestDecryptData['email']) ? $requestDecryptData['email'] : '',
    //                         'mobile_number' => !empty($requestDecryptData['mobile_number']) ? $requestDecryptData['mobile_number'] : '',
    //                         'mobile_code' => $dialCode,
    //                         'verification_code' => $verificationCode,
    //                         'token_type' => 'Bearer',
    //                         'token' => $user->createToken('AltaBooking')->accessToken,
    //                     );

    //                     return response()->json([
    //                         'res_code' => 200,
    //                         'response' => "You have successfully registered . An verification code has been sent to your registered mobile number.", 'data' => $data
    //                     ], 200);
    //                 } else {
    //                     /*CREATE ERROR LOGS*/
    //                     $errorLogData = array(
    //                         'user_id' => 0,
    //                         'section' => 'User Registration',
    //                         'error_message' => 'Data insert problem',
    //                         'category_id' => 0,
    //                         'request' => json_encode($requestDecryptData),
    //                         'response' => '',
    //                     );
    //                     dbHelpers::createErrorLogs($errorLogData);
    //                     return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later."], 200);
    //                 }
    //             }
    //         } catch (\Exception $ex) {
    //             DB::rollBack();
    //             /*CREATE ERROR LOGS*/
    //             $errorLogData = array(
    //                 'user_id' => 0,
    //                 'section' => 'User Registration',
    //                 'error_message' => $ex->getMessage(),
    //                 'category_id' => 0,
    //                 'request' => json_encode($requestDecryptData),
    //                 'response' => '',
    //             );
    //             dbHelpers::createErrorLogs($errorLogData);
    //             return response()->json(['res_code' => 201, 'response' => 'Mobile number is not valid, we are unable to deliver.', 'server_message' => $ex->getMessage()], 200);
    //         }
    //     }
    // }


    // public function createNaturalUser($data)
    // {
    //     if (empty($data['user_id'])) {
    //         return false;
    //     }

    //     $userId = !empty($data['user_id']) ? $data['user_id'] : 0;
    //     $mangopayUser = MangopayUser::where('user_id', $userId)
    //         ->where('account_type', 'Natural')
    //         ->where('account_for', 'Customer')->first();

    //     if (empty($mangopayUser)) {

    //         $firstName = !empty($data['first_name']) ? $data['first_name'] : '';
    //         $lastName = !empty($data['last_name']) ? $data['last_name'] : '';
    //         $email = !empty($data['email']) ? $data['email'] : '';
    //         $countryIso = !empty($data['iso']) ? $data['iso'] : '';
    //         $dob = !empty($data['dob']) ? $data['dob'] : '';

    //         /* CREATE A NATURAL USER */
    //         $mangopayNaturalData = array(
    //             'firstName' => $firstName,
    //             'lastName' => $lastName,
    //             'email' => $email,
    //             //'birthday' => $dob,
    //             'birthday' => '',
    //             'nationality' => $countryIso,
    //             'countryOfResidence' => $countryIso,
    //             'occupation' => '',
    //             'incomeRange' => '',
    //         );

    //         $creatNaturalUser = $this->mangopay->createNaturalUser($mangopayNaturalData);
    //         return $creatNaturalUser;
    //         if (!empty($creatNaturalUser->Id)) {
    //             $mangopayUser = new MangopayUser();
    //             $mangopayUser->user_id = $userId;
    //             $mangopayUser->mangopay_user_id = !empty($creatNaturalUser->Id) ? $creatNaturalUser->Id : '';
    //             $mangopayUser->account_type = 'Natural';
    //             $mangopayUser->account_for = 'Customer';
    //             $mangopayUser->created_by = $createrModifierId;
    //             $mangopayUser->created_at = date('Y-m-d H:i:s');
    //             $mangopayUser->save();
    //         }
    //     } else {
    //         return false;
    //     }
    // }


    // public function resendEmailVerificationLink(Request $request)
    // {
    //     try {

    //         $user = Auth::user();

    //         $authId = !empty($user->id) ? $user->id : 0;

    //         if (empty($authId)) {
    //             return response()->json(['res_code' => 201, 'response' => 'Parameter is missing.'], 200);
    //         }

    //         $email = !empty($user->email) ? trim($user->email) : '';
    //         $firstName = !empty($user->first_name) ? trim($user->first_name) : '';
    //         $lastName = !empty($user->last_name) ? trim($user->last_name) : '';

    //         /* GET USER CODE */
    //         $userDetails = UserDetail::select('user_code')->where('user_id', $authId)->first();

    //         if (!empty($userDetails)) {
    //             $userCode = !empty($userDetails->user_code) ? $userDetails->user_code : '';
    //         } else {
    //             $userCode = time() . rand();
    //         }

    //         DB::beginTransaction();

    //         $fullName = $user->first_name . ' ' . $user->last_name;
    //         /* GENERATE REGISTRATION TOKEN */
    //         $registrationToken = md5($userCode . $authId . $email . time());
    //         User::where('id', $authId)->update(array('registration_token' => $registrationToken));
    //         $verificationLink = $this->_frontendUrl . 'customer/account-verification/' . $registrationToken;
    //         $link = "<a href='" . $verificationLink . "'>Verify Account</a>";
    //         $searchArr = array('[FULLNAME]', '[NAME]', '[EMAILADDRESS]', '[LINK]', '[SIGNATURE]');
    //         $replaceArr = array($fullName, $fullName, $user->email, $link, EMAIL_SIGNATURE);

    //         $emailData = helpers::emailTemplate("Template 53", $searchArr, $replaceArr);

    //         if (!empty($emailData)) {
    //             $toEmail = $email;
    //             $toName = $firstName;

    //             $subject = !empty($emailData['subject']) ? $emailData['subject'] : '';
    //             $smsMessage = !empty($emailData['sms']) ? $emailData['sms'] : '';

    //             $isSms = !empty($emailData['isSms']) ? $emailData['isSms'] : '';
    //             $pushBody = !empty($emailData['pushBody']) ? $emailData['pushBody'] : '';
    //             $isPush = !empty($emailData['isPush']) ? $emailData['isPush'] : '';

    //             /* SEND EMAIL */
    //             emailHelpers::sendEmailNotification($emailData, $toEmail, $toName, $subject);

    //             /* SEND SMS */
    //             if (!empty($smsMessage) && !empty($isSms) && !empty($user->mobile_number)) {
    //                 $receiverNumber = $user->mobile_code . $user->mobile_number;
    //                 $searchArr = array();
    //                 $replaceArr = array();
    //                 smsHelpers::sendMessageNotification($receiverNumber, $searchArr, $replaceArr, $smsMessage);
    //             }
    //             $roleId = !empty($user->role_id) ? $user->role_id : '';
    //             if ($roleId == 4) {
    //                 $receivedAs = 'Service Provider';
    //             } else {
    //                 $receivedAs = 'Customer';
    //             }
    //             /* SEND PUSH & NOTIFICATION */
    //             if (!empty($pushBody) && !empty($isPush)) {
    //                 $searchArr = array();
    //                 $replaceArr = array();
    //                 $notificationInformation = array();
    //                 pushNotificationHelpers::sendPushNotification($user->id, 'Customer', $receivedAs, $notificationInformation, $searchArr, $replaceArr, $pushBody);
    //             }
    //         }
    //         DB::commit();
    //         return response()->json([
    //             'res_code' => 200,
    //             'response' => "An verification link has been sent to your registered email address."
    //         ], 200);
    //     } catch (\Exception $ex) {
    //         DB::rollBack();
    //         /*CREATE ERROR LOGS*/
    //         $errorLogData = array(
    //             'user_id' => 0,
    //             'section' => 'Resend email verification',
    //             'error_message' => $ex->getMessage(),
    //             'category_id' => 0,
    //             'request' => '',
    //             'response' => '',
    //         );
    //         dbHelpers::createErrorLogs($errorLogData);
    //         return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later.", 'server_message' => $ex->getMessage()], 200);
    //     }
    // }


    // public function mobileVerify(Request $request)
    // {
    //     try {
    //         $requestDecryptData = $request->request_decrypt_data;
    //         if (empty($requestDecryptData)) {
    //             return response()->json(['res_code' => 201, 'response' => 'Parameter is missing.'], 200);
    //         }

    //         if (Auth::check()) {
    //             $user = Auth::user();
    //             $userId = !empty($user->id) ? $user->id : 0;
    //             $code = !empty($requestDecryptData['code']) ? trim($requestDecryptData['code']) : '';

    //             if (empty($code)) {
    //                 return response()->json(['res_code' => 201, 'response' => 'Verification code is required.'], 200);
    //             } else {
    //                 $checkUserCode = UserCode::select('id', 'code')->where('code', $code)
    //                     ->where('user_id', $userId)->first();
    //                 if (!empty($checkUserCode)) {
    //                     $userCodeId = !empty($checkUserCode->id) ? $checkUserCode->id : '0';
    //                     $result = User::where('id', $userId)->update(array('mobile_number_verified' => '1', 'updated_by' => $userId));
    //                     if (!empty($result)) {
    //                         UserCode::where('id', $userCodeId)->where('user_id', $userId)->delete();

    //                         $mobileNumber = !empty($user->mobile_number) ? $user->mobile_number : '';
    //                         $mobileCode = !empty($user->mobile_code) ? $user->mobile_code : '';
    //                         $contactNumber = $mobileCode . $mobileNumber;
    //                         $searchArr = array('[FULLNAME]', '[SIGNATURE]');
    //                         $replaceArr = array($user->first_name . ' ' . $user->last_name, EMAIL_SIGNATURE);
    //                         $emailData = helpers::emailTemplate("Template 99", $searchArr, $replaceArr);
    //                         if (!empty($emailData)) {
    //                             $toEmail = $user->email;
    //                             $toName = $user->first_name;
    //                             $subject = !empty($emailData['subject']) ? $emailData['subject'] : '';
    //                             $smsMessage = !empty($emailData['sms']) ? $emailData['sms'] : '';

    //                             $isSms = !empty($emailData['isSms']) ? $emailData['isSms'] : '';
    //                             $pushBody = !empty($emailData['pushBody']) ? $emailData['pushBody'] : '';
    //                             $isPush = !empty($emailData['isPush']) ? $emailData['isPush'] : '';

    //                             /* SEND EMAIL */
    //                             emailHelpers::sendEmailNotification($emailData, $toEmail, $toName, $subject);

    //                             /* SEND SMS */
    //                             if (!empty($smsMessage) && !empty($isSms) && !empty($mobileNumber)) {
    //                                 $searchArr = array();
    //                                 $replaceArr = array();
    //                                 smsHelpers::sendMessageNotification($contactNumber, $searchArr, $replaceArr, $smsMessage);
    //                             }
    //                             $roleId = !empty($user->role_id) ? $user->role_id : '';
    //                             if ($roleId == 4) {
    //                                 $receivedAs = 'Service Provider';
    //                             } else {
    //                                 $receivedAs = 'Customer';
    //                             }
    //                             /* SEND PUSH & NOTIFICATION */
    //                             if (!empty($pushBody) && !empty($isPush)) {
    //                                 $searchArr = array();
    //                                 $replaceArr = array();
    //                                 $notificationInformation = array();
    //                                 pushNotificationHelpers::sendPushNotification($user->id, 'Customer', $receivedAs, $notificationInformation, $searchArr, $replaceArr, $pushBody);
    //                             }
    //                         }
    //                         return response()->json(['res_code' => 200, 'response' => 'Your mobile number has been verified successfully'], 200);
    //                     } else {
    //                         return response()->json(['res_code' => 201, 'response' => 'Try again.'], 200);
    //                     }
    //                 } else {
    //                     return response()->json(['res_code' => 201, 'response' => 'Invalid verification code.'], 200);
    //                 }
    //             }
    //         } else {
    //             return response()->json(['res_code' => 201, 'response' => 'Invalid operations.'], 200);
    //         }
    //     } catch (\Exception $ex) {
    //         /*CREATE ERROR LOGS*/
    //         $errorLogData = array(
    //             'user_id' => 0,
    //             'section' => 'Mobile Verify',
    //             'error_message' => $ex->getMessage(),
    //             'category_id' => 0,
    //             'request' => '',
    //             'response' => '',
    //         );
    //         dbHelpers::createErrorLogs($errorLogData);
    //         return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later.", 'server_message' => $ex->getMessage()], 200);
    //     }
    // }


    // public function resendCode(Request $request)
    // {

    //     $requestDecryptData = $request->request_decrypt_data;

    //     if (empty($requestDecryptData)) {
    //         return response()->json(['res_code' => 201, 'response' => 'Parameter is missing.'], 200);
    //     }

    //     if (empty($requestDecryptData['mobile_number'])) {
    //         return response()->json(['res_code' => 201, 'response' => 'Mobile number is required'], 200);
    //     } else if (empty($requestDecryptData['dial_code'])) {
    //         return response()->json(['res_code' => 201, 'response' => 'Country code is required'], 200);
    //     } else {
    //         $userCheck = User::select('id', 'first_name', 'last_name', 'email', 'mobile_number_verified')->where('mobile_number', $requestDecryptData['mobile_number'])->where('mobile_code', $requestDecryptData['dial_code'])->first();
    //         if (empty($userCheck)) {
    //             return response()->json(['res_code' => 201, 'response' => 'Mobile number not registered.'], 200);
    //         } else {
    //             $userId = !empty($userCheck->id) ? $userCheck->id : 0;
    //             $firstName = !empty($userCheck->first_name) ? $userCheck->first_name : '';
    //             $lastName = !empty($userCheck->last_name) ? $userCheck->last_name : '';
    //             $email = !empty($userCheck->email) ? $userCheck->email : '';
    //             $mobileNumber = !empty($requestDecryptData['mobile_number']) ? $requestDecryptData['mobile_number'] : 0;
    //             $dialCode = !empty($requestDecryptData['dial_code']) ? $requestDecryptData['dial_code'] : 0;
    //             $reseverNumber = '+' . $dialCode . $mobileNumber;
    //             try {
    //                 DB::beginTransaction();

    //                 /* REMOVE OLD VARIFICATION CODE */
    //                 UserCode::where('user_id', $userId)->delete();
    //                 /* GENERATE VARIFICATION CODE */
    //                 $verificationCode = dbHelpers::uniqueCode(4, 'user_codes', 'code', 'd');

    //                 $userCode = new Usercode;
    //                 $userCode->user_id = $userId;
    //                 $userCode->code = !empty($verificationCode) ? $verificationCode : '';
    //                 $userCode->type = 'Registration';
    //                 $userCode->created_at = date('Y-m-d H:i:s');
    //                 $result = $userCode->save();
    //                 if (!empty($result)) {
    //                     $searchArr = array('[FULLNAME]', '[EMAIL]', '[PASSWORD]', '[LINK]', '[VERIFICATIONCODE]', '[SIGNATURE]');
    //                     $replaceArr = array('', '', '', '', $verificationCode, '');
    //                     $emailData = helpers::emailTemplate("Template 8", $searchArr, $replaceArr);
    //                     if (!empty($emailData)) {
    //                         $subject = !empty($emailData['subject']) ? $emailData['subject'] : '';
    //                         $smsMessage = !empty($emailData['sms']) ? $emailData['sms'] : '';

    //                         $isSms = !empty($emailData['isSms']) ? $emailData['isSms'] : '';
    //                         $pushBody = !empty($emailData['pushBody']) ? $emailData['pushBody'] : '';
    //                         $isPush = !empty($emailData['isPush']) ? $emailData['isPush'] : '';

    //                         /* SEND SMS */
    //                         if (!empty($smsMessage) && !empty($isSms) && !empty($mobileNumber)) {
    //                             $receiverNumber = $dialCode . $mobileNumber;
    //                             $searchArr = array('[VERIFICATIONCODE]');
    //                             $replaceArr = array($verificationCode);
    //                             smsHelpers::sendMessageNotification($receiverNumber, $searchArr, $replaceArr, $smsMessage);
    //                         }
    //                     }

    //                     /* Temporary Mail */
    //                     $searchArrTemp = array('[FULLNAME]', '[VERIFICATIONCODE]', '[SIGNATURE]');
    //                     $replaceArrTemp = array($firstName . ' ' . $lastName, $verificationCode, EMAIL_SIGNATURE);

    //                     $emailDataTemp = helpers::emailTemplate("Template 126", $searchArrTemp, $replaceArrTemp);
    //                     if (!empty($emailDataTemp)) {
    //                         $toEmailTemp = $email;
    //                         $toNameTemp = $firstName;
    //                         $subjectTemp = !empty($emailDataTemp['subject']) ? $emailDataTemp['subject'] : '';
    //                         emailHelpers::sendEmailNotification($emailDataTemp, $toEmailTemp, $toNameTemp, $subjectTemp);
    //                     }

    //                     DB::commit();
    //                     return response()->json(['res_code' => 200, 'response' => 'Verification code has sent on your mobile.', 'verification_code' => $verificationCode], 200);
    //                 } else {
    //                     return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later."], 200);
    //                 }
    //             } catch (\Exception $ex) {
    //                 DB::rollBack();
    //                 /*CREATE ERROR LOGS*/
    //                 $errorLogData = array(
    //                     'user_id' => 0,
    //                     'section' => 'Resend Code',
    //                     'error_message' => $ex->getMessage(),
    //                     'category_id' => 0,
    //                     'request' => json_encode($requestDecryptData),
    //                     'response' => '',
    //                 );
    //                 dbHelpers::createErrorLogs($errorLogData);
    //                 return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later.", 'server_message' => $ex->getMessage()], 200);
    //             }
    //         }
    //     }
    // }


    // public function forgotPasswordByEmail(Request $request)
    // {
    //     $requestDecryptData = $request->request_decrypt_data;

    //     if (empty($requestDecryptData)) {
    //         return response()->json(['res_code' => 201, 'response' => 'Parameter is missing.'], 200);
    //     }

    //     $rules = [
    //         'email' => 'required|string|email',
    //     ];
    //     $validator = Validator::make($requestDecryptData, $rules);
    //     if ($validator->fails()) {
    //         $validator = $validator->errors();
    //         $email = $validator->first('email');
    //         if (!empty($email)) {
    //             $error = $email;
    //         }
    //         return response()->json(['res_code' => 201, 'response' => $error], 200);
    //     } else {
    //         try {
    //             $email = !empty($requestDecryptData['email']) ? $requestDecryptData['email'] : '';
    //             $userCheck = User::select('id', 'first_name', 'last_name', 'email', 'mobile_number', 'mobile_code', 'mobile_number_verified')->where('email', $email)->where('role_id', '!=', '1')->first();
    //             if (empty($userCheck)) {
    //                 return response()->json(['res_code' => 201, 'response' => 'Email id not registered.'], 200);
    //             } else {
    //                 $userId = !empty($userCheck->id) ? $userCheck->id : '';
    //                 $roleId = !empty($userCheck->role_id) ? $userCheck->role_id : '';
    //                 $firstName = !empty($userCheck->first_name) ? $userCheck->first_name : '';
    //                 $lastName = !empty($userCheck->last_name) ? $userCheck->last_name : '';

    //                 /* GENERATE FORGOT TOKEN */
    //                 $forgotToken = md5($email . $userId . rand(12, 999));

    //                 $resultUser = User::where('id', $userId)->update(array('forgot_token' => $forgotToken, 'updated_by' => $userId));
    //                 if (!empty($resultUser)) {

    //                     $verificationLink = $this->_frontendUrl . 'reset-password/' . $forgotToken;
    //                     $link = "<a href='" . $verificationLink . "'>Reset Password</a>";

    //                     $searchArr = array('[FULLNAME]', '[RESETPASSWORDLINK]', '[SIGNATURE]');
    //                     $replaceArr = array($firstName . ' ' . $lastName, $link, EMAIL_SIGNATURE);
    //                     $emailData = helpers::emailTemplate("Template 49", $searchArr, $replaceArr);
    //                     if (!empty($emailData)) {
    //                         $toEmail = $email;
    //                         $toName = $firstName;
    //                         $subject = !empty($emailData['subject']) ? $emailData['subject'] : '';
    //                         $smsMessage = !empty($emailData['sms']) ? $emailData['sms'] : '';

    //                         $isSms = !empty($emailData['isSms']) ? $emailData['isSms'] : '';
    //                         $pushBody = !empty($emailData['pushBody']) ? $emailData['pushBody'] : '';
    //                         $isPush = !empty($emailData['isPush']) ? $emailData['isPush'] : '';

    //                         /* SEND EMAIL */
    //                         emailHelpers::sendEmailNotification($emailData, $toEmail, $toName, $subject);

    //                         /* SEND SMS */
    //                         if (!empty($smsMessage) && !empty($isSms) && !empty($userCheck->mobile_number_verified) && !empty($userCheck->mobile_code) && !empty($userCheck->mobile_number)) {
    //                             $contactNumber = $userCheck->mobile_code . $userCheck->mobile_number;
    //                             $searchArr = array();
    //                             $replaceArr = array();
    //                             smsHelpers::sendMessageNotification($contactNumber, $searchArr, $replaceArr, $smsMessage);
    //                         }

    //                         if ($roleId == 4) {
    //                             $receivedAs = 'Service Provider';
    //                         } else {
    //                             $receivedAs = 'Customer';
    //                         }
    //                         /* SEND PUSH & NOTIFICATION */
    //                         if (!empty($pushBody) && !empty($isPush)) {
    //                             $searchArr = array();
    //                             $replaceArr = array();
    //                             $notificationInformation = array();
    //                             pushNotificationHelpers::sendPushNotification($userCheck->id, 'Global', $receivedAs, $notificationInformation, $searchArr, $replaceArr, $pushBody);
    //                         }
    //                     }
    //                     return response()->json(['res_code' => 200, 'response' => 'Reset password link has been sent to your registered email.'], 200);
    //                 } else {
    //                     return response()->json(['res_code' => 201, 'response' => 'Something unexpected happened. Try again later.'], 200);
    //                 }
    //             }
    //         } catch (\Exception $ex) {
    //             /*CREATE ERROR LOGS*/
    //             $errorLogData = array(
    //                 'user_id' => 0,
    //                 'section' => 'Forgot Password',
    //                 'error_message' => $ex->getMessage(),
    //                 'category_id' => 0,
    //                 'request' => json_encode($requestDecryptData),
    //                 'response' => '',
    //             );
    //             dbHelpers::createErrorLogs($errorLogData);
    //             return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later.", 'server_message' => $ex->getMessage()], 200);
    //         }
    //     }
    // }


    // public function forgotPasswordByMobile(Request $request)
    // {

    //     $requestDecryptData = $request->request_decrypt_data;

    //     if (empty($requestDecryptData)) {
    //         return response()->json(['res_code' => 201, 'response' => 'Parameter is missing.'], 200);
    //     }

    //     $rules = [
    //         'mobile_number' => 'required',
    //         'role_id' => 'required',
    //     ];
    //     $messages = [
    //         'mobile_number.required' => 'Mobile number is required.',
    //         'role_id.required' => 'Parameter is missing.',
    //     ];
    //     $validator = Validator::make($requestDecryptData, $rules);
    //     if ($validator->fails()) {
    //         $validator = $validator->errors();
    //         $mobileNumber = $validator->first('mobile_number');
    //         $roleId = $validator->first('role_id');
    //         if (!empty($mobileNumber)) {
    //             $error = $mobileNumber;
    //         } else if (!empty($roleId)) {
    //             $error = $roleId;
    //         }
    //         return response()->json(['res_code' => 201, 'response' => $error], 200);
    //     } else {
    //         try {
    //             $mobileNumber = !empty($requestDecryptData['mobile_number']) ? $requestDecryptData['mobile_number'] : '';
    //             $code = !empty($requestDecryptData['dial_code']) ? $requestDecryptData['dial_code'] : '';
    //             $roleId = !empty($requestDecryptData['role_id']) ? (int) $requestDecryptData['role_id'] : '';

    //             $reseverNumber = $code . $mobileNumber;
    //             $userCheck = User::select('id', 'first_name', 'mobile_number_verified')
    //                 ->where('role_id', $roleId)
    //                 ->where('mobile_number', $mobileNumber)->where('mobile_code', $code)->first();
    //             if (empty($userCheck)) {
    //                 return response()->json(['res_code' => 201, 'response' => 'Mobile number is not registered.'], 200);
    //             } else {
    //                 $userId = !empty($userCheck->id) ? $userCheck->id : '';
    //                 $firstName = !empty($userCheck->first_name) ? $userCheck->first_name : '';
    //                 if (!empty($userCheck->mobile_number_verified)) {
    //                     UserCode::where('user_id', $userId)->delete();
    //                     $verificationCode = dbHelpers::uniqueCode(4, 'user_codes', 'code', 'd');
    //                     if (!empty($verificationCode)) {
    //                         $user_code = new Usercode;
    //                         $user_code->user_id = $userId;
    //                         $user_code->code = $verificationCode;
    //                         $user_code->type = 'Forget';
    //                         $user_code->created_at = date('Y-m-d H:i:s');
    //                         $result_user = $user_code->save();
    //                         if (!empty($result_user)) {
    //                             $searchArr = array('[FIRSTNAME]', '[VERIFICATIONCODE]', '[SIGNATURE]');
    //                             $replaceArr = array($firstName, $verificationCode, EMAIL_SIGNATURE);
    //                             $emailData = helpers::emailTemplate("Template 2", $searchArr, $replaceArr);
    //                             if (!empty($emailData)) {
    //                                 $toName = $firstName;
    //                                 $subject = !empty($emailData['subject']) ? $emailData['subject'] : '';
    //                                 $smsMessage = !empty($emailData['sms']) ? $emailData['sms'] : '';
    //                                 $isSms = !empty($emailData['isSms']) ? $emailData['isSms'] : '';

    //                                 /* SEND SMS */
    //                                 if (!empty($smsMessage) && !empty($isSms) && !empty($reseverNumber)) {
    //                                     $searchArr = array('[PASSWORD]');
    //                                     $replaceArr = array($verificationCode);
    //                                     smsHelpers::sendMessageNotification($reseverNumber, $searchArr, $replaceArr, $smsMessage);
    //                                 }
    //                             }
    //                             return response()->json([
    //                                 'res_code' => 200, 'response' => 'Verification code has been sent to your mobile.',
    //                                 'verification_code' => $verificationCode
    //                             ], 200);
    //                         } else {
    //                             return response()->json(['res_code' => 201, 'response' => 'Something unexpected happened. Try again later.'], 200);
    //                         }
    //                     } else {
    //                         return response()->json(['res_code' => 201, 'response' => 'Something unexpected happened. Try again later.'], 200);
    //                     }
    //                 } else {
    //                     return response()->json(['res_code' => 201, 'response' => 'Mobile number is not registered.'], 200);
    //                 }
    //             }
    //         } catch (\Exception $ex) {
    //             /*CREATE ERROR LOGS*/
    //             $errorLogData = array(
    //                 'user_id' => 0,
    //                 'section' => 'Forgot Password',
    //                 'error_message' => $ex->getMessage(),
    //                 'category_id' => 0,
    //                 'request' => json_encode($requestDecryptData),
    //                 'response' => '',
    //             );
    //             dbHelpers::createErrorLogs($errorLogData);
    //             return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later.", 'server_message' => $ex->getMessage()], 200);
    //         }
    //     }
    // }


    // public function forgotPasswordVerifyCode(Request $request)
    // {

    //     $requestDecryptData = $request->request_decrypt_data;

    //     if (empty($requestDecryptData)) {
    //         return response()->json(['res_code' => 201, 'response' => 'Parameter is missing.'], 200);
    //     }

    //     if (empty($requestDecryptData['mobile_number'])) {
    //         return response()->json(['res_code' => 201, 'response' => 'Mobile number is required'], 200);
    //     } else if (empty($requestDecryptData['code'])) {
    //         return response()->json(['res_code' => 201, 'response' => 'Code is required'], 200);
    //     } else if (empty($requestDecryptData['dial_code'])) {
    //         return response()->json(['res_code' => 201, 'response' => 'Country code is required'], 200);
    //     } else {
    //         $mobileNumber = !empty($requestDecryptData['mobile_number']) ? $requestDecryptData['mobile_number'] : '';
    //         $dialCode = !empty($requestDecryptData['dial_code']) ? $requestDecryptData['dial_code'] : '';
    //         $userCheck = User::select('id', 'first_name', 'mobile_number_verified')->where('mobile_number', $mobileNumber)->where('mobile_code', $dialCode)->first();
    //         if (empty($userCheck)) {
    //             return response()->json(['res_code' => 201, 'response' => 'Mobile number is not registered.'], 200);
    //         } else {
    //             $userId = !empty($userCheck->id) ? $userCheck->id : '0';
    //             $code = !empty($requestDecryptData['code']) ? $requestDecryptData['code'] : '';
    //             $checkUserCode = UserCode::select('id', 'code')->where('code', $code)->first();
    //             if (!empty($checkUserCode)) {
    //                 try {
    //                     DB::beginTransaction();
    //                     $userCodeId = !empty($checkUserCode->id) ? $checkUserCode->id : '0';
    //                     UserCode::where('id', $userCodeId)->where('user_id', $userId)->delete();
    //                     $data = array('user_id' => $userId);
    //                     DB::commit();
    //                     return response()->json(['res_code' => 200, 'response' => 'Verified.', 'data' => $data], 200);
    //                 } catch (\Exception $ex) {
    //                     DB::rollBack();
    //                     return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later."], 200);
    //                 }
    //             } else {
    //                 return response()->json(['res_code' => 201, 'response' => 'Invalid verification code.'], 200);
    //             }
    //         }
    //     }
    // }


    // public function resetPassword(Request $request)
    // {

    //     $requestDecryptData = $request->request_decrypt_data;

    //     if (empty($requestDecryptData)) {
    //         return response()->json(['res_code' => 201, 'response' => 'Parameter is missing'], 200);
    //     }

    //     if (empty($requestDecryptData['user_id'])) {
    //         return response()->json(['res_code' => 201, 'response' => 'User credentials is required'], 200);
    //     } else if (empty($requestDecryptData['password'])) {
    //         return response()->json(['res_code' => 201, 'response' => 'Password is required'], 200);
    //     } else {
    //         $userId = !empty($requestDecryptData['user_id']) ? trim($requestDecryptData['user_id']) : '';
    //         $password = !empty($requestDecryptData['password']) ? trim($requestDecryptData['password']) : '';
    //         $userCheck = User::select('id', 'first_name', 'last_name', 'email', 'mobile_code', 'mobile_number', 'mobile_number_verified')->where('id', $userId)->first();
    //         if (empty($userCheck)) {
    //             return response()->json(['res_code' => 201, 'response' => 'Invalid user.'], 200);
    //         } else {
    //             $userId = !empty($userCheck->id) ? $userCheck->id : '0';
    //             $firstName = !empty($userCheck->first_name) ? $userCheck->first_name : '';
    //             $lastName = !empty($userCheck->last_name) ? $userCheck->last_name : '';
    //             $email = !empty($userCheck->email) ? $userCheck->email : '';
    //             $mobileCode = !empty($userCheck->mobile_code) ? $userCheck->mobile_code : '';
    //             $mobileNumber = !empty($userCheck->mobile_number) ? $userCheck->mobile_number : '';
    //             $mobileNumberVerified = !empty($userCheck->mobile_number_verified) ? $userCheck->mobile_number_verified : '';
    //             if (!empty($userId)) {
    //                 try {
    //                     DB::beginTransaction();

    //                     /* UPDATE USER PASSWORD */
    //                     $update_data = array(
    //                         'password' => Hash::make($password),
    //                         'updated_at' => date('Y-m-d H:i:s'),
    //                         'updated_by' => $userId
    //                     );
    //                     $result = User::where('id', $userId)->update($update_data);

    //                     if (!empty($result)) {
    //                         $searchArr = array('[FULLNAME]', '[SIGNATURE]');
    //                         $replaceArr = array($firstName . ' ' . $lastName, EMAIL_SIGNATURE);
    //                         $emailData = helpers::emailTemplate("Template 3", $searchArr, $replaceArr);

    //                         if (!empty($emailData)) {
    //                             $toEmail = $email;
    //                             $toName = $firstName;
    //                             $subject = !empty($emailData['subject']) ? $emailData['subject'] : '';
    //                             $smsMessage = !empty($emailData['sms']) ? $emailData['sms'] : '';

    //                             $isSms = !empty($emailData['isSms']) ? $emailData['isSms'] : '';
    //                             $pushBody = !empty($emailData['pushBody']) ? $emailData['pushBody'] : '';
    //                             $isPush = !empty($emailData['isPush']) ? $emailData['isPush'] : '';

    //                             /* SEND EMAIL */
    //                             emailHelpers::sendEmailNotification($emailData, $toEmail, $toName, $subject);

    //                             /* SEND SMS */
    //                             if (!empty($smsMessage) && !empty($isSms) && !empty($mobileNumberVerified) && !empty($mobileCode) && !empty($mobileNumber)) {
    //                                 $contactNumber = $mobileCode . $mobileNumber;
    //                                 $searchArr = array('[FIRSTNAME]');
    //                                 $replaceArr = array($firstName);
    //                                 smsHelpers::sendMessageNotification($contactNumber, $searchArr, $replaceArr, $smsMessage);
    //                             }

    //                             $roleId = !empty($userCheck->role_id) ? $userCheck->role_id : '';
    //                             if ($roleId == 4) {
    //                                 $receivedAs = 'Service Provider';
    //                             } else {
    //                                 $receivedAs = 'Customer';
    //                             }
    //                             /* SEND PUSH & NOTIFICATION */
    //                             if (!empty($pushBody) && !empty($isPush)) {
    //                                 $searchArr = array('[FIRSTNAME]');
    //                                 $replaceArr = array($firstName);
    //                                 $notificationInformation = array();
    //                                 pushNotificationHelpers::sendPushNotification($userCheck->id, 'Global', $receivedAs, $notificationInformation, $searchArr, $replaceArr, $pushBody);
    //                             }
    //                         }
    //                         DB::commit();
    //                         return response()->json(['res_code' => 200, 'response' => 'Password has been changed successfully.'], 200);
    //                     } else {
    //                         return response()->json(['res_code' => 201, 'response' => 'Try again.'], 200);
    //                     }
    //                 } catch (\Exception $ex) {
    //                     DB::rollBack();
    //                     return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later.", 'server_message' => $ex->getMessage()], 200);
    //                 }
    //             } else {
    //                 return response()->json(['res_code' => 201, 'response' => 'Invalid user.'], 200);
    //             }
    //         }
    //     }
    // }


    // public function verifyResetPassword(Request $request)
    // {

    //     $requestDecryptData = $request->request_decrypt_data;

    //     if (empty($requestDecryptData)) {
    //         return response()->json(['res_code' => 201, 'response' => 'Parameter is missing'], 200);
    //     }

    //     $rules = [
    //         'forgot_token' => 'required',
    //     ];

    //     $messages = [
    //         'forgot_token.required' => 'Parameter is missing.',
    //     ];
    //     $validator = Validator::make($requestDecryptData, $rules, $messages);
    //     if ($validator->fails()) {
    //         $validator = $validator->errors();
    //         $forgotToken = $validator->first('forgot_token');
    //         if (!empty($forgotToken)) {
    //             $error = $forgotToken;
    //         }
    //         return response()->json(['res_code' => 201, 'response' => $error], 200);
    //     } else {
    //         $forgotToken = !empty($requestDecryptData['forgot_token']) ? trim($requestDecryptData['forgot_token']) : '';
    //         $userCheck = User::select('id')->where('forgot_token', $forgotToken)->first();
    //         if (empty($userCheck)) {
    //             return response()->json(['res_code' => 201, 'response' => 'Invalid operation.'], 200);
    //         } else {
    //             $userId = !empty($userCheck->id) ? $userCheck->id : '0';

    //             if (!empty($userId)) {
    //                 try {
    //                     return response()->json([
    //                         'res_code' => 200, 'response' => 'Success.',
    //                         'data' => array('user_id' => $userId)
    //                     ], 200);
    //                 } catch (\Exception $ex) {
    //                     DB::rollBack();
    //                     return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later.", 'server_message' => $ex->getMessage()], 200);
    //                 }
    //             } else {
    //                 return response()->json(['res_code' => 201, 'response' => 'Invalid user.'], 200);
    //             }
    //         }
    //     }
    // }


    // public function resetPasswordWeb(Request $request)
    // {

    //     $requestDecryptData = $request->request_decrypt_data;

    //     if (empty($requestDecryptData)) {
    //         return response()->json(['res_code' => 201, 'response' => 'Parameter is missing'], 200);
    //     }

    //     $rules = [
    //         'forgot_token' => 'required',
    //         'password' => 'required|min:6',
    //     ];

    //     $messages = [
    //         'forgot_token.required' => 'Parameter is missing.',
    //         'password.required' => 'Password is required.',
    //         'password.min' => 'The password must be at least 6 character',
    //     ];
    //     $validator = Validator::make($requestDecryptData, $rules, $messages);
    //     if ($validator->fails()) {

    //         $validator = $validator->errors();
    //         $forgotToken = $validator->first('forgot_token');
    //         $password = $validator->first('password');
    //         if (!empty($forgotToken)) {
    //             $error = $forgotToken;
    //         } else if (!empty($password)) {
    //             $error = $password;
    //         }

    //         return response()->json(['res_code' => 201, 'response' => $error], 200);
    //     } else {
    //         $forgotToken = !empty($requestDecryptData['forgot_token']) ? trim($requestDecryptData['forgot_token']) : '';
    //         $password = !empty($requestDecryptData['password']) ? trim($requestDecryptData['password']) : '';
    //         $userCheck = User::select('id', 'role_id', 'first_name', 'last_name', 'email', 'mobile_code', 'mobile_number', 'mobile_number_verified')->where('forgot_token', $forgotToken)->first();
    //         if (empty($userCheck)) {
    //             return response()->json(['res_code' => 201, 'response' => 'Invalid user.'], 200);
    //         } else {
    //             $userId = !empty($userCheck->id) ? $userCheck->id : '0';
    //             $firstName = !empty($userCheck->first_name) ? $userCheck->first_name : '';
    //             $lastName = !empty($userCheck->last_name) ? $userCheck->last_name : '';
    //             $email = !empty($userCheck->email) ? $userCheck->email : '';
    //             $mobileCode = !empty($userCheck->mobile_code) ? $userCheck->mobile_code : '';
    //             $mobileNumber = !empty($userCheck->mobile_number) ? $userCheck->mobile_number : '';
    //             $mobileNumberVerified = !empty($userCheck->mobile_number_verified) ? $userCheck->mobile_number_verified : '';
    //             if (!empty($userId)) {
    //                 try {

    //                     DB::beginTransaction();

    //                     /* UPDATE USER PASSWORD */
    //                     $updateData = array(
    //                         'password' => Hash::make($password),
    //                         'updated_at' => date('Y-m-d H:i:s'),
    //                         'forgot_token' => "",
    //                         'updated_by' => $userId
    //                     );
    //                     $result = User::where('id', $userId)->update($updateData);
    //                     DB::commit();
    //                     if (!empty($result)) {
    //                         $searchArr = array('[FULLNAME]', '[SIGNATURE]');
    //                         $replaceArr = array($firstName . ' ' . $lastName, EMAIL_SIGNATURE);
    //                         $emailData = helpers::emailTemplate("Template 3", $searchArr, $replaceArr);

    //                         if (!empty($emailData)) {
    //                             $toEmail = $email;
    //                             $toName = $firstName;
    //                             $subject = !empty($emailData['subject']) ? $emailData['subject'] : '';
    //                             $smsMessage = !empty($emailData['sms']) ? $emailData['sms'] : '';

    //                             $isSms = !empty($emailData['isSms']) ? $emailData['isSms'] : '';
    //                             $pushBody = !empty($emailData['pushBody']) ? $emailData['pushBody'] : '';
    //                             $isPush = !empty($emailData['isPush']) ? $emailData['isPush'] : '';

    //                             /* SEND EMAIL */
    //                             emailHelpers::sendEmailNotification($emailData, $toEmail, $toName, $subject);

    //                             $roleId = !empty($userCheck->role_id) ? $userCheck->role_id : '';
    //                             if ($roleId == 4) {
    //                                 $receivedAs = 'Service Provider';
    //                             } else {
    //                                 $receivedAs = 'Customer';
    //                             }
    //                             /* SEND PUSH & NOTIFICATION */
    //                             if (!empty($pushBody) && !empty($isPush)) {
    //                                 $searchArr = array();
    //                                 $replaceArr = array();
    //                                 $notificationInformation = array();
    //                                 pushNotificationHelpers::sendPushNotification($userCheck->id, 'Global', $receivedAs, $notificationInformation, $searchArr, $replaceArr, $pushBody);
    //                             }
    //                         }

    //                         return response()->json(['res_code' => 200, 'response' => 'Password has been changed successfully.'], 200);
    //                     } else {
    //                         return response()->json(['res_code' => 201, 'response' => 'Something unexpected happened. Try again later1.'], 200);
    //                     }
    //                 } catch (\Exception $ex) {
    //                     DB::rollBack();
    //                     return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later." . $ex->getMessage(), 'server_message' => $ex->getMessage()], 200);
    //                 }
    //             } else {
    //                 return response()->json(['res_code' => 201, 'response' => 'Something unexpected happened. Try again later.'], 200);
    //             }
    //         }
    //     }
    // }


    // public function socialLogin(Request $request)
    // {
    //     $requestDecryptData = $request->request_decrypt_data;

    //     $rules = [
    //         'social_id' => 'required',
    //         'type' => 'required',
    //     ];
    //     $messages = [
    //         'social_id.required' => 'Social id is required.',
    //         'type.required' => 'Social type is required.',
    //     ];
    //     $validator = Validator::make($requestDecryptData, $rules, $messages);
    //     if ($validator->fails()) {

    //         $validator = $validator->errors();
    //         $socialId = $validator->first('social_id');
    //         $type = $validator->first('type');
    //         if (!empty($socialId)) {
    //             $error = $socialId;
    //         } else if (!empty($type)) {
    //             $error = $type;
    //         }

    //         return response()->json(['res_code' => 201, 'response' => $error], 200);
    //     } else {
    //         $socialId = trim($requestDecryptData['social_id']);
    //         $type = trim($requestDecryptData['type']);
    //         $email = !empty($requestDecryptData['email']) ? trim($requestDecryptData['email']) : '';
    //         $firstName = !empty($requestDecryptData['first_name']) ? trim($requestDecryptData['first_name']) : '';
    //         $lastName = !empty($requestDecryptData['last_name']) ? trim($requestDecryptData['last_name']) : '';
    //         $profileSocialImage = !empty($requestDecryptData['profile_image']) ? trim($requestDecryptData['profile_image']) : '';

    //         $data = array(
    //             'social_id' => $socialId,
    //             'origin' => $type,
    //             'email' => $email,
    //             'first_name' => $firstName,
    //             'last_name' => $lastName,
    //             'account_origin' => $type,
    //             'status' => 'Active',
    //             'role_id' => 3,
    //         );

    //         $returnResponse = $this->socialAuthenticate($data);
    //         if (!empty($returnResponse['status']) && $returnResponse['status'] == 1) {
    //             $userId = !empty($returnResponse['user_id']) ? $returnResponse['user_id'] : 0;
    //             $userdata = array(
    //                 'id' => $userId,
    //             );

    //             if (Auth::loginUsingId($userdata)) {
    //                 $user = Auth::user();

    //                 $id = !empty($user['id']) ? $user['id'] : '0';
    //                 /* PROFIL IMAGE UPLOAD SECTION */
    //                 $checkProfleImage = UserDetail::select('profile_image', 'birthday', 'nationality_id')->where('user_id', $userId)->first();
    //                 if (!empty($profileSocialImage)) {

    //                     if (!empty($checkProfleImage) && !empty($checkProfleImage->profile_image)) {
    //                         $profileImage = mediaHelper::imageHelper('profile', $checkProfleImage->profile_image, 'default-avatar.jpg');
    //                     } else if (empty($checkProfleImage->profile_image)) {
    //                         $image = $this->getPutImageContent($profileSocialImage);
    //                         if (!empty($image)) {
    //                             $updateData = array(
    //                                 'profile_image' => $image,
    //                                 'updated_at' => date('Y-m-d H:i:s'),
    //                                 'updated_by' => $userId
    //                             );
    //                             UserDetail::where('user_id', $userId)->update($updateData);
    //                             $profileImage = mediaHelper::imageHelper('profile', $image);
    //                         } else {
    //                             $profileImage = $this->defaultProfileImage;
    //                         }
    //                     }
    //                 } else {
    //                     if (!empty($checkProfleImage) && !empty($checkProfleImage->profile_image)) {
    //                         $profileImage = mediaHelper::imageHelper('profile', $checkProfleImage->profile_image, 'default-avatar.jpg');
    //                     } else {
    //                         $profileImage = $this->defaultProfileImage;
    //                     }
    //                 }

    //                 /* SAVE DEVICE INFORMATION */
    //                 $deviceId = !empty($requestDecryptData['device_id']) ? $requestDecryptData['device_id'] : '';
    //                 $deviceType = !empty($requestDecryptData['device_type']) ? $requestDecryptData['device_type'] : '';
    //                 $deviceToken = !empty($requestDecryptData['device_token']) ? $requestDecryptData['device_token'] : '';
    //                 $deviceName = !empty($requestDecryptData['device_name']) ? $requestDecryptData['device_name'] : '';
    //                 $modelName = !empty($requestDecryptData['model_name']) ? $requestDecryptData['model_name'] : '';
    //                 $osVersion = !empty($requestDecryptData['os_version']) ? $requestDecryptData['os_version'] : '';
    //                 if (!empty($deviceType) && !empty($deviceToken)) {
    //                     $deviceData = array(
    //                         'user_id' => $id,
    //                         'device_id' => $deviceId,
    //                         'device_type' => $deviceType,
    //                         'device_token' => $deviceToken,
    //                         'device_name' => $deviceName,
    //                         'model_name' => $modelName,
    //                         'os_version' => $osVersion,
    //                     );
    //                     pushNotificationHelpers::deviceTokenInsert($deviceData);
    //                 }

    //                 /* CHECKEMAIL MOBILE VERIFIY */
    //                 $email = !empty($user['email']) ? $user['email'] : '';
    //                 $registrationToken = !empty($user['registration_token']) ? $user['registration_token'] : '';
    //                 $mobileNumber = !empty($user['mobile_number']) ? $user['mobile_number'] : '';
    //                 $mobileNumberVerified = !empty($user['mobile_number_verified']) ? $user['mobile_number_verified'] : '';
    //                 $emailMobileVerify = helpers::checkEmailMobileVerify($email, $registrationToken, $mobileNumber, $mobileNumberVerified);

    //                 $data = array(
    //                     'id' => $id,
    //                     'title' => !empty($user['title']) ? $user['title'] : '',
    //                     'role_id' => !empty($user['role_id']) ? $user['role_id'] : '',
    //                     'first_name' => !empty($user['first_name']) ? $user['first_name'] : '',
    //                     'last_name' => !empty($user['last_name']) ? $user['last_name'] : '',
    //                     'email' => $email,
    //                     'iso' => !empty($user['iso']) ? $user['iso'] : 'ch',
    //                     'mobile_code' => !empty($user['mobile_code']) ? $user['mobile_code'] : '',
    //                     'mobile_number' => $mobileNumber,
    //                     'birthday' => !empty($checkProfleImage->birthday) ? $checkProfleImage->birthday : '',
    //                     'nationality_id' => !empty($checkProfleImage->nationality_id) ? $checkProfleImage->nationality_id : 0,
    //                     'gender' => !empty($user['gender']) ? $user['gender'] : 'Male',
    //                     'profile_image' => $profileImage,
    //                     'token' => $user->createToken('AltaBooking')->accessToken,
    //                     'token_type' => 'Bearer',
    //                     'email_mobile_verify' => $emailMobileVerify,
    //                 );

    //                 /* USER DETAULT ADDRESS */
    //                 $defaultAddress = array();
    //                 $defaultResult = Address::getDefaultAddress($id);
    //                 if (!empty($defaultResult)) {
    //                     $defaultAddress = array(
    //                         'address_id' => !empty($defaultResult->id) ? $defaultResult->id : 0,
    //                         'first_name' => !empty($defaultResult->first_name) ? $defaultResult->first_name : '',
    //                         'last_name' => !empty($defaultResult->last_name) ? $defaultResult->last_name : '',
    //                         'email' => !empty($defaultResult->email) ? $defaultResult->email : '',
    //                         'iso' => !empty($defaultResult->iso) ? $defaultResult->iso : 'ch',
    //                         'mobile_code' => !empty($defaultResult->mobile_code) ? $defaultResult->mobile_code : '',
    //                         'mobile_number' => !empty($defaultResult->mobile_number) ? $defaultResult->mobile_number : '',
    //                         'country_id' => !empty($defaultResult->country_id) ? $defaultResult->country_id : '',
    //                         'country_name' => !empty($defaultResult->country_name) ? $defaultResult->country_name : '',
    //                         'state_id' => !empty($defaultResult->state_id) ? $defaultResult->state_id : '',
    //                         'state_name' => !empty($defaultResult->state_name) ? $defaultResult->state_name : '',
    //                         'city' => !empty($defaultResult->city) ? $defaultResult->city : '',
    //                         'post_code' => !empty($defaultResult->post_code) ? $defaultResult->post_code : '',
    //                         'address' => !empty($defaultResult->address) ? $defaultResult->address : '',
    //                         'is_default' => !empty($defaultResult->is_default) ? (int) $defaultResult->is_default : 0,
    //                     );
    //                 }

    //                 $checkUserData = UserDetail::with('Currency')->where('user_id', $userId)->first();
    //                 $checkCurrency = UserDetail::select('currency_id')->where('user_id', $userId)->first();
    //                 $currencyId = !empty($checkCurrency->currency_id) ? $checkCurrency->currency_id : 0;
    //                 /* CURRENCY */
    //                 $currencyId = !empty($checkUserData->currency_id) ? $checkUserData->currency_id : 0;
    //                 $currencyCode = !empty($checkUserData['Currency']->code) ? $checkUserData['Currency']->code : 0;
    //                 $currencySymbol = !empty($checkUserData['Currency']->symbol) ? $checkUserData['Currency']->symbol : 0;
    //                 $currencyInfo = array(
    //                     'currency_id' => $currencyId,
    //                     'currency_code' => $currencyCode,
    //                     'currency_symbol' => $currencySymbol,
    //                 );

    //                 /* USER ACCESS PRIORITY SECTION */
    //                 if (!empty($user['role_id']) && $user['role_id'] == 4) {
    //                     self::userAccessPriority($userId);
    //                 }

    //                 $priorityList = UserAccessPriority::userAccessPriorityList($userId);
    //                 /* WALLET INFORMATION */
    //                 $walletInformation = $this->walletInformationList($userId);

    //                 /* CATEGORY INFORMATION */
    //                 $userCategoryInfo = self::userCategoryList($userId);
    //                 return response()->json([
    //                     'res_code' => 200,
    //                     'response' => "You have successfully login",
    //                     'data' => $data,
    //                     "default_customer_info" => !empty($defaultAddress) ? $defaultAddress : (object) $defaultAddress,
    //                     'waller_info' => $walletInformation,
    //                     'currency_info' => $currencyInfo,
    //                     'category_info' => $userCategoryInfo,
    //                     'priority_list' => !empty($priorityList) ? $priorityList : (object) array()
    //                 ], 200);
    //             } else {
    //                 return response()->json(['res_code' => 201, 'response' => 'Something went wrong. Please try again later.'], 200);
    //             }
    //         } else if (!empty($returnResponse['status']) && $returnResponse['status'] == 2) {
    //             return response()->json(['res_code' => 201, 'response' => 'Service provider can not be login using social account.'], 200);
    //         } else {
    //             return response()->json(['res_code' => 201, 'response' => 'Something went wrong. Please try again later.'], 200);
    //         }
    //     }
    // }


    // public function getPutImageContent($data)
    // {
    //     if (isset($data) && !empty($data)) {
    //         $imageContent = file_get_contents($data);

    //         if (empty($imageContent)) {
    //             return false;
    //         }

    //         /* CHECK EXTENSION */
    //         $getExt = imageHelpers::getImageMimeType($imageContent);

    //         $extension = !empty($getExt) ? $getExt : 'jpg';
    //         $fileName = rand() . "profileimage-" . time() . '.' . $extension;
    //         $targetdir = public_path('/uploads/profile/') . $fileName;
    //         $resultUpload = file_put_contents($targetdir, $imageContent);
    //         if (!empty($resultUpload)) {
    //             $awsUploadedImage = public_path('/uploads/profile/') . $fileName;
    //             $uploadedPath = '/uploads/profile/' . $fileName;
    //             imageHelpers::moveFileOnAwsByURL($uploadedPath, $awsUploadedImage);
    //             $uploadedThumbnailPath = '/uploads/profile/thumbnail/' . $fileName;
    //             imageHelpers::moveFileOnAwsByURL($uploadedThumbnailPath, $awsUploadedImage);
    //             imageHelpers::unlinkFile('/uploads/profile', $fileName);
    //             imageHelpers::unlinkFile('/uploads/profile/thumbnail', $fileName);
    //             return $fileName;
    //         } else {
    //             return false;
    //         }
    //     } else {
    //         return false;
    //     }
    // }


    // public function socialAuthenticate($data)
    // {
    //     if (empty($data)) {
    //         return $arr = array('status' => 0);
    //     }

    //     $socialUserChecking = UserSocialDetail::select('user_id')
    //         ->where('social_id', $data['social_id'])
    //         ->where('origin', $data['origin'])
    //         ->first();
    //     if (!empty($socialUserChecking)) {
    //         $id = !empty($socialUserChecking['user_id']) ? $socialUserChecking['user_id'] : 0;
    //         return $arr = array('status' => 1, 'user_id' => $id, 'is_first_login' => 0);
    //     } else {
    //         $title = !empty($data['title']) ? trim($data['title']) : 'Mr';
    //         $email = trim($data['email']);
    //         $firstName = $data['first_name'];
    //         $lastName = $data['last_name'];
    //         $origin = $data['origin'];
    //         $socialId = $data['social_id'];
    //         $accountOrigin = !empty($data['account_origin']) ? $data['account_origin'] : 'self';
    //         $status = !empty($data['status']) ? $data['status'] : 'Inactive';
    //         $role_id = !empty($data['role_id']) ? $data['role_id'] : 3;
    //         /* EMAIL EMPTY CHECKING */
    //         if (!empty($email)) {

    //             /* EMAIL EXITS CHECKING */
    //             $userCheck = User::select('id', 'role_id')->where('email', $email)->first();
    //             if (!empty($userCheck)) {
    //                 try {
    //                     if ($userCheck['role_id'] == 3) {
    //                         DB::beginTransaction();
    //                         $id = !empty($userCheck['id']) ? $userCheck['id'] : 0;
    //                         $usersocialdetails = new UserSocialDetail;
    //                         $usersocialdetails->user_id = $id;
    //                         $usersocialdetails->origin = $origin;
    //                         $usersocialdetails->social_id = $socialId;
    //                         $usersocialdetails->created_at = date('Y-m-d H:i:s');
    //                         $user_save_result = $usersocialdetails->save();
    //                         DB::commit();
    //                     } else {
    //                         return $arr = array('status' => 2);
    //                     }
    //                     if (!empty($user_save_result)) {
    //                         return $arr = array('status' => 1, 'user_id' => $id, 'is_first_login' => 1);
    //                     } else {
    //                         return $arr = array('status' => 0);
    //                     }
    //                 } catch (\Exception $ex) {
    //                     DB::rollBack();

    //                     return $arr = array('status' => 0);
    //                 }
    //             } else {
    //                 try {
    //                     DB::beginTransaction();
    //                     $user = new User;
    //                     $password = helpers::generatePassword();
    //                     $user->title = $title;
    //                     $user->first_name = $firstName;
    //                     $user->last_name = $lastName;
    //                     $user->role_id = $role_id;
    //                     $user->email = !empty($email) ? $email : '';
    //                     $user->password = !empty($password) ? Hash::make($password) : '';
    //                     $user->mobile_code = '';
    //                     $user->mobile_number = '';
    //                     $user->status = $status;
    //                     $user->created_at = date('Y-m-d H:i:s');
    //                     $user->created_by = 0;
    //                     $user->save();
    //                     $userId = $user->id;

    //                     if (!empty($userId)) {
    //                         $userdetails = new UserDetail;
    //                         /* USER DETAILS */
    //                         $code = dbHelpers::uniqueCode(8, 'user_details', 'user_code');
    //                         $genetate = $firstName . '-' . $lastName . '-' . $code;
    //                         $link = dbHelpers::generateURL('user_details', 'user_link', $genetate, 0);

    //                         $userdetails->user_id = !empty($userId) ? $userId : '';
    //                         $userdetails->user_link = !empty($link) ? $link : '';
    //                         $new_code = dbHelpers::uniqueCode(8, 'user_details', 'user_code');
    //                         $userdetails->user_code = !empty($code) ? $code : '';
    //                         $userdetails->account_origin = $accountOrigin;
    //                         $userdetails->created_by = $userId;
    //                         $userdetails->created_at = date('Y-m-d H:i:s');
    //                         $userdetails->parent_id = '0';
    //                         $userdetails->updated_by = '0';
    //                         $userdetails->save();

    //                         $usersocialdetails = new UserSocialDetail;
    //                         $usersocialdetails->user_id = $userId;
    //                         $usersocialdetails->origin = $origin;
    //                         $usersocialdetails->social_id = $socialId;
    //                         $usersocialdetails->created_at = date('Y-m-d H:i:s');
    //                         $user_save_result = $usersocialdetails->save();

    //                         DB::commit();
    //                         return $arr = array('status' => 1, 'user_id' => $userId, 'is_first_login' => 1);
    //                     } else {
    //                         return $arr = array('status' => 0);
    //                     }
    //                 } catch (\Exception $ex) {
    //                     DB::rollBack();

    //                     return $arr = array('status' => 0);
    //                 }
    //             }
    //         } else {
    //             try {
    //                 DB::beginTransaction();
    //                 $user = new User;
    //                 $password = helpers::generatePassword();
    //                 $user->title = $title;
    //                 $user->first_name = $firstName;
    //                 $user->last_name = $lastName;
    //                 $user->role_id = $role_id;
    //                 $user->email = '';
    //                 $user->password = '';
    //                 $user->mobile_code = '';
    //                 $user->mobile_number = '';
    //                 $user->status = $status;
    //                 $user->created_at = date('Y-m-d H:i:s');
    //                 $user->created_by = 0;
    //                 $user->save();

    //                 $userId = $user->id;

    //                 if (!empty($userId)) {
    //                     $userdetails = new UserDetail;
    //                     /* USER DETAILS */

    //                     $code = dbHelpers::uniqueCode(8, 'user_details', 'user_code');
    //                     $genetate = $firstName . '-' . $lastName . '-' . $code;
    //                     $link = dbHelpers::generateURL('user_details', 'user_link', $genetate, 0);
    //                     $userdetails->user_id = !empty($userId) ? $userId : '';
    //                     $userdetails->user_link = !empty($link) ? $link : '';
    //                     $userdetails->user_code = !empty($code) ? $code : '';
    //                     $userdetails->account_origin = $accountOrigin;
    //                     $userdetails->created_by = $userId;
    //                     $userdetails->created_at = date('Y-m-d H:i:s');
    //                     $userdetails->parent_id = '0';
    //                     $userdetails->updated_by = '0';
    //                     $userdetails->save();

    //                     $usersocialdetails = new UserSocialDetail;
    //                     $usersocialdetails->user_id = $userId;
    //                     $usersocialdetails->origin = $origin;
    //                     $usersocialdetails->social_id = $socialId;
    //                     $usersocialdetails->created_at = date('Y-m-d H:i:s');
    //                     $user_save_result = $usersocialdetails->save();

    //                     DB::commit();
    //                     return $arr = array('status' => 1, 'user_id' => $userId, 'is_first_login' => 1);
    //                 } else {
    //                     return $arr = array('status' => 0);
    //                 }
    //             } catch (\Exception $ex) {
    //                 DB::rollBack();
    //                 return $arr = array('status' => 0);
    //             }
    //         }
    //     }
    // }


    // public function accountVerification(Request $request)
    // {
    //     try {
    //         $requestDecryptData = $request->request_decrypt_data;
    //         if (empty($requestDecryptData)) {
    //             return response()->json(['res_code' => 201, 'response' => 'Parameter is missing.'], 200);
    //         }

    //         $rules = [
    //             'registration_token' => 'required',
    //         ];
    //         $messages = [
    //             'registration_token.required' => 'Parameter is missing.',
    //         ];
    //         $validator = Validator::make($requestDecryptData, $rules, $messages);
    //         if ($validator->fails()) {

    //             $validator = $validator->errors();
    //             $registrationToken = $validator->first('registration_token');
    //             if (!empty($registrationToken)) {
    //                 $error = $registrationToken;
    //             }

    //             return response()->json(['res_code' => 201, 'response' => $error], 200);
    //         } else {
    //             $registrationToken = !empty($requestDecryptData['registration_token']) ? trim($requestDecryptData['registration_token']) : '';

    //             $checkRegistrationToken = User::select('id', 'role_id', 'first_name', 'last_name', 'email', 'mobile_number', 'mobile_code', 'mobile_number_verified')->where('registration_token', $registrationToken)->first();
    //             if (!empty($checkRegistrationToken)) {
    //                 $roleId = !empty($checkRegistrationToken->role_id) ? $checkRegistrationToken->role_id : '';
    //                 if ($roleId == 3) {
    //                     $status = 'Active';
    //                 } else {
    //                     $status = 'Verified';
    //                 }
    //                 DB::beginTransaction();
    //                 $result = User::where('id', $checkRegistrationToken->id)->where('registration_token', $registrationToken)
    //                     ->update(array('registration_token' => '', 'status' => $status, 'updated_at' => date('Y-m-d H:i:s')));
    //                 DB::commit();
    //                 if (!empty($result)) {
    //                     $firstName = !empty($checkRegistrationToken->first_name) ? $checkRegistrationToken->first_name : '';
    //                     $lastName = !empty($checkRegistrationToken->last_name) ? $checkRegistrationToken->last_name : '';
    //                     $name = $firstName . ' ' . $lastName;
    //                     if ($roleId == 3) {
    //                         $searchArr = array('[FULLNAME]', '[EMAIL]', '[SIGNATURE]');
    //                         $replaceArr = array($name, $checkRegistrationToken->email, EMAIL_SIGNATURE);
    //                         $emailData = helpers::emailTemplate("Template 52", $searchArr, $replaceArr);
    //                         if (!empty($emailData)) {
    //                             $toEmail = $checkRegistrationToken->email;
    //                             $toName = $checkRegistrationToken->first_name;
    //                             $subject = $emailData['subject'];

    //                             $subject = !empty($emailData['subject']) ? $emailData['subject'] : '';
    //                             $smsMessage = !empty($emailData['sms']) ? $emailData['sms'] : '';

    //                             $isSms = !empty($emailData['isSms']) ? $emailData['isSms'] : '';
    //                             $pushBody = !empty($emailData['pushBody']) ? $emailData['pushBody'] : '';
    //                             $isPush = !empty($emailData['isPush']) ? $emailData['isPush'] : '';

    //                             /* SEND EMAIL */
    //                             emailHelpers::sendEmailNotification($emailData, $toEmail, $toName, $subject);

    //                             /* SEND SMS */
    //                             if (!empty($smsMessage) && !empty($isSms) && !empty($checkRegistrationToken->mobile_number_verified) && !empty($checkRegistrationToken->mobile_code) && !empty($checkRegistrationToken->mobile_number)) {
    //                                 $receiverNumber = $checkRegistrationToken->mobile_code . $checkRegistrationToken->mobile_number;
    //                                 $searchArr = array('[EMAIL]');
    //                                 $replaceArr = array($checkRegistrationToken->email);
    //                                 smsHelpers::sendMessageNotification($receiverNumber, $searchArr, $replaceArr, $smsMessage);
    //                             }
    //                             $roleId = !empty($checkRegistrationToken->role_id) ? $checkRegistrationToken->role_id : '';
    //                             if ($roleId == 4) {
    //                                 $receivedAs = 'Service Provider';
    //                             } else {
    //                                 $receivedAs = 'Customer';
    //                             }

    //                             /* SEND PUSH & NOTIFICATION */
    //                             if (!empty($pushBody) && !empty($isPush)) {
    //                                 $searchArr = array('[EMAIL]');
    //                                 $replaceArr = array($checkRegistrationToken->email);
    //                                 $notificationInformation = array();
    //                                 pushNotificationHelpers::sendPushNotification($checkRegistrationToken->id, 'Customer', $receivedAs, $notificationInformation, $searchArr, $replaceArr, $pushBody);
    //                             }
    //                         }
    //                     } else {
    //                         $searchArr = array('[FULLNAME]', '[SIGNATURE]');
    //                         $replaceArr = array($name, EMAIL_SIGNATURE);

    //                         $emailData = helpers::emailTemplate("Template 44", $searchArr, $replaceArr);

    //                         if (!empty($emailData)) {
    //                             $toEmail = $checkRegistrationToken->email;
    //                             $toName = $checkRegistrationToken->first_name;
    //                             $mobileCode = !empty($checkRegistrationToken->mobile_code) ? $checkRegistrationToken->mobile_code : '';
    //                             $mobileNumber = !empty($checkRegistrationToken->mobile_number) ? $checkRegistrationToken->mobile_number : '';
    //                             $subject = !empty($emailData['subject']) ? $emailData['subject'] : '';
    //                             $smsMessage = !empty($emailData['sms']) ? $emailData['sms'] : '';

    //                             $isSms = !empty($emailData['isSms']) ? $emailData['isSms'] : '';
    //                             $pushBody = !empty($emailData['pushBody']) ? $emailData['pushBody'] : '';
    //                             $isPush = !empty($emailData['isPush']) ? $emailData['isPush'] : '';

    //                             /* SEND EMAIL */
    //                             emailHelpers::sendEmailNotification($emailData, $toEmail, $toName, $subject);

    //                             /* SEND SMS */
    //                             if (!empty($smsMessage) && !empty($isSms) && !empty($mobileCode) && !empty($mobileNumber)) {
    //                                 $contactNumber = $mobileCode . $mobileNumber;
    //                                 $searchArr = array('[FULLNAME]');
    //                                 $replaceArr = array($name);
    //                                 smsHelpers::sendMessageNotification($contactNumber, $searchArr, $replaceArr, $smsMessage);
    //                             }

    //                             /* SEND PUSH & NOTIFICATION */
    //                             if (!empty($pushBody) && !empty($isPush)) {
    //                                 $searchArr = array('[FULLNAME]');
    //                                 $replaceArr = array($name);
    //                                 $notificationInformation = array();
    //                                 pushNotificationHelpers::sendPushNotification($checkRegistrationToken->id, 'Service Provider', 'Service Provider', $notificationInformation, $searchArr, $replaceArr, $pushBody);
    //                             }
    //                         }
    //                     }
    //                     return response()->json(['res_code' => 200, 'response' => "Thank You, your has verified."], 200);
    //                 } else {
    //                     return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later."], 200);
    //                 }
    //             } else {
    //                 return response()->json(['res_code' => 201, 'response' => "Invalid verification URL."], 200);
    //             }
    //         }
    //     } catch (\Exception $ex) {
    //         DB::rollBack();
    //         /*CREATE ERROR LOGS*/
    //         $errorLogData = array(
    //             'user_id' => 0,
    //             'section' => 'Account Verification',
    //             'error_message' => $ex->getMessage(),
    //             'category_id' => 0,
    //             'request' => '',
    //             'response' => '',
    //         );
    //         dbHelpers::createErrorLogs($errorLogData);
    //         return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later.", 'server_message' => $ex->getMessage()], 200);
    //     }
    // }


    // public function changePassword(Request $request)
    // {

    //     $requestDecryptData = $request->request_decrypt_data;

    //     if (empty($requestDecryptData)) {
    //         return response()->json(['res_code' => 201, 'response' => 'Parameter is missing.'], 200);
    //     }

    //     $rules = [
    //         'old_password' => 'required',
    //         'new_password' => 'required|min:6',
    //     ];
    //     $messages = [
    //         'old_password.required' => 'Old password is required.',
    //         'new_password.required' => 'Password is required.',
    //         'new_password.min' => 'New pssword must be at least 6 character',
    //     ];
    //     $validator = Validator::make($requestDecryptData, $rules, $messages);
    //     if ($validator->fails()) {

    //         $validator = $validator->errors();
    //         $oldPassword = $validator->first('old_password');
    //         $newPassword = $validator->first('new_password');
    //         if (!empty($oldPassword)) {
    //             $error = $oldPassword;
    //         } else if (!empty($newPassword)) {
    //             $error = $newPassword;
    //         }

    //         return response()->json(['res_code' => 201, 'response' => $error], 200);
    //     } else {
    //         try {
    //             $user = Auth::user();
    //             $authId = !empty($user->id) ? $user->id : 0;
    //             $firstName = !empty($user->first_name) ? $user->first_name : '';
    //             $lastName = !empty($user->last_name) ? $user->last_name : '';
    //             $email = !empty($user->email) ? $user->email : '';
    //             $mobileCode = !empty($user->mobile_code) ? $user->mobile_code : '';
    //             $mobileNumber = !empty($user->mobile_number) ? $user->mobile_number : '';
    //             $mobileNumberVerified = !empty($user->mobile_number_verified) ? $user->mobile_number_verified : '';

    //             $oldPassword = !empty($requestDecryptData['old_password']) ? $requestDecryptData['old_password'] : '';
    //             $newPassword = !empty($requestDecryptData['new_password']) ? $requestDecryptData['new_password'] : '';
    //             if ($oldPassword === $newPassword) {
    //                 return response()->json(['res_code' => 201, 'response' => "You have given same as old password."], 200);
    //             }
    //             $user = User::find($authId);
    //             $checkResult = Hash::check($oldPassword, $user->password);
    //             if (!$checkResult || empty($checkResult)) {
    //                 return response()->json(['res_code' => 201, 'response' => 'The specified password does not match the old password.'], 200);
    //             } else {
    //                 DB::beginTransaction();
    //                 $credentials['id'] = $authId;
    //                 $credentials['password'] = $newPassword;

    //                 $user = Auth()->user();
    //                 $result = $user->update(['password' => Hash::make($credentials['password'])]);
    //                 DB::commit();
    //                 if (!empty($result)) {
    //                     $searchArr = array('[FULLNAME]', '[SIGNATURE]');
    //                     $replaceArr = array($firstName . ' ' . $lastName, EMAIL_SIGNATURE);
    //                     $emailData = helpers::emailTemplate("Template 4", $searchArr, $replaceArr);

    //                     if (!empty($emailData)) {
    //                         $toEmail = $email;
    //                         $toName = $firstName;
    //                         $subject = !empty($emailData['subject']) ? $emailData['subject'] : '';
    //                         $smsMessage = !empty($emailData['sms']) ? $emailData['sms'] : '';

    //                         $isSms = !empty($emailData['isSms']) ? $emailData['isSms'] : '';
    //                         $pushBody = !empty($emailData['pushBody']) ? $emailData['pushBody'] : '';
    //                         $isPush = !empty($emailData['isPush']) ? $emailData['isPush'] : '';

    //                         /* SEND EMAIL */
    //                         emailHelpers::sendEmailNotification($emailData, $toEmail, $toName, $subject);

    //                         /* SEND SMS */
    //                         if (!empty($smsMessage) && !empty($isSms) && !empty($mobileNumberVerified) && !empty($mobileCode) && !empty($mobileNumber)) {
    //                             $contactNumber = $mobileCode . $mobileNumber;
    //                             $searchArr = array();
    //                             $replaceArr = array();
    //                             smsHelpers::sendMessageNotification($contactNumber, $searchArr, $replaceArr, $smsMessage);
    //                         }

    //                         $roleId = !empty($user->role_id) ? $user->role_id : '';
    //                         if ($roleId == 4) {
    //                             $receivedAs = 'Service Provider';
    //                         } else {
    //                             $receivedAs = 'Customer';
    //                         }
    //                         /* SEND PUSH & NOTIFICATION */
    //                         if (!empty($pushBody) && !empty($isPush)) {
    //                             $searchArr = array();
    //                             $replaceArr = array();
    //                             $notificationInformation = array();
    //                             pushNotificationHelpers::sendPushNotification($user->id, 'Global', 'Customer', $notificationInformation, $searchArr, $replaceArr, $pushBody);
    //                         }
    //                     }
    //                     return response()->json(['res_code' => 200, 'response' => 'Password have been changed.'], 200);
    //                 } else {
    //                     return response()->json(['res_code' => 201, 'response' => 'Try again.'], 200);
    //                 }
    //             }
    //         } catch (\Exception $ex) {
    //             DB::rollBack();
    //             /*CREATE ERROR LOGS*/
    //             $errorLogData = array(
    //                 'user_id' => 0,
    //                 'section' => 'Change password',
    //                 'error_message' => $ex->getMessage(),
    //                 'category_id' => 0,
    //                 'request' => json_encode($requestDecryptData),
    //                 'response' => '',
    //             );
    //             dbHelpers::createErrorLogs($errorLogData);
    //             return response()->json(['res_code' => 201, 'response' => "Something unexpected happened. Try again later.", 'server_message' => $ex->getMessage()], 200);
    //         }
    //     }
    // }
}
