<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(5);
        return view('company.index', compact('companies'));
    }


    public function create()
    {

        return view('company.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:companies',
            'location' => 'required',
        ]);

        $company = new Company(
            [
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'location' => $request->get('location'),
            ]
        );
        $company->save();
        return redirect()->route('company.index');
    }

    public function show(Company $company)
    {
    }

    public function edit(Company $company)
    {
        return view('company.edit', compact('company'));
    }

    public function update(Request $request, Company $company){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'location' => 'required',
        ]);

        $company->update($request->all());
        return redirect()->route('company.index');
    }

    public function destroy(Company $company){
        $company->delete();
        return redirect()->route('company.index');
    }


}
