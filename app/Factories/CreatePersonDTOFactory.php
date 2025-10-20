<?php

namespace App\Factories;

use App\Classes\DTOs\Person\CreatePersonDTO;
use App\Classes\DTOs\Person\PersonDTO;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreatePersonDTOFactory
{
    static  function fromRequest(Request $request): CreatePersonDTO
    {
        $person = $request->input('person', []);
        $user = $request->input('user', []);
        $password = $user['password'];
        $personDto = new PersonDTO(
            name: $person['name'],
            email: $person['email'],
            birthday: Carbon::parse($person['birthday']),
            phone: $person['phone']
        );

         return new CreatePersonDTO($personDto, $password);
    }
}
