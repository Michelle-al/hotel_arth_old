<?php

namespace App\Repository;

use App\Models\User;

class UserRepository {
    static function updateUser(User $user, array $validated) : User
    {

        $whole_address = json_encode(["address" => $validated["address"], "zip_code" => $validated["zipCode"], "city" => $validated["city"]]);
        if ($whole_address !== json_encode($user->personal_address)) {
            dd("Same address");
            $user->personal_address = $whole_address;
            }

        dd("New address");

        if ( isset($validated["companyName"],
                   $validated["companyAddress"],
                   $validated["companyZipCode"],
                   $validated["companyCity"]) )
        {
            $whole_company_address = json_encode(["address" => $validated["companyAddress"],
                                                  "zip_code" => $validated["companyZipCode"],
                                                  "city" => $validated["companyCity"]]);
            if ($whole_address !== json_encode($user->personal_address)) {
                $user->company_address = $whole_company_address;
            }
        }

        if ($validated["firstname"] !== $user->firstname) {
            $user->firstname = $validated ("firstname");
        }
        if ($validated["lastname"] !== $user->lastname) {
            $user->lastname = $validated ("lastname");
        }
        if ($validated["civility"] !== $user->gender) {
            $user->gender = $validated ("civility");
        }
        if ($validated["email"] !== $user->email) {
            $user->email = $validated ("email");
        }
        if ($validated["phoneNumber"] !== $user->phone) {
            $user->firstname = $validated ("phoneNumber");
        }

        $user->update();

        return $user;
    }
}
