<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonStoreRequest;
use App\Http\Requests\PersonUpdateRequest;
use App\Managers\PersonManager;
use App\Models\Person;

class PersonController extends Controller
{
    public function __construct(protected PersonManager $manager)
    {
    }

    public function index()
    {
        $persons = Person::all();
        return view('person.index', ['persons' => $persons]);
    }

    public function create()
    {
        return view('person.create');
    }

    public function store(PersonStoreRequest $request)
    {
        $person = $this->manager->createCustomer($request);
        return redirect()->route('persons.show', $person);
    }

    public function show(Person $person)
    {
        return view('person.show', ['person' => $person]);
    }

    public function edit(Person $person)
    {
        return view('person.edit', compact('person'));
    }

    public function update(PersonUpdateRequest $request, Person $person)
    {
        $person->update($request->all());
        return redirect()->route('persons.show', $person);
    }

    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->route('persons.index');
    }
}
