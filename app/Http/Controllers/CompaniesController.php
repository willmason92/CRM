<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{
    public function index()
    {
        $companies = Company::all();

        return view('companies.index', compact('companies'));
    }
    public function create()
    {
        return view('companies.create');
    }

    public function read()
    {

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validateData = $this->validation($request);

        Company::query()->create($validateData);

        return redirect('/companies')->with('success', 'Company is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return mixed
     */
    public function show($id)
    {
        $company = Company::query()->findOrFail($id);
        $employees = Employee::query()->where('company_id', $id)->get();

        $employeeCount = Employee::getCount($id);

        $user = Auth::user();
        return view('companies.view', compact(['company', 'user', 'employees', 'employeeCount']));
    }

    public function delete()
    {

    }

    /**
     * @param Request $request
     * @return array
     */
    public function validation(Request $request)
    {
        return $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'website' => 'required'
        ]);
    }

}
