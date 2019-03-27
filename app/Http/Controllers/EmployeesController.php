<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyActivity;
use App\Employee;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($id)
    {
        $company = Company::query()->where('id', $id)->first();

        $employees = Employee::query()->where('company_id', $id)->get();

        return view('employees.index', compact(['employees', 'company', 'id']));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create($id)
    {
        $company = Company::query()->where('id', $id)->first();

        return view('employees.create', compact(['id','company']));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $validatedData = $this->validation($request);
        //dd($validatedData);
        Employee::query()->create($validatedData);

        CompanyActivity::query()->create();

        return redirect('/companies')->with('success', 'Employee is successfully saved');
    }

    /**
     * @param $company
     * @param $employee
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($company, $employee)
    {
        $employee = Employee::query()->where('id', $employee)->first();
        $company = Company::query()->where('id', $company)->first();
        $employeeCount = Employee::query()->where('company_id', $company)->count();

        return view('employees.view', compact(['employee', 'company', 'employeeCount']));
    }

    /**
     * @param Request $request
     * @return array
     */
    public function validation(Request $request)
    {
        return $request->validate([
            'company_id' => 'required',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'email',
            'phone' => '',
        ]);
    }

}
