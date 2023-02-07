<?php

namespace App\Http\Controllers;

use App\Managers\PersonManager;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function __construct(protected PersonManager $manager)
    {
    }

    public function index()
    {
        return view('person.index');
    }

    public function create()
    {
        return view('person.create');
    }

    public function store(Request $request)
    {
        return $this->manager->createPerson($request);
    }

    public function show(Person $person)
    {
        return view('person.show', ['person' => $person]);
    }

    public function edit(Person $person)
    {
        return view('person.edit', compact('person'));
    }

    public function update(Request $request, Person $person)
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
