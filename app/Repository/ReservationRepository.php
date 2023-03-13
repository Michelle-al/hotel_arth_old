<?php

namespace App\Repository;

use App\Models\Option;
use App\Models\Room;
use Carbon\Carbon;

class ReservationRepository
{
    static function calculateReservationPrice(array $validated, array $rooms) : float|int
    {
        // Calculating the price of the options if any
        if (isset($validated["options"])) {
            $option_price = ReservationRepository::calculateOptionPrice($validated, count($rooms));
        }

        // Creating the final array
        $rooms_prices = [ ...Room::whereIn("id", $rooms)->select('price')->pluck('price') ];
        $prices = (isset($option_price)) ? [$option_price, ...$rooms_prices] : $rooms_prices;

        // Returning the sum
        return array_reduce($prices, function ($curr, $acc) {
            return $curr + $acc;
        });
    }

    private static function calculateOptionPrice(array $validated, int $numberOfRooms) : float|int
    {
        $checkin = $validated["checkin"];
        $checkout = $validated["checkout"];
        $people = $validated["number_of_people"];
        // Carbon is a class used to work with dates
        $number_of_days = Carbon::parse($checkin)->diffInDays(Carbon::parse($checkout));

        $option_price = 0;
        $options = explode(',', $validated["options"]);
        $options = Option::whereIn("id", $options)->select("id", "option_price")->get();

        foreach($options as $option) {
            if (in_array($option->id, array(1,2,3,4,5))) {
                $option_price += $option->option_price * $people * $number_of_days;
            } elseif ($option->id === 6) {
                $option_price += 10 * ceil($number_of_days/7) * count($numberOfRooms);
            } else {
                $option_price += 25;
            }
        }

        return $option_price;
    }
}


